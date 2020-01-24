<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="4")){
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
        <div>
          <h4 class="page-header"><b>View Route Schedule</b></h4>
        </div>

        <form id="purchaseform" method="post">
          <div class="row">

          </div>
          <div class="row">
            <table id="rtscheViewTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Route Schedule ID</th>
                  <th>Route ID</th>
                  <th>Route Name</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="viewProductBody">

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
    <div class="modal fade" id="modelDeleteProduct" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="blue bigger">View Product Details</h4>
          </div>

          <div class="modal-body">
            <div class="row">
              <form class="form-horizontal" role="form" id="form_addNewProductCat">
                <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product ID </label>

                  <div class="col-sm-9">
                    <input type="text" readonly="readonly" id="editModalProductId" name="editModalProductId" placeholder="" class="col-xs-10 col-sm-8" />
                    <div class="clearfix">

                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Category </label>

                  <div class="col-sm-9">
                    <div class="clearfix">
                      <input type="text" readonly="readonly" id="editModalProductCat" name="editModalProductCat" placeholder="" class="col-xs-10 col-sm-8" />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Sub Category </label>

                  <div class="col-sm-9">
                    <div class="clearfix">
                      <input type="text" readonly="readonly" class="col-xs-10 col-sm-8" placeholder="" id="editModalProductSubCat" name="editModalProductSubCat" />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name </label>

                  <div class="col-sm-9">
                    <div class="clearfix">
                      <input type="text" readonly="readonly" class="col-xs-10 col-sm-8" placeholder="" id="editModalProductName" name="editModalProductName" />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier </label>

                  <div class="col-sm-9">
                    <div class="clearfix">
                      <input type="text" readonly="readonly" class="col-xs-10 col-sm-8" placeholder="" id="editModalProductSupplier" name="editModalProductSupplier" />
                    </div>
                  </div>
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
    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
<script type="text/javascript">
  jQuery(function($) {

    $(document).ready(function() {
      $('#datestart').datepicker({
        autoclose: true,

        todayHighlight: true,
        dateFormat: 'yy-mm-dd'
      });
      $('#enddate').datepicker({
        autoclose: true,

        todayHighlight: true,
        dateFormat: 'yy-mm-dd'
      });

      $.post("../controllers/controller_routeSche.php?type=rtscheViewDatatable", {

},
function(data, status) {
  if (status == "success") {
    //alert(data);
    $("#rtscheViewTable").DataTable().destroy();
    $("#rtscheViewTable tbody").empty();
    $("#rtscheViewTable tbody").append(data);
    $("#rtscheViewTable").DataTable({
      "order": [
        [0, "desc"]
      ],
      bAutoWidth: false,
      aoColumns: [null, null, null, null, null, {
        "bSortable": false
      }],
      aaSorting: [],
    });
  }
});
    });
  });

  $(document).ready(function() {





  });




  $('#rtscheViewTable tbody').on('click', '.fa-trash-o', function() {



  });
</script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>