<?php require_once("../incl/header.php"); ?>
<?php require_once("../incl/sidebar.php"); ?>
<?php require_once("../incl/pagetop.php"); ?>

<div class="page-content">


    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="form-actions">
                <div class="box-header with-border">
                    <h3 class="box-title">Stock Report</h3>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" id="filter_col1" data-column="2">
                            <label for="exampleInputEmail1">Supplier</label>


                            <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                                <option value="">--Select Supplier--</option>

                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Category</label>


                            <select name="selectProCat" id="selectProCat" class="form-control selcet-filter">
                                <option value="">--Select Product Category--</option>

                            </select>

                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="proid">Date Range</label>
                            <div class="input-group">
                                <div class="input-daterange input-group">
                                    <input type="text" class="input form-control date-picker" name="start" id="datestart" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-exchange"></i>
                                    </span>

                                    <input type="text" class="input form-control date-picker" name="end" id="enddate" />
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-2">

                        <div class="form-group">
                            <label for="exampleInputEmail1">&nbsp;</label>

                            <button type='button' class='btn btn-primary btn-block' id='generateReport' style="float: right;">Generate</button>
                        </div>

                    </div>

                </div>
                <div class="clearfix">
                    <div class="pull-right tableTools-container"></div>
                </div>
                <table id="stockTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th data-override="batchid" >Batch ID</th>
                            <th data-override="productname">Product Name</th>
                            <th>Quantity</th>
                            <th data-override="itemcost">Item Cost</th>
                            <th data-override="itemmrp">Item MRP</th>
                        </tr>
                    </thead>
                    <tbody id="viewStockBody">

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
        function myDatatable(data) {

            var varmydata = "Stock Report</br>Supplier";

            $("#stockTable").DataTable().destroy();
            $("#stockTable tbody").empty();
            $("#stockTable tbody").append(data);
            //initiate dataTables plugin
            var myTable =
                $('#stockTable')

                .DataTable({
                    bAutoWidth: true,
                    "aoColumns": [

                        null, null, null, null, null,

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
                            "width": "20%",
                            "targets": 1
                        },
                        {
                            "width": "20%",
                            "targets": 0
                        }
                    ]

                });


            $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

            new $.fn.dataTable.Buttons(myTable, {
                buttons: [{
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
                        "extend": "pdfHtml5",
                        "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                        // text: 'Save current page',
                        "className": "btn btn-white btn-primary btn-bold",
                        // "title": "" + varmydata,
                        // "content": [
                        // 'First paragraph',
                        // 'Another paragraph, this time a little bit longer to make sure, this line will be divided into at least two lines'
                        // ],


                        // customize: function(doc) {
                        //     doc.content[1].table.widths = ['20%', '30%', '10%', '20%', '20%'];
                        //     doc.styles.tableHeader.alignment = 'center';

                        // },

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
            var defaultPDFAction = myTable.button(2).action();
            myTable.button(2).action(function(e, dt, button, config) {
                pdf();
            });

            function pdf() {

                var supid = $("#selectSupplier").val()
                var supname = $("#selectSupplier option:selected").text()
                if (supid = 0){
                    var tblsup = "All Suppliers";
                } else {
                    var tblsup = supname;
                }
                var procatid = $("#selectProCat").val()
                var procatname = $("#selectProCat option:selected").text()
                if (procatid = 0){
                    var tblpro = "";
                } else {
                    var tblpro = "Product Category : " + procatname;
                }
                
                var arr = $('#stockTable').tableToJSON({
                });
                var dataArray = [];
                // var body = dataArray;
        
                // var arr = $.parseJSON(tbldt);
               
                // alert(arr);
                $.each(arr, function (index, value) {
                    dataArray.push([value["batchid"], value["productname"],value["Quantity"],value["itemcost"],value["itemmrp"] ]);
                });
                var body = dataArray;
                
                var head = [
                    ["Batch ID", "Product Name", "Quantity", "Item Cost", "Item MRP"]
                ];

                // ];


                const doc = new jsPDF('p', 'pt', 'a4', {
                    filters: ['ASCIIHexEncode']
                });
                
                // Simple data example

                // doc.addImage(imgData, 'JPEG',15, 10, 80, 80);
                //             // doc.setFontSize(30);
                //             // doc.text(100, 55, "CP/WIL/ Maraka Secondary School");
                //             // doc.setLineWidth(1.5);
                //             // doc.line(20, 105, 585, 105);
                // doc.addImage(imgData, 'JPEG',255, 10, 80, 80);
                doc.setFont('times')
                doc.setFontSize(26);
                doc.text(200, 50, "S.A.P. Distributors");
                // doc.addFileToVFS('../fonts/fm_abhay.ttf', Malithy);
                // doc.addFont('../fonts/fm_abhay.ttf', 'malithi', 'normal');
                // doc.setFont('malithi'); // set font
                doc.setFontSize(20);
                doc.text(245, 80, "Stock Report");
                doc.setFontSize(15);
                doc.text(20, 105, "Supplier : " + tblsup);
                // doc.setFontSize(12);
                // doc.text(67, 125, "ÿrl;k wxlh ");
                doc.setFont('times');
                doc.setFontSize(15);
                doc.text(370, 105, tblpro);
                // doc.setFontSize(12);
                // doc.text(67, 140, "Telephone ");
                // doc.setFontSize(30);
                // doc.text(135, 140, " }");
                // doc.setFont('malithi');
                // doc.setFontSize(12);
                // doc.text(407, 125, "Èkh ");
                // doc.setFont('times');
                // doc.setFontSize(12);
                // doc.text(407, 140, "Date ");
                // doc.setFontSize(12);
                // doc.text(467, 130, "2019.11.25 ");
                // doc.setFontSize(30);
                // doc.text(440, 140, " }");
                doc.setFontSize(12);
                // doc.text(40, 185, "Year : 2019");
                // doc.setFontSize(12);
                // doc.text(120, 185, "Term : 2nd Term ");
                // doc.setFontSize(12);
                // doc.text(220, 185, "Grade : GRADE_09 ");
                // doc.setFontSize(12);
                // doc.text(360, 185, "Class : C ");
                // doc.setFontSize(12);
                // doc.text(380, 185, "Class :  A");
                doc.setLineWidth(1.5);
                doc.line(20, 120, 585, 120);

                // doc.setFontSize(20);
                // doc.setFontType("normal");
                // doc.text(235, 225, 'Progress Report');

                // doc.setLineWidth(1);
                // doc.line(230, 230, 370, 230);

                // doc.setFontSize(12);
                // doc.setFontType("normal");
                // doc.text(160, 243, "04121/00021 ");
                // doc.setFontSize(12);
                // doc.setFontType("normal");
                // doc.text(340, 243, " A.W.D.Kumarasiri");
                // doc.rect(45, 225, 250, 25);
                // doc.rect(295, 225, 250, 25);

                // doc.setFontSize(12);
                // doc.setFontType("bold");
                // doc.text(180, 268, "Year :");
                // doc.setFontSize(12);
                // doc.setFontType("normal");
                // doc.text(360, 268, " 2019");
                // doc.rect(45, 250, 250, 25);
                // doc.rect(295, 250, 250, 25);

                // doc.setFontSize(12);
                // doc.setFontType("bold");
                // doc.text(180, 293, "Term :");
                // doc.setFontSize(12);
                // doc.setFontType("normal");
                // doc.text(360, 293, " 2nd");
                // doc.rect(45, 275, 250, 25);
                // doc.rect(295, 275, 250, 25);

                // doc.setFontSize(12);
                // doc.setFontType("bold");
                // doc.text(180, 318, "Grade :");
                // doc.setFontSize(12);
                // doc.setFontType("normal");
                // doc.text(360, 318, " GRADE_09");
                // doc.rect(45, 300, 250, 25);
                // doc.rect(295, 300, 250, 25);

                // doc.setFontSize(12);
                // doc.setFontType("bold");
                // doc.text(180, 343, "Class :");
                // doc.setFontSize(12);
                // doc.setFontType("normal");
                // doc.text(360, 343, " C");
                // doc.rect(45, 325, 250, 25);
                // doc.rect(295, 325, 250, 25);

                doc.autoTable({
                        head: head,
                        body: body,
                        margin: {
                            top: 130
                        },
                        lineWidth: 0.1
                    },

                );



                var string = doc.output('datauristring');
                var embed = "<embed width='100%' height='100%' src='" + string + "'/>"
                var x = window.open();
                x.document.open();
                x.document.write(embed);
                x.document.close();


                // }
                // });



            }
        };

        $(document).ready(function() {

            // $("#titletext").html("gg");
            document.title = "Stock Report";

            //load supplier select options
            $.post("../controllers/controller_products.php?type=selectSupplierLoad",
                function(data, status) {
                    if (status == "success") {
                        //alert(data); 
                        $("#selectSupplier").empty();
                        $("#selectSupplier").append("<option value=''>--Select Supplier--</option>");
                        $("#selectSupplier").append(data);

                    }
                });
            //load product category for supplier change event
            $('#selectSupplier').change(function() {
                var salesSupplier = $('#selectSupplier').val(); // get option's value

                //change product category select box
                $.post("../controllers/controller_sales.php?type=get_ProCat", {
                        salesSupplier: salesSupplier
                    },
                    function(data, status) {
                        if (status == "success") {
                            //alert(data);
                            $("#selectProCat").empty();
                            $("#selectProCat").append("<option value=''>--Select Product Category--</option>");
                            $("#selectProCat").append(data);

                        }
                    });
            });
            //load datatable for generate button click
            $('#generateReport').click(function() {

                var supplierval = $('#selectSupplier').val(); // get option's value
                var procatval = $('#selectProCat').val();

                $.post("../controllers/controller_reports.php?type=getFilteredData", {
                        supplierval: supplierval,
                        procatval: procatval
                    },
                    function(data, status) {
                        if (status == "success") {
                            myDatatable(data)
                        }
                    });


            });


            $.ajax({
                url: "../controllers/controller_products.php?type=viewStock",
                method: "POST",
                processData: false,
                contentType: false,
            }).done(function(data) {


                myDatatable(data)

            });

        });
    });
</script>




<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>