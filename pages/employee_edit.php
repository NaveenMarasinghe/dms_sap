<?php
  session_start();
    if (!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="4")) {
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
                    <h4 class="page-header"><b>Edit Employee Details</b></h4>
                </div>
                <form class="form-horizontal" role="form" id="form_updateCustomer">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="emp_id"> Employee ID </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input readonly type="text" id="emp_id"
                                    value="<?php echo $_GET['emp_id'] ?>"
                                    name="emp_id" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="emp_name"> Employee Name </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="text" id="emp_name" name="emp_name" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="emp_add"> Address </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="text" id="emp_add" name="emp_add" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="cus_route"> Telephone </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="text" id="emp_tel" name="emp_tel" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>


                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <a href="../pages/employee_view.php">
                                <button class="btn btn-default" type="button">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Cancel
                                </button> </a>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-info" type="button" id="addCustomerSave">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        document.title = "Edit Employee Details";

        $.noConflict();


        var empId = $("#emp_id").val();
        $.post("../controllers/controller_cus.php?type=getEmpDetails", {
                empId: empId
            },
            function(data, status) {
                if (status == "success") {
                    var jdata = jQuery.parseJSON(data);
                    $("#emp_name").val(jdata.emp_fullname);
                    $("#emp_add").val(jdata.emp_add);
                    $("#emp_tel").val(jdata.emp_tel);
                }
            });


    });

    $("#addCustomerSave").click(function() {

        if ($("#form_updateCustomer").valid()) {

            d = new FormData($("#form_updateCustomer")[0]);
            $.ajax({
                url: "../controllers/controller_cus.php?type=updateEmp",
                method: "POST",
                data: d,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire({
                        title: 'Employee Details Updated',
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        window.location.href = "employee_view.php";
                    })

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

                emp_name: {
                    required: true
                },
                emp_add: {
                    required: true
                },
                emp_tel: {
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
<?php require_once("../incl/footer.php");
