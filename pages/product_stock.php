<?php
  session_start();
    if(!isset($_SESSION["user"]) ){
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
      <div class="box-header with-border">
        <h3 class="box-title">View Stock</h3>
      </div>
      <div class="clearfix">
        <div class="pull-right tableTools-container"></div>
      </div>
      <table id="stockTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Batch ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Item Cost</th>
            <th>Item MRP</th>
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
    document.title = "Product Stock";
    $.noConflict();
    $.ajax({
      url: "../controllers/controller_products.php?type=viewStock",
      method: "POST",
      processData: false,
      contentType: false,
    }).done(function(data) {

      $("#stockTable").DataTable().destroy();
      $("#stockTable tbody").empty();

      $("#stockTable tbody").append(data);

      var myTable =
        $('#stockTable')
        
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

    });

  });

</script>

<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>