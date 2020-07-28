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

        $.post("../controllers/controller_suppliers.php?type=deleteSup", {
            cusid: cusid
          },
          function (data, status) {
            if (status == "success") {

              Swal.fire(
                'Deleted!',
                'Record has been deleted.',
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
  jQuery(function ($) {

    var myTable =
      $('#stockTable')

      .DataTable({
        bAutoWidth: false,
        "aoColumns": [
          null, null, null, null,
          {
            "bSortable": false
          }
        ],
        "aaSorting": [],


        select: {
          style: 'multi'
        }
      });
  });

  $(document).ready(function () {
    document.title = "View Supplier";
    $.noConflict();

    $.ajax({
      url: "../controllers/controller_suppliers.php?type=viewSupplierTable",
      method: "POST",
      processData: false,
      contentType: false,
      success: function (data) {

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