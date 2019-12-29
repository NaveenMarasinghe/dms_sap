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
                  <th>Selling Price</th>
                  <th>Item MRP</th>
                </tr>
                </thead>
                <tbody id="viewStockBody">
                  
                </tbody>
                <tfoot>
            
              </tfoot>
              </table>



			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->




</div><!-- /.page-content -->


<script type="text/javascript">
      jQuery(function($){

        var myTable = $('#stockTable').DataTable({
          bAutoWidth: false,
          aoColumns: [null, null,null, null, null,null],
          aaSorting: [],
          select: {style: 'multi'}
          });
      });

</script>


<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>

