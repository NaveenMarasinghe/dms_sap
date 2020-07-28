<?php
session_start();
if (!isset($_SESSION["user"]) ) {
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
			<div class="col-md-4">
				<div>
					<div class="widget-body">
						<div class="widget-main no-padding">
							<h2> Top Selling Products</h2>
							<table id="topEmp" class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th style="width:65%">
											
										</th>

										<th>
											<i class="ace-icon fa fa-caret-right blue"></i>Quantity
										</th>


									</tr>
								</thead>

								<tbody>

								</tbody>
							</table>
						</div><!-- /.widget-main -->
					</div><!-- /.widget-body -->

					<div class="widget-body">
						<!-- <div class="widget-main no-padding">
							<h2> Top Employees</h2>
							<table id="topProducts" class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
								<tr>
										<th style="width:65%">
											
										</th>

										<th>
											<i class="ace-icon fa fa-caret-right blue"></i>Sales Amount
										</th>


									</tr>
								</thead>

								<tbody>

								</tbody>
							</table>
						</div> -->
						<!-- /.widget-main -->
					</div><!-- /.widget-body -->
				</div>
				<div>

				</div>
			</div>
			<div id='calendar' class="col-md-8"></div>
			<!-- Modal -->
			<div class="modal fade " id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="form-horizontal" method="POST" id="frmevent">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Add Event</h4>
							</div>
							<div class="modal-body">


								<div class="form-group">
									<label for="title" class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
										<input type="text" name="title" class="form-control" id="title" placeholder="Title">
									</div>
								</div>
								<div class="form-group">
									<label for="color" class="col-sm-2 control-label">Color</label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">Choose</option>
											<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
											<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
											<option style="color:#008000;" value="#008000">&#9724; Green</option>
											<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
											<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
											<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
											<option style="color:#000;" value="#000">&#9724; Black</option>

										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="start" class="col-sm-2 control-label">Start date</label>
									<div class="col-sm-10">
										<input type="text" name="start" class="form-control" id="start">
									</div>
								</div>
								<div class="form-group">
									<label for="end" class="col-sm-2 control-label">End date</label>
									<div class="col-sm-10">
										<input type="text" name="end" class="form-control" id="end">
									</div>
								</div>

							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" id="eventsave" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>



			<!-- Modal -->
			<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="form-horizontal" method="POST" action="editEventTitle.php">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label for="title" class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
										<input type="text" name="title" class="form-control" id="title" placeholder="Title">
									</div>
								</div>
								<div class="form-group">
									<label for="color" class="col-sm-2 control-label">Color</label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">Choose</option>
											<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
											<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
											<option style="color:#008000;" value="#008000">&#9724; Green</option>
											<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
											<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
											<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
											<option style="color:#000;" value="#000">&#9724; Black</option>

										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<div class="checkbox">
											<label class="text-danger"><input type="checkbox" name="delete"> Delete event</label>
										</div>
									</div>
								</div>

								<input type="hidden" name="id" class="form-control" id="id">


							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>

						<!-- Modal -->
			<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="form-horizontal" method="POST" action="editEventTitle.php">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Route Schedule Details</h4>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label for="scheid" class="col-sm-3 control-label">Schedule ID</label>
									<div class="col-sm-9">
										<input type="text" name="scheid" class="form-control" id="scheid" placeholder="Schedule ID">
									</div>
								</div>
								<div class="form-group">
									<label for="routeName" class="col-sm-3 control-label">Route</label>
									<div class="col-sm-9">
										<input type="text" name="routeName" class="form-control" id="routeName" placeholder="Route Name">
									</div>
								</div>
								<div class="form-group">
									<label for="salesman" class="col-sm-3 control-label">Salesman</label>
									<div class="col-sm-9">
										<input type="text" name="salesman" class="form-control" id="salesman" placeholder="Salesman">
									</div>
								</div>
								<div class="form-group">
									<label for="vehicle" class="col-sm-3 control-label">Vehicle</label>
									<div class="col-sm-9">
										<input type="text" name="vehicle" class="form-control" id="vehicle" placeholder="Vehicle">
									</div>
								</div>


								<input type="hidden" name="id" class="form-control" id="id">


							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
<script type="text/javascript">
	$(document).ready(function() {
		document.title = "Dashboard";
		$("#eventsave").click(function() {
			f = new FormData($("#frmevent")[0]);

			$.ajax({
				type: "POST",
				data: f,
				processData: false,
				contentType: false,
				url: "addEvent.php?type=title",

			}).done(function(data) {


				$('#ModalAdd').modal('hide');


			});

		});
		$.post("../controllers/controller_stock.php?type=topEmp",
			function(data, status) {
				if (status == "success") {
				

					$("#topProducts tbody").append(data);

				}
			});

		$.post("../controllers/controller_stock.php?type=topProducts",
			function(data, status) {
				if (status == "success") {

					$("#topEmp tbody").append(data);

				}
			});

		jQuery(function($) {
			function modalDetails(){
				var scheId = $('#scheid').val();
				$.post("../controllers/controller_reports.php?type=getRouteName",{ 
					scheId:scheId
				},
            function (data, status) {
                if (status == "success") {
                    $("#routeName").empty();
                    $("#routeName").val(data);
                }
			});

			$.post("../controllers/controller_reports.php?type=getSalesman",{ 
					scheId:scheId
				},
            function (data, status) {
                if (status == "success") {
                    $("#salesman").empty();
                    $("#salesman").val(data);
                }
			});

			$.post("../controllers/controller_reports.php?type=getVehicle",{ 
					scheId:scheId
				},
            function (data, status) {
                if (status == "success") {
                    $("#vehicle").empty();
                    $("#vehicle").val(data);
                }
			});
			
			}

			var b = 123;
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: ''
				},
				editable: true,
				eventLimit: true, 
				selectable: true,
				selectHelper: true,
				select: function(start, end) {
				},
				eventRender: function(event, element) {
					element.bind('click', function() {						
						$('#ModalView #id').val(event.id);
						$('#ModalView #scheid').val(event.title);
						$('#ModalView #color').val(event.color);
						$('#ModalView').modal('show');
						modalDetails();
					});
				},
				eventDrop: function(event, delta, revertFunc) { // si changement de position

					edit(event);

				},
				eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

					edit(event);

				},
				events: [
					<?php
					require_once("../controllers/class_dbconnection.php");

					$db = new Connection();
					$con = $db->db_con();

					$sql = "SELECT routesche_id, route_date FROM tbl_route_sche";

					$result = $con->query($sql);


					while ($row = $result->fetch_assoc()) {

						$events = $result;
					}
					foreach ($events as $event) :

					?> {

							title: '<?php echo $event["routesche_id"]; ?>',
							start: '<?php echo $event["route_date"]; ?>',
							className: 'label-success',

						},
					<?php endforeach; ?>
				],
			});

		});

	});
</script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>