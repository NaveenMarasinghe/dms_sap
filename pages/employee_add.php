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
                    <h4 class="page-header"><b>Add New Employee</b></h4>
                </div>
                <form class="form-horizontal" role="form" id="form_addNewEmp">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="emp_id"> Employee ID </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input readonly type="text" id="emp_id" name="emp_id" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="cus_name"> Username </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="text" id="emp_name" name="emp_name" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="cus_name"> Full Name </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="text" id="emp_fullname" name="emp_fullname" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="emp_type"> Employee Type </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <select class="col-sm-6" id="emp_type" name="emp_type">
                                    <option value="">Select employee type</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="emp_pw"> Password </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="password" id="emp_pw" name="emp_pw" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="emp_pw2"> Confirm Password </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="password" id="emp_pw2" name="emp_pw2" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="emp_tel"> Telephone No </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="text" id="emp_tel" name="emp_tel" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="emp_add"> Address </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <textarea id="emp_add" name="emp_add" placeholder="" class="col-sm-6 "></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="emp_email"> Email </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="text" id="emp_email" name="emp_email" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="emp_dob"> Date of Birth </label>

                        <div class="col-sm-9">
                            <div class="clearfix">
                                <input type="text" id="emp_dob" name="emp_dob" placeholder="" class="col-sm-6" />
                            </div>
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">

                            <button class="btn btn-warning" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-info" type="button" id="addEmpSave">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
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
    $(document).ready(function() {

        $.noConflict();
        $('#emp_dob').datepicker({
            autoclose: true,
            todayHighlight: false,
            dateFormat: 'yy-mm-dd'
        });

        $.post("../controllers/controller_cus.php?type=getEmpType", {

            },
            function(data, status) {
                if (status == "success") {

                    $("#emp_type").empty();
                    $("#emp_type").append("<option value=''>Select employee type</option>");
                    $("#emp_type").append(data);
                }
            });


    });

    $("#addEmpSave").click(function() {
        //alert('data');
        if ($("#form_addNewEmp").valid()) {

            d = new FormData($("#form_addNewEmp")[0]);
            $.ajax({
                url: "../controllers/controller_cus.php?type=addNewEmp",
                method: "POST",
                data: d,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire(
                        'New Employee Added!',
                        '',
                        'success'
                    );
                    $('#form_addNewEmp')[0].reset();
                    // location.reload(true);
                    alert(data);

                }
            });
        }

    });

    jQuery(function($) {
        $('#form_addNewEmp').validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            ignore: "",
            rules: {

                emp_name: {

                    required: true
                },
                emp_fullname: {

                    required: true
                },
                emp_tel: {
                    required: true
                },
                emp_add: {

                    required: true
                },
                emp_email: {
                    required: true,
                    email: true
                },
                emp_dob: {
                    required: true
                },
                emp_type: {
                    required: true
                },
                emp_pw: {
                    required: true,
                    minlength: 8
                },
                emp_pw2: {
                    required: true,
                    minlength: 8,
                    equalTo: "#emp_pw"
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