<?php require_once("../incl/header.php");?>
<?php require_once("../incl/sidebar.php");?>
<?php require_once("../incl/pagetop.php");?>

<div class="page-content">
	

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
		<div class="form-actions">	
			<div>       
        		<h4 class="page-header"><b>View Route Schedule</b></h4>
      		</div>

           <form id="purchaseform" method="post" >
            <div class="row">               
              <div class="col-md-3">
                  <div class="form-group" id="filter_col1" data-column="2">
                    <label for="exampleInputEmail1">Supplier</label>

<!--                         <span class="input-group-addon">
                          <input type="checkbox" class="column_filter" id="col2_smart">
                        </span> -->
                    <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                     <option value="0">--Select Supplier--</option>

                    </select>
                  
                  </div>
              </div>
              
              <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Territory</label>

<!--                         <span class="input-group-addon">
                          <input type="checkbox" class="column_filter" id="col2_smart">
                        </span> -->
                    <select name="selectTerritory" id="selectTerritory" class="form-control selcet-filter">
                     <option value="0">--Select Territory--</option>

                    </select>
                   
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Date Range</label>                  
    						<div class="input-group">
    							<div class="input-daterange input-group">
                      <input type="text" class="input form-control date-picker"
                        name="start" id="datestart"/>
                      <span class="input-group-addon">
                        <i class="fa fa-exchange"></i>
                      </span>

                      <input type="text" class="input form-control date-picker"
                        name="end" id="enddate"/>
                  </div>
    						</div>
                </div>
              </div>
            
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
                  <!-- <tr>
                  	<td>RT001</td>
                  	<td>WEWAGAMA UP TO GALGAMMULLA</td>
                  	<td><span class="label label-success arrowed">Scheduled</span></td>
                  	<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#modelViewProduct">
						<i class="ace-icon fa fa-info-circle bigger-120"></i>
					</button>

          <a href="route_sche_edit.php?route_id=12" class="btn btn-xs btn-info">
            <i class="ace-icon fa fa-pencil bigger-120"></i>
          </a>

					<button class="btn btn-xs btn-warning">
						<i class="ace-icon fa fa-flag bigger-120"></i>
					</button>
				</div></td>
                  </tr>
                  <tr>
                  	<td>RT002</td>
                  	<td>DAMBADENIYA TOWN</td>
                  	<td><span class="label label-success arrowed">Scheduled</span></td>
                  	<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#modelViewProduct">
						<i class="ace-icon fa fa-info-circle bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modelEditProduct">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-warning">
						<i class="ace-icon fa fa-flag bigger-120"></i>
					</button>
				</div></td>
                  </tr>
                  <tr>
                  	<td>RT003</td>
                  	<td>MATIYAGANE UP TO MUTHUGALA</td>
                  	<td><span class="label label-success arrowed">Scheduled</span></td>
                  	<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#modelViewProduct">
						<i class="ace-icon fa fa-info-circle bigger-120"></i>
					</button>

					<ahref class="btn btn-xs btn-info">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</ahref>

					<button class="btn btn-xs btn-warning">
						<i class="ace-icon fa fa-flag bigger-120"></i>
					</button>
				</div></td>
                  </tr>
                  <tr>
                  	<td>RT004</td>
                  	<td>15TH MILE POST, HAVENEGEDARA, HOROMBAWA</td>
                  	<td><span class="label label-warning">
												<i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
												Not Scheduled
											</span></td>
                  	<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#modelViewProduct">
						<i class="ace-icon fa fa-info-circle bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modelEditProduct">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-warning">
						<i class="ace-icon fa fa-flag bigger-120"></i>
					</button>
				</div></td>
                  </tr>
                  <tr>
                  	<td>RT005</td>
                  	<td>NARAMMALA, HAALWELLA, DAMPELESSA</td>
                  	<td><span class="label label-warning">
												<i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
												Not Scheduled
											</span></td>
                  	<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#modelViewProduct">
						<i class="ace-icon fa fa-info-circle bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modelEditProduct">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>
					<button class="btn btn-xs btn-warning">
						<i class="ace-icon fa fa-flag bigger-120"></i>
					</button>
				</div></td>
                  </tr> -->

                                                                                                           
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
    <div class="modal fade" id="modelDeleteProduct" tabindex="-1" >
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
			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
<script type="text/javascript">
	jQuery(function($){

    $('#rtscheViewTable').DataTable({
      bAutoWidth: false,
      aoColumns: [null, null,null, null, null,{"bSortable": false }],
      aaSorting: [],
      select: {style:'multi'}
    });    


  $('#enddate').change(function(){

      var supplierval = $('#selectSupplier').val(); // get option's value
      var selectTerritory = $('#selectTerritory').val();
      var datestart = $('#datestart').val();
      var enddate = $('#enddate').val();      

      //change product category select box
      $.post("../controllers/controller_routeSche.php?type=rtscheViewDatatable",
      {supplierval:supplierval,selectTerritory:selectTerritory,datestart:datestart,enddate:enddate},
      function(data,status){
      if(status=="success"){
        //alert(data);
          $("#rtscheViewTable").DataTable().destroy();
          $("#rtscheViewTable tbody").empty();
          $("#rtscheViewTable tbody").append(data);
          $("#rtscheViewTable").DataTable();
        }
      });

    });    

  $(document).ready(function(){
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
  });
  });

  $(document).ready(function(){

      $.post("../controllers/controller_products.php?type=selectSupplierLoad",
      function(data,status){
      if(status=="success"){
      //alert(data); 
      $("#selectSupplier").empty();
      $("#selectSupplier").append("<option value=''>--Select Supplier--</option>");
      $("#selectSupplier").append(data);
      
      }
    });
      
  });

  $('#selectSupplier').change(function(){

      var supplierval = $('#selectSupplier').val(); // get option's value

      //change product category select box
      $.post("../controllers/controller_routeSche.php?type=selectTerritory",
      {supplierval:supplierval},
      function(data,status){
      if(status=="success"){
        //alert(data);
        $("#selectTerritory").empty();
        $("#selectTerritory").append("<option value='0'>--Select Purchase Order--</option>");    
        $("#selectTerritory").append(data);
        // $("#poSupplier").attr("disabled", "disabled");
        }
      });

    });  


      $('#rtscheViewTable tbody').on( 'click', '.fa-trash-o', function () {
        

        
      } );  
</script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>
