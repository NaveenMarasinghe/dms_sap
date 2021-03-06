<?php
session_start();
if (!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"] == "3") || ($_SESSION["user"]["utype"] == "4") || ($_SESSION["user"]["utype"] == "5")) {
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
					<h4 class="widget-title lighter">Create Route Schedule</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<div id="fuelux-wizard-container">
							<div>
								<ul class="steps">
									<li data-step="1" class="active">
										<span class="step">1</span>
										<span class="title">Select Route</span>
									</li>

									<li data-step="2">
										<span class="step">2</span>
										<span class="title">Product List</span>
									</li>

									<li data-step="3">
										<span class="step">3</span>
										<span class="title">Assign Resources</span>
									</li>


								</ul>
							</div>

							<hr />

							<div class="step-content pos-rel">
								<form id="routeScheForm">
									<div class="step-pane active" data-step="1">
										<!-- <h3 class="lighter block green">Enter the following information</h3> -->


										<div class="row">
											<div class="col-md-3 form-group">
												<div>
													<label for="rtscheSupplier">Supplier</label>
													<select name="rtscheSupplier" id="rtscheSupplier" class="form-control selcet-filter">
														<option value="0">--Select Supplier--</option>
													</select>
												</div>
											</div>
											<div class="col-md-3 form-group">
												<div>
													<label for="rtscheTerritory">Territory</label>
													<select name="rtscheTerritory" id="rtscheTerritory" class="form-control selcet-filter">
														<option value="0">--Select Territory--</option>
													</select>
												</div>
											</div>

											<div class="col-md-3 form-group">
												<div>
													<label for="rtscheRoute">Route</label>
													<select name="rtscheRoute" id="rtscheRoute" class="form-control selcet-filter">
														<option value="0">--Select Route--</option>
													</select>

												</div>
											</div>


										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label for="rtscheDate">Schedule Date</label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar bigger-110"></i>
														</span>
														<input class="form-control date-picker" type="text" name="rtscheDate" id="rtscheDate" data-date-format="dd-mm-yyyy" />
													</div>
												</div>
											</div>
											<div class="col-md-3 form-group">
												<div>
													<div class="form-group">
														<label for="rtscheRemarks">Remarks</label>
														<textarea class="form-control" rows="3" id="rtscheRemarks" name="rtscheRemarks"></textarea>
													</div>
												</div>
											</div>
										</div>

								</form>
							</div>

							<div class="step-pane" data-step="2">

								<div class="row">
									<div class="col-md-3 form-group">
										<div>
											<label for="rtscheProCat">Product Category</label>
											<select name="rtscheProCat" id="rtscheProCat" class="form-control selcet-filter">
												<option value="0">--Select Product Category--</option>
											</select>
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-3 form-group">
										<div>
											<label for="rtscheProName">Product Name</label>
											<select class="form-control selcet-filter select2gg" style="width: 100%" id="rtscheProName" name="rtscheProName">
												<option>--Select a Product--</option>
											</select>
										</div>
									</div>

									<div class="col-md-3 form-group">
										<div>
											<label for="rtscheBatch">Batch</label>
											<select name="rtscheBatch" id="rtscheBatch" class="form-control selcet-filter">
												<option value="0">--Select Batch--</option>
											</select>
										</div>
									</div>
									<div class="col-md-3 form-group">
										<div>
											<label for="rtscheQty">Qty</label>
											<input type="text" class="form-control" name="rtscheQty" id="rtscheQty">

										</div>
									</div>

									<div class="col-md-3 form-group">
										<div>
											<label for="rtscheQty">Avaliable Qty</label>
											<input type="text" class="form-control" name="avaqty" id="avaqty">

										</div>
									</div>

									<div class="col-xs-3">

										<div class="form-group">
											<label for="rtscheQty">&nbsp;</label>
											<button type='button' class='btn btn-primary btn-block' id='rtscheAddItems'>Add Items</button>
										</div>

									</div>

								</div>

								<div class="row">
									<div class="col-xs-12">


										<div class="row">
											<div class="col-xs-12">

												<div class="clearfix">
													<div class="pull-right tableTools-container"></div>
												</div>



												<table id="rtscheTable" class="table table-striped table-bordered table-hover" style="width:100%">
													<thead>
														<tr>

															<th>Product ID</th>
															<th>Product Name</th>
															<th>Batch</th>
															<th>Quantity</th>
															<th>Actions</th>
														</tr>
													</thead>

													<tbody id="rtscheTablebody">

													</tbody>
												</table>

											</div>
										</div>

										<div id="grid-pager"></div>

									</div>
								</div>

							</div>

							<div class="step-pane" data-step="3">

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="selectVehicle">Vehicle</label>
											<select name="selectVehicle" id="selectVehicle" class="form-control selcet-filter">
												<option value="0">--Select Vehicle--</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="selectDriver">Driver</label>
											<select name="selectDriver" id="selectDriver" class="form-control selcet-filter">
												<option value="0">--Select Driver--</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="selectSalesman">Salesman</label>
											<select name="selectSalesman" id="selectSalesman" class="form-control selcet-filter">
												<option value="0">--Select Salesman--</option>
											</select>
										</div>
									</div>
								</div>

							</div>

							<div class="step-pane" data-step="4">
								<div class="center">
									<h3 class="green">Route Schedule Completed!</h3>

								</div>
							</div>
							</form>

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
			document.title = "Create Route Schedule";

			$.noConflict();
			$("#rtscheTable").DataTable()
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
					$("#rtscheSupplier").empty();
					$("#rtscheSupplier").append("<option value=''>--Select Supplier--</option>");
					$("#rtscheSupplier").append(data);

				}
			});
		});



		$('#rtscheSupplier').change(function() {

			var supplierval = $('#rtscheSupplier').val(); // get option's value

			//change product category select box options
			$.post("../controllers/controller_products.php?type=get_filteredProCat", {
					supplierval: supplierval
				},
				function(data, status) {
					if (status == "success") {
						// alert(data); 
						$("#rtscheProCat").empty();
						$("#rtscheProCat").append("<option value=''>--Select Product Category--</option>");
						$("#rtscheProCat").append(data);
					}
				});

			$.post("../controllers/controller_routeSche.php?type=get_productsGroup", {
					supplierval: supplierval
				},
				function(data, status) {
					if (status == "success") {
						// alert(data);
						$("#rtscheProGroup").empty();
						$("#rtscheProGroup").append("<option value=''>--Select Products Group--</option>");
						$("#rtscheProGroup").append(data);
					}
				});

			$.post("../controllers/controller_routeSche.php?type=selectTerritory", {
					supplierval: supplierval
				},
				function(data, status) {
					if (status == "success") {
						// alert(data);
						$("#rtscheTerritory").empty();
						$("#rtscheTerritory").append("<option value=''>--Select Territory--</option>");
						$("#rtscheTerritory").append(data);
					}
				});

		});

		$('#rtscheTerritory').change(function() {

			var rtscheTerritory = $('#rtscheTerritory').val(); // get option's value
			$.post("../controllers/controller_routeSche.php?type=selectRoute", {
					rtscheTerritory: rtscheTerritory
				},
				function(data, status) {
					if (status == "success") {
						//alert(data);
						$("#rtscheRoute").empty();
						$("#rtscheRoute").append("<option value=''>--Select Route--</option>");
						$("#rtscheRoute").append(data);
					}
				});

		});

		$('#rtscheBatch').change(function() {

			var rtscheBatch = $('#rtscheBatch').val(); // get option's value
			$.post("../controllers/controller_routeSche.php?type=avaqty", {
				rtscheBatch: rtscheBatch
				},
				function(data, status) {
					if (status == "success") {
						var avaqtydata = data;
						if(avaqtydata>0){
							$("#avaqty").val(data);
						}else{
							$("#avaqty").val('0');
						}
					

						
					}
				});

		});

		$('#rtscheProCat').change(function() {

			var supplierval = $('#rtscheSupplier').val(); // get option's value
			var procatval = $('#rtscheProCat').val();

			$.post("../controllers/controller_purchaseCreate.php?type=get_productList", {
					procatval: procatval,
					supplierval: supplierval
				},
				function(data, status) {
					if (status == "success") {
						// alert(data);
						$("#rtscheProName").empty();
						$("#rtscheProName").append("<option value=''>--Select Product--</option>");
						$("#rtscheProName").append(data);
					}
				});

		});
		$('#rtscheProName').change(function() {

			var proid = $('#rtscheProName').val(); // get option's value

			$.post("../controllers/controller_routeSche.php?type=get_batch", {
					proid: proid
				},
				function(data, status) {
					if (status == "success") {
						//alert(data);
						$("#rtscheBatch").empty();
						$("#rtscheBatch").append("<option value=''>--Select Batch--</option>");
						$("#rtscheBatch").append(data);
					}
				});

		});

		$('#rtscheDate').change(function() {
			var rtscheDate = $('#rtscheDate').val(); // get option's value

			$.post("../controllers/controller_routeSche.php?type=selectSalesman", {
					rtscheDate: rtscheDate
				},
				function(data, status) {
					if (status == "success") {
						//alert(data);
						$("#selectSalesman").empty();
						$("#selectSalesman").append("<option value=''>--Select Salesman--</option>");
						$("#selectSalesman").append(data);
					}
				});

			$.post("../controllers/controller_routeSche.php?type=selectVehicle", {
					rtscheDate: rtscheDate
				},
				function(data, status) {
					if (status == "success") {
						$("#selectVehicle").empty();
						$("#selectVehicle").append("<option value=''>--Select Vehicle--</option>");
						$("#selectVehicle").append(data);
					}
				});

			$.post("../controllers/controller_routeSche.php?type=selectDriver", {
					rtscheDate: rtscheDate
				},
				function(data, status) {
					if (status == "success") {
						$("#selectDriver").empty();
						$("#selectDriver").append("<option value=''>--Select Driver--</option>");
						$("#selectDriver").append(data);
					}
				});

		});

		var rtscheTable2 = $('#rtscheTable').DataTable({
			aaSorting: []
		});

		$('#rtscheAddItems').on('click', function() {

			var qty= parseInt($('#rtscheQty').val());
			var avaqty=parseInt($('#avaqty').val());

			var avaqty=avaqty+1;

			if( qty<avaqty ) {			

			var proname = $("#rtscheProName option:selected").text();
			var proid = $('#rtscheProName').val();
			var qnty = $('#rtscheQty').val();
			var batch = $('#rtscheBatch').val();

			var buttons = "<div class='hidden-sm hidden-xs btn-group'><button type='button' class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></div>"
			if (proid != 0) {
				rtscheTable2.row.add([
					proid,
					proname,
					batch,
					qnty,
					buttons
				]).draw(false);
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Please select a product!'

				});
			}


			$("#rtscheQty").val("");
			$("#avaqty").val("");
			$("#rtscheBatch").val("");
			$("#rtscheProName").empty();
			$('.select2gg').select2({
				placeholder: "--Select a Product--",
				allowClear: true
			});
			var supplierval = $('#rtscheSupplier').val(); // get option's value
			var procatval = $('#rtscheProCat').val();

			$.post("../controllers/controller_purchaseCreate.php?type=get_productList", {
					procatval: procatval,
					supplierval: supplierval
				},
				function(data, status) {
					if (status == "success") {
						$("#rtscheProName").empty();
						$("#rtscheProName").append("<option value=''>--Select Product--</option>");
						$("#rtscheProName").append(data);
					}
				});


			} else {
				Swal.fire(
						'Not enough stock in the inventory!',
						"",
						'Warning'
					);

			}



		});

		$('#rtscheTable tbody').on('click', '.fa-trash-o', function() {

			var btn = this;

			var $row = $(this).closest("tr"); // Find the row
			var proname = $row.find("td:nth-child(2)").text();
			var proqty = $row.find("td:nth-child(4)").text();

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
					rtscheTable2.row($(btn).parents('tr')).remove().draw(false);
				}
			})

		});
		$('.date-picker').datepicker({
			autoclose: true,
			minDate: 0,
			maxDate: 30,
			todayHighlight: true,
			dateFormat: 'yy-mm-dd'
		});

		var $validation = false;
		$('#fuelux-wizard-container')
			.ace_wizard({

			})

			.on('actionclicked.fu.wizard', function(e, info) {
				if (info.step == 1) {

					if ((!$('#rtscheSupplier').valid()) && (!$('#rtscheTerritory').valid())) e.preventDefault();
					if (!$('#rtscheTerritory').valid()) e.preventDefault();
					if (!$('#rtscheRoute').valid()) e.preventDefault();
					if (!$('#rtscheDate').valid()) e.preventDefault();

				}
				if (info.step == 2) {

				}
			})

			.on('finished.fu.wizard', function(e) {

				var rtscheSupplier = $("#rtscheSupplier").val();
				var rtscheTerritory = $("#rtscheTerritory").val();
				var rtscheRoute = $("#rtscheRoute").val();
				var rtscheDate = $("#rtscheDate").val();
				var rtscheRemarks = $("#rtscheRemarks").val();
				var selectSalesman = $("#selectSalesman").val();
				var selectDriver = $("#selectDriver").val();
				var selectVehicle = $("#selectVehicle").val();

				$.post("../controllers/controller_routeSche.php?type=routeScheSave", {
						rtscheSupplier: rtscheSupplier,
						rtscheTerritory: rtscheTerritory,
						rtscheRoute: rtscheRoute,
						rtscheDate: rtscheDate,
						rtscheRemarks: rtscheRemarks,
						selectSalesman: selectSalesman,
						selectDriver: selectDriver,
						selectVehicle: selectVehicle
					},
					function(data, status) {
						if (status == "success") {
							var rtscheid = jQuery.parseJSON(data);

							function storeTblValues() {
								var TableData = new Array();

								$('#rtscheTable tr').each(function(row, tr) {
									TableData[row] = {
										"rtschepid": $(tr).find('td:eq(0)').text(),
										"rtschpname": $(tr).find('td:eq(1)').text(),
										"rtschebatch": $(tr).find('td:eq(2)').text(),
										"rtscheqty": $(tr).find('td:eq(3)').text(),
										"rtscheid": rtscheid
									}

								});
	

								return TableData;
							}

							TableData = storeTblValues()
							TableData = JSON.stringify(TableData);

							$.ajax({
								type: "POST",
								url: "../controllers/controller_routeSche.php?type=rtscheSaveDetails",
								data: "pTableData=" + TableData,
								success: function(msg) {
								
									Swal.fire({
										title: 'Route Schedule Created!',
										icon: 'info',
										showCancelButton: false,
										confirmButtonColor: '#3085d6',
										cancelButtonColor: '#3085d6',
										confirmButtonText: 'OK'
									}).then((result) => {
										if (result.value) {
										window.location.href = "route_sche_view.php";
										}
									});

								}
							});
						}
					});


			}).on('stepclick.fu.wizard', function(e) {

			});



		$.mask.definitions['~'] = '[+-]';
		$('#phone').mask('(999) 999-9999');

		jQuery.validator.addMethod("phone", function(value, element) {
			return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
		}, "Enter a valid phone number.");

		$('#routeScheForm').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				rtscheSupplier: {
					required: true
				},
				rtscheTerritory: {
					required: true

				},
				rtscheRoute: {
					required: true

				},
				rtscheDate: {
					required: true
				},
				rtscheProCat: {
					required: true
				},
				rtscheProName: {
					required: true

				},
				rtscheBatch: {
					required: true

				},
				rtscheQty: {
					required: true
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



		$(document).one('ajaxloadstart.page', function(e) {

			$('[class*=select2]').remove();
		});
	})
</script>
</body>

</html>