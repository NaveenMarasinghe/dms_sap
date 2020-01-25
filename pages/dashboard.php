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
						<div class="widget-main no-padding">
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
						</div><!-- /.widget-main -->
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


			var b = 123;
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: ''
				},
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				selectable: true,
				selectHelper: true,
				select: function(start, end) {
					var end = moment(start).add(90, 'days');
					// alert("ggwp");
					$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
					$('#ModalAdd #end').val(moment(start).format('YYYY-MM-DD'));
					$('#ModalAdd').modal('show');
				},
				eventRender: function(event, element) {
					element.bind('dblclick', function() {
						// alert("gg");
						$('#ModalEdit #id').val(event.id);
						$('#ModalEdit #title').val(event.title);
						$('#ModalEdit #color').val(event.color);
						$('#ModalEdit').modal('show');
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

						// $start = explode(" ", $event['start']);
						// $end = explode(" ", $event['end']);
						// if ($start[1] == '00:00:00') {
						//     $start = $start[0];
						// } else {
						//     $start = $event['route_date'];
						// }
						// if ($end[1] == '00:00:00') {
						//     $end = $end[0];
						// } else {
						//     $end = $event['end'];
						// }
					?> {

							title: '<?php echo $event["routesche_id"]; ?>',
							start: '<?php echo $event["route_date"]; ?>',
							className: 'label-success',

						},
					<?php endforeach; ?>
				],
			});

			// function edit(event) {
			// 	start = event.start.format('YYYY-MM-DD HH:mm:ss');
			// 	if (event.end) {
			// 		end = event.end.format('YYYY-MM-DD HH:mm:ss');
			// 	} else {
			// 		end = start;
			// 	}

			// 	id = event.id;

			// 	Event = [];
			// 	Event[0] = id;
			// 	Event[1] = start;
			// 	Event[2] = end;

			// 	$.ajax({
			// 		url: 'editEventDate.php',
			// 		type: "POST",
			// 		data: {
			// 			Event: Event
			// 		},
			// 		success: function(rep) {
			// 			if (rep == 'OK') {
			// 				alert('Saved');
			// 			} else {
			// 				alert('Could not be saved. try again.');
			// 			}
			// 		}
			// 	});
			// }
			// $('.nameselect').select2();


			// if (!ace.vars['old_ie']) $('#date-timepicker1, #date-timepicker2').datetimepicker({
			//     //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
			//     icons: {
			//         time: 'fa fa-clock-o',
			//         date: 'fa fa-calendar',
			//         up: 'fa fa-chevron-up',
			//         down: 'fa fa-chevron-down',
			//         previous: 'fa fa-chevron-left',
			//         next: 'fa fa-chevron-right',
			//         today: 'fa fa-arrows ',
			//         clear: 'fa fa-trash',
			//         close: 'fa fa-times'
			//     }
			// }).next().on(ace.click_event, function() {
			//     $(this).prev().focus();
			// });


		});

		// var date = new Date();
		// var d = date.getDate();
		// var m = date.getMonth();
		// var y = date.getFullYear();
		// $('#calendar').fullCalendar({
		//     header: {
		//         left: 'prev,next today',
		//         center: 'title',
		//         right: ''
		//     },
		//     defaultDate: new Date(),
		//     navLinks: true, // can click day/week names to navigate views
		//     editable: true,
		//     eventLimit: true, // allow "more" link when too many events
		//     dayClick: function(date, jsEvent, view) {
		//         alert('gg');
		//         // $("#successModal").modal("show");
		//         // $("#eventDate").val(date.format());

		//     },
		//     events: 
		// });

	});
</script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>