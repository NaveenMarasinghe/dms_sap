<?php require_once("../incl/header.php");?>
<?php require_once("../incl/sidebar.php");?>
<?php require_once("../incl/pagetop.php");?>

<div class="page-content">
	

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
          <div class="box-header with-border">
              <h3 class="box-title">View Stock</h3>
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
<!--                   <tr>
                  <td>Batch ID</td>
                  <td>Product Name</td>                  
                  <td>Quantity</td>
                  <td>34</td>
                  <td>Selling Price</td>
                  <td>56</td>
                  <td>Actions</td>
                </tr> -->
                </tbody>
                <tfoot>
            
              </tfoot>
              </table>



			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->




</div><!-- /.page-content -->


<script type="text/javascript">
    $(document).ready(function(){

      $.noConflict();
      $.ajax({
        url:"../controllers/controller_products.php?type=viewStock",
        method:"POST",
        processData: false,
        contentType: false,
      success: function(data){
        //alert(data);
          $("#stockTable").DataTable().destroy();
          $("#stockTable tbody").empty();
          $("#stockTable tbody").append(data);
          $("#stockTable").DataTable({
        "order": [[ 0, "dsec" ]],
        // "columnDefs": [
        //     { "width": "20%", "targets": 4 },
        //     { "width": "20%", "targets": 3 },
        //     { "width": "20%", "targets": 2 },
        //     { "width": "20%", "targets": 1 },
        //     { "width": "20%", "targets": 0 }
        // ]
      });      
        }
      });  
// $("#btn_modelView").click(function() {
//   alert( "Handler for .click() called." );
// });

    });

</script>


<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>

