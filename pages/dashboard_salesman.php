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

$empid = $_GET["empid"]; ?>
<div class="page-content">


  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->



      <div class="row">
        <div class="col-md-4">
          <?php print_r($_SESSION) ?>
          <input type="text" id="empid" readonly value='<?php echo $_SESSION["user"]["emp_id"] ?>' />
          <div class='col-md-3' id='routeAccept'>
            <h1>Accept</h1>
            <button class='btn btn-app btn-success' id='routeAcceptBtn'></button>
          </div>

        </div>
        <div class="col-md-8">
          <div id='calendar' class="col-md-11"></div>
        </div>
      </div>
      <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.page-content -->
<script type="text/javascript">
  var empid = $('#empid').val();
  $(document).ready(function() {
    $.post("../controllers/controller_sales.php?type=getTodayRouteSche", {
        empid: empid
      },
      function(data, status) {
        if (status == "success") {


          $("#routeAcceptBtn").append(data);

        }
      });

      // 
    $('#routeAcceptBtn').click(function() {
      var rtscheid = $("#routeAcceptBtn").text();

      var empid = $('#empid').val();
      window.location.href = "dashboard_salesman.php?empid="+empid;
      // $.post("../controllers/controller_cus.php?type=createRtscheSesson", {
      //     rtscheid: rtscheid
      //   },
      //   function(data, status) {
      //     if (status == "success") {
      //       alert(data);


      //     }
      //   });
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
          if ($empid != '') {
            $sql = "SELECT cal_remarks, cal_date FROM tbl_user_calender WHERE emp_id='$empid'";

            $result = $con->query($sql);
          } else {
            // $sql = "SELECT route_id, route_date FROM tbl_route_sche";

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

              title: '<?php echo $event["cal_remarks"]; ?>',
              start: '<?php echo $event["cal_date"]; ?>',
              className: 'label-success',

            },
          <?php endforeach; ?>
        ],
      });

      function edit(event) {
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        if (event.end) {
          end = event.end.format('YYYY-MM-DD HH:mm:ss');
        } else {
          end = start;
        }

        id = event.id;

        Event = [];
        Event[0] = id;
        Event[1] = start;
        Event[2] = end;

        $.ajax({
          url: 'editEventDate.php',
          type: "POST",
          data: {
            Event: Event
          },
          success: function(rep) {
            if (rep == 'OK') {
              alert('Saved');
            } else {
              alert('Could not be saved. try again.');
            }
          }
        });
      }
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

  });
</script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>