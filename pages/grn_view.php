<?php require_once("../incl/header.php"); ?>
<?php require_once("../incl/sidebar.php"); ?>
<?php require_once("../incl/pagetop.php"); ?>

<div class="page-content">


  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <div class="form-actions">
      <div class="box-header with-border">
        <h3 class="box-title">View Goods Received Note</h3>
      </div>
      <div class="clearfix">
        <div class="pull-right tableTools-container"></div>
      </div>
      <table id="stockTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>GRN ID</th>
            <th>Purchase Order</th>
            <th>Supplier Name</th>
            <th>Date</th>            
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="viewStockBody">
          <tr>
            <td>Batch ID</td>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>34</td>
            <td>Selling Price</td>
            <!-- <td>56</td>
                  <td>Actions</td> -->
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
  jQuery(function($) {
    function myDatatable() {}
  });


  $(document).ready(function() {
    // jQuery(function($) {
    // var myTable = $("#stockTable").DataTable({});
    $.noConflict();
    $.ajax({
      url: "../controllers/controller_grn.php?type=viewGrn",
      method: "POST",
      processData: false,
      contentType: false,
    }).done(function(data) {
      //alert(data);
      $("#stockTable").DataTable().destroy();
      $("#stockTable tbody").empty();
      // if ( $.fn.DataTable.isDataTable('#stockTable') ) {
      //       $('#stockTable').DataTable().destroy();
      //   }

      $("#stockTable tbody").append(data);
      //initiate dataTables plugin
      var myTable =
        $('#stockTable')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable({
            "order": [[ 0, "desc" ]],
          bAutoWidth: true,
          "aoColumns": [

            null, null, null, null, null,

          ],
          "aaSorting": [],
          "columnDefs": [{
              "width": "10%",
              "targets": 4
            },
            {
              "width": "20%",
              "targets": 3
            },
            {
              "width": "20%",
              "targets": 2
            },
            {
              "width": "30%",
              "targets": 1
            },
            {
              "width": "20%",
              "targets": 0
            }
          ]


          // select: {
          //     style: 'single'
          // }
        });


      $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

      new $.fn.dataTable.Buttons(myTable, {
        buttons: [{
            "extend": "colvis",
            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
            "className": "btn btn-white btn-primary btn-bold",
            columns: ':not(:first):not(:last)'
          },
          {
            "extend": "copy",
            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
            "className": "btn btn-white btn-primary btn-bold"
          },
          {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
            "className": "btn btn-white btn-primary btn-bold"
          },
          {
            "extend": "excel",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
            "className": "btn btn-white btn-primary btn-bold"
          },
          {
            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
            "className": "btn btn-white btn-primary btn-bold",
            customize: function(doc) {
              doc.content[1].table.widths = ['10%', '30%', '20%', '20%', '20%'];
              doc.styles.tableHeader.alignment = 'center';
            }
          },
          {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: true,
            message: 'This print was produced using the Print button for DataTables'
          }
        ]
      });
      myTable.buttons().container().appendTo($('.tableTools-container'));

      //style the message box
      var defaultCopyAction = myTable.button(1).action();
      myTable.button(1).action(function(e, dt, button, config) {
        defaultCopyAction(e, dt, button, config);
        $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
      });


      var defaultColvisAction = myTable.button(0).action();
      myTable.button(0).action(function(e, dt, button, config) {

        defaultColvisAction(e, dt, button, config);


        if ($('.dt-button-collection > .dropdown-menu').length == 0) {
          $('.dt-button-collection')
            .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
            .find('a').attr('href', '#').wrap("<li />")
        }
        $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
      });
      //   $("#stockTable").DataTable({
      // "order": [[ 0, "dsec" ]],
      // "columnDefs": [
      //     { "width": "20%", "targets": 4 },
      //     { "width": "20%", "targets": 3 },
      //     { "width": "20%", "targets": 2 },
      //     { "width": "20%", "targets": 1 },
      //     { "width": "20%", "targets": 0 }
      // ]
      // });  


    });

    // $("#btn_modelView").click(function() {
    //   alert( "Handler for .click() called." );
    // });
  });
  // });
</script>




<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>