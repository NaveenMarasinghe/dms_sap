<?php require_once("../incl/header.php");?>
<?php require_once("../incl/sidebar.php");?>
<?php require_once("../incl/pagetop.php");?>

<div class="page-content">
	

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->


      <div>       
        <h4 class="title"><b>Add New Product</b></h4>
      </div>
      <div >
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
				
				<select class="col-xs-10 col-sm-5" id="pro_supplier" name="pro_supplier">
					<option>Select Supplier</option>
				</select>
				<button class="btn btn-xs btn-success" type="button" id="addSupplier" name="addSupplier" data-toggle='modal' style="margin-left: 10px:" href="#modelAddSupplier">
					<i class="ace-icon fa fa-plus bigger-120"></i>
				</button>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Category </label>

			<div class="col-sm-9">
				
				<select class="col-xs-10 col-sm-5" id="pro_cat" name="pro_cat">
					<option>Select Product Category</option>
				</select>
				<button class="btn btn-xs btn-success" type="button" id="addProductCat" name="addProductCat" data-toggle='modal'
					href="#modelAddProductCat" style="margin-left: 10px:">
					<i class="ace-icon fa fa-plus bigger-120"></i>
				</button>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Sub Category </label>

			<div class="col-sm-9">
				
				<select class="col-xs-10 col-sm-5" id="pro_subcat" name="pro_subcat">
					<option>Select Product Sub Category</option>
				</select>
				<button class="btn btn-xs btn-success" type="button" id="addProductSubCat" name="addProductSubCat" data-toggle='modal'
					href="#modelAddProductSubCat" style="margin-left: 10px:">
					<i class="ace-icon fa fa-plus bigger-120"></i>
				</button>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name </label>

			<div class="col-sm-9">
				<input type="text" class="col-xs-10 col-sm-5" id="pro_name" name="pro_name""/>
				
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Image </label>

			<div class="col-sm-9">
				<input type="file" class="col-xs-10 col-sm-5" id="pro_image" name="pro_image" onchange="readURL(this);"/>
				
			</div>
		</div>







			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="button" id="btn_addProductSubmit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Submit
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>
				</div>
			</div>
    	</div>
      	</form>

		<div class="modal fade" id="modelAddSupplier" tabindex="-1" >
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
									<input readonly type="text" id="sup_id" name="sup_id" placeholder="" class="col-xs-10 col-sm-8" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Name </label>

								<div class="col-sm-9">
									<input type="text" id="sup_name" name="sup_name" placeholder="" class="col-xs-10 col-sm-8" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Address </label>

								<div class="col-sm-9">
									<input type="text" id="sup_add" name="sup_add" placeholder="" class="col-xs-10 col-sm-8" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier Telephone </label>

								<div class="col-sm-9">
									<input type="text" id="sup_tel" name="sup_tel" placeholder="" class="col-xs-10 col-sm-8" />
								</div>
							</div>

							</form>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-sm" data-dismiss="modal">
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
									<input type="text" id="procat_supid" name="procat_supid" placeholder="" class="col-xs-10 col-sm-8" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Category </label>

								<div class="col-sm-9">
									<input type="text" id="procat_procat" name="procat_procat" placeholder="" class="col-xs-10 col-sm-8" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Category Description </label>

								<div class="col-sm-9">
									<textarea class="col-xs-10 col-sm-8" id="form-field-8" placeholder="" id="procat_prodes" name="procat_prodes"></textarea>
									
								</div>
							</div>

							</form>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-sm" data-dismiss="modal">
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
									<input type="text" id="sup_id" name="subid" placeholder="" class="col-xs-10 col-sm-8" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Category </label>

								<div class="col-sm-9">
									<input type="text" id="sup_name" name="sup_name" placeholder="" class="col-xs-10 col-sm-8" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Sub Category </label>

								<div class="col-sm-9">
									<input type="text" id="sup_add" name="sup_add" placeholder="" class="col-xs-10 col-sm-8" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Sub Category Description </label>

								<div class="col-sm-9">
									<textarea class="col-xs-10 col-sm-8" id="form-field-8" placeholder=""></textarea>
								</div>
							</div>

							</form>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-sm" data-dismiss="modal">
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
		       $.ajax({
		            url:"../controllers/controller_products.php?type=selectSupplierLoad",
		            method:"POST",
		            processData: false,
		            contentType: false,
		          success: function(data){
		            //alert(data);
		         //load success message 
		        $('#pro_supplier').append(data);
                       
		      } 
		    }); 

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
	        $("#pro_subcat").append("<option value=''>Select Product Sub Category</option>");
	        $("#pro_cat").append("<option value=''>Select Product Category</option>");
	        $("#pro_cat").append(data);
	        }
	      });
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

		$("#btn_addProductSubmit").click(function(){
			f= new FormData($("#form_addNewProduct")[0]);

		       $.ajax({
		            url:"../controllers/controller_products.php?type=addNewProduct",
		            method:"POST",
		            data:f,
		            processData: false,
		            contentType: false,
		          success: function(data){
		            alert(data);
		         //load success message 
		          if(data=="success"){
		          $('#form_addNewProduct')[0].reset();
		          location.reload(true);

		          //loads new student registration form
		          //$("#content").load("views/productform.php"); 

		          
		        }
		      } 
		    }); 


		});

		$("#addProductCat").click(function(){
			var supplierval = $('#pro_supplier').val();

			$("#procat_supid").append(supplierval);

		});



		$("#addSupplierSave").click(function(){


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

		});

		$("#addProductCatSave").click(function(){


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

		});

		$("#addProductSubCatSave").click(function(){


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

		});


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
<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>
