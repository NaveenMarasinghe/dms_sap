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
      <div class="box-header with-border">
        <h3 class="box-title">View Customers</h3>
      </div>

      <table id="supplierTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Customer Telephone</th>
            <th>Sales Balance</th>
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
  function deleteRecord(cusid) {

    var cusid = cusid;
    Swal.fire({
      title: 'Are you sure?',
      text: "Delete : " + cusid,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  }

  function editRecord(cusid){
            window.location.href = "customer_edit.php?cus_id="+cusid;
        }

  $(document).ready(function() {
    $.noConflict();

    // load datatable on load
    $.ajax({
      url: "../controllers/controller_cus.php?type=viewCustomerTable",
      method: "POST",
      processData: false,
      contentType: false,
      success: function(data) {
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
<?php require_once("../incl/footer.php"); ?>