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

           
		</div>
		</div>
	</div>
  <div class="modal fade" id="modelEditEmp" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="blue bigger">Edit Employee Details</h4>
          </div>

          <div class="modal-body">
            <div class="row">
              <form class="form-horizontal" role="form" id="form_addNewProductCat">
                <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="modalEmpId"> Emp ID </label>

                  <div class="col-sm-9">
                    <input type="text" readonly="readonly" id="modalEmpId" name="modalEmpId" placeholder="" class="col-xs-10 col-sm-8" />
                    <div class="clearfix">

                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee Name </label>

                  <div class="col-sm-9">
                    <div class="clearfix">
                      <input type="text" readonly="readonly" id="modalDriver" name="modalDriver" placeholder="" class="col-xs-10 col-sm-8" />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vehicle </label>

                  <div class="col-sm-9">
                    <div class="clearfix">
                      <input type="text" readonly="readonly" class="col-xs-10 col-sm-8" placeholder="" id="modalVehicle" name="modalVehicle" />
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
</div>
<script type="text/javascript">

function editEmp(empid){
  window.location.href = "employee_edit.php?emp_id=" + empid;
}

function removeEmp(empId) {

var empId = empId;

Swal.fire({
  title: 'Are you empId?',
  text: "Remove : " + empId,
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#3085d6',
  confirmButtonText: 'Yes, Remove it!'
}).then((result) => {
  if (result.value) {

    $.post("../controllers/controller_cus.php?type=removeEmp", {
      empId: empId
      },
      function (data, status) {
        if (status == "success") {

          Swal.fire(
            'Removed!',
            'Record has been removed.',
            'success'
          ).then((result) => {
            if (result.value) {

              location.reload();

            }
          })
        }
      });
  }
})
}

        jQuery(function($){

      });

       $(document).ready(function(){

        document.title = "View Employee";
       	    $.noConflict();
		    
		    $.ajax({
		      url:"../controllers/controller_cus.php?type=viewEmpTable",
		      method:"POST",
		      processData: false,
		      contentType: false,
		    success: function(data){
		        $("#supplierTable").DataTable().destroy();
		        $("#supplierTable tbody").empty();
		        $("#supplierTable tbody").append(data);
		        $("#supplierTable").DataTable();
		      
		      }
		    });
       });

</script>

<?php require_once("../incl/footer.php");?>