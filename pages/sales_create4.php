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
                    <h4 class="page-header"><b>Create Sales</b></h4>
                </div>
                <div class="box box-info">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form id="salesform" method="post">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="salesid">Sales ID</label>
                                        <input readonly type="text" class="form-control" id="salesid" name="salesid">
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
                                        <label for="salesRoute">Route</label>
                                        <select class="form-control selcet-filter select2gg" id="salesRoute" name="salesRoute">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <div>
                                        <label for="salesCustomer">Customer</label>
                                        <select class="form-control selcet-filter select2gg" id="salesCustomer" name="salesCustomer">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <div>
                                        <label for="salesSupplier">Supplier</label>
                                        <select class="form-control selcet-filter select2gg" id="salesSupplier" name="salesSupplier">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <div>
                                        <label for="salesProductCat">Product Category</label>
                                        <select class="form-control selcet-filter select2gg" id="salesProductCat" name="salesProductCat">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <div>

                                        
                                       
                                
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4 form-group">
                                    <div>
                                        <label for="salesProductName">Product Name</label>
                                        <select class="form-control selcet-filter select2gg" id="salesProductName" name="salesProductName">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <div>
                                        <label for="salesBatch">Batch</label>
                                        <select class="form-control selcet-filter select2gg" id="salesBatch" name="salesBatch">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2 form-group">
                                    <div>
                                        <label for="qty">Qty</label>
                                        <input type="text" class="form-control" name="qty" id="qty">

                                    </div>
                                </div>


                                <div class="col-xs-2">
                                    <div >
                                        <div class="form-group">
                                        <label for="txtOrdDtLinetotal">Total</label>
                                        <input type="text" class="form-control" name="txtOrdDtLinetotal" id="txtOrdDtLinetotal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4 form-group">
                                    <div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <div>
                                    
                                        <button type='button' class='btn btn-primary btn-blcok' id='btnAdd'>Add Items</button>
                                    </div>
                                </div>

                            </div>
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
                                                                <!--                             <th class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </th> -->
                                                                <th></th>
                                                                <th>Batch ID</th>
                                                                <th>Product Name</th>
                                                                <th>Item Price</th>
                                                                <th>Quantity</th>
                                                                <th>Discount</th>
                                                                <th>Total</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody id="salesTableBody">

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


                            <!-- <div class="col-sm-3 pull-right" style="margin-right: 50px;">
  <div class="col-sm-6"><h4>Sub Total :</h4></div><div class="col-sm-6"><h4>100</h4></div>
  <div class="col-sm-6"><h4>Amount paid :</h4></div><div class="col-sm-6"><h4>100</h4></div>
  <div class="col-sm-6"><h4>Balance Due :</h4></div><div class="col-sm-6"><h4>100</h4></div> -->


                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <div class="pull-right">


                                &nbsp; &nbsp; &nbsp;
                                <button class="btn btn-info" type="button" id="salessave">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Submit
                                </button>
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
    $(document).ready(function() {
        $.noConflict();
        // load supplier select box
        $.post("../controllers/controller_sales.php?type=get_route",
            function(data, status) {
                if (status == "success") {
                    //alert(data);
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

    $('#salesRoute').change(function() {

        var salesRoute = $('#salesRoute').val(); // get option's value

        //change product category select box
        $.post("../controllers/controller_sales.php?type=get_customers", {
                salesRoute: salesRoute
            },
            function(data, status) {
                if (status == "success") {
                    // alert(data);
                    $("#salesCustomer").empty();

                    $("#salesCustomer").append("<option value=''>--Select Product Category--</option>");

                    $("#salesCustomer").append(data);
                    // $("#poSupplier").attr("disabled", "disabled");
                }
            });

    });

    $('#salesSupplier').change(function() {


        var salesSupplier = $('#salesSupplier').val(); // get option's value
        // alert(salesSupplier);
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

    $('#salesProductName').change(function() {

        var proid = $('#salesProductName').val(); // get option's value
        // var procatval = $('#rtscheProCat').val();
        //alert(proid);
        //change product name select box options
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

    $.noConflict();
    $(document).ready(function() {
        $("#txtPrdName").attr('readonly', true);
        $("#txtOrdDtQty").attr('readonly', true);
        $("#txtActMode").val('add');
        $("#txtBrcId").val('');
        $("#btnUpdate").hide();
        $("#btnAdd").show();
        var urlMode = $("#urlMode").val();
        if (urlMode == 'edit') {
            $("#txtPrdName").removeAttr('readonly');
            $("#txtCusName").attr('readonly', true);
            var ordId = $("#txtOrdId").val();
            load_temp_order(ordId);
        }
        $("#cmbBrcId").show();
        $("#cmbLbl").hide();


    });




    // function loadProductInfo(batchId) {
    //     $.post(, {
    //             'batchId': batchId
    //         },
    //         function(data) {
    //             $("#txtPrdId").val('');
    //             $("#dtPrdName").text('');
    //             $("#dtPrdBrand").text('');
    //             $("#dtCatName").text('');
    //             $("#dtPrdCode").text('');
    //             $("#dtStock").text('');
    //             $("#dtCusPrice").text('');
    //             $("#dtPrdDesc").text('');
    //             $("#dtCusDiscount").text('');
    //             $("#dtStock").text('');
    //             var prdId = data["prd_id"];
    //             // var pakId = data["pak_id"];
    //             var prdUnit = data["prd_unit"];
    //             var catName = data["cat_display_name"];
    //             var brnName = data["brn_display_name"];
    //             var prdName = data["prd_name"];
    //             var prdDisplayName = data["prd_display_name"];
    //             var prdDesc = data["prd_desc"];
    //             var prdCode = data["prd_code"];
    //             var cusPrdCode = data["cus_prd_code"];


    //             if (nbtStatus == 1) {
    //                 cusPrice = data["cus_prd_cus_nbt_price"];
    //             }

    //             $("#txtPrdId").val(prdId);
    //             $("#dtPrdName").text(prdDisplayName);
    //             $("#dtPrdBrand").text(brnName);
    //             $("#dtCatName").text(catName);
    //             $("#dtStock").text(' / Available Stock : ' + prdStock);
    //             $("#dtPrdCode").text('Code : ' + prdCode);
    //             $("#dtCusPrice").text(' / Price : ' + cusPrice);
    //             $("#dtPrdDesc").text(prdDesc);
    //             loadMessUnits(prdUnit, prdSize);
    //             $("#txtOrdDtQty").attr('readonly', false);
    //         }, 'json'
    //     );
    // }


    $("#qty").change(function() {
        calculate_linetotal();
    });
    $("#qty").blur(function() {
        calculate_linetotal();
    });

    function calculate_linetotal() {

        var txtCusPrdId = $("#salesProductName").val();
        var txtOrdDtQty = $("#qty").val();
        var batchId = $("#salesBatch").val();
        $.post("../controllers/controller_sales.php?type=calculate_linetotal", {
                'txtCusPrdId': txtCusPrdId,
                'batchId': batchId,
                'txtOrdDtQty': txtOrdDtQty
            },
            function(data) {
                    
                var lineTotal = data;
                $("#txtOrdDtLinetotal").val(lineTotal);
            }, 'json'
        );
    }
    $("#btnAdd").click(function() {
        $('.err-div').text('');
        var actMode = $('#txtActMode').val();
        var postUrl = '';
        if (actMode == "edit") {
            var postUrl = '';
        }
        $("#btnAdd").hide();
        var err = 0;
        var txtCusPrdId = $("#txtCusPrdId").val();
        var txtOrdId = $("#txtOrdId").val();
        var txtOrdPoNo = $("#txtOrdPoNo").val();
        var txtPrdId = $("#txtPrdId").val();
        var txtOrdDtQty = $("#txtOrdDtQty").val();
        var txtCusId = $("#txtCusId").val();
        var txtOrdRemarks = $("#txtOrdRemarks").val();
        var txtOrdDeliveryAdd1 = $("#txtOrdDeliveryAdd1").val();
        var txtOrdDeliveryAdd2 = $("#txtOrdDeliveryAdd2").val();
        var txtOrdDeliveryCity = $("#txtOrdDeliveryCity").val();
        var txtBrcId = $("#txtBrcId").val();

        if (err == 0) {
            $.post(postUrl, {
                    'txtOrdPoNo': txtOrdPoNo,
                    'txtBrcId': txtBrcId,
                    'txtPrdId': txtPrdId,
                    'txtOrdId': txtOrdId,
                    'txtCusPrdId': txtCusPrdId,
                    'txtCusId': txtCusId,
                    'txtOrdDtQty': txtOrdDtQty,
                    'txtOrdRemarks': txtOrdRemarks,
                    'txtOrdDeliveryAdd1': txtOrdDeliveryAdd1,
                    'txtOrdDeliveryAdd2': txtOrdDeliveryAdd2,
                    'txtOrdDeliveryCity': txtOrdDeliveryCity
                },
                function(data) {
                    if (data['status'] == "add_true") {
                        //swal("Product added to list", "", "success");
                        var ordId = data['ord_id'];
                        $('#txtOrdId').val(ordId);
                        $("#btnAdd").show();
                        load_temp_order(ordId);
                    } else if (data['status'] == "add_false") {
                        swal("Unable to add product to list", "", "error");
                        $("#btnAdd").show();
                    } else if (data['status'] == "duplicate") {
                        $('#confirmModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $("#btnAdd").show();
                    } else if (data['status'] == "low_qty") {
                        swal("Insufficient stock available", "", "error");
                        $("#btnAdd").show();
                    } else if (data['status'] == "errors") {
                        $('.err-div').text('');
                        $("#txtCusPrdIdErr").html(data['errors'].txtCusPrdIdErr);
                        $("#txtOrdPoNoErr").html(data['errors'].txtOrdPoNoErr);
                        $("#txtOrdDtQtyErr").html(data['errors'].txtOrdDtQtyErr);
                        $("#txtCusPrdIdErr").html(data['errors'].txtPrdIdErr);
                        $("#txtCusIdErr").html(data['errors'].txtCusIdErr);
                        $("#txtBrcIdErr").html(data['errors'].txtBrcIdErr);
                        $("#btnAdd").show();
                    }
                }, 'json'
            );
        }

    });

    $("#btnUpdate").click(function() {
        var actMode = $('#txtActMode').val();
        $('.err-div').text('');
        var postUrl = '';

        $("#btnUpdate").hide();
        var err = 0;
        var txtCusPrdId = $("#txtCusPrdId").val();
        var txtOrdDtId = $("#txtOrdDtId").val();
        var txtOrdPoNo = $("#txtOrdPoNo").val();
        var txtPrdId = $("#txtPrdId").val();
        var txtOrdId = $("#txtOrdId").val();
        var txtOrdDtQty = $("#txtOrdDtQty").val();
        var txtCusId = $("#txtCusId").val();
        var txtOrdRemarks = $("#txtOrdRemarks").val();
        var txtOrdDeliveryAdd1 = $("#txtOrdDeliveryAdd1").val();
        var txtOrdDeliveryAdd2 = $("#txtOrdDeliveryAdd2").val();
        var txtOrdDeliveryCity = $("#txtOrdDeliveryCity").val();
        var txtBrcId = $("#txtBrcId").val();


        if (err == 0) {
            $.post(postUrl, {
                    'txtOrdPoNo': txtOrdPoNo,
                    'txtBrcId': txtBrcId,
                    'txtOrdDtId': txtOrdDtId,
                    'txtOrdId': txtOrdId,
                    'txtPrdId': txtPrdId,
                    'txtCusPrdId': txtCusPrdId,
                    'txtCusId': txtCusId,
                    'txtOrdDtQty': txtOrdDtQty,
                    'txtOrdRemarks': txtOrdRemarks,
                    'txtOrdDeliveryAdd1': txtOrdDeliveryAdd1,
                    'txtOrdDeliveryAdd2': txtOrdDeliveryAdd2,
                    'txtOrdDeliveryCity': txtOrdDeliveryCity
                },
                function(data) {
                    if (data['status'] == "add_true") {
                        swal("Product information successfully changed", "", "success");
                        var ordId = data['ord_id'];
                        $('#txtOrdId').val(ordId);
                        $("#btnAdd").show();
                        $("#btnUpdate").hide();
                        $("#txtPrdName").removeAttr('readonly');
                        load_temp_order(ordId);
                    } else if (data['status'] == "add_false") {
                        swal("Unable to change product information", "", "error");
                        $("#btnUpdate").show();
                    } else if (data['status'] == "low_qty") {
                        swal("Insufficient stock available", "", "error");
                        $("#btnUpdate").show();
                    } else if (data['status'] == "errors") {
                        $('.err-div').text('');
                        $("#txtCusPrdIdErr").html(data['errors'].txtCusPrdIdErr);
                        $("#txtOrdDtQtyErr").html(data['errors'].txtOrdDtQtyErr);
                        $("#txtCusPrdIdErr").html(data['errors'].txtPrdIdErr);
                        $("#txtCusIdErr").html(data['errors'].txtCusIdErr);
                        $("#txtBrcIdErr").html(data['errors'].txtBrcIdErr);
                        $("#btnUpdate").show();
                    }

                }, 'json'
            );
        }

    });

    function removeItem(txtOrdDtId) {
        swal({
                title: "Do you want to remove this order item ?",
                text: "",
                type: "warning",
                confirmButtonClass: "btn-primary",
                confirmButtonText: "Confirm",
                showCancelButton: true,
                closeOnConfirm: true
            },
            function() {
                var postUrl = '';

                var err = 0;
                var txtOrdId = $("#txtOrdId").val();
                var txtCusId = $("#txtCusId").val();

                if (err == 0) {
                    $.post(postUrl, {
                            'txtOrdDtId': txtOrdDtId,
                            'txtOrdId': txtOrdId,
                            'txtCusId': txtCusId
                        },
                        function(data) {
                            if (data['status'] == "add_true") {
                                swal("Product removed successfully", "", "success");
                                var ordId = data['ord_id'];
                                $('#txtOrdId').val(ordId);
                                load_temp_order(ordId);
                                if (data['ordt_count'] <= 0) {
                                    clearOrder(txtOrdId);
                                }
                            } else if (data['status'] == "add_false") {
                                swal("Unable to remove product from the list", "", "error");
                            }
                        }, 'json'
                    );
                }
            });
    }


    function duplicateUpdate() {
        $('#confirmModal').modal('hide');
        var postUrl = '';

        $("#btnAdd").hide();
        var err = 0;
        var txtCusPrdId = $("#txtCusPrdId").val();
        var txtOrdId = $("#txtOrdId").val();
        var txtOrdPoNo = $("#txtOrdPoNo").val();
        var txtPrdId = $("#txtPrdId").val();
        var txtOrdDtQty = $("#txtOrdDtQty").val();
        var txtCusId = $("#txtCusId").val();
        var txtOrdRemarks = $("#txtOrdRemarks").val();
        var txtOrdDeliveryAdd1 = $("#txtOrdDeliveryAdd1").val();
        var txtOrdDeliveryAdd2 = $("#txtOrdDeliveryAdd2").val();
        var txtOrdDeliveryCity = $("#txtOrdDeliveryCity").val();
        var txtBrcId = $("#txtBrcId").val();


        if (err == 0) {
            $.post(postUrl, {
                    'txtOrdPoNo': txtOrdPoNo,
                    'txtBrcId': txtBrcId,
                    'txtPrdId': txtPrdId,
                    'txtOrdId': txtOrdId,
                    'txtCusPrdId': txtCusPrdId,
                    'txtCusId': txtCusId,
                    'txtOrdDtQty': txtOrdDtQty,
                    'txtOrdRemarks': txtOrdRemarks,
                    'txtOrdDeliveryAdd1': txtOrdDeliveryAdd1,
                    'txtOrdDeliveryAdd2': txtOrdDeliveryAdd2,
                    'txtOrdDeliveryCity': txtOrdDeliveryCity
                },
                function(data) {
                    if (data['status'] == "add_true") {
                        var ordId = data['ord_id'];
                        $('#txtOrdId').val(ordId);
                        $("#btnAdd").show();
                        load_temp_order(ordId);
                    } else if (data['status'] == "add_false") {
                        swal("Unable to add product to list", "", "error");
                        $("#btnAdd").show();
                    } else if (data['status'] == "low_qty") {
                        swal("Insufficient stock available", "", "error");
                        $("#btnAdd").show();
                    } else if (data['status'] == "errors") {
                        $('.err-div').text('');
                        $("#txtCusPrdIdErr").html(data['errors'].txtCusPrdIdErr);
                        $("#txtOrdDtQtyErr").html(data['errors'].txtOrdDtQtyErr);
                        $("#txtCusPrdIdErr").html(data['errors'].txtPrdIdErr);
                        $("#txtCusIdErr").html(data['errors'].txtCusIdErr);
                        $("#txtBrcIdErr").html(data['errors'].txtBrcIdErr);
                        $("#btnAdd").show();
                    }
                }, 'json'
            );
        }

    }






    function load_order(ordId) {
        $("#btnUpdate").hide();
        $("#btnAdd").show();
        $.post('', {
                'txtOrdId': ordId
            },
            function(data) {
                $("#txtPrdId").val('');
                $("#dtPrdName").text('');
                $("#dtPrdName").text('Select Product');
                $("#dtPrdBrand").text('');
                $("#dtCatName").text('');
                $("#dtPrdCode").text('');

                $('#dtCusDiscount').val(0);
                $('#txtOrdDtLinetotal').text(0);
                $('#dtMessUnit').val('');
                $("#txtOrdDtQty").attr('readonly', true);
                $("#txtCusName").attr('readonly', true);


                var noItems = data["ordermaster"]["tmp_ord_item_count"];
                var cusId = data["ordermaster"]["cus_id"];
                var cusName = data["ordermaster"]["cus_name"];
                var remark = data["ordermaster"]["tmp_ord_remarks"];
                var deliveryAdd1 = data["ordermaster"]["tmp_ord_delivery_add1"];
                var deliveryAdd2 = data["ordermaster"]["tmp_ord_delivery_add2"];
                var deliveryCity = data["ordermaster"]["tmp_ord_delivery_city"];


                $("#txtCusName").val(cusName);
                $("#txtBrcId").val(brcId);
                $("#cmbBrcId").hide();
                $("#cmbLbl").show();
                $("#cmbLbl").text(brcName);
                $("#txtPrdId").val('');
                $("#txtCusPrdId").val('');
                $("#txtOrdId").text(ordId);


                $("#txtOrdList tbody").empty();
                $('#txtActMode').val('edit');
                var errLow = 0;
                for (i = 0; i < data['orddt'].length; i++) {

                    var ordDtId = data['orddt'][i].tmp_ord_dt_id;
                    var ordId = data['orddt'][i].tmp_ord_id;
                    var prdId = data['orddt'][i].tmp_prd_id;
                    var cusPrdId = data['orddt'][i].tmp_cus_prd_id;
                    var cusPrdCode = data['orddt'][i].cus_prd_code;
                    var prdName = data['orddt'][i].prd_display_name;
                    var catName = data['orddt'][i].cat_display_name;
                    var brnName = data['orddt'][i].brn_display_name;
                    var prdSize = data['orddt'][i].prd_size;
                    var prdUnit = data['orddt'][i].prd_unit;
                    var ordDtQty = data['orddt'][i].format_dt_qty;
                    var ordDtDiscount = data['orddt'][i].format_discount;
                    var ordDtDiscountAmt = data['orddt'][i].format_disamt;
                    var ordDtUprice = data['orddt'][i].format_uprice;
                    var ordDtLinetotal = data['orddt'][i].format_linetotal;
                    var ordDtStatus = data['orddt'][i].tmp_ord_dt_status;
                    var remainQty = Number(data['orddt'][i].remain_qty);

                    var rowclass = "";
                    if (remainQty < 0) {
                        rowclass = 'style="background-color: rgba(206, 62, 86, 0.15);"';
                        errLow++;
                    }

                    var func_edit = 'loadTempProductInfo(' + ordDtId + ',' + cusPrdId + ')';
                    var func_remove = 'removeItem(' + ordDtId + ')';

                    row = '<tr ' + rowclass + '><td>' + cusPrdCode + '</td><td>' + prdName + '</td><td>' + catName + '</td><td>' + brnName + '</td><td align="right">' + prdSize + ' ' + prdUnit + '</td><td align="right">' + ordDtUprice + '</td>\
                    </td><td align="right">' + ordDtQty + '</td><td align="right">' + ordDtLinetotal + '</td>\
                    <td><button class="btn btn-xs btn-info" onclick="' + func_edit + '"><i class="ace-icon fa fa-pencil bigger-120"></i></button> </td>\
                    <td><button class="btn btn-xs btn-danger " onclick="' + func_remove + '"><i class="ace-icon fa fa-minus-circle bigger-120"></i></button></td></tr></tr>';
                    $("#txtOrdList tbody").append(row);
                }
                if (errLow > 0) {
                    $('#btnConfirm').hide();
                } else {
                    $('#btnConfirm').show();

                }
            }, 'json'
        );

    }

    function loadTempProductInfo(ordDtId) {
        $.post('', {
                'ordDtId': ordDtId
            },
            function(data) {
                $("#btnUpdate").show();
                $("#btnAdd").hide();
                $("#txtPrdId").val('');
                $("#dtPrdName").text('');
                $("#dtPrdBrand").text('');
                $("#dtCatName").text('');
                $("#dtPrdCode").text('');
                $("#dtCusPrice").text('');


                var prdId = data["prd_id"];
                var catName = data["cat_display_name"];
                var brnName = data["brn_display_name"];
                var prdName = data["prd_name"];
                var prdUnit = data["prd_unit"];
                var prdDisplayName = data["prd_display_name"];
                var prdDesc = data["prd_desc"];
                var prdCode = data["prd_code"];


                $("#txtOrdDtQty").removeAttr('readonly');
                $("#txtPrdName").attr('readonly', true);
                $("#txtPrdId").val(prdId);
                $("#txtCusPrdId").val(cusPrdId);
                $("#txtOrdDtId").val(ordDtId);
                $("#dtPrdName").text(prdDisplayName);
                $("#dtPrdBrand").text(brnName);
                $("#dtCatName").text(catName);
                $("#dtPrdCode").text('Code : ' + prdCode);
                $("#dtMessUnit").val(prdSize + ' ' + prdUnit);

            }, 'json'
        );
    }

    $("#btnConfirm").click(function() {

        var postUrl = '';

        var err = 0;
        var txtOrdId = $("#txtOrdId").val();
        var txtCusId = $("#txtCusId").val();
        var txtOrdPoNo = $("#txtOrdPoNo").val();
        var txtOrdRemarks = $("#txtOrdRemarks").val();
        var txtOrdDeliveryAdd1 = $("#txtOrdDeliveryAdd1").val();
        var txtOrdDeliveryAdd2 = $("#txtOrdDeliveryAdd2").val();
        var txtOrdDeliveryCity = $("#txtOrdDeliveryCity").val();
        $('#txtOrdDeliveryAddErr').text('');

        if (err == 0) {
            swal({
                    title: "Do you want to confirm this order",
                    text: "",
                    type: "warning",
                    confirmButtonClass: "btn-primary",
                    confirmButtonText: "Confirm",
                    showCancelButton: true,
                    closeOnConfirm: true
                },
                function() {
                    $.post(postUrl, {
                            'txtCusId': txtCusId,
                            'txtOrdId': txtOrdId,
                            'txtOrdRemarks': txtOrdRemarks,
                            'txtOrdDeliveryAdd1': txtOrdDeliveryAdd1,
                            'txtOrdDeliveryAdd2': txtOrdDeliveryAdd2,
                            'txtOrdPoNo': txtOrdPoNo,
                            'txtOrdDeliveryCity': txtOrdDeliveryCity
                        },
                        function(data) {
                            if (data['status'] == true) {
                                swal("Order confirmation successfully saved", "", "success");

                                var grd_url2 = "" + data['ord_id'];
                                window.open(
                                    grd_url2,
                                    '_self'
                                );
                            } else if (data['status'] == false) {
                                swal("Unable to save the order confirmation", "", "error");

                            } else if (data['status'] == "no_orddt") {
                                swal("Please add at least one product to order list", "", "error");

                            }
                        }, 'json'
                    );
                });
        }
    });



    function clearProductForm() {
        $("#txtPrdId").val('');
        $("#txtCusPrdId").val('');
        $("#dtPrdName").text('');
        $("#dtPrdName").text('');
        $("#dtCatName").text('');
        $("#dtPrdCode").text('');
        $("#dtCusPrice").text('');
        $("#dtPrdDesc").text('');
        $("#dtCusDiscount").text('');
        $("#dtStock").text('');
        $("#btnAdd").show();
        $("#txtOrdDtQty").attr('readonly', true);

    }






    jQuery(function($) {

        $(document).ready(function() {
            $.noConflict();
            $('.select2gg').select2({
                placeholder: "--Select a Product--",
                allowClear: true
            });

        });


    });
</script>


<script src="../assets/js/chosen.jquery.min.js"></script>
<script src="../assets/js/jquery.validate.min.js"></script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>