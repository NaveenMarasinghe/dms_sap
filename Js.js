$(document).ready(function() {

    $(".steps-validation").steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        titleTemplate: '<span class="number">#index#</span> #title#',
        autoFocus: true,
        onStepChanging: function(event, currentIndex, newIndex) {

            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }

            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {

                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }

            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            var form = $(this).serialize();
            $.ajax({
                url: "/POS/InvoiceSave",
                type: "POST",
                data: form,
                dataType: "json",
                success: function(response) {
                    //preventDefault();
                    if (response.Value == true) {
                    swal({
                            title: "Request Submitted Successfully!",
                            text: "Click OK to Continue",
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                location.reload();
                            }
                        });
                    }
                    ////$('#target').html(response);
                    //$("html, body").animate({ scrollTop: 0 }, "slow");
                },
                error: function(xhr, status, error) {
                    //var err = eval("(" + xhr.responseText + ")");
                    //alert(err.Message);
                    swal({
                        title: "Something went wrong!",
                        //text: "Quantity value must be a positive number",
                        confirmButtonColor: "#2196F3",
                        type: "error"
                    });
                }
            });

        },
        onFinished: function(event, currentIndex) {
            //form.submit();
        }
    });

    var form = $(".steps-validation").show();
    // Initialize validation
    $(".steps-validation").validate({
        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") ||
                element.parents('div').hasClass("choice") ||
                element.parent().hasClass('bootstrap-switch-container')) {
                if (element.parents('label').hasClass('checkbox-inline') ||
                    element.parents('label').hasClass('radio-inline')) {
                    error.appendTo(element.parent().parent().parent().parent());
                } else {
                    error.appendTo(element.parent().parent().parent().parent().parent());
                }
            }
            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo(element.parent().parent().parent());
            }
            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo(element.parent());
            }
            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') ||
                element.parents('label').hasClass('radio-inline')) {
                error.appendTo(element.parent().parent());
            }
            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo(element.parent().parent());
            } else {
                error.insertAfter(element);
            }
        }
        //rules: {
        //    PoNumberList: {
        //        required: true
        //    },
        //    email: {
        //        email: true
        //    }
        //}
    });


    $(".select-search").select2();

    $("#invoice-body").hide();
    $("#table-content").hide();


    $("#select-cust").change(function() {
        var address = " ";
        var name = "";
        var html = "";
        var telNo = 0;
        var val = $(this).val();
        //var companyName = "";
        $.getJSON("/Customer/GetCustomerById",
            { id: val },
            function(data) {
                if (data.Address != null) {
                    address = data.Address;

                }
                if (data.Phone != null) {
                    telNo = data.Phone;

                }
                if (data.CompanyName == null) {
                    name = data.ContactTitle + ". " + data.ContactName;
                } else {
                    name = data.CompanyName;

                }
                html = ' <div class"row"><div class"col-md-4"><div class="text-bold " style="font-size:16px;">' +
                    name +
                    '</div><span >' +
                    telNo +
                    '  <br>  ' +
                    address +
                    ' </div> <div class="col-md-1"></div></div><hr/>';

                $("#add-info").html(html);
            });
    });


    $("#category_id").change(function() {
        //$("#add_product_form :input").prop("disabled", false);

        //var value = $("#category_id").val();
        var values = $(this).val();
        //$("#category_id_modal").val(values).change();

        //$("#man_type_input").reset();

        //'@Url.Action("DropDownListGenerate", "SubCategory", new {Id = 1})

        $.getJSON("/SubCategory/DropDownListGenerate",
            { Id: values },
            function(data) {
                $("#subcategory_id").empty();
                $("#subcategory_id")
                    .append("<option value='' selected>-- Select Sub-Category Type --</option>");
                $.each(data,
                    function(index, row) {
                        $("#subcategory_id")
                            .append(
                                `<option value=${row.SubCategoryId}>${row.SubCategoryName
                                } </option>`);

                    });


            });
        $.get("/POS/FilteredProducts",
            { cId: values },
            function(data) {
                $("#fil-table").empty();

                $("#fil-table").html(data);

                $(".dataTable").DataTable(
                    {
                        pageLength: 5,
                        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
                    });

                $("#table-content").show();
                $(".styled").uniform();
                //$('html, body').animate({ scrollTop: 170 }, 300);


            });
    });

    $("#product-select").change(function() {
        var values = $(this).val();


        $.get("/POS/FilteredProducts",
            { pId: values },
            function(data) {
                $("#fil-table").empty();

                $("#fil-table").html(data);
                $("#table-content").show();

                $(".dataTable").DataTable({
                    responsive: true,
                    pageLength: 5,
                    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
                });
                $(".styled").uniform();
                //$('html, body').animate({ scrollTop: 170 }, 300);


            });

    });

    $("#subcategory_id").change(function() {
        var values = $(this).val();


        $.get("/POS/FilteredProducts",
            { sId: values },
            function(data) {
                $("#fil-table").empty();

                $("#fil-table").html(data);
                $("#table-content").show();

                $(".dataTable").DataTable({
                    responsive: true,
                    pageLength: 5,
                    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
                });
                $(".styled").uniform();
                //$('html, body').animate({ scrollTop: 170 }, 300);


            });

    });
    var discTotal = function() {

        var subT = parseInt($('.sub-total').val());
        $('.final-total').val('Rs ' + subT.toLocaleString() + '.00');
    };
    var totalCal = function() {
        var total = 0.00;
        var subTot = 0;
        var rows = $("#invoice-table tbody").children('tr');

        $.each(rows,
            function(index, row) {
                subTot = $(this).find('.end-val').val();
                subTot = parseFloat(subTot.replace(/,/g, ''));

                total = parseFloat(total) + parseFloat(subTot.toFixed(2));
                total = total.toFixed(2);
            });

        $(".sub-total").val(total.toLocaleString()).change();
        $('.full-disc').val(0);
        discTotal();
    };
    var glCount = 0;
    $(document).on('change',
        '.got-ticked',
        function() {
            var prName = $(this).closest('tr').find(".product-name").text().trim();
            var quantity = $(this).closest('tr').find(".quantity").text().trim();
            var vals = $(this).closest('tr').find(".sel-price").text().trim();
            var productId = $(this).closest('tr').find("#ProductId").val();

            //var reorderLevel = $(this).closest('tr').find("input[name='ReOrderLevel']").val();
            var selPrice = parseFloat(vals.replace(/,/g, ''));

            var html = "<tr><td class='header-style  col-md-3 product-name-invoice'>" +
                prName +
                "</td> <td class='header-style  col-md-2 description'>" +
                "<input class='form-control header-style col-md-2'/>" +
                "</td>" +
                "<td class='text-bold header-style col-md-2'><input type='hidden'  name='ProductId-" +
                glCount +
                "' class='productid-val' value='" +
                productId +
                "'/><input type='hidden'  class='stock-val' value='" +
                quantity +
                "'/><input class='form-control numb quantity-val touchspin-set-value header-style' value='1'  name='Quantity-" +
                glCount +
                "' type='number'/></td> <td class='text-bold  header-style'> <input class='form-control selPrice-val' type='number' name='SelPrice-" +
                glCount +
                "' value='" +
                selPrice +
                "' />" +
                "</td >" +
                "<td class='text-bold input-group '><input  class='form-control numb disc-val touchspin-set-value header-style' name='Discount-" +
                glCount +
                "' value='0' type='number' /><span class='input-group-addon'>%</span></td> " +
                "<td class='text-bold header-style col-md-1'><input class='form-control end-val header-style text-right'  name='EndVal-" +
                glCount +
                "' readonly value='" +
                selPrice +
                "' /></td> <td><a class='minus-row'><i class='icon-minus-circle2 ' style='color:#9e0008;font-size:18px;'></i></a></td> </tr> ";

            $("#invoice-table tbody").append(html);
            ++glCount;

            $("#invoice-body").show();

            //$(".touchspin-set-value").TouchSpin({
            //    initval: 10
            //});
            totalCal();


            //$(".touchspin-vertical").TouchSpin({
            //    verticalbuttons: true,
            //    verticalupclass: 'icon-arrow-up22',
            //    verticaldownclass: 'icon-arrow-down22'
            //});
            $('html, body').animate({ scrollTop: 300 }, 300);
        });


    $("#invoice-table").on('change',
        '.numb',
        function() {

            var val = $(this).val();

            if (val < 0) {
                $(this).val(0);
            }
        });

    $(document).on('change',
        '.numb',
        function() {

            var val = $(this).val();

            if (val < 0) {
                $(this).val(0);
            }
        });

    $(".full-disc").change(function() {
        var finalTotal = 0.00;
        var disc = $(this).val();
        var subTot = parseFloat($(".sub-total").val());
        var discAm = 100 - parseInt(disc);
        finalTotal = parseFloat(subTot) * parseFloat(discAm / 100);
        //finalTotal = finalTotal.toFixed(2);
        finalTotal = parseInt(finalTotal);
        $(".final-total").val('Rs ' + finalTotal.toLocaleString() + '.00');

    });
    $("#invoice-table").on('change',
        '.quantity-val',
        function() {

            var quan = parseInt($(this).val());

            var reorder = parseInt($(this).closest('tr').find(".stock-val").val());
            if (quan > reorder) {
                swal({
                    title: "Entered Quantity Value is Greater than Available Stock!",
                    text: "Available stock : " + reorder + "",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                });
                $(this).val(0);
                return false;
            }
            var unitPrice = $(this).closest('tr').find(".selPrice-val").val();
            //var unitPrice = parseFloat(val.replace(/,/g, ''));


            var endVal = parseFloat(quan) * parseFloat(unitPrice);

            $(this).closest('tr').find(".end-val").val(endVal.toLocaleString());

            $(this).closest('tr').find(".disc-val").val(0);

            totalCal();


        });


    $("#invoice-table").on('change',
        '.disc-val',
        function() {

            var disc = $(this).val();
            var discAm = 100 - parseInt(disc);
            var unitPrice = $(this).closest('tr').find(".selPrice-val").val();
            var quan = $(this).closest('tr').find(".quantity-val").val();

            var subTotal = parseFloat(quan) * parseFloat(unitPrice);

            //var valss = $(".end-val").val();
            //var endVal = parseFloat(subTotal.replace(/,/g, ''));

            //var unitPrice = parseFloat(val.replace(/,/g, ''));

            var endTotal = parseFloat(subTotal) * parseFloat(discAm / 100);
            //var endVal = parseFloat(quan) * parseFloat(unitPrice);

            $(this).closest('tr').find(".end-val").val(endTotal.toLocaleString());

            totalCal();


        });

    $("#invoice-table").on('click',
        '.minus-row',
        function() {
            $(this).closest('tr').remove();
            totalCal();
        });

    $("#discard-btn").click(function() {

        swal({
                title: "Are you sure you want to discard this invoice",
                confirmButtonColor: "#d93838",

                type: "warning",

                cancelButtonText: "No",
                showCancelButton: true,
                cancelButtonColor: "#5f3ce8",
                //confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes"
                //cancelButtonClass: "btn-primary",

                //closeOnConfirm: false,
                //closeOnCancel: false,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $("#invoice-table tbody").empty();

                    $("#invoice-body").hide();
                }
            });


    });

    $("#select-cust").change(function() {

        $(this).val();


        var html = '<div class="form-group col-md-12">' +
            '                                <label class="control-label col-md-2">Select Payment Option</label>' +
            '                                <div class="col-md-2">' +
            '                                    <select class="form-control select-search-2" onchange="payment(event)" id="payment-option" data-placeholder="--Select Payment Type--" name="PaymentOption">' +
            '                                        <option value="">--Select Payment Type--</option>' +
            '                                        <option value="Cash">Cash</option>' +
            '                                        <option value="Cheque">Cheque</option>' +
            '                                        <option value="Credit">Credit</option>' +
            '                                    </select>' +
            '                                </div>' +
            '                                ' +
            '                            </div>';

        $("#payment-meth").html(html);

        $(".select-search-2").select2();


    });

    $(".print-btn").click(function() {
        //Get the HTML of div

        //var divElements = $("#invoice-table").html();

        ////Get the HTML of whole page
        //var oldPage = document.body.innerHTML;

        ////Reset the pages HTML with divs HTML only

        //document.body.innerHTML =
        //    "<html><head><title></title></head><body>" +
        //    divElements +
        //    "</body>";


        //Print Page
        window.print();

        //Restore orignal HTML
        //document.body.innerHTML = oldPage;

    
    });


});
