<?php require_once("../incl/header.php");?>
<?php require_once("../incl/sidebar.php");?>
<?php require_once("../incl/pagetop.php");?>

<div class="page-content">
	

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->

	<div class="form-actions">
      <div>   
      	<div class="col-sm-3">
      	</div>  
      	<div class="col-sm-9">  
        <h4 class="page-header"><b>Add New Product</b></h4>
    	</div>
      </div>
      
      	<form class="form-horizontal" role="form" id="form_addNewProduct">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product ID </label>

			<div class="col-sm-9">
				<input readonly type="text" id="pro_id" name="pro_id" placeholder="" class="col-xs-10 col-sm-5" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Name </label>

			<div class="col-sm-9">
				<div class="clearfix">
				<select class="col-xs-10 col-sm-5" id="pro_supplier" name="pro_supplier">
					<option value="">Select Supplier</option>
				</select>
				<button class="btn btn-xs btn-success" type="button" id="addSupplier" name="addSupplier" data-toggle="modal" style="margin-left: 10px:" href="#modelAddSupplier">
					<i class="ace-icon fa fa-plus bigger-120"></i>
				</button>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Category </label>

			<div class="col-sm-9">
				<div class="clearfix">
				<select class="col-xs-10 col-sm-5" id="pro_cat" name="pro_cat">
					<option value="">Select Product Category</option>
				</select>
				<button class="btn btn-xs btn-success" type="button" id="addProductCat" name="addProductCat" data-toggle='modal'
					href="#modelAddProductCat" style="margin-left: 10px:">
					<i class="ace-icon fa fa-plus bigger-120"></i>
				</button>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Sub Category </label>
			<div class="clearfix">
				<div class="col-sm-9">		
					<div class="clearfix">		
					<select class="col-xs-10 col-sm-5" id="pro_subcat" name="pro_subcat">
						<option value="">Select Product Sub Category</option>
					</select>

					<button class="btn btn-xs btn-success" type="button" id="addProductSubCat" name="addProductSubCat" data-toggle='modal'
						href="#modelAddProductSubCat" style="margin-left: 10px:">
						<i class="ace-icon fa fa-plus bigger-120"></i>
					</button>
					</div>
				</div>
			</div>
		</div>

<!-- 		<div class="form-group">
			<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Company URL:</label>

			<div class="col-xs-12 col-sm-9">
				<div class="clearfix">
					<input type="text" id="url" name="url" class="col-xs-12 col-sm-8" />
				</div>
			</div>
		</div> -->

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name </label>

			<div class="col-sm-9">
				<div class="clearfix">
				<input type="text" class="col-xs-10 col-sm-5" id="pro_name" name="pro_name""/>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Image </label>

			<div class="col-sm-9">
				<div class="clearfix">
				<input type="file" class="col-xs-10 col-sm-5" id="pro_image" name="pro_image" onchange="readURL(this);"/>
				</div>
			</div>
		</div>

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					
					<button class="btn btn-grey" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn btn-info" type="button" id="btn_addProductSubmit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Submit
					</button>
				</div>
			</div>
		</form>
    	</div>


      	<div id="dialog-message" class="hide">
<!-- 			<p>
				This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.
			</p>

			<div class="hr hr-12 hr-double"></div> -->
			<h4 class='smaller align-center'><i class='ace-icon fa fa-check'></i> New Product Added Successfully</h4>

<!-- 					<div class="modal-body">
						<div class="row">
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name </label>

								<div class="col-sm-9">
									<div class="clearfix">
									<input type="text" id="productAddedModal" name="productAddedModal" placeholder="" class="col-xs-10 col-sm-8" />
									</div>
								</div>
							</div>					
						</div>
					</div> -->

		</div><!-- #dialog-message -->

		<div class="modal fade" id="modelAddSupplier" class="hide">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h4 class="blue bigger">Please fill the following form fields</h4>
					</div>

					<div class="modal-body">
						<div class="row">
							<form class="form-horizontal" role="form" id="form_addNewSupplier">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier ID </label>

								<div class="col-sm-9">
									<div class="clearfix">
									<input readonly type="text" id="sup_id" name="sup_id" placeholder="" class="col-xs-10 col-sm-8" />
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Name </label>

								<div class="col-sm-9">
									<div class="clearfix">
									<input type="text" id="sup_name" name="sup_name" placeholder="" class="col-xs-10 col-sm-8" />
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Address </label>

								<div class="col-sm-9">
									<div class="clearfix">
									<input type="text" id="sup_name" name="sup_add" placeholder="" class="col-xs-10 col-sm-8" />
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Telephone </label>

								<div class="col-sm-9">
									<div class="clearfix">
									<input type="text" id="sup_name" name="sup_tel" placeholder="" class="col-xs-10 col-sm-8" />
									</div>
								</div>
							</div>


							</form>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-sm btn-warning" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Cancel
						</button>

						<button class="btn btn-sm btn-primary" id="addSupplierSave">
							<i class="ace-icon fa fa-check"></i>
							Save
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modelAddProductCat" tabindex="-1" >
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h4 class="blue bigger">Please fill the following form fields</h4>
					</div>

					<div class="modal-body">
						<div class="row">
							<form class="form-horizontal" role="form" id="form_addNewProductCat">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier </label>

								<div class="col-sm-9">
<!-- 									<input type="text" id="procat_supid" name="procat_supid" placeholder="" class="col-xs-10 col-sm-8" /> -->					
								<div class="clearfix">
									<select class="col-xs-10 col-sm-8" id="procat_supplier" name="procat_supplier">
										<option value="">Select Supplier</option>
									</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Category </label>

								<div class="col-sm-9">
									<div class="clearfix">
									<input type="text" id="procat_procat" name="procat_procat" placeholder="" class="col-xs-10 col-sm-8" />
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Category Description </label>

								<div class="col-sm-9">
									<div class="clearfix">
									<textarea class="col-xs-10 col-sm-8" id="form-field-8" placeholder="" id="procat_prodes" name="procat_prodes"></textarea>
									</div>
								</div>
							</div>

							</form>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-sm btn-warning" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Cancel
						</button>

						<button class="btn btn-sm btn-primary" id="addProductCatSave">
							<i class="ace-icon fa fa-check"></i>
							Save
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modelAddProductSubCat" tabindex="-1" >
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h4 class="blue bigger">Please fill the following form fields</h4>
					</div>

					<div class="modal-body">
						<div class="row">
							<form class="form-horizontal" role="form" id="form_addNewProductSubCat">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier </label>

								<div class="col-sm-9">
									<!-- <input type="text" id="sup_id" name="subid" placeholder="" class="col-xs-10 col-sm-8" /> -->
									<div class="clearfix">
									<select class="col-xs-10 col-sm-8" id="prosubcat_supplier" name="prosubcat_supplier">
										<option value="">Select Supplier</option>
									</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Category </label>

								<div class="col-sm-9">
									<div class="clearfix">
									<select class="col-xs-10 col-sm-8" id="prosubcat_procat" name="prosubcat_procat">
										<option value="">Select Product Category</option>
									</select>
									<!-- <input type="text" id="prosubcat_procat" name="prosubcat_procat" placeholder="" class="col-xs-10 col-sm-8" /> -->
								</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Sub Category </label>

								<div class="col-sm-9">
									<div class="clearfix">
									<input type="text" id="prosubcat_prosubcat" name="prosubcat_prosubcat" placeholder="" class="col-xs-10 col-sm-8" />
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Sub Category Description </label>

								<div class="col-sm-9">
									<div class="clearfix">
									<textarea class="col-xs-10 col-sm-8" id="prosubcat_subcatdes" name="prosubcat_subcatdes" placeholder=""></textarea>
									</div>
								</div>
							</div>

							</form>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-sm btn-warning" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Cancel
						</button>

						<button class="btn btn-sm btn-primary" id="addProductSubCatSave">
							<i class="ace-icon fa fa-check"></i>
							Save
						</button>
					</div>
				</div>
			</div>
		</div>
					


  


			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content --> 
	<script type="text/javascript">
		$(document).ready(function(){

				$.noConflict();
		       $.ajax({
		            url:"../controllers/controller_products.php?type=selectSupplierLoad",
		            method:"POST",
		            processData: false,
		            contentType: false,
		          success: function(data){
		            //alert(data);
		         //load success message 
		        $('#pro_supplier').append(data);
                $('#procat_supplier').append(data);      
                $('#prosubcat_supplier').append(data); 
		      } 
		    }); 


		   	// 		jQuery.validator.addMethod('selectcheck', function(value){
						// return (value != '0');
						// }, "not found");



		});


	    $('#pro_supplier').change(function(){
	      // alert("gg");
	      // table
	      //   .columns(4)
	      //   .search(this.value)
	      //   .draw();
	      // $.noConflict();

	      var supplierval = this.value; // get option's value
	      // get filtered data to datatable
	      
	      //change product category select box
	      $.post("../controllers/controller_products.php?type=get_filteredProCat",
	      {supplierval:supplierval},
	      function(data,status){
	      if(status=="success"){
	        // alert(data);
	        $("#pro_cat").empty();
	        $("#pro_subcat").empty();

	        // $('#procat_supplier').empty();      
         //    $('#prosubcat_supplier').empty();

         //    $("#prosubcat_supplier").append("<option value=''>Select Product Sub Category</option>");
	        // $("#procat_supplier").append("<option value=''>Select Product Category</option>");

	        $("#pro_subcat").append("<option value=''>Select Product Sub Category</option>");
	        $("#pro_cat").append("<option value=''>Select Product Category</option>");
	        
	        $("#pro_cat").append(data);


	        }
	      });

		    //   $.post("../controllers/controller_products.php?type=selectSupplierLoadModal",
		    //   {supplierval:supplierval},
		    //   function(data,status){
		    //   if(status=="success"){
		    //         //alert(data);
		    //      //load success message 

	     //        $('#procat_supplier').append(data);      
	     //        $('#prosubcat_supplier').append(data); 
		    //   } 
		    // }); 
	    });

		$('#pro_cat').change(function(){
	      var procatval = this.value; // get option's value
	      // get filtered data to datatable
	      $.post("../controllers/controller_products.php?type=get_filteredSubCat",
	      {procatval:procatval},
	      function(data,status){
	      if(status=="success"){
	        // alert(data);
	        $("#pro_subcat").empty();
	        $("#pro_subcat").append("<option value=''>Select Product Sub Category</option>");
	        $("#pro_subcat").append(data);
	        }
	      });
	    });



		$("#prosubcat_supplier").change(function(){
	      var supplierval = this.value; // get option's value
	      // get filtered data to datatable
	      //alert(supplierval);
	      $.post("../controllers/controller_products.php?type=get_filteredProCat",
	      {supplierval:supplierval},
	      function(data,status){
	      if(status=="success"){
	        //alert(data);
	        $("#prosubcat_procat").empty();
	        $("#prosubcat_procat").append("<option value=''>Select Product Category</option>");
	        $("#prosubcat_procat").append(data);
	        }
	      });

		});

		jQuery(function($) {

				$('#form_addNewProduct').validate({
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
						pro_id: {
							required: false
						},
						// phone: {
						// 	required: true,
						// 	phone: 'required'
						// },
						// url: {
						// 	required: true,
						// 	url: true
						// },
						pro_supplier: {
							required: true
						},
						pro_cat: {
							required: true
						},
						pro_subcat: {
							required: true
						},
						pro_name: {
							required: true
						},
						// gender: {
						// 	required: true,
						// },
						// agree: {
						// 	required: true,
						// }
					},
			
					messages: {
						pro_id: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						pro_supplier: {
							required: "Please choose supplier.",
						},
						pro_cat: "Please choose product category",
						pro_subcat: "Please provide a product sub category",
						pro_name: "Please enter a valid name"
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
					


					// submitHandler: function (form) {

					// },
					// invalidHandler: function (form) {
					// }
				});



		})



		$("#btn_addProductSubmit").click(function(){
			// var form = $("#form_addNewProduct");
			// form.validate();

			if($("#form_addNewProduct").valid()) {

			f= new FormData($("#form_addNewProduct")[0]);
				
		       $.ajax({
		            url:"../controllers/controller_products.php?type=addNewProduct",
		            method:"POST",
		            data:f,
		            processData: false,
		            contentType: false,
		          success: function(data){
		            //alert(data);
		         //load success message 
		          if(data=="Success"){
		          // Add product name to modal
		          // var supplierval2 = $('#pro_name').val();
		          // $('#productAddedModal').append(supplierval2);

		          	//alert(data);
		          $('#form_addNewProduct')[0].reset();
		          // location.reload(true);


				//override dialog's title function to allow for HTML titles
				$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
					_title: function(title) {
						var $title = this.options.title || '&nbsp;'
						if( ("title_html" in this.options) && this.options.title_html == true )
							title.html($title);
						else title.text($title);
					}
				}));
			

					// e.preventDefault();
			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						modal: true,
						title: "<div class='widget-header widget-header-small'><h4 class='smaller'></h4></div>",
						title_html: true,
						buttons: [ 
							{
								text: "OK",
								"class" : "btn btn-sm btn-primary",
								click: function() {
									$( this ).dialog( "close" ); 
								} 
							}
						]
					});
			
					/**
					dialog.data( "uiDialog" )._title = function(title) {
						title.html( this.options.title );
					};
					**/


		          //loads new student registration form
		          //$("#content").load("views/productform.php"); 

		          
		        }
		      } 
		    }); 

			}





		});

		// $("#addProductCat").click(function(){
		// 	var supplierval = $('#pro_supplier').val();

		// 	$("#procat_supid").append(supplierval);

		// });



		$("#addSupplierSave").click(function(){

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

		$("#addProductCatSave").click(function(){

			if($("#form_addNewProductCat").valid()) {


			d= new FormData($("#form_addNewProductCat")[0]);
	       	$.ajax({
	            url:"../controllers/controller_products.php?type=addNewProductCat",
	            method:"POST",
	            data:d,
	            processData: false,
	            contentType: false,
	         success: function(data){
	         	$('#form_addNewProductCat')[0].reset();
		        location.reload(true);
	            //alert(data);

		      } 
		    }); 
	       }
		});

		$("#addProductSubCatSave").click(function(){
			if($("#form_addNewProductSubCat").valid()) {

			d= new FormData($("#form_addNewProductSubCat")[0]);
	       	$.ajax({
	            url:"../controllers/controller_products.php?type=addNewProductSubCat",
	            method:"POST",
	            data:d,
	            processData: false,
	            contentType: false,
	         success: function(data){
	         	$('#form_addNewProductSubCat')[0].reset();
		        location.reload(true);
	            //alert(data);

		      } 
		    }); 
	       }
		});

		jQuery(function($) {

				// .on('actionclicked.fu.wizard' , function(e, info){
				// 	if(info.step == 1 && $validation) {
				// 		if(!$('#validation-form').valid()) e.preventDefault();
				// 	}
				// })



				// $("#btn_addProductSubmit").click(function(){
				// 	if(!$('#validation-form').valid());
				// 	alert("hhh");
				// });
				$('#form_addNewProductCat').validate({
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
						procat_supplier: {
							required: true
						},

						procat_procat: {
							required: true
						},
						procat_prodes: {
							required: true
						},
						pro_subcat: {
							required: true
						},
						pro_name: {
							required: true
						},
						// gender: {
						// 	required: true,
						// },
						// agree: {
						// 	required: true,
						// }
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

				$('#form_addNewProductSubCat').validate({
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
						prosubcat_supplier: {
							required: true
						},
						// phone: {
						// 	required: true,
						// 	phone: 'required'
						// },
						prosubcat_procat: {
							required: true
						},
						prosubcat_prosubcat: {
							required: true
						},
						prosubcat_subcatdes: {
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

		})


	</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");


		</script>

		<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../assets/js/chosen.jquery.min.js"></script>
		<script src="../assets/js/spinbox.min.js"></script>
		<script src="../assets/js/bootstrap-datepicker.min.js"></script>
		<script src="../assets/js/bootstrap-timepicker.min.js"></script>
		<script src="../assets/js/moment.min.js"></script>
		<script src="../assets/js/daterangepicker.min.js"></script>
		<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="../assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="../assets/js/jquery.knob.min.js"></script>
		<script src="../assets/js/autosize.min.js"></script>
		<script src="../assets/js/jquery.inputlimiter.min.js"></script>
		<script src="../assets/js/jquery.maskedinput.min.js"></script>
		<script src="../assets/js/bootstrap-tag.min.js"></script>
		<script src="../assets/js/jquery.validate.min.js"></script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>
