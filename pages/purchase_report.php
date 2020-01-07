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
		<div class="form-vertical">
			<div class="col-md-4">
                <div class="form-group">
                  <label for="dateFrom">Date</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar bigger-110"></i>
                        </span>
                        <input class="form-control date-picker" id="dateFrom" name="dateFrom"
                         readonly type="text" data-date-format="dd-mm-yyyy"/>
                    </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="dateTo">Date</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar bigger-110"></i>
                        </span>
                        <input class="form-control date-picker" id="dateTo" name="dateTo"
                         readonly type="text" data-date-format="dd-mm-yyyy"/>
                    </div>
                </div>
              </div>

              <div class="col-md-4">
              	<div class="form-group">
              		<label for=""></label>
              		<button class="btn btn-primary" id="btnGenerate">Generate</button>
              	</div>
              </div>
		</div>

	</div>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->


            <!-- /.box-header -->
            <div class="form-actions">
            <div>       
                  <h4 class="page-header"><b>Purchase order report</b></h4>
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

	$('#dateFrom').datepicker({
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'yy-mm-dd',
        maxDate : new Date()
      });

	$('#dateTo').datepicker({
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'yy-mm-dd',
        maxDate : new Date()
      });
      //$('.date-picker').datepicker('setDate', new Date());

  $(document).ready(function(){
	loadReport(); 
  });

  $("#btnGenerate").click(function(){
  	loadReport();
  });

  function loadReport(){
  	var dateFrom = $("#dateFrom").val();
  	var dateTo = $("#dateTo").val();


    $.noConflict();
    // $('#productTable').datatable();
    // load datatable on load
      $.ajax({
        url:"../controllers/controller_purchase.php?type=purchaseReportView",
        method:"POST",
        data :{dateFrom:dateFrom,dateTo:dateTo},
      success: function(data){
        //alert(data);
          $("#purchaseOrderTable").DataTable().destroy();
          $("#purchaseOrderTable tbody").empty();
          $("#purchaseOrderTable tbody").html(data);
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
  }


</script>


<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>