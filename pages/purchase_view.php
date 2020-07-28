<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="1") || ($_SESSION["user"]["utype"]=="4") || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="2")){
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
			<div>       
        		<h4 class="page-header"><b>View Purchase Orders</b></h4>
      </div>

      <form id="purchaseform" method="post" >
        <div class="row">               
        <div class="col-xs-2">
        </div>
            
        </div>
           
        <div class="row">
        	<table id="purchaseOrderTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Purchase Order ID</th>
              <th>Supplier</th>             
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody id="purchaseOrderTableBody">
                                                                                                     
            </tbody>
            <tfoot>
        
          </tfoot>
          </table>
        </div>
      </form>        
    </div>


  </div>						
<div id="modalPoView" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>View Student Details</b></h4>
      </div>
      <div class="modal-body">
        <table class="table" id=''>
          <thead>
            <tr>
            <th class="col-sm-2"></th>
            <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Student Id  : </td>
              <td><label id="lblsid" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Student Name  :</td>
              <td><label id="lblname" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Student Address  :</td>
              <td><label id="lbladd" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Province  :</td>
              <td><label id="lblprovince" class="viewBookInfo"></label></td>
            </tr>
              <tr>
              <td>City  :</td>
              <td><label id="lblcity" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Gender  :</td>
              <td><label id="lblgender" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Tel  :</td>
              <td><label id="lbltel" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td></td>
              <td><label id="lbltel_opt" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Email  :</td>
              <td><label id="lblemail" class="viewBookInfo"></label></td>
            </tr>
          </tbody>    
        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnMdlviewBkInfo" onclick="$('.viewBookInfo').text('');">Close</button>
      </div>
    </div>
    <!--end Modal content-->
  </div>
</div>
			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
<script type="text/javascript">
		function viewSingleProduct(proid){

      }

      function modalPoProduct(proid){
        
  
        $.post("../controllers/controller_products.php?type=viewProductModal",
        {proid:proid},
        function(data,status){
        if(status=="success"){
              //alert(data);
              
              var jdata=jQuery.parseJSON(data);
              $("#editModalProductId").val(jdata.pro_id);
              $("#editModalProductCat").val(jdata.product_cat_name);
              $("#editModalProductSubCat").val(jdata.product_subcat_name);
              $("#editModalProductName").val(jdata.pro_name);
              $("#editModalProductSupplier").val(jdata.sup_name);

           }
        });
      }      
      $('.fa-pencil').removeAttr('checked').on('click', function(){

          $('#purchaseform').hide();
          $('#purchaseform').removeClass('hide');


      })      

    $(document).ready(function(){

    	$.noConflict();
	    $.ajax({
	      url:"../controllers/controller_purchase.php?type=purchaseView",
	      method:"POST",
	      processData: false,
	      contentType: false,
	    success: function(data){

	        $("#purchaseOrderTable").DataTable().destroy();
	        $("#purchaseOrderTable tbody").empty();
	        $("#purchaseOrderTable tbody").append(data);
	        $("#purchaseOrderTable").DataTable({
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
<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>
