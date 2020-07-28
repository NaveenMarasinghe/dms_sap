<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="2")){
      header("location:../index.php");
    } 
?>

<?php require_once("../incl/header.php"); ?>
<?php require_once("../incl/sidebar.php"); ?>
<?php require_once("../incl/pagetop.php"); ?>

<div class="page-content">


  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <div class="form-actions">
      <div class="box-header with-border">
        <h3 class="box-title">View Goods Received Note</h3>
      </div>
      <div class="clearfix">
        <div class="pull-right tableTools-container"></div>
      </div>
      <table id="stockTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>GRN ID</th>
            <th>Purchase Order</th>
            <th>Supplier Name</th>
            <th>Date</th>            
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="viewStockBody">
          <tr>
            <td>Batch ID</td>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>34</td>
            <td>Selling Price</td>

          </tr>
        </tbody>
        <tfoot>

        </tfoot>
      </table>

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

                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>

                          </tr>
                        </thead>

                        <tbody id="purchaseModalTableBody">
 

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
    </div>
      <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
  </div><!-- /.row -->

</div><!-- /.page-content -->


<script type="text/javascript">
  jQuery(function($) {
    function myDatatable() {}
  });

  function modalViewPo(grnid){
        
   
        $.post("../controllers/controller_grn.php?type=viewGrnModal",
        {grnid:grnid},
        function(data,status){
        if(status=="success"){         

          $("#purchaseModalTable").DataTable().destroy();
          $("#purchaseModalTable tbody").empty();
          $("#purchaseModalTable tbody").append(data);
          $("#purchaseModalTable").DataTable({
                "searching": false,
                "paging": false,
                "info": false

              });                 

           }
        });
    
      }


  $(document).ready(function() {

    document.title = "View GRN";

    $.noConflict();
    $.ajax({
      url: "../controllers/controller_grn.php?type=viewGrn",
      method: "POST",
      processData: false,
      contentType: false,
    }).done(function(data) {

      $("#stockTable").DataTable().destroy();
      $("#stockTable tbody").empty();


      $("#stockTable tbody").append(data);

      var myTable =
        $('#stockTable')
        
        .DataTable({
            "order": [[ 0, "desc" ]],
          bAutoWidth: true,
          "aoColumns": [

            null, null, null, null, null,

          ],
          "aaSorting": [],
          "columnDefs": [{
              "width": "10%",
              "targets": 4
            },
            {
              "width": "20%",
              "targets": 3
            },
            {
              "width": "20%",
              "targets": 2
            },
            {
              "width": "30%",
              "targets": 1
            },
            {
              "width": "20%",
              "targets": 0
            }
          ]

        });


    });

  });

</script>

<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>