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
          <div class="box-header with-border">
              <h3 class="box-title">View Suplliers</h3>
          </div>

              <table id="supplierTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Supplier ID</th>
                  <th>Supplier Name</th>                  
                  <th>Supplier Address</th>
                  <th>Supplier Telephone</th>            
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

        var myTable = 
        $('#stockTable')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
          bAutoWidth: false,
          "aoColumns": [
            null, null,null,null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          
          
          //"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php" ,
      
          //,
          //"sScrollY": "200px",
          //"bPaginate": false,
      
          //"sScrollX": "100%",
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50
      
      
          select: {
            style: 'multi'
          }
          } );
      });

       $(document).ready(function(){
        document.title = "View Supplier";
       	    $.noConflict();
		    
		    // load datatable on load
		    $.ajax({
		      url:"../controllers/controller_suppliers.php?type=viewSupplierTable",
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