<?php require_once("../incl/header.php");?>
<?php require_once("../incl/sidebar.php");?>
<?php require_once("../incl/pagetop.php");?>

<div class="page-content">
	

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
          <div class="box-header with-border">
              <h3 class="box-title">View Customers</h3>
          </div>

              <table id="supplierTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Customer ID</th>
                  <th>Customer Name</th>                  
                  <th>Customer Address</th>
                  <th>Customer Telephone</th>  
                  <th>Sales Balance</th>                      
                  <th>Actions</th>
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

      });

       $(document).ready(function(){
       	    $.noConflict();
		    
		    // load datatable on load
		    $.ajax({
		      url:"../controllers/controller_cus.php?type=viewCustomerTable",
		      method:"POST",
		      processData: false,
		      contentType: false,
		    success: function(data){
		      //alert(data);
		        $("#supplierTable").DataTable().destroy();
		        $("#supplierTable tbody").empty();
		        $("#supplierTable tbody").append(data);
		        $("#supplierTable").DataTable();
		      
		      }
		    });
       });

</script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>