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
                    Route Schedule Report - Supplier
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" id="filter_col1" data-column="2">
                            <label for="selectSup">Supplier</label>

                            <select name="selectSup" id="selectSup" class="form-control selcet-filter">
                                <option value="">--Select Supplier--</option>

                            </select>

                        </div>
                    </div>

                    <div class="clearfix col-md-9">
                        <div class="pull-right tableTools-container"></div>
                    </div>
                </div>
                <table id="purTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th data-override="batchid">Route Schedule ID</th>
                            <th data-override="productname">Route Name</th>
                            <th data-override="cusname">Schedule Date</th>
                            <th data-override="itemcost">Salesman</th>
                            <th data-override="itemmrp">Vehicle</th>
                        </tr>
                    </thead>
                    <tbody id="purBody">
                        <tr>
                            <td>No Record</td>
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
    $(document).ready(function () {
        document.title = "Route Schedule Report - Supplier";

        $.noConflict();

        function myDatatable() {
            var myTable =
                $('#purTable')
                .DataTable({
                    bAutoWidth: true,
                    "aoColumns": [

                        null, null, null, null, null,

                    ],
                    "lengthMenu": [
                        [20, 50, -1],
                        [20, 50, "All"]
                    ],
                    "aaSorting": [],
                    "columnDefs": [{
                            "width": "20%",
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
                            "width": "25%",
                            "targets": 1
                        },
                        {
                            "width": "15%",
                            "targets": 0
                        }
                    ]

                });

            $.fn.dataTable.Buttons.defaults.dom.container.className =
                'dt-buttons btn-overlap btn-group btn-overlap';

            new $.fn.dataTable.Buttons(myTable, {
                buttons: [{
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

                var supid = $("#selectSupplier").val()
                var supname = $("#selectSup option:selected").text()
                var arr = $('#purTable').tableToJSON({});
                var dataArray = [];

                $.each(arr, function (index, value) {
                    dataArray.push([value["batchid"], value["productname"], value["cusname"], value[
                        "itemcost"], value[
                        "itemmrp"]]);
                });
                var body = dataArray;

                var head = [
                    ["Schedule ID", "Route Name", "Schedule Date", "Salesman", "Vehicle Num"]
                ];

                // ];


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
                            doc.text(210, 80, "Route Schedule Report");
                            doc.setFontSize(11);
                            doc.text(50, 105, "Supplier : " + supname);
                            doc.setFont('times');
                            doc.setFontSize(11);
                            doc.text(440, 105, "Date : " + today);
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

        $.post("../controllers/controller_reports.php?type=getSuppliers",
            function (data, status) {
                if (status == "success") {
                    $("#selectSup").empty();
                    $("#selectSup").append("<option value=''>All Suppliers</option>");
                    $("#selectSup").append(data);

                }
            });

        var supId = $('#selectSup').val();
        $.post("../controllers/controller_reports.php?type=viewRtscheSup", {
            supId: supId
            },
            function (data, status) {
                if (status == "success") {
                    $("#purTable").DataTable().destroy();
                    $("#purBody").empty();
                    $("#purBody").append(data);
                    myDatatable();

                }
            });


        $('#selectSup').change(function () {

            var supId = $('#selectSup').val();
            $.post("../controllers/controller_reports.php?type=viewRtscheSup", {
                supId: supId
                },
                function (data, status) {
                    if (status == "success") {

                        $("#purTable").DataTable().destroy();
                        $("#purBody").empty();
                        $("#purBody").append(data);
                        myDatatable();
                    }
                });

        });

    });
</script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>