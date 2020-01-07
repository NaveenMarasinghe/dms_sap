$(document).ready(function() {
        $("#txtPrdName").attr('readonly', true);
        $("#txtOrdDtQty").attr('readonly', true);
        $("#txtActMode").val('add');
        $("#txtBrcId").val('');
        $("#btnUpdate").hide();
        $("#btnAdd").show();
        var urlMode =$("#urlMode").val();
        if(urlMode =='edit')
        {
            $("#txtPrdName").removeAttr('readonly');
            $("#txtCusName").attr('readonly', true);
            var ordId =  $("#txtOrdId").val();
            load_temp_order(ordId);
        }
        $("#cmbBrcId").show();
        $("#cmbLbl").hide();


    });
    


    
    function loadProductInfo(batchId) {
        $.post('<?php echo accecc_url ?>', {'batchId': batchId},
            function (data) {
                $("#txtPrdId").val('');
                $("#dtPrdName").text('');
                $("#dtPrdBrand").text('');
                $("#dtCatName").text('');
                $("#dtPrdCode").text('');
                $("#dtStock").text('');
                $("#dtCusPrice").text('');
                $("#dtPrdDesc").text('');
                $("#dtCusDiscount").text('');
                $("#dtStock").text('');
                var prdId = data["prd_id"];
               // var pakId = data["pak_id"];
                var prdUnit = data["prd_unit"];
                var catName = data["cat_display_name"];
                var brnName = data["brn_display_name"];
                var prdName = data["prd_name"];
                var prdDisplayName = data["prd_display_name"];
                var prdDesc = data["prd_desc"];
                var prdCode = data["prd_code"];
                var cusPrdCode = data["cus_prd_code"];
         

                if(nbtStatus == 1){
                    cusPrice = data["cus_prd_cus_nbt_price"];
                }

                $("#txtPrdId").val(prdId);
                $("#dtPrdName").text(prdDisplayName);
                $("#dtPrdBrand").text(brnName);
                $("#dtCatName").text(catName);
                $("#dtStock").text(' / Available Stock : '+prdStock);
                $("#dtPrdCode").text('Code : '+prdCode);
                $("#dtCusPrice").text(' / Price : '+cusPrice);
                $("#dtPrdDesc").text(prdDesc);          
                loadMessUnits(prdUnit,prdSize);
                $("#txtOrdDtQty").attr('readonly', false);
            }, 'json'
        );
    }

   
    $("#txtOrdDtQty").change(function() {
        calculate_linetotal();
    });
    $("#txtOrdDtQty").blur(function() {
        calculate_linetotal();
    });
    function calculate_linetotal() {

        var txtCusPrdId = $("#txtCusPrdId").val();
        var txtOrdDtQty =  $("#txtOrdDtQty").val();
        var batchId =  $("#batchId").val();
        $.post('<?php echo site_url("sales/get_linetotal"); ?>', {'txtCusPrdId': txtCusPrdId,'batchId': batchId,'txtOrdDtQty':txtOrdDtQty},
            function (data) {
                $("#txtOrdDtLinetotal").text('');
                var lineTotal = data;
                $("#txtOrdDtLinetotal").text(lineTotal);
            }, 'json'
        );
    }
    $("#btnAdd").click(function() {
        $('.err-div').text('');
        var actMode = $('#txtActMode').val();
        var postUrl = '<?php echo accecc_url ?>';
        if(actMode=="edit"){
            var postUrl = '<?php echo accecc_url ?>';
        }
        $("#btnAdd").hide();
        var err =0;
        var txtCusPrdId = $("#txtCusPrdId").val();
        var txtOrdId = $("#txtOrdId").val();
        var txtOrdPoNo = $("#txtOrdPoNo").val();
        var txtPrdId = $("#txtPrdId").val();
        var txtOrdDtQty =  $("#txtOrdDtQty").val();
        var txtCusId =  $("#txtCusId").val();
        var txtOrdRemarks =  $("#txtOrdRemarks").val();
        var txtOrdDeliveryAdd1 =  $("#txtOrdDeliveryAdd1").val();
        var txtOrdDeliveryAdd2 =  $("#txtOrdDeliveryAdd2").val();
        var txtOrdDeliveryCity =  $("#txtOrdDeliveryCity").val();
        var txtBrcId =  $("#txtBrcId").val();

        if(err == 0){
            $.post(postUrl, {'txtOrdPoNo': txtOrdPoNo,'txtBrcId':txtBrcId,'txtPrdId': txtPrdId,'txtOrdId': txtOrdId,'txtCusPrdId': txtCusPrdId,'txtCusId': txtCusId,'txtOrdDtQty':txtOrdDtQty,'txtOrdRemarks': txtOrdRemarks,'txtOrdDeliveryAdd1':txtOrdDeliveryAdd1,'txtOrdDeliveryAdd2':txtOrdDeliveryAdd2,'txtOrdDeliveryCity':txtOrdDeliveryCity},
                function (data) {
                    if (data['status'] == "add_true") {
                        //swal("Product added to list", "", "success");
                        var ordId = data['ord_id'];
                        $('#txtOrdId').val(ordId);
                        $("#btnAdd").show();
                        load_temp_order(ordId);
                    }
                    else if(data['status'] == "add_false"){
                        swal("Unable to add product to list", "", "error");
                        $("#btnAdd").show();
                    }
                    else if(data['status'] == "duplicate"){
                        $('#confirmModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $("#btnAdd").show();
                    }
                    else if(data['status'] == "low_qty"){
                        swal("Insufficient stock available", "", "error");
                        $("#btnAdd").show();
                    }
                    else if(data['status']=="errors"){
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
        var postUrl = '<?php echo accecc_url ; ?>';

        $("#btnUpdate").hide();
        var err =0;
        var txtCusPrdId = $("#txtCusPrdId").val();
        var txtOrdDtId = $("#txtOrdDtId").val();
        var txtOrdPoNo = $("#txtOrdPoNo").val();
        var txtPrdId = $("#txtPrdId").val();
        var txtOrdId = $("#txtOrdId").val();
        var txtOrdDtQty =  $("#txtOrdDtQty").val();
        var txtCusId =  $("#txtCusId").val();
        var txtOrdRemarks =  $("#txtOrdRemarks").val();
        var txtOrdDeliveryAdd1 =  $("#txtOrdDeliveryAdd1").val();
        var txtOrdDeliveryAdd2 =  $("#txtOrdDeliveryAdd2").val();
        var txtOrdDeliveryCity =  $("#txtOrdDeliveryCity").val();
        var txtBrcId =  $("#txtBrcId").val();

  
        if(err == 0){
            $.post(postUrl, {'txtOrdPoNo': txtOrdPoNo,'txtBrcId':txtBrcId,'txtOrdDtId': txtOrdDtId,'txtOrdId': txtOrdId,'txtPrdId': txtPrdId,'txtCusPrdId': txtCusPrdId,'txtCusId': txtCusId,'txtOrdDtQty':txtOrdDtQty,'txtOrdRemarks': txtOrdRemarks,'txtOrdDeliveryAdd1':txtOrdDeliveryAdd1,'txtOrdDeliveryAdd2':txtOrdDeliveryAdd2,'txtOrdDeliveryCity':txtOrdDeliveryCity},
                function (data) {
                    if (data['status'] == "add_true") {
                        swal("Product information successfully changed", "", "success");
                        var ordId = data['ord_id'];
                        $('#txtOrdId').val(ordId);
                        $("#btnAdd").show();
                        $("#btnUpdate").hide();
                        $("#txtPrdName").removeAttr('readonly');
                        load_temp_order(ordId);
                    }
                    else if(data['status'] == "add_false"){
                        swal("Unable to change product information", "", "error");
                        $("#btnUpdate").show();
                    }
                    else if(data['status'] == "low_qty"){
                        swal("Insufficient stock available", "", "error");
                        $("#btnUpdate").show();
                    }
                    else if(data['status']=="errors"){
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
        function () {
            var postUrl = '<?php echo accecc_url?>';

            var err = 0;
            var txtOrdId = $("#txtOrdId").val();
            var txtCusId = $("#txtCusId").val();

            if (err == 0) {
                $.post(postUrl, {'txtOrdDtId': txtOrdDtId, 'txtOrdId': txtOrdId, 'txtCusId': txtCusId},
                    function (data) {
                        if (data['status'] == "add_true") {
                            swal("Product removed successfully", "", "success");
                            var ordId = data['ord_id'];
                            $('#txtOrdId').val(ordId);
                            load_temp_order(ordId);
                            if(data['ordt_count']<=0){
                                clearOrder(txtOrdId);
                            }
                        }
                        else if (data['status'] == "add_false") {
                            swal("Unable to remove product from the list", "", "error");
                        }
                    }, 'json'
                );
            }
        });
    }

   
    function duplicateUpdate() {
        $('#confirmModal').modal('hide');
        var postUrl = '<?php echo accecc_url ?>';

        $("#btnAdd").hide();
        var err =0;
        var txtCusPrdId = $("#txtCusPrdId").val();
        var txtOrdId = $("#txtOrdId").val();
        var txtOrdPoNo = $("#txtOrdPoNo").val();
        var txtPrdId = $("#txtPrdId").val();
        var txtOrdDtQty =  $("#txtOrdDtQty").val();
        var txtCusId =  $("#txtCusId").val();
        var txtOrdRemarks =  $("#txtOrdRemarks").val();
        var txtOrdDeliveryAdd1 =  $("#txtOrdDeliveryAdd1").val();
        var txtOrdDeliveryAdd2 =  $("#txtOrdDeliveryAdd2").val();
        var txtOrdDeliveryCity =  $("#txtOrdDeliveryCity").val();
        var txtBrcId =  $("#txtBrcId").val();

     
        if(err == 0){
            $.post(postUrl, {'txtOrdPoNo':txtOrdPoNo,'txtBrcId':txtBrcId,'txtPrdId': txtPrdId,'txtOrdId': txtOrdId,'txtCusPrdId': txtCusPrdId,'txtCusId': txtCusId,'txtOrdDtQty':txtOrdDtQty,'txtOrdRemarks': txtOrdRemarks,'txtOrdDeliveryAdd1':txtOrdDeliveryAdd1,'txtOrdDeliveryAdd2':txtOrdDeliveryAdd2,'txtOrdDeliveryCity':txtOrdDeliveryCity},
                function (data) {
                    if (data['status'] == "add_true") {
                        var ordId = data['ord_id'];
                        $('#txtOrdId').val(ordId);
                        $("#btnAdd").show();
                        load_temp_order(ordId);
                    }
                    else if(data['status'] == "add_false"){
                        swal("Unable to add product to list", "", "error");
                        $("#btnAdd").show();
                    }
                    else if(data['status'] == "low_qty"){
                        swal("Insufficient stock available", "", "error");
                        $("#btnAdd").show();
                    }
                    else if(data['status']=="errors"){
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

    


  

    function load_order(ordId)  {
        $("#btnUpdate").hide();
        $("#btnAdd").show();
        $.post('<?php echo accecc_url ?>', {'txtOrdId': ordId},
            function (data) {
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
                var errLow =0;
                for (i = 0; i < data['orddt'].length; i++) {

                    var ordDtId   = data['orddt'][i].tmp_ord_dt_id;
                    var ordId   = data['orddt'][i].tmp_ord_id;
                    var prdId   = data['orddt'][i].tmp_prd_id;
                    var cusPrdId   = data['orddt'][i].tmp_cus_prd_id;
                    var cusPrdCode   = data['orddt'][i].cus_prd_code;
                    var prdName   = data['orddt'][i].prd_display_name;
                    var catName   = data['orddt'][i].cat_display_name;
                    var brnName   = data['orddt'][i].brn_display_name;
                    var prdSize   = data['orddt'][i].prd_size;
                    var prdUnit   = data['orddt'][i].prd_unit;
                    var ordDtQty = data['orddt'][i].format_dt_qty;
                    var ordDtDiscount = data['orddt'][i].format_discount;
                    var ordDtDiscountAmt = data['orddt'][i].format_disamt;
                    var ordDtUprice = data['orddt'][i].format_uprice;
                    var ordDtLinetotal = data['orddt'][i].format_linetotal;
                    var ordDtStatus = data['orddt'][i].tmp_ord_dt_status;
                    var remainQty = Number(data['orddt'][i].remain_qty);

                    var rowclass ="";
                    if(remainQty < 0){
                        rowclass = 'style="background-color: rgba(206, 62, 86, 0.15);"';
                        errLow++;
                    }

                    var func_edit = 'loadTempProductInfo(' + ordDtId + ',' + cusPrdId + ')';
                    var func_remove = 'removeItem(' + ordDtId + ')';

                    row = '<tr '+rowclass+'><td>' + cusPrdCode + '</td><td>' + prdName + '</td><td>' + catName + '</td><td>' + brnName + '</td><td align="right">' + prdSize + ' '+prdUnit+'</td><td align="right">' + ordDtUprice + '</td>\
                    </td><td align="right">' + ordDtQty + '</td><td align="right">' + ordDtLinetotal + '</td>\
                    <td><button class="btn btn-xs btn-info" onclick="' + func_edit + '"><i class="ace-icon fa fa-pencil bigger-120"></i></button> </td>\
                    <td><button class="btn btn-xs btn-danger " onclick="' + func_remove + '"><i class="ace-icon fa fa-minus-circle bigger-120"></i></button></td></tr></tr>';
                    $("#txtOrdList tbody").append(row);
                }
                if(errLow>0){
                    $('#btnConfirm').hide();
                }
                else{
                    $('#btnConfirm').show();

                }
            }, 'json'
        );

    }
    
    function loadTempProductInfo(ordDtId) {
        $.post('<?php echo accecc_url ?>', {'ordDtId': ordDtId},
            function (data) {
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
                $("#txtPrdName").attr('readonly',true);
                $("#txtPrdId").val(prdId);
                $("#txtCusPrdId").val(cusPrdId);
                $("#txtOrdDtId").val(ordDtId);
                $("#dtPrdName").text(prdDisplayName);
                $("#dtPrdBrand").text(brnName);
                $("#dtCatName").text(catName);
                $("#dtPrdCode").text('Code : '+prdCode);               
                $("#dtMessUnit").val(prdSize +' '+ prdUnit);

            }, 'json'
        );
    }

    $("#btnConfirm").click(function() {

        var postUrl = '<?php accecc_url ?>';

        var err =0;
        var txtOrdId = $("#txtOrdId").val();
        var txtCusId =  $("#txtCusId").val();
        var txtOrdPoNo =  $("#txtOrdPoNo").val();
        var txtOrdRemarks =  $("#txtOrdRemarks").val();
        var txtOrdDeliveryAdd1 =  $("#txtOrdDeliveryAdd1").val();
        var txtOrdDeliveryAdd2 =  $("#txtOrdDeliveryAdd2").val();
        var txtOrdDeliveryCity =  $("#txtOrdDeliveryCity").val();
        $('#txtOrdDeliveryAddErr').text('');
      
        if(err == 0) {
            swal({
                title: "Do you want to confirm this order",
                text: "",
                type: "warning",
                confirmButtonClass: "btn-primary",
                confirmButtonText: "Confirm",
                showCancelButton: true,
                closeOnConfirm: true
            },
            function () {
                $.post(postUrl, {
                        'txtCusId': txtCusId,
                        'txtOrdId': txtOrdId,
                        'txtOrdRemarks': txtOrdRemarks,
                        'txtOrdDeliveryAdd1': txtOrdDeliveryAdd1,
                        'txtOrdDeliveryAdd2': txtOrdDeliveryAdd2,
                        'txtOrdPoNo': txtOrdPoNo,
                        'txtOrdDeliveryCity': txtOrdDeliveryCity
                    },
                    function (data) {
                        if (data['status'] == true) {
                            swal("Order confirmation successfully saved", "", "success");

                            var grd_url2 = "<?php echo accecc_url ?>"+data['ord_id'];
                            window.open(
                                grd_url2,
                                '_self'
                            );
                        }
                        else if (data['status'] == false) {
                            swal("Unable to save the order confirmation", "", "error");

                        }
                        else if (data['status'] == "no_orddt") {
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
    
    
   

    