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
              <div class="col-md-3">
                  <div class="form-group" id="filter_col1" data-column="2">
                    <label for="exampleInputEmail1">Supplier</label>
                    <div class="input-group">
<!--                         <span class="input-group-addon">
                          <input type="checkbox" class="column_filter" id="col2_smart">
                        </span> -->
                    <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                     <option value="0">--Select Supplier--</option>
                     <option value="0">--Select Sggggggggggggggggggggggggggupplier--</option>

                    </select>
                    </div>                    
                  </div>
              </div>
              
              <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Territory</label>
                    <div class="input-group">
<!--                         <span class="input-group-addon">
                          <input type="checkbox" class="column_filter" id="col2_smart">
                        </span> -->
                    <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                     <option value="0">--Select Territory--</option>
                     <option value="0">--Select Sggggggggggggggggggggggggggupplier--</option>

                    </select>
                    </div>                    
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Date Range</label>                  
						<div class="input-group">
							<div class="input-daterange input-group">
                  <input type="text" class="input form-control "
                    name="start" id="datestart"/>
                  <span class="input-group-addon">
                    <i class="fa fa-exchange"></i>
                  </span>

                  <input type="text" class="input form-control"
                    name="end" id="enddate"/>
              </div>
						</div>
                </div>
              </div>
            
            </div>
            <div class="table-header">
              View Purchase Order List
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
            </div>

            </form>
          
<!--             <div class="col-md-offset-10 col-md-2">
              <div class="pull-right">
              <button type="button" class="btn btn-success" id="pobtnSave">Create</button>
              <button type="button" class="btn btn-primary" id="pobtncancel" onclick="$('#frmStudntEdit')[0].reset();">Cancel</button>
            </div>
            </div> -->

    </div>						

			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
<script type="text/javascript">
		function viewSingleProduct(proid){
        $('.page-content').load("purchase_view_single.php");
        //alert(proid);      
       	var pur_id=proid;
       	//alert(pur_id); 
        $("#qty").text("gg");
    	
        // $.post("../controllers/controller_products.php?type=viewProductModal",
        // {proid:proid},
        // function(data,status){
        // if(status=="success"){
        //       //alert(data);
              
        //       var jdata=jQuery.parseJSON(data);
        //       $("#editModalProductId").val(jdata.pro_id);
        //       $("#editModalProductCat").val(jdata.product_cat_name);
        //       $("#editModalProductSubCat").val(jdata.product_subcat_name);
        //       $("#editModalProductName").val(jdata.pro_name);
        //       $("#editModalProductSupplier").val(jdata.sup_name);

        //    }
        // });
      }

    $(document).ready(function(){

    	$.noConflict();
	    $.ajax({
	      url:"../controllers/controller_purchase.php?type=purchaseView",
	      method:"POST",
	      processData: false,
	      contentType: false,
	    success: function(data){
	      //alert(data);
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
// $("#btn_modelView").click(function() {
//   alert( "Handler for .click() called." );
// });

    });

</script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>
