<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="2") || ($_SESSION["user"]["utype"]=="3")){
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

			<div class="widget-box">
				<div class="widget-header widget-header-blue widget-header-flat">
					<h4 class="widget-title lighter">Create GRN Wizard</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<div id="fuelux-wizard-container">
							<div>
								<ul class="steps">
									<li data-step="1" class="active">
										<span class="step">1</span>
										<span class="title">Select Supplier</span>
									</li>

									<li data-step="2">
										<span class="step">2</span>
										<span class="title">Product List</span>
									</li>

									<!-- <li data-step="3">
										<span class="step">3</span>
										<span class="title">Complete GRN</span>
									</li> -->

									<!-- 								<li data-step="4">
									<span class="step">4</span>
									<span class="title">Other Info</span>
								</li> -->
								</ul>
							</div>

							<hr />

							<div class="step-content pos-rel">
								<div class="step-pane active" data-step="1">
									<!-- <h3 class="lighter block green">Enter the following information</h3> -->

									<form id="grnSupplierForm" method="post">
										<div class="row">

											<div class="col-md-4">
												<div class="form-group">
													<label for="grnid">GRN ID</label>
													<input readonly type="text" class="form-control" id="grnid" name="grnid">
												</div>
											</div>


											<div class="col-md-4">
												<div class="form-group">
													<label for="proid">Date</label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar bigger-110"></i>
														</span>
														<input class="form-control date-picker" id="grndate" name="grndate" readonly type="text" data-date-format="dd-mm-yyyy" />
													</div>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-md-4 form-group">
												<div>
													<label for="grnSupplier">Supplier</label>
													<select name="grnSupplier" id="grnSupplier" class="form-control selcet-filter">
														<option value="0">--Select Supplier--</option>
													</select>
												</div>
											</div>
											<div class="col-md-4 form-group">
												<div>
													<label for="grnPOID">Purchase Order ID</label>
													<select name="grnPOID" id="grnPOID" class="form-control selcet-filter">
														<option value="0">--Select Purchase Order--</option>
													</select>
												</div>
											</div>


										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="grnRemarks">Remarks</label>
													<textarea class="form-control" rows="3" id="grnRemarks" name="grnRemarks"></textarea>
												</div>
											</div>
										</div>
									</form>

								</div>

								<div class="step-pane" data-step="2">
									<form id="productListForm" method="get">
										<div class="row">

										</div>
										<div class="row">
											<div class="col-md-4 form-group">
												<div>
													<label for="grnProductCat">Product Category</label>
													<select name="grnProductCat" id="grnProductCat" class="form-control selcet-filter">
														<option value="0">--Select Product Category--</option>
													</select>
												</div>
											</div>
											<div class="col-md-4 form-group">
												<div>
													<label for="grnProductName">Product Name</label>
													<select class="form-control selcet-filter select2gg" style="width: 100%" id="grnProductName" name="grnProductName">
														<option>--Select a Product--</option>
													</select>
												</div>
											</div>
										



										</div>
										<div class="row">
											<div class="col-md-2 form-group">
												<div>
													<label for="grnQty">Qty</label>
													<input type="text" class="form-control" name="grnQty" id="grnQty">

												</div>
											</div>
											<div class="col-md-2 form-group">
												<div>
													<label for="grnCost">Item Cost</label>
													<input type="text" class="form-control" name="grnCost" id="grnCost">

												</div>
											</div>
											<div class="col-md-2 form-group">
												<div>
													<label for="grnMRP">Item MRP</label>
													<input type="text" class="form-control" name="grnMRP" id="grnMRP">

												</div>
											</div>

											<div class="col-md-2">
												<label for="grnAddItems" style="color: white;">&nbsp;</label>
												<button type='button' class='btn btn-primary btn-block' id='grnAddItems'>Add Items</button>
											</div>

										</div>
										<div class="row">
											<div class="col-xs-4">

											</div>
											<div class="col-xs-4">

											</div>

										</div>

										<div class="row">
											<div class="col-xs-12">


												<div class="row">
													<div class="col-xs-12">

														<div class="clearfix">
															<div class="pull-right tableTools-container"></div>
														</div>



														<table id="grnTable" class="table table-striped table-bordered table-hover" style="width:100%">
															<thead>
																<tr>
																	<th style="width:10%">Select</th>
																	<th style="width:10%">Product ID</th>
																	<th style="width:30%">Product Name</th>

																	<th style="width:10%">Quantity</th>
																	<th style="width:10%">Item Cost</th>
																	<th style="width:10%">Item MRP</th>
																	
																</tr>
															</thead>

															<tbody id="grnTablebody">

															</tbody>
														</table>

													</div>
												</div>

												<div id="grid-pager"></div>

											</div>
										</div>
									</form>
								</div>

								<div class="step-pane" data-step="3">
									<div class="center">
										<h3 class="blue lighter">GRN Created</h3>

									</div>
								</div>

								<!-- 							<div class="step-pane" data-step="4">
								<div class="center">
									<h3 class="green">Congrats!</h3>
									Your product is ready to ship! Click finish to continue!
								</div>
							</div> -->
							</div>
						</div>

						<hr />
						<div class="wizard-actions">
							<button class="btn btn-prev">
								<i class="ace-icon fa fa-arrow-left"></i>
								Prev
							</button>

							<button class="btn btn-success btn-next" data-last="Finish">
								Next
								<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
							</button>
						</div>
					</div><!-- /.widget-main -->
				</div><!-- /.widget-body -->
			</div>

			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder">Ace</span>
				Application &copy; 2013-2014
			</span>

			&nbsp; &nbsp;
			<span class="action-buttons">
				<a href="#">
					<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
				</a>
			</span>
		</div>
	</div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<!-- 		<script src="../assets/js/jquery-2.1.4.min.js"></script> -->

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
	if ('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="../assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="../assets/js/wizard.min.js"></script>
<script src="../assets/js/jquery.validate.min.js"></script>
<script src="../assets/js/jquery-additional-methods.min.js"></script>
<script src="../assets/js/bootbox.js"></script>
<script src="../assets/js/jquery.maskedinput.min.js"></script>
<script src="../assets/js/select2.min.js"></script>

<!-- ace scripts -->
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	$.noConflict();
	jQuery(function($) {



		$(document).ready(function() {
            document.title = "Create GRN";
			$.noConflict();

			$('.select2gg').select2({
				placeholder: "--Select a Product--",
				allowClear: true
			});
			// load options for supplier select box
			$.ajax({
				url: "../controllers/controller_products.php?type=selectSupplierLoad",
				method: "POST",
				processData: false,
				contentType: false,
				success: function(data) {
					//alert(data); 
					$("#grnSupplier").empty();
					$("#grnSupplier").append("<option value=''>--Select Supplier--</option>");
					$("#grnSupplier").append(data);

				}
			});

			$.ajax({
				url: "../controllers/controller_grn.php?type=poLoad",
				method: "POST",
				processData: false,
				contentType: false,
				success: function(data) {
					//alert(data); 
					$("#grnPOID").empty();
					$("#grnPOID").append("<option value=''>--Select Purchase Order--</option>");
					$("#grnPOID").append("<option value='1'>Without Purchase Order</option>");
					$("#grnPOID").append(data);

				}
			});

		});

		$('#grnSupplier').change(function() {

			var supplierval = $('#grnSupplier').val();

			$.post("../controllers/controller_grn.php?type=get_poid", {
					supplierval: supplierval
				},
				function(data, status) {
					if (status == "success") {
						//alert(data);
						$("#grnPOID").empty();
						$("#grnPOID").append("<option value=''>--Select Purchase Order--</option>");
						$("#grnPOID").append("<option value='0'>Without Purchase Order</option>");
						$("#grnPOID").append(data);

					}
				});

			//change product category select box options
			$.post("../controllers/controller_products.php?type=get_filteredProCat", {
					supplierval: supplierval
				},
				function(data, status) {
					if (status == "success") {
						// alert(data);
						$("#grnProductCat").empty();
						$("#grnProductCat").append("<option value=''>--Select Product Category--</option>");
						$("#grnProductCat").append(data);
					}
				});

		});

		var grnTable2 = $('#grnTable').DataTable({
			"aaSorting": [],
			"columnDefs": [
				{
					"width": "10%",
					"targets": 5
				},
				{
					"width": "10%",
					"targets": 4
				},
				{
					"width": "10%",
					"targets": 3
				},
				{
					"width": "10%",
					"targets": 2
				},
				{
					"width": "50%",
					"targets": 1
				},
				{
					"width": "10%",
					"targets": 0
				}
			]

		});


		$('#grnPOID').change(function() {

			var poidVal = $('#grnPOID').val();

			$.post("../controllers/controller_grn.php?type=grnProductTable", {
					poidVal: poidVal
				},
				function(data, status) {
					if (status == "success") {

						$("#grnTable").DataTable().destroy();
						$("#grnTable tbody").empty();
						$("#grnTable tbody").append(data);
						$('#grnTable').DataTable({
							"aaSorting": [],
							"columnDefs": [
								{
									"width": "10%",
									"targets": 5
								},
								{
									"width": "10%",
									"targets": 4
								},
								{
									"width": "10%",
									"targets": 3
								},
								{
									"width": "10%",
									"targets": 2
								},
								{
									"width": "50%",
									"targets": 1
								},
								{
									"width": "10%",
									"targets": 0
								}
							]

						});

					}
				});
		});

		$('#grnProductCat').change(function() {

			var supplierval = $('#grnSupplier').val();
			var procatval = $('#grnProductCat').val();

			$.post("../controllers/controller_purchaseCreate.php?type=get_productList", {
					procatval: procatval,
					supplierval: supplierval
				},
				function(data, status) {
					if (status == "success") {

						$("#grnProductName").empty();
						$("#grnProductName").append("<option value=''>--Select Product--</option>");
						$("#grnProductName").append(data);
					}
				});

		});

		$('#grnAddItems').on('click', function() {

			var proname = $("#grnProductName option:selected").text();
			var proid = $('#grnProductName').val();
			var qnty = $('#grnQty').val();
			var cost = $('#grnCost').val();
			var mrp = $('#grnMRP').val();
			var chkbox = '<td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>';
			var buttons = "<div class='hidden-sm hidden-xs btn-group'><button type='button' class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></div>"
			var tablerow = "<tr>" + chkbox + "<td>" + proid + "</td><td>" + proname + "</td><td style='text-align:center'><div><input class='tableQty' style='border:0px; text-align:center' value='" + qnty + "'/></div></td><td style='text-align:center'><div><input class='tableCost' style='border:0px; text-align:center' value='" + cost + "'/></div></td><td style='text-align:center'><div><input class='tableMRP' style='border:0px; text-align:center' value='" + mrp + "'/></div></td></tr>";


			$("#grnTable").DataTable().destroy();

			$("#grnTable tbody").append(tablerow);
			$('#grnTable').DataTable({
				"aaSorting": [],
				"columnDefs": [
					{
						"width": "10%",
						"targets": 5
					},
					{
						"width": "10%",
						"targets": 4
					},
					{
						"width": "10%",
						"targets": 3
					},
					{
						"width": "50%",
						"targets": 2
					},
					{
						"width": "10%",
						"targets": 1
					},
					{
						"width": "10%",
						"targets": 0
					}
				]
				// select: {
				// 	style: 'multi'
				// }
			});

			$("#grnQty").val("");
			$("#grnCost").val("");
			$("#grnMRP").val("");
			$("#grnBatchID").val("");
			$("#grnProductName").empty();
			$('.select2gg').select2({
				placeholder: "--Select a Product--",
				allowClear: true
			});
			var supplierval = $('#grnSupplier').val(); // get option's value
			var procatval = $('#grnProductCat').val();

			//change product name select box options
			$.post("../controllers/controller_purchaseCreate.php?type=get_productList", {
					procatval: procatval,
					supplierval: supplierval
				},
				function(data, status) {
					if (status == "success") {
						//alert(data);
						$("#grnProductName").empty();
						$("#grnProductName").append("<option value=''>--Select Product--</option>");
						$("#grnProductName").append(data);
					}
				});

		});

		$('#grnTable tbody').on('click', '.fa-trash-o', function() {

			

			var $row = $(this).closest("tr"); // Find the row
			// var proname = $row.find("td:nth-child(2)").text();
			// var proqty = $row.find("td:nth-child(3)").text();
			// // alert(proqty);
			// alert(proname);

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
					// grnTable2.row($(btn).parents('tr')).remove().draw(false);
				}
			})

		});

		var active_class = 'active';
		$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function() {
			var th_checked = this.checked; //checkbox inside "TH" table header

			$(this).closest('table').find('tbody > tr').each(function() {
				var row = this;
				if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
				else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
			});
		});
		$('#grnTable').on('click', 'td input[type=checkbox]', function() {
			var $row = $(this).closest('tr');
			if ($row.is('.detail-row ')) return;
			if (this.checked) $row.addClass(active_class);
			else $row.removeClass(active_class);
		});
		//select code end

		$('.date-picker').datepicker({
			autoclose: true,
			minDate: 0,
			maxDate: 0,
			todayHighlight: true,
			dateFormat: 'yy-mm-dd'
		});
		$('.date-picker').datepicker('setDate', new Date());

		$('[data-rel=tooltip]').tooltip();

		$('.select2').css('width', '200px').select2({
				allowClear: true
			})
			.on('change', function() {
				$(this).closest('form').validate().element($(this));
			});


		var $validation = false;
		$('#fuelux-wizard-container')
			.ace_wizard({

			})
			.on('actionclicked.fu.wizard', function(e, info) {
				if (info.step == 1) {

				}
			})

			.on('finished.fu.wizard', function(e) {
				//save to database
				d = new FormData($("#grnSupplierForm")[0]);

				$.ajax({
					url: "../controllers/controller_grn.php?type=grnSave",
					method: "POST",
					data: d,
					processData: false,
					contentType: false,
					success: function(data) {

						var grnidddata = jQuery.parseJSON(data);

						function storeTblValues() {
							var poId = $('#grnPOID').val();
							var TableData = new Array();

							$('#grnTable tr').each(function(row, tr) {
								if ($(tr).hasClass('active')) {
									TableData[row] = {
										"grnpid": $(tr).find('td:eq(1)').text(),
										"grnpname": $(tr).find('td:eq(2)').text(),
										"grnpqty": $(tr).find('.tableQty').val(),
										"itcost": $(tr).find('.tableCost').val(),
										"itmrp": $(tr).find('.tableMRP').val(),
										"grnid": grnidddata,
										"poId": poId
									}
								}

							});

							return TableData;
						}

						TableData = storeTblValues()
						TableData = JSON.stringify(TableData);

						$.ajax({
							type: "POST",
							url: "../controllers/controller_grn.php?type=purchaseSaveDetails",
							data: "pTableData=" + TableData,
							success: function(msg) {
								var poid= $("#grnPOID").val();
								
								$.post("../controllers/controller_grn.php?type=updatePoStatus", {
									poid:poid
									},
									function(data, status) {
										
										if (status == "success") {
											Swal.fire({
												title: 'Products Received',
												icon: 'success',
												showCancelButton: false,
												confirmButtonColor: '#3085d6',
												cancelButtonColor: '#d33',
												confirmButtonText: 'OK!'
											}).then((result) => {
												if (result.value) {
													window.location.href = "grn_view.php";
												}
											})
										}
									});





							}
						});
					}
				});

			}).on('stepclick.fu.wizard', function(e) {
				//e.preventDefault();//this will prevent clicking and selecting steps
			});


		//jump to a step
		/**
		var wizard = $('#fuelux-wizard-container').data('fu.wizard')
		wizard.currentStep = 3;
		wizard.setState();
		*/

		//determine selected step
		//wizard.selectedItem().step





		//documentation : http://docs.jquery.com/Plugins/Validation/validate


		$.mask.definitions['~'] = '[+-]';
		$('#phone').mask('(999) 999-9999');

		jQuery.validator.addMethod("phone", function(value, element) {
			return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
		}, "Enter a valid phone number.");

		$('#validation-form').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 5
				},
				password2: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				name: {
					required: true
				},
				phone: {
					required: true,
					phone: 'required'
				},
				url: {
					required: true,
					url: true
				},
				comment: {
					required: true
				},
				state: {
					required: true
				},
				platform: {
					required: true
				},
				subscription: {
					required: true
				},
				gender: {
					required: true,
				},
				agree: {
					required: true,
				}
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

			submitHandler: function(form) {},
			invalidHandler: function(form) {}
		});




		$('#modal-wizard-container').ace_wizard();
		$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');


		/**
		$('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
			$(this).closest('form').validate().element($(this));
		});
		
		$('#mychosen').chosen().on('change', function(ev) {
			$(this).closest('form').validate().element($(this));
		});
		*/


		$(document).one('ajaxloadstart.page', function(e) {
			//in ajax mode, remove remaining elements before leaving page
			$('[class*=select2]').remove();
		});
	})
</script>
</body>

</html>