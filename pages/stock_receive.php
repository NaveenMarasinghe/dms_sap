<?php require_once("../incl/header.php"); ?>
<link href="../assets/css/select2.min.css" rel="stylesheet" />
<script src="../assets/js/select2.min.js"></script>



<?php require_once("../incl/sidebar.php"); ?>
<?php require_once("../incl/pagetop.php"); ?>

<div class="page-content">


    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="form-actions">
                <div>
                    <h4 class="page-header"><b>Receive Stock</b></h4>
                </div>
                <div class="box box-info">
                    <input type="hidden" class="form-control date-picker" id="grndate" name="grndate" type="text" data-date-format="dd-mm-yyyy" />
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form id="issueStock" method="post" enctype="multipart/form-data">


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="proid">Route Schedule</label>
                                        <select name="selectRouteSche" id="selectRouteSche" class="form-control selcet-filter">
                                            <option value="0">--Select Route Schedule--</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="routeSalesman">Salesman</label>
                                        <textarea id="routeSalesman" class="form-control" readonly style=" overflow: hidden; resize: none; background: transparent;"></textarea>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="routeVehicle">Vehicle</label>
                                        <div class="form-group">
                                            <textarea id="routeVehicle" class="form-control" readonly style=" overflow: hidden; resize: none; background: transparent;"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>




                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <!--                     <h3 class="header smaller lighter blue">jQuery dataTables</h3> -->

                                                <div class="clearfix">
                                                    <div class="pull-right tableTools-container"></div>
                                                </div>


                                                <!-- div.table-responsive -->

                                                <!-- div.dataTables_borderWrap -->
                                                <div>
                                                    <table id="routeStockTable" class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <!--                             <th class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </th> -->
                                                                <th>Check</th>
                                                                <th>Product ID</th>
                                                                <th>Product Name</th>
                                                                <th>Batch ID</th>
                                                                <th>Quantity</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody id="routeStockTable">

                                                            <!-- <tr class="selected"> -->
                                                            <!--                             <td class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </td> -->

                                                            <!--                             <td>GG</td>
                            <td>GoodGame</td>
                            <td class="hidden-480">30</td>

                            <td>
                              <div class="hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="#">
                                  <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                </a>

                                <a class="green" href="#">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="#">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>

                            </td>
                          </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="grid-pager"></div>
                                    </div>
                                </div>
                            </div>

                            <!--                     <table id="product_table" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>                  
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody id="ttt">
                          <tr>
                            <td>Test1</td>
                            <td>Test1</td>
                            <td>Test1</td>
                          </tr>
                        </tbody>
                      </table> -->
                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <div class="pull-right">
                                        <button class="btn btn-grey" type="reset">
                                            <i class="ace-icon fa fa-undo bigger-110"></i>
                                            Reset
                                        </button>

                                        &nbsp; &nbsp; &nbsp;
                                        <button class="btn btn-info" type="button" id="issueProduct">
                                            <i class="ace-icon fa fa-check bigger-110"></i>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!--             <div class="col-md-offset-10 col-md-2">
              <div class="pull-right">
              <button type="button" class="btn btn-success" id="pobtnSave">Create</button>
              <button type="button" class="btn btn-primary" id="pobtncancel" onclick="$('#frmStudntEdit')[0].reset();">Cancel</button>
            </div>
            </div> -->
                    </div>
                </div>
            </div>

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->

<script type="text/javascript">
    jQuery(function($) {
        $.noConflict();
        var routeStockTable = $('#routeStockTable').DataTable({
            bAutoWidth: false,
            aoColumns: [null, null, null, null, null],
            aaSorting: [],
            // select: {
            //   style: 'multi'
            // }
        });

        $(document).ready(function() {
            $.noConflict();

            function print_today() {
                var now = new Date();
                var months = new Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
                var date = ((now.getDate() < 10) ? "0" : "") + now.getDate();

                function fourdigits(number) {
                    return (number < 1000) ? number + 1900 : number;
                }
                var today = (fourdigits(now.getYear())) + "-" + months[now.getMonth()] + "-" + date;
                return today;
            }

            var stockDate = print_today();
            //alert(stockDate);
            $.post("../controllers/controller_stock.php?type=stockRouteSche", {
                    stockDate: stockDate
                },
                function(data, status) {
                    if (status == "success") {
                        //alert(data); 
                        $("#selectRouteSche").empty();
                        $("#selectRouteSche").append("<option value=''>--Select Route Schedule--</option>");
                        $("#selectRouteSche").append(data);

                    }
                });
        });



        $('#selectRouteSche').change(function() {
            $.noConflict();
            var selectRouteSche = $("#selectRouteSche").val();
            $.post("../controllers/controller_stock.php?type=RouteStockSalesman", {
                    selectRouteSche: selectRouteSche
                },
                function(data, status) {
                    if (status == "success") {
                        //alert(data);
                        var testdata = JSON.parse(data);
                        //console.log(data);
                        $("#routeSalesman").val(testdata.emp_fname + ' ' + testdata.emp_lname);
                        $("#routeVehicle").val(testdata.vehicle);
                        // $("#eq_name").val(testdata[0].name);
                        var routeVehicle = $("#routeVehicle").val();
                        $.post("../controllers/controller_stock.php?type=receiveRouteStock", {
                                routeVehicle: routeVehicle
                            },
                            function(data, status) {
                                if (status == "success") {
                                    //alert(data);
                                    $("#routeStockTable").DataTable().destroy();
                                    $("#routeStockTable tbody").empty();
                                    $("#routeStockTable tbody").append(data);
                                    $("#routeStockTable").DataTable();
                                }
                            });
                    }
                });






        });

    })

    $.noConflict();
    jQuery(function($) {

        $(document).ready(function() {

            var active_class = 'active';
            $('#routeStockTable > thead > tr > th input[type=checkbox]').eq(0).on('click', function() {
                var th_checked = this.checked; //checkbox inside "TH" table header

                $(this).closest('table').find('tbody > tr').each(function() {
                    var row = this;
                    if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                    else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                });
            });
            $('#routeStockTable').on('click', 'td input[type=checkbox]', function() {
                var $row = $(this).closest('tr');
                if ($row.is('.detail-row ')) return;
                if (this.checked) $row.addClass(active_class);
                else $row.removeClass(active_class);
            });


            // $('.date-picker').datepicker('setDate', 'today');
            $('.date-picker').datepicker({
                autoclose: true,
                minDate: 0,
                maxDate: 0,
                todayHighlight: true,
                dateFormat: 'yy-mm-dd'
            });
            $('.date-picker').datepicker('setDate', new Date());


            $(".fa-trash-o").click(function() {
                myTable.row(".selected").remove().draw(false);
                alert('sda');
                // myTable.row('.selected').remove().draw( false );
            });

            $('#purchaseTable tbody').on('click', '.fa-pencil', function() {
                var btn = this;
                // alert("gg");
                var $row = $(this).closest("tr"); // Find the row
                var proname = $row.find("td:nth-child(2)").text();


                const {
                    value: newQty
                } = Swal.fire({
                    title: proname,
                    input: 'text',
                    inputPlaceholder: 'Change quantity',
                    inputAttributes: {
                        maxlength: 10,
                        autocapitalize: 'off',
                        autocorrect: 'off'
                    }
                }).then((newQty) => {
                    var noval = "''";
                    var newQty2 = newQty['value'];
                    if (newQty2) {
                        $row.find("td:nth-child(3)").empty();
                        $row.find("td:nth-child(3)").append(newQty2);
                        Swal.fire(`Quantity changed to: ${newQty2}`);

                        // alert(newQty2);

                    }
                });
                // myTable.row('.selected').remove().draw( false );
            });
            // // Automatically add a first row of data
            // $('#addRow').click();
        });
    });


    jQuery(function($) {


        $(document).ready(function() {
            $.noConflict();
            $('.select2gg').select2({
                placeholder: "--Select a Product--",
                allowClear: true
            });


        });


    });


    jQuery(function($) {

        $("#issueProduct").click(function() {

            // if ($("#issueStock").valid()) {
            var rtsche = $("#selectRouteSche").val()

            function storeTblValues() {
                var TableData = new Array();
                var routeVehicle = $("#routeVehicle").val()
                $('#routeStockTable tr').each(function(row, tr) {
                    if ($(tr).hasClass('active')) {
                        TableData[row] = {
                            "batch": $(tr).find('td:eq(3)').text(),
                            "qty": $(tr).find('td:eq(4)').text(),
                            "routeVehicle": routeVehicle
                        }
                    }
                });

                return TableData;
            }

            TableData = storeTblValues()
            TableData = JSON.stringify(TableData);
            alert(TableData);
            $.ajax({
                type: "POST",
                url: "../controllers/controller_stock.php?type=receiveStock",
                data: "pTableData=" + TableData,
                success: function(msg) {
                    // alert(msg);
                    // $('#issueStock')[0].reset();
                    location.reload(true);

                }
            });



        });
    });
</script>


<script src="../assets/js/chosen.jquery.min.js"></script>
<script src="../assets/js/jquery.validate.min.js"></script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>