<?php
session_start();
if (!isset($_SESSION["user"])) {
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
      <div class="form-actions">

        <div class="page-header">
          <h1>
            Vehicle Stock
          </h1>
        </div><!-- /.page-header -->
        <div class="row">
          <div class="col-md-3">
            <div class="form-group" id="filter_col1" data-column="2">
              <label for="exampleInputEmail1">Vehicle Number</label>

              <select name="selectVehNum" id="selectVehNum" class="form-control selcet-filter">
                <option value="0">--Select Vehicle Number--</option>

              </select>

            </div>
          </div>


          <div class="clearfix col-md-9">
            <div class="pull-right tableTools-container"></div>
          </div>
        </div>
        <table id="vehStockTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Vehicle Num.</th>
              <th>Product Id</th>
              <th>Product Name</th>
              <th>Batch ID</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody id="viewVehicleBody">
            <tr>
              <td>Batch ID</td>
              <td>Product Name</td>
              <td>Quantity</td>
              <td>34</td>
              <td>Selling Price</td>
            </tr>
          </tbody>
          <tfoot>

          </tfoot>
        </table>


      </div>
      <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
  </div><!-- /.row -->




</div><!-- /.page-content -->


<script type="text/javascript">
  $(document).ready(function() {
    document.title = "Vehicle Stock";

    $.noConflict();

    function myDatatable() {
      var myTable =
        $('#vehStockTable')
        .DataTable({
          bAutoWidth: true,
          "aoColumns": [

            null, null, null, null, null,

          ],
          "aaSorting": [],
          "columnDefs": [{
              "width": "20%",
              "targets": 4
            },
            {
              "width": "20%",
              "targets": 3
            },
            {
              "width": "20%",
              "targets": 2
            },
            {
              "width": "20%",
              "targets": 1
            },
            {
              "width": "20%",
              "targets": 0
            }
          ]

        });

    }

    $.post("../controllers/controller_vehicle.php?type=getVehicleNum",
      function(data, status) {
        if (status == "success") {
          //alert(data);
          $("#selectVehNum").empty();
          $("#selectVehNum").append("<option value=''>--Select Vehicle Number--</option>");
          $("#selectVehNum").append(data);

        }
      });

    $.ajax({
      url: "../controllers/controller_vehicle.php?type=viewVehicleStock",
      method: "POST",
      processData: false,
      contentType: false,
    }).done(function(data) {

      $("#vehStockTable").DataTable().destroy();
      $("#viewVehicleBody").empty();
      $("#viewVehicleBody").append(data);
      myDatatable();
    });

    $('#selectVehNum').change(function() {

var vehNum = $('#selectVehNum').val(); // get option's value

$.post("../controllers/controller_vehicle.php?type=filteredVehStock", {
  vehNum: vehNum
    },
    function(data, status) {
        if (status == "success") {

            
      $("#vehStockTable").DataTable().destroy();
      $("#viewVehicleBody").empty();
      $("#viewVehicleBody").append(data);
      myDatatable();
        }
    });

});

  });
</script>




<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>