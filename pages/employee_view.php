<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="2") || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="5")){
      header("location:../index.php");
    } 
?>

<?php require_once("../incl/header.php");?>
<?php require_once("../incl/sidebar.php");?>
<?php require_once("../incl/pagetop.php");?>

<div class="page-content">
	

	<div class="row">
		<div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="form-actions">
          <div class="box-header with-border">
              <h3 class="box-title">View Employee</h3>
          </div>

              <table id="supplierTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>Employee Name</th>                  
                  <th>Employee Address</th>
                  <th>Employee Telephone</th>  
                  <th>Employee Type</th>                      
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id="viewStockBody">
                  
                </tbody>
                <tfoot>
            
              </tfoot>
              </table>						

            <!-- PAGE CONTENT ENDS -->
		</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
<script type="text/javascript">
        jQuery(function($){

      });

       $(document).ready(function(){

        document.title = "View Employee";
       	    $.noConflict();
		    
		    // load datatable on load
		    $.ajax({
		      url:"../controllers/controller_cus.php?type=viewEmpTable",
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