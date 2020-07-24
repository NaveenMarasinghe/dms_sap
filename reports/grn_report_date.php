<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("location:../index.php");
}
?>

<?php require_once("../incl/header.php"); ?>
<?php require_once("../incl/sidebar.php"); ?>
<?php require_once("../incl/pagetop.php"); ?>

<div class="page-content">


  <div class="row">
    <div class="col-xs-12">

      <!-- PAGE CONTENT BEGINS -->
      <div class="form-actions">

        <div class="page-header">
          <h1>
            GRN Report - Date Range
          </h1>
        </div><!-- /.page-header -->
        <div class="row">
          <div class="col-md-3">
            <label for="startDate">Start Date</label>
            <div class="input-group">
              <input class="form-control date-picker" id="startDate" type="text" />
              <span class="input-group-addon">
                <i class="fa fa-calendar bigger-110"></i>
              </span>
            </div>
          </div>
          <div class="col-md-3">
            <label for="endDate">End Date</label>
            <div class="input-group">
              <input class="form-control date-picker" id="endDate" type="text" />
              <span class="input-group-addon">
                <i class="fa fa-calendar bigger-110"></i>
              </span>
            </div>
          </div>



          <div class="clearfix col-md-6">
            <div class="pull-right tableTools-container"></div>
          </div>
        </div>

        <table id="salesTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th data-override="batchid">GRN ID</th>
              <th data-override="productname">GRN Date</th>
              <th data-override="cusname">Supplier Name</th>
              <th data-override="itemcost">Purchase ID</th>

            </tr>
          </thead>
          <tbody id="salesBody">
            <tr>
              <td>No Record</td>
              <td>No Record</td>
              <td>No Record</td>
              <td>No Record</td>
            </tr>
          </tbody>
          <tfoot>

          </tfoot>
        </table>


      </div>
      <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
  </div><!-- /.row -->

</div><!-- /.page-content -->


<script type="text/javascript">
  jQuery(function ($) {

    $('.date-picker').datepicker({
      autoclose: true,
      dateFormat: 'yy-mm-dd',
      maxDate: 0,
    });

  });

  $(document).ready(function () {
    document.title = "GRN Report - Date Range";

    $.noConflict();

    function myDatatable() {
      var myTable =
        $('#salesTable')
        .DataTable({
          bAutoWidth: true,
          "aoColumns": [

            null, null, null, null

          ],
          "lengthMenu": [
            [20, 50, -1],
            [20, 50, "All"]
          ],
          "aaSorting": [],
          "columnDefs": [
            {
              "width": "25%",
              "targets": 3
            },
            {
              "width": "25%",
              "targets": 2
            },
            {
              "width": "25%",
              "targets": 1
            },
            {
              "width": "25%",
              "targets": 0
            }
          ]

        });

      $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

      new $.fn.dataTable.Buttons(myTable, {
        buttons: [
          {
            "extend": "excel",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
            "className": "btn btn-white btn-primary btn-bold"
          },
          {
            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
            "className": "btn btn-white btn-primary btn-bold"
          }
        ]
      });
      myTable.buttons().container().appendTo($('.tableTools-container'));
      var defaultPDFAction = myTable.button(1).action();
      myTable.button(1).action(function () {
        pdf();
      });

      function pdf() {

        var now = new Date();
        var months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
          'September', 'October', 'November', 'December');
        var date = ((now.getDate() < 10) ? "0" : "") + now.getDate();

        function fourdigits(number) {
          return (number < 1000) ? number + 1900 : number;
        }
        var today = months[now.getMonth()] + " " + date + ", " + (fourdigits(now.getYear()));

        var startDate = $("#startDate").val()
        var endDate = $("#endDate").val()

        var arr = $('#salesTable').tableToJSON({});
        var dataArray = [];

        $.each(arr, function (index, value) {
          dataArray.push([value["batchid"], value["productname"], value["cusname"], value["itemcost"], value[
            "itemmrp"]]);
        });
        var body = dataArray;

        var head = [
          ["GRN ID", "GRN Date", "Supplier Name", "Purchase ID"]
        ];


        const doc = new jsPDF('p', 'pt', 'a4', {
          filters: ['ASCIIHexEncode']
        });

        doc.autoTable({
            head: head,
            body: body,
            margin: {
              top: 130
            },
            lineWidth: 0.1,
            didDrawPage: function (data) {
              doc.setFont('times')
              doc.setFontSize(26);
              doc.text(50, 40, "S.A.P. Distributors");
              doc.setFontSize(14);
              doc.text(50, 55, "Muthugala Road, Bihalpola, Nakkawaththa.");
              doc.setFontSize(20);
              doc.text(250, 85, "GRN Report");
              doc.setFontSize(13);
              doc.text(50, 105, startDate + " To " + endDate);
              doc.setFont('times');
              doc.setFontSize(13);
              doc.text(420, 105, "Date : " + today);
              doc.setFontSize(12);
              doc.setLineWidth(1.5);
              doc.line(20, 120, 585, 120);
            }
          },

        );

        var string = doc.output('datauristring');
        var embed = "<embed width='100%' height='100%' src='" + string + "'/>"
        var x = window.open();
        x.document.open();
        x.document.write(embed);
        x.document.close();

      }

    }

    function buildTbl() {
      var startDate = $('#startDate').val();
      var endDate = $('#endDate').val();
      $.post("../controllers/controller_reports.php?type=viewGrnDate", {
          startDate: startDate,
          endDate: endDate
        },
        function (data, status) {
          if (status == "success") {
            $("#salesTable").DataTable().destroy();
            $("#salesBody").empty();
            $("#salesBody").append(data);
            myDatatable();

          }
        });
    }

    buildTbl();
    $('#startDate').change(function () {

      var startDate = $('#startDate').val();
      var endDate = $('#endDate').val();

      if (startDate != '' || endDate != '') {
        buildTbl();
      }

    });

    $('#endDate').change(function () {

      var startDate = $('#startDate').val();
      var endDate = $('#endDate').val();

      if (startDate != '' || endDate != '') {
        buildTbl();
      }

    });

  });
</script>




<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>