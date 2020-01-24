<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="4")){
      header("location:../index.php");
    } 
?>

<?php require_once("../incl/header.php");?>
<?php require_once("../incl/sidebar.php");?>

<?php require_once("../incl/pagetop.php");?>

<div class="page-content">
	

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			
				

      <div class="form-actions">
      <div>       
        <h4 class="page-header"><b>Add New Supplier</b></h4>
      </div>
		<form class="form-horizontal" role="form" id="form_addNewSupplier">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier ID </label>

				<div class="col-sm-9">
					<div class="clearfix">
					<input readonly type="text" id="sup_id" name="sup_id" placeholder="" class="col-sm-6" />
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Name </label>

				<div class="col-sm-9">
					<div class="clearfix">
					<input type="text" id="sup_name" name="sup_name" placeholder="" class="col-sm-6" />
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Address </label>

				<div class="col-sm-9">
					<div class="clearfix">
					<input type="text" id="sup_name" name="sup_add" placeholder="" class="col-sm-6" />
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Telephone </label>

				<div class="col-sm-9">
					<div class="clearfix">
					<input type="text" id="sup_name" name="sup_tel" placeholder="" class="col-sm-6" />
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
					<button class="btn btn-info" type="button" id="addSupplierSave">
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
       $(document).ready(function(){
       	    $.noConflict();

       });

			$("#addSupplierSave").click(function(){
			//alert('data');
			if($("#form_addNewSupplier").valid()) {


			d= new FormData($("#form_addNewSupplier")[0]);
	       	$.ajax({
	            url:"../controllers/controller_products.php?type=addNewSupplier",
	            method:"POST",
	            data:d,
	            processData: false,
	            contentType: false,
	         success: function(data){
	         	$('#form_addNewSupplier')[0].reset();
		        location.reload(true);
	            //alert(data);

		      } 
		    }); 

	       }

		});

		jQuery(function($) {
				$('#form_addNewSupplier').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						// email: {
						// 	required: true,
						// 	email:true
						// },
						// password: {
						// 	required: true,
						// 	minlength: 5
						// },
						// password2: {
						// 	required: true,
						// 	minlength: 5,
						// 	equalTo: "#password"
						// },
						sup_id: {
							required: false
						},

						sup_name: {
							required: true
						},
						sup_add: {
							required: true
						},
						sup_tel: {
							required: true
						},
						sup_add: {
							required: true
						},

					},
			
					messages: {
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						},
						state: "Please choose state",
						subscription: "Please choose at least one option",
						gender: "Please choose gender",
						agree: "Please accept our policy"
					},
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},			
		
				});
		});

</script>

<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>
