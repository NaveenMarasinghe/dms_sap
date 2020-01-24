<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="4")){
      header("location:../index.php");
    } 
?>
<?php require_once("../incl/header.php");?>
<?php require_once("../incl/sidebar.php");?>
<?php require_once("../incl/pagetop.php");?>

<div class="page-content">
	<div class="row">
		<div class="form-vertical">
			
		</div>

	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-actions">
            <div>       
                  <h4 class="page-header"><b>Stock</b></h4>
            </div>
<!--               <div class="row">
                <div class="col-md-3">
              <button type='button' class='btn btn-primary m-b-20' data-toggle='modal' data-target='#modelEditProduct' style='margin-bottom: 10px;' id='addbutton'>Add New Product</button> 
                </div>
              </div> -->

              <table id="stockTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product</th>
                  <th>Batch</th>             
                  <th>QTY</th>
                  <th>Cost</th>
                  <th>MRP</th>
                </tr>
                </thead>
                <tbody>
                                                                                                         
                </tbody>
                <tfoot>
            
              </tfoot>
              </table>
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$.ajax({
	        url:"../controllers/controller_stock.php?type=stockReport",
	        method:"POST",
	      success: function(data){
	        //alert(data);
	          $("#stockTable").DataTable().destroy();
	          $("#stockTable tbody").empty();
	          $("#stockTable tbody").append(data);
	          $("#stockTable").DataTable({
	        "order": [[ 0, "dsec" ]],
	        "columnDefs": [
	            { "width": "20%", "targets": 4 },
	            { "width": "20%", "targets": 3 },
	            { "width": "20%", "targets": 2 },
	            { "width": "20%", "targets": 1 },
	            { "width": "20%", "targets": 0 }
	        ]
	     });      
	        }
	     });
	});
</script>