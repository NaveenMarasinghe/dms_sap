<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="5") || ($_SESSION["user"]["utype"]=="4") ){
      header("location:../index.php");
    } 
?>

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
                    <!-- <h4 class="page-header"><b>Create Sales</b></h4> -->
                </div>
                <div class="box box-info">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form id="salesForm" method="post">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <h4 class="page-header"><b>Sales Return</b></h4>
                                            <input type="hidden" class="form-control" id="empId" name="empId" value='<?php echo $_SESSION["user"]["emp_id"] ?>'>
                                            <input type="hidden" class="form-control" id="salesSupplier" name="salesSupplier" value='0'>
                                        </div>
                                        <div class="col-xs-8">
                                            <div class="col-xs-12" id='salesChangeCusDiv'>
                                                <div class="form-group">
                                                    <button type='button' class='btn btn-primary' id='salesChangeCus' style="float: right;">Change Customer</button>
                                                </div>
                                            </div>
                                            <div class="col-xs-12" id='salesSelectPrdDiv'>
                                                <div class="form-group">
                                                    <button type='button' class='btn btn-primary' id='salesSelectPrd' style="float: right;">Add Products</button>
                                                </div>
                                            </div>
                                            <div class="col-xs-12" id='createSalesDiv'>
                                                <div class="form-group">
                                                    <button type='button' class='btn btn-primary' id='createSales' style="float: right;">Add Products</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="selectCustomer">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="salesid">Sales ID</label>
                                                    <input readonly type="text" class="form-control" id="salesid" name="salesid">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="salesDate">Date</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar bigger-110"></i>
                                                        </span>
                                                        <input class="form-control date-picker" id="salesDate" name="salesDate" readonly type="text" data-date-format="dd-mm-yyyy" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">


                                            <div class="col-md-6 form-group">
                                                <div class="form-group">
                                                    <label for="">Route</label>
                                                    <input readonly type="text" class="form-control" id="salesRoute" name="salesRoute" value=''>
                                                </div>

                                            </div>

                                            <div class="col-md-6 form-group">
                                                <div class="form-group">
                                                    <label for="salesSupplierName">Supplier</label>
                                                    <input readonly type="text" class="form-control" id="salesSupplierName" name="salesSupplierName" value=''>
                                                </div>

                                            </div>




                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <div>
                                                    <label for="rtsche" style="display:block;">Route Schedule</label>
                                                    <select class="form-control selcet-filter select2gg" id="rtsche" name="rtsche" style="width:100%;">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <div>
                                                    <label for="salesCustomer" style="display:block;">Customer</label>
                                                    <select class="form-control selcet-filter select2gg" id="salesCustomer" name="salesCustomer" style="width:100%;">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="selectProducts">
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <div>
                                                    <label for="salesProductCat" style="display:block;">Product Category</label>
                                                    <select class="form-control selcet-filter select2gg" id="salesProductCat" name="salesProductCat" style="width:100%;">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <div>
                                                    <label for="salesProductName" style="display:block;">Product Name</label>
                                                    <select class="form-control selcet-filter select2gg" id="salesProductName" name="salesProductName" style="width:100%;">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <div>
                                                    <div class="form-group">
                                                        <label for="itemPrice">Enter Item MRP</label>
                                                        <input type="text" class="form-control" name="itemPrice" id="itemPrice">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-3 form-group">
                                                <div>
                                                    <label for="returnSoldQty" style="display:block;">Sold Qty</label>
                                                    <input type="text" readonly class="form-control" name="returnSoldQty" id="returnSoldQty">
                                                    <!-- <select class="form-control selcet-filter select2gg" id="salesBatch" name="salesBatch" style="width:100%;">
                                                        <option></option>
                                                    </select> -->
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <div>
                                                    <label for="salesBatch" style="display:block;">Product Batch</label>
                                                    <input type="text" readonly class="form-control" name="salesBatch" id="salesBatch">
                                                    <!-- <select class="form-control selcet-filter select2gg" id="salesBatch" name="salesBatch" style="width:100%;">
                                                        <option></option>
                                                    </select> -->
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <div>
                                                    <label for="returnVal">Item Value</label>
                                                    <input type="text" readonly class="form-control" name="returnVal" id="returnVal">

                                                </div>
                                            </div>

                                            <div class="col-md-3 form-group">
                                                <div>
                                                    <label for="qty">Enter Return Qty</label>
                                                    <input type="text" class="form-control" name="qty" id="qty">

                                                </div>
                                            </div>


                                            <div class="col-md-3 form-group">
                                                <div>
                                                    <label for="grossTotal">Gross Total</label>
                                                    <input type="text" readonly class="form-control" name="grossTotal" id="grossTotal">

                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <div class="col-xs-2">
                                                    <div class="form-group">
                                                        <label for="salesProductAdd">&nbsp;</label>
                                                        <button type='button' class='btn btn-primary' id='salesProductAdd'>Add Items</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">


                                    </div>

                                </form>
                            </div>
                            <div class="col-md-6">
                                <h4 class="page-header"><b>Products Table</b></h4>

                                <div class="row">
                                    <div class="col-xs-12">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <!--                     <h3 class="header smaller lighter blue">jQuery dataTables</h3> -->




                                                    <!-- div.table-responsive -->

                                                    <!-- div.dataTables_borderWrap -->
                                                    <div>
                                                        <table id="salesTable" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>

                                                                    <th style="width:10%"></th>
                                                                    <th style="width:20%">Batch ID</th>
                                                                    <th style="width:30%">Product Name</th>
                                                                    <th style="width:10%">Item Price</th>
                                                                    <th style="width:10%">Quantity</th>

                                                                    <th style="width:20%">Total</th>

                                                                </tr>
                                                            </thead>

                                                            <tbody id="salesTableBody">

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>

                                                                    <td colspan="3" class="blank"> </td>
                                                                    <td colspan="2">Return Total</td>
                                                                    <td class="subTotal" id="subTotal" style='text-align:right'>
                                                                        0.00
                                                                    </td>
                                                                </tr>

                                                                <tr>

                                                                    <td colspan="3" class="blank"> </td>
                                                                    <td colspan="2">Previous Balance</td>
                                                                    <td class="preBalance" id="preBalance" style='text-align:right'>
                                                                        0.00
                                                                    </td>
                                                                </tr>
                                                                <tr>

                                                                    <td colspan="3" class="blank"> </td>
                                                                    <td colspan="2">Balance due</td>
                                                                    <td class="balanceVal" id="balanceVal" style='text-align:right'>
                                                                        0.00
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div id="grid-pager"></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div id="btnSet">
                                    <div class="col-md-4">



                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-success btn-block btn-flat" id="salesSubmit">Submit</button>
                                    </div>
                                </div>
                                <!-- <div class="clearfix form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <div class="pull-right">


                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn btn-info" type="button" id="salessave">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        </form>

                    </div>
                </div>
            </div>

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->

<script type="text/javascript">
    jQuery(function($) {
        function toFixedFunction(numb) {
            // var num = 5.56789;
            var n = numb.toFixed(2);
            return n;
        }
    });

    function storeTblValues(test) {
        var TableData = new Array();

        $('#salesTableBody tr').each(function(row, tr) {
            TableData[row] = {
                "batch_id": $(tr).find('td:eq(1)').text(),
                "item_name": $(tr).find('td:eq(2)').text(),
                "item_price": $(tr).find('td:eq(3)').text(),
                "item_qty": $(tr).find('td:eq(4)').text(),
                "item_total": $(tr).find('td:eq(5)').text(),
                "rtscheid": $('#rtsche').val(),
                "salesId": test
            }
        });


        return TableData;
    }



    function calGrossTol() {
        var itemPrice = $("#returnVal").val();
        var qty = $("#qty").val();

        var grossTol = (itemPrice * qty);
        grossTol = grossTol.toFixed(2);
        $("#grossTotal").val(grossTol);

    }

    function updateSubTol() {

        // $("#salesTable tbody").on("change", '.discountVal', function() { 
        var $row = $(this).closest("tr");
        var subTotal = 0;

        $('#salesTableBody tr').each(function(row, tr) {
            var $row = $(this).closest("tr");
            // var rows = $("#invoice-table tbody").children('tr');
            var rowTotalVal = parseFloat($row.find("td:nth-child(6)").text());
            rowTotalVal = rowTotalVal;
            subTotal = subTotal + rowTotalVal;
            // alert(subTotal);
            subTotal = parseFloat(subTotal);
        });
        $("#subTotal").text(subTotal.toFixed(2));

        // });
    }

    function updateAmountDue() {
        // alert("gg");
        // var balance = 0;
        var selectCustomer = $("#salesCustomer").val();

        $.post("../controllers/controller_sales.php?type=getSalesBalance", {
                selectCustomer: selectCustomer
            },
            function(data, status) {
                if (status == "success") {

                    var prebalance = parseFloat(data);
                    $("#preBalance").text(prebalance.toFixed(2));

                    var subTotal = parseFloat($(".subTotal").text());
                    subTotal = subTotal.toFixed(2);
                    balance = prebalance - subTotal;
                    balance = parseFloat(balance);
                    balance = balance.toFixed(2);
                    $(".balanceVal").text(balance);


                }
            });
        // var prebalance = parseFloat($("#preBalance").text());


    }

    function updateTableRow() {
        $.post("../controllers/controller_sales.php?type=updateTableRow", {
                salesid: salesid,
                listNo: listNo,
                qty: qty,
                dis: dis,
                grossTotal: grossTotal
            },
            function(data, status) {
                if (status == "success") {
       

                }
            });
    }
jQuery(function($) {
    $(document).ready(function() {

        // $('#salesChangeCusDiv').hide();
        $('#selectProducts').hide();
        $('#salesChangeCusDiv').hide();
        $('#salesSelectPrdDiv').hide();
        $('#btnSet').hide();
        $("#salesid").val("");

                    $('.date-picker').datepicker({
                autoclose: true,
                minDate: 0,
                maxDate: 0,
                todayHighlight: true,
                dateFormat: 'yy-mm-dd'
            });
            $('.date-picker').datepicker('setDate', new Date());

        var empId = $('#empId').val();
        var date = $('#salesDate').val();
        // alert(empId);

        $.noConflict();
        // load supplier select box
        $.post("../controllers/controller_sales.php?type=get_rtscheid",{
            empId:empId,
            date:date
        },
            function(data, status) {
                if (status == "success") {
                    // alert(data);
                    $("#rtsche").empty();
                    $("#rtsche").append("<option value=''>--Select Route--</option>");
                    $("#rtsche").append(data);

                }
            });

    });
});

    $('#createSales').click(function() {
        $('#selectCustomer').hide();
        $('#createSalesDiv').hide();
        $('#selectProducts').show();
        $('#btnSet').show();

        var salesSupplier = $('#salesSupplier').val(); // get option's value
        alert(salesSupplier);
        //change product category select box
        $.post("../controllers/controller_sales.php?type=get_ProCat", {
                salesSupplier: salesSupplier
            },
            function(data, status) {
                if (status == "success") {
                    //alert(data);
                    $("#salesProductCat").empty();
                    $("#salesProductCat").append("<option value=''>--Select Product Category--</option>");
                    $("#salesProductCat").append(data);
                    // $("#poSupplier").attr("disabled", "disabled");
                }
            });
    });


    $('#rtsche').change(function() {

        var rtsche = $('#rtsche').val(); // get option's value

        //change product category select box
        $.post("../controllers/controller_sales.php?type=get_customers", {
                rtsche: rtsche
            },
            function(data, status) {
                if (status == "success") {
                    // alert(data);
                    $("#salesCustomer").empty();
                    $("#salesCustomer").append("<option value=''>--Select Customer--</option>");
                    $("#salesCustomer").append(data);
                    // $("#poSupplier").attr("disabled", "disabled");
                }
            });
            $.post("../controllers/controller_sales.php?type=get_suppliers", {
                rtsche:rtsche
            },
            function(data, status) {
                if (status == "success") {
                    //alert(data); 
                    $("#salesSupplierName").val(data);

                }
            });
            $.post("../controllers/controller_sales.php?type=get_supplierId", {
                rtsche:rtsche
            },
            function(data, status) {
                if (status == "success") {
                    alert(data); 
                    $("#salesSupplier").val(data);

                }
            });
            $.post("../controllers/controller_sales.php?type=get_route", {
                rtsche: rtsche
            },
            function(data, status) {
                if (status == "success") {

                    $("#salesRoute").empty();
                    // $("#salesRoute").append("<option value=''>--Select Route--</option>");
                    $("#salesRoute").val(data);

                }
            });

    });

    $('#salesSupplier').change(function() {




    });

    $('#salesProductCat').change(function() {

        var supplierval = $('#salesSupplier').val();
        var procatval = $('#salesProductCat').val(); // get option's value

        // get filtered data to datatable
        $.post("../controllers/controller_purchase.php?type=get_productList", {
                procatval: procatval,
                supplierval: supplierval
            },
            function(data, status) {
                if (status == "success") {
                    // alert(data);
                    $("#salesProductName").empty();
                    $("#salesProductName").append("<option></option>");
                    $("#salesProductName").append(data);
                    //   $('.select2gg').select2({
                    //   placeholder: "Select a Product",
                    //   allowClear: true
                    // });
                }
            });


    });

    // $('#salesProductName').change(function() {

    //     var cusId = $('#salesCustomer').val();
    //     var proId = $('#salesProductName').val(); 
    //     // var procatval = $('#rtscheProCat').val();
    //     alert(proId);
    //     //change product name select box options
    //     $.post("../controllers/controller_sales.php?type=getMRP", {
    //         proId: proId,
    //         cusId: cusId
    //         },
    //         function(data, status) {
    //             if (status == "success") {
    //                 alert(data);

    //             }
    //         });

    // });

    $('#itemPrice').keyup(function() {


        var price = parseFloat($('#itemPrice').val());
        var proid = $('#salesProductName').val();
        var itemPrice = price.toFixed(2);


        $.post("../controllers/controller_return.php?type=getItemBatch", {
                proid: proid,
                itemPrice: itemPrice
            },
            function(data, status) {
                if (status == "success") {
                    $("#salesBatch").val(data);
                    var salesBatch = $('#salesBatch').val();
                    var returnCus = $('#salesCustomer').val();

                    $.post("../controllers/controller_return.php?type=getReturnVal", {
                            salesBatch: salesBatch
                        },
                        function(data, status) {
                            if (status == "success") {
                                var itcost = parseFloat(data);

                                $("#returnVal").val(itcost.toFixed(2));
                            }
                        });
                        $.post("../controllers/controller_return.php?type=getSoldQty", {
                            salesBatch: salesBatch,
                            returnCus: returnCus
                        },
                        function(data, status) {
                            if (status == "success") {
                                var soldQty = parseFloat(data);

                                $("#returnSoldQty").val(soldQty);
                            }
                        });
                }
            });


    });



    $('#qty').keyup(function() {

        calGrossTol();

    });

    $.noConflict();
    jQuery(function($) {


        $(document).ready(function() {

            document.title = "Sales Return";

            $(".amountPaid").val("0.00");
            $("#itemPrice").val("0.00");
            $("#grossTotal").val("0.00");
            $("#qty").val("0");
            $("#disVal").val("0%");
            $(".balanceVal").text("0.00");
            // $('.date-picker').datepicker('setDate', 'today');




            $('#salesProductAdd').on('click', function() {

                var returnQty= parseInt($('#qty').val());
			    var soldQty=parseInt($('#returnSoldQty').val());

                var soldQty=soldQty+1;

                if(returnQty<soldQty){
                    var batch = $("#salesBatch").val();
                var proname = $("#salesProductName option:selected").text();
                var qnty = $('#qty').val();
                var buttons = "<div class='hidden-sm hidden-xs btn-group'><button type='button' class='btn btn-xs btn-danger' style='margin: auto'><i class='ace-icon fa fa-minus-circle bigger-120'></i></button></div>"
                var item_cost = $('#returnVal').val();
                var subTotal = parseInt($("#grossTotal").val());
                var tablerow = "<tr class='item-row'><td>" + buttons + "</td><td>" + batch + "</td><td>" + proname + "</td><td>" + item_cost + "</td><td>" + qnty + "</td><td class='subTol' style='text-align:right'>" + subTotal.toFixed(2) + "</td></tr>";

                // var buttons = "<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div>"

                //<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div>
                // if(batch!=""){
                // alert(item_cost);
                // $("#salesTable").DataTable().destroy();
                $("#salesTable tbody").append(tablerow);
                // $("#salesTable").DataTable();
                updateSubTol()
                updateAmountDue();
                var salesId = $("#salesid").val();

                $("#salesProductName").empty();
                $("#itemPrice").val("0.00");
                $("#grossTotal").val("0.00");
                $("#qty").val("0");
                $("#disVal").val("0%");
                $("#salesBatch").empty();

                $('.select2gg').select2({
                    placeholder: "--Select a Product--",
                    allowClear: true
                });


                var supplierval = $('#salesSupplier').val();
                var procatval = $('#salesProductCat').val(); // get option's value

                // get filtered data to datatable
                $.post("../controllers/controller_purchase.php?type=get_productList", {
                        procatval: procatval,
                        supplierval: supplierval
                    },
                    function(data, status) {
                        if (status == "success") {
                            // alert(data);
                            $("#salesProductName").empty();
                            $("#salesProductName").append("<option></option>");
                            $("#salesProductName").append(data);
                            //   $('.select2gg').select2({
                            //   placeholder: "Select a Product",
                            //   allowClear: true
                            // });
                        }
                    });

                } else{
                    Swal.fire(
						'Please enter valid Return Qty!',
						"",
						'Warning'
					);

                }





            });
            var oldVal = "";

            $('#salesTable tbody').on('click', '.fa-minus-circle', function() {

                var btn = this;

                var $row = $(this).closest("tr"); // Find the row
                var proname = $row.find("td:nth-child(3)").text();
                var proqty = $row.find("td:nth-child(5)").text();
                // alert(proqty);
                // alert(proname);

                Swal.fire({
                    title: 'Remove following items?',
                    text: proname + " - " + proqty + " units",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Remove items'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Removed!',
                            proname + " - " + proqty + " units removed.",
                            'success'
                        );
                        $(this).closest('tr').remove();
                        updateSubTol();
                        updateAmountDue();
                    }
                })

            });

        });
    });
    jQuery(function($) {

        $("#salesSubmit").click(function() {

            // if($("#purchaseform").valid()) {
            d = new FormData($("#salesform")[0]);
    
            var subTol = $("#subTotal").text();
            var balanceVal = $("#balanceVal").text();
            var balanceValFloat = parseFloat(balanceVal);
            var cusid = $('#salesCustomer').val();
            var salesDate = $('#salesDate').val();
            


   

            d.append("cusid", cusid);
            d.append("subTol", subTol);
            d.append("salesDate", salesDate);
            d.append("balanceVal", balanceValFloat);
            $.ajax({
                url: "../controllers/controller_return.php?type=save_stock",
                method: "POST",
                data: d,
                processData: false,
                contentType: false,
                success: function(data) {
                    // $('#purchaseform')[0].reset();
                    // location.reload(true);
       

                    // $("#poid").append(data);
                    var salesId = jQuery.parseJSON(data);
                    
                    TableData = storeTblValues(salesId)
                    TableData = JSON.stringify(TableData);
         
                    $.ajax({
                        type: "POST",
                        url: "../controllers/controller_return.php?type=salesDetailsSave",
                        data: "pTableData=" + TableData,
                        success: function(msg) {
                            
                 
                            // $('#salesform').reset();
                            location.reload(true);

                        }
                    });
                }
            });
            // }
        });
    });

    jQuery(function($) {



        $(document).ready(function() {
            $.noConflict();
            $('.select2gg').select2({
                placeholder: "--Select a Product--",
                allowClear: true
            });



            $('#purchaseform').validate({
                errorElement: 'div',
                errorClass: 'help-block',
                focusInvalid: false,
                ignore: "",
                rules: {
                    poSupplier: {
                        required: true,
                    },
                    podate: {
                        required: true
                    },
                    qty: {
                        required: false,
                        number: false
                    },
                    poProductList: {
                        required: false
                    },
                },

                messages: {
                    poSupplier: {
                        required: "Please select a supplier.",
                        minlength: "Please select a supplier."
                    },
                    podate: "Please enter a date"
                },


                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                },

                success: function(e) {
                    $(e).closest('.form-group').removeClass('has-error'); //.addClass('has-info');
                    $(e).remove();
                },

                errorPlacement: function(error, element) {
                    if (element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                        var controls = element.closest('div[class*="col-"]');
                        if (controls.find(':checkbox,:radio').length > 1) controls.append(error);
                        else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                    } else if (element.is('.select2')) {
                        error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                    } else if (element.is('.chosen-select')) {
                        error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                    } else error.insertAfter(element.parent());
                },

            });


        });


    });
</script>


<script src="../assets/js/chosen.jquery.min.js"></script>
<script src="../assets/js/jquery.validate.min.js"></script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>