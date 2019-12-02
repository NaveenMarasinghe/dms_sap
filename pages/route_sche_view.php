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
                    <div class="input-group">
<!--                         <span class="input-group-addon">
                          <input type="checkbox" class="column_filter" id="col2_smart">
                        </span> -->
                    <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                     <option value="0">--Select Supplier--</option>
                     <option value="0">--Select Sggggggggggggggggggggggggggupplier--</option>

                    </select>
                    </div>                    
                  </div>
              </div>
              
              <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Territory</label>
                    <div class="input-group">
<!--                         <span class="input-group-addon">
                          <input type="checkbox" class="column_filter" id="col2_smart">
                        </span> -->
                    <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                     <option value="0">--Select Territory--</option>
                     <option value="0">--Select Sggggggggggggggggggggggggggupplier--</option>

                    </select>
                    </div>                    
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Date Range</label>                  
						<div class="input-group">
							<div class="input-daterange input-group">
                  <input type="text" class="input form-control "
                    name="start" id="datestart"/>
                  <span class="input-group-addon">
                    <i class="fa fa-exchange"></i>
                  </span>

                  <input type="text" class="input form-control"
                    name="end" id="enddate"/>
              </div>
						</div>
                </div>
              </div>
            
            </div>
            <div class="row">
            	<table id="productTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Route ID</th>
                  <th>Route Name</th>                  
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id="viewProductBody">
                  <tr>
                  	<td>RT001</td>
                  	<td>WEWAGAMA UP TO GALGAMMULLA</td>
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

					<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modelEditProduct">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

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
                  </tr>
                  <tr>
                  	<td>RT006</td>
                  	<td>DAMBADENIYA, ATHURUWELA UP TO MAAHARAGAMA</td>
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
                  	<td>RT007</td>
                  	<td>KATUGAMPOLA UP TO EDANDAWELA</td>
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
                </tbody>
                <tfoot>
            
              </tfoot>
              </table>
            </div>
               <div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<div class="pull-right">
					<button class="btn btn-warning" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>

					&nbsp; &nbsp; &nbsp;
					<button class="btn btn-info" type="button" id="addSupplierSave">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Submit
					</button>
				</div>
			</div>
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

			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
<script type="text/javascript">
	      jQuery(function($){

$('#productTable').dataTable( {
  "columnDefs": [
    { "width": "15%", "targets": 3 },
    { "width": "20%", "targets": 2 },
    { "width": "50%", "targets": 1 },
    { "width": "15%", "targets": 0 }
  ],
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false
} );
      });
</script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>
