<?php
  session_start();
    if(!isset($_SESSION["user"]) ){
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
   
            <!-- /.box-header -->
            <div class="box-body">

<!--               <div class="row">
                <div class="col-md-3">
              <button type='button' class='btn btn-primary m-b-20' data-toggle='modal' data-target='#modelEditProduct' style='margin-bottom: 10px;' id='addbutton'>Add New Product</button> 
                </div>
              </div> -->
                <div class="row">
                <div class="col-md-3">
                  <div class="form-group" id="filter_col1" data-column="2">
                    <label for="exampleInputEmail1">Supplier</label>

                    <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                     <option value="0">--Select Supplier--</option>
                        <?php 
                        
                        ?>
                    </select>
                 
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Category</label>

                    <select name="selectProductCat" id="selectProductCat" class="form-control">
                     <option value="">--Select Product Category--</option>
                        <?php 
                        
                        ?>
                    </select>
                  
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product</label>

                    <select name="selectProductsubCat" id="selectProductsubCat" class="form-control">
                     <option value="">--Select Product Sub Category--</option>
                        
                    </select>
                   
                  </div>
                </div>
                <div class="col-md-3">
                  
                </div>
              </div>

              <table id="productTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Product Category</th>                  
                  <th>Product Sub-Category</th>
                  <th>Product Name</th>
                  <th>Product Stock</th>
                  <th>Supplier</th>
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
<!--  View product details modal -->

<!-- End of view product details modal -->

 
<!-- /.page-content -->

<script type="text/javascript">
jQuery(function($){

var myTable = $('#productTable').DataTable({
    bAutoWidth: false,
    aoColumns: [null, null,null, null, null, null,{"bSortable": false }],
    aaSorting: [],
    select: {style:'multi'}
  });
});




  $(document).ready(function(){
    document.title = "Product View";
    $.noConflict();
    // $('#productTable').datatable();
    // load datatable on load
    $.ajax({
      url:"../controllers/controller_reports.php?type=get_filtered_data",
      method:"POST",
      processData: false,
      contentType: false,
    success: function(data){
      // alert(data);
        $("#productTable").DataTable().destroy();
        $("#productTable tbody").empty();
        $("#productTable tbody").append(data);
        $("#productTable").DataTable();
      
      }
    });

    // load supplier select box
      $.ajax({
      url:"../controllers/controller_products.php?type=selectSupplierLoad",
      method:"POST",
      processData: false,
      contentType: false,
    success: function(data){
      //alert(data); 
      $("#selectSupplier").empty();
      $("#selectSupplier").append("<option value=''>--Select Supplier--</option>");
      $("#selectSupplier").append(data);
      
      }
    });
  });

    $('#selectSupplier').change(function(){
      // alert("gg");
      // table
      //   .columns(4)
      //   .search(this.value)
      //   .draw();
      // $.noConflict();
      var supplierval = $('#selectSupplier').val(); // get option's value
 // get option's value


      //change product category select box
      $.post("../controllers/controller_reports.php?type=get_filtered_data",
      {supplierval:supplierval},
      function(data,status){
      if(status=="success"){
        // alert(data);
        $("#selectProductCat").empty();
        $("#selectProductsubCat").empty();
        $("#selectProductsubCat").append("<option value=''>--Select Product Sub Category--</option>");        
        $("#selectProductCat").append("<option value=''>--Select Product Category--</option>");
        $("#selectProductCat").append(data);
        }
      });

          var procatval = $('#selectProductCat').val();
          var prosubcatval = $('#selectProductsubCat').val();


          $.post("../controllers/controller_reports.php?type=get_filtered_data",
          {supplierval:supplierval,procatval:procatval,prosubcatval:prosubcatval},
          function(data,status){
          if(status=="success"){
            //alert(data);
            $("#productTable").DataTable().destroy();
            $("#productTable tbody").empty();
            $("#productTable tbody").append(data);
            $("#productTable").DataTable();
            }
          });


        });

    $('#selectProductCat').change(function(){

          var supplierval = $('#selectSupplier').val();
          var procatval = $('#selectProductCat').val(); // get option's value

      // get filtered data to datatable
      $.post("../controllers/controller_reports.php?type=get_filteredSubCat",
      {procatval:procatval},
      function(data,status){
      if(status=="success"){
        // alert(data);
        $("#selectProductsubCat").empty();
        $("#selectProductsubCat").append("<option value=''>Select Product Sub Category</option>");
        $("#selectProductsubCat").append(data);
        }
      });

          var prosubcatval = $('#selectProductsubCat').val();

      $.post("../controllers/controller_reports.php?type=get_filtered_data",
        {supplierval:supplierval,procatval:procatval,prosubcatval:prosubcatval},
        function(data,status){
        if(status=="success"){
          //alert(data);
          $("#productTable").DataTable().destroy();
          $("#productTable tbody").empty();
          $("#productTable tbody").append(data);
          $("#productTable").DataTable();
          }
      });

    });

    $('#selectProductsubCat').change(function(){
          var supplierval = $('#selectSupplier').val();
          var procatval = $('#selectProductCat').val();
          var prosubcatval = $('#selectProductsubCat').val();

      $.post("../controllers/controller_reports.php?type=get_filtered_data",
        {supplierval:supplierval,procatval:procatval,prosubcatval:prosubcatval},
        function(data,status){
        if(status=="success"){
          //alert(data);
          $("#productTable").DataTable().destroy();
          $("#productTable tbody").empty();
          $("#productTable tbody").append(data);
          $("#productTable").DataTable();
          }
      });
    });


</script>


<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>

