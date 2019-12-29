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

          <div class="box-header with-border">
              <h3 class="box-title">View Products</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                <div class="col-md-3">
                <a href="../pages/product_add.php" id="id-btn-dialog1" class="btn btn-purple btn-sm" style='margin-bottom: 10px;'>Add New Product</a>
                </div>
              </div>
<!--               <div class="row">
                <div class="col-md-3">
              <button type='button' class='btn btn-primary m-b-20' data-toggle='modal' data-target='#modelEditProduct' style='margin-bottom: 10px;' id='addbutton'>Add New Product</button> 
                </div>
              </div> -->
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
                        <?php 
                        
                        ?>
                    </select>
                    </div>                    
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Category</label>
                    <div class="input-group">
<!--                         <span class="input-group-addon">
                          <input type="checkbox">
                        </span> -->
                    <select name="selectProductCat" id="selectProductCat" class="form-control">
                     <option value="">--Select Product Category--</option>
                        <?php 
                        
                        ?>
                    </select>
                    </div>                    
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product</label>
                    <div class="input-group">
<!--                         <span class="input-group-addon">
                          <input type="checkbox">
                        </span> -->
                    <select name="selectProductsubCat" id="selectProductsubCat" class="form-control">
                     <option value="">--Select Product Sub Category--</option>
                        
                    </select>
                    </div>                    
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
<!--  View product details modal -->
    <div class="modal fade" id="modelViewProduct" tabindex="-1" >
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
                  <input type="text" readonly="readonly" class="col-xs-10 col-sm-8" placeholder="" id="editModalProductSubCat" name="editModalProductSubCat"/>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name </label>

                <div class="col-sm-9">
                  <div class="clearfix">
                  <input type="text" readonly="readonly" class="col-xs-10 col-sm-8" placeholder="" id="editModalProductName" name="editModalProductName"/>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Supplier </label>

                <div class="col-sm-9">
                  <div class="clearfix">
                  <input type="text" readonly="readonly" class="col-xs-10 col-sm-8" placeholder="" id="editModalProductSupplier" name="editModalProductSupplier"/>
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
});
      function modalViewProduct(proid){
        
        alert(proid);
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


  $(document).ready(function(){

    $.noConflict();
    // $('#productTable').datatable();
    // load datatable on load
    $.ajax({
      url:"../controllers/controller_products.php?type=viewProductTable",
      method:"POST",
      processData: false,
      contentType: false,
    success: function(data){
      //alert(data);
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
      $.post("../controllers/controller_products.php?type=get_filteredProCat",
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


          $.post("../controllers/controller_products.php?type=get_filtered_data",
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
      $.post("../controllers/controller_products.php?type=get_filteredSubCat",
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

      $.post("../controllers/controller_products.php?type=get_filtered_data",
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

      $.post("../controllers/controller_products.php?type=get_filtered_data",
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

