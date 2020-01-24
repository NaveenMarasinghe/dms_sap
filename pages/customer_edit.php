<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="4")){
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
                <div class="col-sm-3">

                </div>
                <div class="col-sm-9">
                    <h4 class="page-header"><b>Edit Customer</b></h4>
                </div>
                <form class="form-horizontal" role="form" id="form_updateCustomer">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="cus_id"> Customer ID </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input readonly type="text" id="cus_id" value="<?php echo $_GET['cus_id'] ?>" name="cus_id" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="cus_name"> Customer Name </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="text" id="cus_name" name="cus_name" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="cus_ter"> Territory </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <select class="col-sm-6" id="cus_ter" name="cus_ter">
                                    <option value="">Select Territory</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="cus_route"> Route </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <select class="col-sm-6" id="cus_route" name="cus_route">
                                    <option value="">Select Route</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="cus_add"> Address </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="text" id="cus_add" name="cus_add" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="cus_tel"> Telephone </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="text" id="cus_tel" name="cus_tel" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            
                            <button id="btnCancel2" onclick="reloadPage()" class="btn btn-default">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Cancel
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-info" type="button" id="addCustomerSave">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>




            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->

<script type="text/javascript">
        function reloadPage(){
            window.location.href = "customer_view.php";
        }

    $(document).ready(function() {


        $.noConflict();


        $.post("../controllers/controller_cus.php?type=getTerritory", {

            },
            function(data, status) {
                if (status == "success") {

                    $("#cus_ter").empty();
                    $("#cus_ter").append("<option value=''>Select Territory</option>");
                    $("#cus_ter").append(data);
                }
            });
            // $("#btnCancel2").click(function(){
            //     window.location.href = "customer_view.php";
            // });

        $("#cus_ter").change(function() {
            var custer = $("#cus_ter").val(); // get option's value
            // get filtered data to datatable

            $.post("../controllers/controller_cus.php?type=getRoute", {
                    custer: custer
                },
                function(data, status) {
                    if (status == "success") {

                        $("#cus_route").empty();
                        $("#cus_route").append("<option value=''>Select Route</option>");
                        $("#cus_route").append(data);
                    }
                });

        });

    });

    $("#addCustomerSave").click(function() {
        //alert('data');
        if ($("#form_updateCustomer").valid()) {

            d = new FormData($("#form_updateCustomer")[0]);
            $.ajax({
                url: "../controllers/controller_cus.php?type=updateCustomer",
                method: "POST",
                data: d,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire({
                        title: 'Customer Details Updated',                        
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        window.location.href = "customer_view.php";
                    })
                    
                    // location.reload(true);
                    //alert(data);

                }
            });
        }

    });

    jQuery(function($) {
        $('#form_updateCustomer').validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            ignore: "",
            rules: {

                cus_name: {
                    
                    required: true
                },

                cus_route: {
                    required: true
                },
                cus_ter: {
                    required: true
                },


            },

            messages: {
                state: "Please choose state",
                subscription: "Please choose at least one option",
                gender: "Please choose gender",
                agree: "Please accept our policy"
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
</script>

<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>