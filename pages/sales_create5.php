<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="4") || ($_SESSION["user"]["utype"]=="5")){
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
                            <input type="hidden" class="form-control" id="rtsche" name="rtsche" value='<?php echo $_SESSION["user"]["emp_id"] ?>'>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <h4 class="page-header"><b>Select Products</b></h4>
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
                                                <button type='button' class='btn btn-primary' id='createSales' style="float: right;">Create Sales</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <form id="salesForm" method="post">
                                    <div id="selectCustomer">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="salesid">Sales ID</label>
                                                    <input readonly type="text" class="form-control" id="salesid" name="salesid">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="rtsche">Route Schedule ID</label>
                                                    <input readonly type="text" class="form-control" id="rtsche" name="rtsche" value=''>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
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
                                            <div class="col-md-4 form-group">
                                                <div>
                                                    <label for="salesRoute" style="display:block;">Route</label>
                                                    <select class="form-control selcet-filter select2gg" id="salesRoute" name="salesRoute" style="width:100%;">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <div>
                                                    <label for="salesCustomer" style="display:block;">Customer</label>
                                                    <select class="form-control selcet-filter select2gg" id="salesCustomer" name="salesCustomer" style="width:100%;">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <div>
                                                    <label for="salesSupplier" style="display:block;">Supplier</label>
                                                    <select class="form-control selcet-filter select2gg" id="salesSupplier" name="salesSupplier" style="width:100%;">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="salesProForm" method="post">
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
                                            <div class="col-md-4 form-group">
                                                <div>
                                                    <label for="salesBatch" style="display:block;">Product Batch</label>
                                                    <select class="form-control selcet-filter select2gg" id="salesBatch" name="salesBatch" style="width:100%;">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-2 form-group">
                                                <div>
                                                    <div class="form-group">
                                                        <label for="itemPrice">Item Price</label>
                                                        <input type="text" readonly class="form-control" name="itemPrice" id="itemPrice">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 form-group">
                                                <div>
                                                    <label for="qty">Qty</label>
                                                    <input type="text" class="form-control" placeholder="0" name="qty" id="qty">

                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div>
                                                    <label for="disVal">Discount %</label>
                                                    <input type="text" class="form-control" placeholder="0%" name="disVal" id="disVal">

                                                </div>
                                            </div>

                                            <div class="col-md-2 form-group">
                                                <div>
                                                    <label for="grossTotal">Gross Total</label>
                                                    <input type="text" readonly class="form-control" name="grossTotal" id="grossTotal">

                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="col-xs-2">
                                                    <div class="form-group">
                                                        <label for="salesProductAdd">&nbsp;</label>
                                                        <button type='button' class='btn btn-primary' id='salesProductAdd'>Add Items</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
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

                                                    <div>
                                                        <table id="salesTable" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>

                                                                    <th style="width:10%"></th>
                                                                    <th style="width:10%">List No</th>
                                                                    <th style="width:30%">Product Name</th>
                                                                    <th style="width:10%">Item Price</th>
                                                                    <th style="width:10%">Quantity</th>
                                                                    <th style="width:15%">Discount %</th>
                                                                    <th style="width:15%">Total</th>

                                                                </tr>
                                                            </thead>

                                                            <tbody id="salesTableBody">

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>

                                                                    <td colspan="4" class="blank"> </td>
                                                                    <td colspan="2">Sub Total</td>
                                                                    <td class="subTotal" id="subTotal" style='text-align:right'>
                                                                        0.00
                                                                    </td>
                                                                </tr>
                                                                <tr>

                                                                    <td colspan="4" class="blank"> </td>
                                                                    <td colspan="2">Amount Paid</td>
                                                                    <td style='text-align:right'>
                                                                        <div id="total"><input class="amountPaid" id="amountPaid" style="border:0px; width:50%; text-align:right" value="" /></div>
                                                                    </td>
                                                                </tr>
                                                                <tr>

                                                                    <td colspan="4" class="blank"> </td>
                                                                    <td colspan="2">Previous Balance</td>
                                                                    <td class="preBalance" id="preBalance" style='text-align:right'>
                                                                        0.00
                                                                    </td>
                                                                </tr>
                                                                <tr>

                                                                    <td colspan="4" class="blank"> </td>
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


                                        <button type="button" class="btn btn-danger btn-block btn-flat" id="salesCancel">Cancel</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-warning btn-block btn-flat" id="salesHold">Hold</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-success btn-block btn-flat" id="salesSubmit">Submit</button>
                                    </div>
                                </div>

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

    function getItemPrice() {

        var batch = $("#salesBatch option:selected").text();
        var proid = $('#salesProductName').val();

        $.post("../controllers/controller_sales.php?type=get_itemPrice", {
                proid: proid,
                batch: batch
            },
            function(data, status) {
                if (status == "success") {
                    $("#itemPrice").val(data);
                }
            });
    }

    function calGrossTol() {
        var itemPrice = $("#itemPrice").val();
        var disVal = parseInt($("#disVal").val());
        var qty = $("#qty").val();

        var grossTol = (itemPrice * qty) - (itemPrice * qty) * disVal / 100;
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
            var rowTotalVal = $row.find("td:nth-child(7)").text();
            rowTotalVal = parseFloat(rowTotalVal);
            subTotal = subTotal + rowTotalVal;
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
                    var amountPaid = $(".amountPaid").val();
                    var subTotal = parseFloat($("#subTotal").text());

                    subTotal = subTotal.toFixed(2);
                    balance = subTotal - amountPaid + prebalance;
                    balance = balance.toFixed(2);
                    $(".balanceVal").text(balance);
                    $(".amountPaid").text(subTotal);

                }
            });



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

    $(document).ready(function() {

        document.title = "Sales Create";

        $('#selectProducts').hide();
        $('#salesChangeCusDiv').hide();
        $('#salesSelectPrdDiv').hide();
        $('#btnSet').hide();
        $("#salesid").val("");

        $.noConflict();

        $.post("../controllers/controller_sales.php?type=get_route",
            function(data, status) {
                if (status == "success") {

                    $("#salesRoute").empty();
                    $("#salesRoute").append("<option value=''>--Select Route--</option>");
                    $("#salesRoute").append(data);

                }
            });


        $.post("../controllers/controller_sales.php?type=get_suppliers",
            function(data, status) {
                if (status == "success") {
                    //alert(data); 
                    $("#salesSupplier").empty();
                    $("#salesSupplier").append("<option value=''>--Select Supplier--</option>");
                    $("#salesSupplier").append(data);

                }
            });
    });

    $('#createSales').click(function() {

    });

    $('#salesChangeCus').click(function() {
        $('#selectProducts').hide();
        $('#salesChangeCusDiv').hide();
        $('#selectCustomer').show();
        $('#createSalesDiv').show();
        $('#btnSet').hide();

    });

    $('#salesSelectPrd').click(function() {
        $('#selectCustomer').hide();
        $('#salesSelectPrdDiv').hide();
        $('#selectProducts').show();
        $('#salesChangeCusDiv').show();
    });

    $('#salesRoute').change(function() {

        var salesRoute = $('#salesRoute').val(); // get option's value

        //change product category select box
        $.post("../controllers/controller_sales.php?type=get_customers", {
                salesRoute: salesRoute
            },
            function(data, status) {
                if (status == "success") {

                    $("#salesCustomer").empty();
                    $("#salesCustomer").append("<option value=''>--Select Product Category--</option>");
                    $("#salesCustomer").append(data);
                    // $("#poSupplier").attr("disabled", "disabled");
                }
            });

    });

    $('#salesSupplier').change(function() {


        var salesSupplier = $('#salesSupplier').val(); // get option's value

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

        var supplierval = $('#salesSupplier').val();

        // get filtered data to datatable
        $.post("../controllers/controller_sales.php?type=getFullProductList", {
                supplierval: supplierval
            },
            function(data, status) {
                if (status == "success") {
                    // alert(data);
                    $("#salesProductName").empty();
                    $("#salesProductName").append("<option></option>");
                    $("#salesProductName").append(data);

                }
            });

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
                }
            });


    });

    $('#salesProductName').change(function() {

        var proid = $('#salesProductName').val(); // get option's value

        $.post("../controllers/controller_sales.php?type=get_batch", {
                proid: proid
            },
            function(data, status) {
                if (status == "success") {
                    //alert(data);
                    $("#salesBatch").empty();
                    $("#salesBatch").append("<option value=''>--Select Batch--</option>");
                    $("#salesBatch").append(data);
                }
            });

    });

    $('#salesBatch').change(function() {

        var proid = $('#salesBatch').val(); // get option's value

        getItemPrice()

    });

    $.noConflict();
    jQuery(function($) {

        $("#createSales").click(function() {
            if ($("#salesForm").valid()) {
                $('#selectCustomer').hide();
                $('#createSalesDiv').hide();
                $('#selectProducts').show();
                $('#salesChangeCusDiv').show();
                $('#btnSet').show();
                d = new FormData($("#salesForm")[0]);
                $.ajax({
                    url: "../controllers/controller_sales.php?type=salesCreate",
                    method: "post",
                    data: d,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        var salesId = data;
                        $("#salesid").val(data);
                        $.post("../controllers/controller_sales.php?type=salesCreateTable", {
                                salesId: salesId
                            },
                            function(data, status) {
                                if (status == "success") {
                                    $("#salesTable tbody").empty();
                                    $("#salesTable tbody").append(data);
                                    updateSubTol();
                                    updateAmountDue();
                                }
                            });

                    }
                });
            }
        });

        $(document).ready(function() {
            $(".subTotal").text("0.00");
            $(".amountPaid").val("0.00");
            $("#itemPrice").val("0.00");
            $("#grossTotal").val("0.00");
            $("#qty").val("");
            $("#disVal").val("");
            $(".balanceVal").text("0.00");
            // $('.date-picker').datepicker('setDate', 'today');
            $('.date-picker').datepicker({
                autoclose: true,
                minDate: 0,
                maxDate: 0,
                todayHighlight: true,
                dateFormat: 'yy-mm-dd'
            });
            $('.date-picker').datepicker('setDate', new Date());


            $("#qty").keyup(function() {
                getItemPrice();
                calGrossTol();
            });

            $("#disVal").keyup(function() {
                calGrossTol();
            });

            $('#salesProductAdd').on('click', function() {
                if ($("#salesProForm").valid()) {

                    var batch = $("#salesBatch option:selected").text();
                    var proid = $('#salesProductName').val();

                    var proname = $("#salesProductName option:selected").text();
                    var qnty = $('#qty').val();
                    var buttons = "<div class='hidden-sm hidden-xs btn-group'><button type='button' class='btn btn-xs btn-info'><i class='ace-icon fa fa-pencil bigger-120'></i></button></div>"
                    var item_cost = $('#itemPrice').val();
                    // alert(item_cost); 
                    var discount = parseInt($('#disVal').val());
                    var subTotal = parseInt($("#grossTotal").val());
                    var total = item_cost * qnty;
                    var discTol = total;
                    var subTol = discTol.toFixed(2);
                    var tablerow = "<tr class='item-row'><td>" + buttons + "</td><td>" + batch + "</td><td>" + proname + "</td><td>" + item_cost + "</td><td>" + qnty + "</td><td>0%</td><td class='subTol'>" + subTol + "</td></tr>";

                    var salesId = $("#salesid").val();

                    $.post("../controllers/controller_sales.php?type=salesAddRow", {
                            proname: proname,
                            item_cost: item_cost,
                            qnty: qnty,
                            discount: discount,
                            subTotal: subTotal,
                            salesId: salesId,
                            batch: batch
                        },
                        function(data, status) {
                            if (status == "success") {
                                var salesId = $("#salesid").val();
                                $.post("../controllers/controller_sales.php?type=salesCreateTable", {
                                        salesId: salesId
                                    },
                                    function(data, status) {
                                        if (status == "success") {
                                            $("#salesTable tbody").empty();
                                            $("#salesTable tbody").append(data);
                                            updateSubTol();
                                            updateAmountDue();
                                        }
                                    });
                            }
                        });


                    $("#salesProductName").empty();
                    $("#itemPrice").val("0.00");
                    $("#grossTotal").val("0.00");
                    $("#qty").val("");
                    $("#disVal").val("");
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

                                $("#salesProductName").empty();
                                $("#salesProductName").append("<option></option>");
                                $("#salesProductName").append(data);

                            }
                        });


                }
            });
            var oldVal = "";





            $("#salesTable tbody").on("keyup", '.tableDis', function() {
                var salesid = $("#salesid").val();
                var dis = $(this).val();
                var $row = $(this).closest("tr");
                var itemPrice = parseFloat($row.find("td:nth-child(4)").text());
                var listNo = parseFloat($row.find("td:nth-child(2)").text());
                var qty = parseFloat($row.find(".tableQty").val());

                var total = itemPrice * qty;

                var grossTotal = (total - total * dis / 100).toFixed(2);

                $row.find("td:nth-child(7)").text(grossTotal);

                updateSubTol();
                updateAmountDue();
                // updateTableRow();
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
            });


            $("#salesTable tbody").on("keyup", '.tableQty', function() {

                var $row = $(this).closest("tr");
                var salesid = $("#salesid").val();
                var qty = parseFloat($row.find(".tableQty").val());
                var dis = parseFloat($row.find(".tableDis").val());
                var itemPrice = parseFloat($row.find("td:nth-child(4)").text());
                var listNo = parseFloat($row.find("td:nth-child(2)").text());
                var total = (itemPrice * qty).toFixed(2);
                var grossTotal = (total - total * dis / 100).toFixed(2);
                $row.find("td:nth-child(7)").text(grossTotal);
                updateSubTol();
                updateAmountDue();
                // updateTableRow();
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
            });

            $("#salesTable tfoot").on("keyup", '.amountPaid', function() {

                updateAmountDue();

            });
            $('#salesTable tbody').on('click', '.fa-minus-circle', function() {

                var btn = this;

                var $row = $(this).closest("tr"); // Find the row
                var proname = $row.find("td:nth-child(3)").text();
                var proqty = parseFloat($row.find(".tableQty").val());
                // alert(proqty);
                // alert(proname);
                var salesid = $('#salesid').val();
                var listNo = parseInt($row.find("td:nth-child(2)").text());
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
                        $.post("../controllers/controller_sales.php?type=deleteTableRow", {
                                salesid: salesid,
                                listNo: listNo
                            },
                            function(data, status) {
                                if (status == "success") {}
                                $.post("../controllers/controller_sales.php?type=salesCreateTable", {
                                        salesId: salesid
                                    },
                                    function(data, status) {
                                        if (status == "success") {
                                            $("#salesTable tbody").empty();
                                            $("#salesTable tbody").append(data);
                                            updateSubTol();
                                            updateAmountDue();
                                        }
                                    });
                            });

                    } else {
                        Swal.fire(
                            'Items not removed!',
                            '',
                            'info'
                        );
                    }
                })

            });

            $(".fa-trash-o").click(function() {
                myTable.row(".selected").remove().draw(false);
         

            });

            $('#salesTable tbody').on('click', '.fa-pencil', function() {
                var btn = this;
                // alert("gg");
                var $row = $(this).closest("tr"); // Find the row
                var listNo = $row.attr("id");
                var salesId = $("#salesid").text();
                $.post("../controllers/controller_sales.php?type=getItemInfo", {
                        listNo: listNo,
                        salesId: salesId
                    },
                    function(data, status) {
                        if (status == "success") {

                            $("#salesProductName").empty();
                            $("#salesProductName").append("<option></option>");
                            $("#salesProductName").append(data);

                        }
                    });

            });

            $('#salesSubmit').click(function() {
                var salesid = $("#salesid").val();

                var subTotal = $('#subTotal').text();
                var amountPaid = $('#amountPaid').val();
                var salesCustomer = $('#salesCustomer').val();
                var preBalance = $('#preBalance').text();
                var balanceVal = $('#balanceVal').text();

                $.post("../controllers/controller_sales.php?type=salesSubmit", {
                        salesid: salesid,
                        subTotal: subTotal,
                        amountPaid: amountPaid,
                        balanceVal: balanceVal,
                        preBalance: preBalance,
                        salesCustomer: salesCustomer
                    },
                    function(data, status) {
                        if (status == "success") {

                            window.location.href = "sales_create_invoice.php?salesid=" + salesid;
                        }
                    });

            });
            $('#salesCancel').click(function() {
                var salesCustomer = $("#salesCustomer option:selected").text();
                var salesid = $("#salesid").val();



                Swal.fire({
                    title: 'Are you sure?',
                    text: "Remove sales for : " + salesCustomer,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Cancel sales record'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Removed!',
                            "Sales record for : " + salesCustomer,
                            'success'
                        );
                        $(this).closest('tr').remove();
                        $.post("../controllers/controller_sales.php?type=deleteTableRow", {
                                salesid: salesid,
                                listNo: listNo
                            },
                            function(data, status) {
                                if (status == "success") {}
                                $.post("../controllers/controller_sales.php?type=salesCancel", {
                                        salesid: salesid
                                    },
                                    function(data, status) {
                                        if (status == "success") {
                                            window.location.href = "sales_create5.php?";
                                        }
                                    });
                            });

                    } else {
                        Swal.fire(
                            'Sales record not removed!',
                            '',
                            'info'
                        );
                    }
                })
            });



            $('#salesHold').click(function() {
                var salesid = $("#salesid").val();
                window.location.href = "sales_create5.php";
            });

        });
    });


    jQuery(function($) {



        $(document).ready(function() {
            $.noConflict();
            $('.select2gg').select2({
                placeholder: "--Select a Product--",
                allowClear: true
            });

            $('#salesForm').validate({
                errorElement: 'div',
                errorClass: 'help-block',
                focusInvalid: false,
                ignore: "",
                rules: {
                    salesRoute: {
                        required: true,
                    },
                    salesCustomer: {
                        required: true
                    },
                    salesSupplier: {
                        required: true,
                        number: false
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

            $('#salesProForm').validate({
                errorElement: 'div',
                errorClass: 'help-block',
                focusInvalid: false,
                ignore: "",
                rules: {
                    salesProductCat: {
                        required: true,
                    },
                    salesProductName: {
                        required: true
                    },
                    salesBatch: {
                        required: true,
                        number: false
                    },
                    itemPrice: {
                        required: false,
                    },
                    qty: {
                        required: true,
                        number: true
                    },
                    disVal: {
                        required: false,
                        number: true
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