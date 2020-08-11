<?php
session_start();
if (!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"] == "4") || ($_SESSION["user"]["utype"] == "5")) {
  header("location:../index.php");
}
?>

<?php require_once "../incl/header.php"; ?>
<?php require_once "../incl/sidebar.php"; ?>
<?php require_once "../incl/pagetop.php"; ?>

<div class="page-content">

  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <div class="form-actions">
        <div class="box-header with-border">
          <h3 class="box-title">View Sales</h3>
        </div>
        <div class="clearfix">
          <div class="pull-right tableTools-container"></div>
        </div>
        <table id="stockTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sales ID</th>
              <th>Customer Name</th>
              <th>Sales Total</th>
              <th>Amount Paid</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="viewStockBody">
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
  jQuery(function($) {
    function myDatatable() {}
  });

  $(document).ready(function() {

    document.title = "Sales View";

    $.noConflict();
    $.ajax({
      url: "../controllers/controller_sales.php?type=viewSales",
      method: "POST",
      processData: false,
      contentType: false,
    }).done(function(data) {
      $("#stockTable").DataTable().destroy();
      $("#stockTable tbody").empty();
      $("#stockTable tbody").append(data);
      //initiate dataTables plugin
      var myTable =
        $('#stockTable')

        .DataTable({
          "order": [
            [0, "desc"]
          ],
          bAutoWidth: true,
          "aoColumns": [
            null, null, null, null, null,
          ],
          "aaSorting": [],
          "columnDefs": [{
              "width": "10%",
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
              "width": "30%",
              "targets": 1
            },
            {
              "width": "20%",
              "targets": 0
            }
          ]


        });



    });

  });
</script>




<!-- Require footer here -->
<?php require_once "../incl/footer.php";
