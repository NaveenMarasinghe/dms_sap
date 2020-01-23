<?php session_start(); ?>

<?php require_once("../incl/header.php"); ?>
<?php require_once("../incl/sidebar.php"); ?>
<?php require_once("../incl/pagetop.php"); ?>

<div class="page-content">


  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <?php print_r($_SESSION) ?>
      <input type="text" id="empid" readonly value='<?php echo $_SESSION["user"]["emp_id"] ?>' />
      <div class='row'>
        <div class='col-md-3' id='routeAccept'>
          <h1>Accept</h1>
          <button class='btn btn-app btn-success' id='routeAcceptBtn'></button>
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
          alert(data);

          $("#routeAcceptBtn").append(data);
        }
      });


      $('#routeAcceptBtn').click(function(){
        var rtscheid = $("#routeAcceptBtn").text();
      alert(rtscheid);
        $.post("../controllers/controller_cus.php?type=createRtscheSesson", {
          rtscheid: rtscheid
      },
      function(data, status) {
        if (status == "success") {
          alert(data);
         
         
        }
      });
      });
  });
</script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>