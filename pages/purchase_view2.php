<?php
  session_start();
    if(!isset($_SESSION["user"])|| $_SESSION["user"]["utype"]!="1"){
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


            <!-- /.box-header -->
            <div class="form-actions">
            <div>       
                  <h4 class="page-header"><b>View Purchase Orders</b></h4>
            </div>
<!--               <div class="row">
                <div class="col-md-3">
              <button type='button' class='btn btn-primary m-b-20' data-toggle='modal' data-target='#modelEditProduct' style='margin-bottom: 10px;' id='addbutton'>Add New Product</button> 
                </div>
              </div> -->

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
<!--  View product details modal -->
    <div class="modal fade" id="modelPoView" tabindex="-1" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="blue bigger">View Product Details</h4>
          </div>

          <div class="modal-body">
            <div class="row">
              <form class="form-horizontal" role="form" id="form_addNewProductCat">


                    <div>
                      <table id="purchaseModalTable" class="table table-striped table-bordered table-hover" style="width:100%;">
                        <thead>
                          <tr>
<!--                             <th class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </th> -->
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>

                          </tr>
                        </thead>

                        <tbody id="purchaseModalTableBody">
 
<!--                           <tr class="selected">
                            <td class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </td>

                            <td>GG</td>
                            <td>GoodGame</td>
                            <td class="hidden-480">30</td>

                            <td>
                              <div class="hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="#">
                                  <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                </a>

                                <a class="green" href="#">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="#">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>

                            </td>
                          </tr> -->
                        </tbody>
                      </table>
                    </div>

              </form>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-sm btn-warning" data-dismiss="modal">
              <i class="ace-icon fa fa-times"></i>
              Cancel
            </button>

            
          </div>
        </div>
      </div>
    </div>
<!-- End of view product details modal -->


			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->




</div><!-- /.page-content -->

<script type="text/javascript">
jQuery(function($){

var myTable = $('#productTable').DataTable({
    bAutoWidth: false,
    aoColumns: [null, null,null, null, null,{"bSortable": false }],
    aaSorting: [],
    select: {style:'multi'}
  });

              var myTable2 = $('#purchaseModalTable').DataTable({
                "searching": false,
                "paging": false,
                "info": false

              }); 
});
      function modalViewPo(purid){
        
        //alert(purid);
        $.post("../controllers/controller_purchase.php?type=viewPurchaseModal",
        {purid:purid},
        function(data,status){
        if(status=="success"){
              //alert(data);


          $("#purchaseModalTable").DataTable().destroy();
          $("#purchaseModalTable tbody").empty();
          $("#purchaseModalTable tbody").append(data);
          $("#purchaseModalTable").DataTable({
                "searching": false,
                "paging": false,
                "info": false

              });                 

              // var jdata=jQuery.parseJSON(data);
              // $("#editModalProductId").val(jdata.pro_id);
              // $("#editModalProductCat").val(jdata.product_cat_name);
              // $("#editModalProductSubCat").val(jdata.product_subcat_name);
              // $("#editModalProductName").val(jdata.pro_name);
              // $("#editModalProductSupplier").val(jdata.sup_name);

           }
        });
    
      }


  $(document).ready(function(){

    $.noConflict();
    // $('#productTable').datatable();
    // load datatable on load
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

      

     

    

  });


</script>


<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>

