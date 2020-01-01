  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->

    <div class="form-actions">  
      <div>       
            <h4 class="page-header"><b>View Purchase Order</b></h4>
      </div>
        <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body" >
              <form id="purchaseform" method="post" >
            <div class="row"> 
              
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Purchase Order ID</label>
                  <input readonly type="text" class="form-control" id="poid" name="poid">
                </div>
              </div>
              
              <div class="col-md-4 form-group">
                  <div>
                    <label for="poSupplier">Supplier</label>
                    <select name="poSupplier" id="poSupplier" class="form-control selcet-filter">
                     <option value="3">--Select Supplier--</option>
                    </select>                  
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Date</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar bigger-110"></i>
                        </span>
                        <input class="form-control date-picker" id="podate" name="podate"
                         readonly type="text" data-date-format="dd-mm-yyyy"/>
                    </div>
                </div>
              </div>
            
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Remarks</label>
                  <textarea class="form-control" rows="3" id="poremarks" name="poremarks"></textarea>                  
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 form-group">
                  <div>
                    <label for="exampleInputEmail1">Product Category</label>
                    <select name="poProductCat" id="poProductCat" class="form-control selcet-filter">
                     <option value="0">--Select Product Category--</option>                     
                    </select>                                       
                  </div>
              </div>
              <div class="col-md-4 form-group">
                <div>
                  <label for="poProductList">Product Name</label>
                  <select class="form-control selcet-filter select2gg" id="poProductList" name="poProductList">
                    <option></option>
                  </select>
                </div>
              </div>

                <div class="col-md-2 form-group">
                <div>
                  <label for="qty">Qty</label>
                  <input type="text" class="form-control" name="qty" id="qty">
                  
                </div>
              </div>
                
              
              <div class="col-xs-2">
                  <div class="col-xs-2">
                <div class="form-group">
                  <label for="proid" style="color: white;">&nbsp;</label>
                   <button type='button' class='btn btn-primary m-b-20' id='addproductbutton' >Add Items</button>
                </div>
              </div>
              </div>
            </div>
             <div class="row">
              <div class="col-xs-12">

                <div class="form-group">
                <div class="row">
                  <div class="col-xs-12">
<!--                     <h3 class="header smaller lighter blue">jQuery dataTables</h3> -->

                    <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                      Purchase Order - Product List
                    </div>

                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                      <table id="purchaseTable" class="table table-striped table-bordered table-hover">
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
                            <th>Actions</th>
                          </tr>
                        </thead>

                        <tbody id="tablebody">
 
                          <!-- <tr class="selected"> -->
<!--                             <td class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </td> -->

<!--                             <td>GG</td>
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
                  </div>
                </div>

                <div id="grid-pager"></div>                  
                </div>
              </div>
              </div>            

<!--                     <table id="product_table" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>                  
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody id="ttt">
                          <tr>
                            <td>Test1</td>
                            <td>Test1</td>
                            <td>Test1</td>
                          </tr>
                        </tbody>
                      </table> -->
               <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
          <div class="pull-right">
          <button class="btn btn-grey" type="reset">
            <i class="ace-icon fa fa-undo bigger-110"></i>
            Reset
          </button>

          &nbsp; &nbsp; &nbsp;
          <button class="btn btn-info" type="button" id="pobtnSave">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Submit
          </button>
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
        </div>
    </div>

      <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
  </div><!-- /.row -->
<script type="text/javascript">
  $(document).ready(function(){
    alert(pur_id);
  });
  
</script>