<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="4")){
      header("location:../index.php");
    } 
?>

<?php require_once("../incl/header.php"); ?>
<?php require_once("../incl/sidebar.php"); ?>
<?php require_once("../incl/pagetop.php"); ?>
<?php
// if (isset($_GET["sup"])) {
//     $sup = $_GET["sup"];
// } 
// if (isset($_GET["ter"])) {
//     $ter = $_GET["ter"];
// } 

// $sup = $_GET["sup"];
// $ter = $_GET["ter"];


?>
<div class="page-content">


    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="page-header">
                <h1>
                    View Route Schedule
                    <small>
                        <!-- <i class="ace-icon fa fa-angle-double-right"></i>
									with draggable and editable events -->
                    </small>
                </h1>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" id="filter_col1" data-column="2">
                            <label for="exampleInputEmail1">Supplier</label>

                            <!--                         <span class="input-group-addon">
                          <input type="checkbox" class="column_filter" id="col2_smart">
                        </span> -->
                            <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                                <option value="0">--Select Supplier--</option>

                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Territory</label>

                            <!--                         <span class="input-group-addon">
                          <input type="checkbox" class="column_filter" id="col2_smart">
                        </span> -->
                            <select name="selectTerritory" id="selectTerritory" class="form-control selcet-filter">
                                <option value="0">--Select Territory--</option>

                            </select>

                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Date Range</label>                  
    						<div class="input-group">
    							<div class="input-daterange input-group">
                      <input type="text" class="input form-control date-picker"
                        name="start" id="datestart"/>
                      <span class="input-group-addon">
                        <i class="fa fa-exchange"></i>
                      </span>

                      <input type="text" class="input form-control date-picker"
                        name="end" id="enddate"/>
                  </div>
    						</div>
                </div>
              </div> -->

                </div>

                <div id='calendar' class="col-md-8"></div>

            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
<?php
// require_once("../controllers/class_dbconnection.php");
// $db = new Connection();
// $con = $db->db_con();
// // Check connection
// // if ($conn->connect_error) {
// //     die("Connection failed: " . $conn->connect_error);
// // } 
// // if(isset($_POST["submit"]) == "submit" && isset($_POST["eventTitle"]) != "")
// //   {
// //     $sql = "INSERT INTO events (title, event_date)
// //         VALUES ('".$_POST['eventTitle']."', '".$_POST['eventDate']."')";
// //     if (mysqli_query($conn,$sql)) {
// //         echo "New event added successfully";
// //     } else {
// //         echo "Error: " . $sql . "<br>" . $conn->error;
// //     }

// //   }
// //echo "Connected successfully";
// $sql = "SELECT route_id, route_date as start FROM tbl_route_sche";
// $result = $con->query($sql);
// $myArray = array();
// $nor = $result->num_rows;
// if ($nor > 0) {
//     // output data of each row
//     while ($row = $result->fetch_assoc()) {
//         $myArray[] = $row;
//     }
// } else {
//     echo "0 results";
// }
// 
?>
<script type="text/javascript">
    $(document).ready(function() {

        document.title = "Route Schedule";
        $.post("../controllers/controller_products.php?type=selectSupplierLoad",
            function(data, status) {
                if (status == "success") {
                    //alert(data); 
                    $("#selectSupplier").empty();
                    $("#selectSupplier").append("<option value=''>--Select Supplier--</option>");
                    $("#selectSupplier").append(data);

                }
            });
        $('#selectSupplier').change(function() {

            var supplierval = $('#selectSupplier').val(); // get option's value

            //change product category select box
            $.post("../controllers/controller_routeSche.php?type=selectTerritory", {
                    supplierval: supplierval
                },
                function(data, status) {
                    if (status == "success") {
                        //alert(data);
                        $("#selectTerritory").empty();
                        $("#selectTerritory").append("<option value='0'>--Select Purchase Order--</option>");
                        $("#selectTerritory").append(data);
                        // $("#poSupplier").attr("disabled", "disabled");
                    }
                });

        });

        $('#selectTerritory').change(function() {

            var sup = $('#selectSupplier').val(); // get option's value
            var ter = $('#selectTerritory').val();
        
            window.location.href = "route_sche_create3.php?sup="+sup+"&ter="+ter;


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
                viewRender: function(view, element) {

                },
                eventRender: function(event, element) {
                    element.bind('dblclick', function() {
                        // $('#ModalEdit #id').val(event.id);
                        // $('#ModalEdit #title').val(event.title);
                        // $('#ModalEdit #color').val(event.color);
                        // $('#ModalEdit').modal('show');
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
                    if($sup!='' && $ter!=''){
                        $sql = "SELECT route_id, route_date FROM tbl_route_sche WHERE sup_id='$sup' AND territory='$ter'";

                        $result = $con->query($sql);
                    } else{
                        $sql = "SELECT route_id, route_date FROM tbl_route_sche";

                        $result = $con->query($sql);
                    }
                    

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

                            title: '<?php echo $event["route_id"]; ?>',
                            start: '<?php echo $event["route_date"]; ?>',
                            className: 'label-success',

                        },
                    <?php endforeach; ?>
                ],
            });

            // function edit(event) {
            //     start = event.start.format('YYYY-MM-DD HH:mm:ss');
            //     if (event.end) {
            //         end = event.end.format('YYYY-MM-DD HH:mm:ss');
            //     } else {
            //         end = start;
            //     }

            //     id = event.id;

            //     Event = [];
            //     Event[0] = id;
            //     Event[1] = start;
            //     Event[2] = end;

            //     $.ajax({
            //         url: 'editEventDate.php',
            //         type: "POST",
            //         data: {
            //             Event: Event
            //         },
            //         success: function(rep) {
            //             if (rep == 'OK') {
            //                 alert('Saved');
            //             } else {
            //                 alert('Could not be saved. try again.');
            //             }
            //         }
            //     });
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