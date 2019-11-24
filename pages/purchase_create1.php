<?php require_once("../incl/header.php");?>
<?php require_once("../incl/sidebar.php");?>
<?php require_once("../incl/pagetop.php");?>

<div class="page-content">
  

  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->

    <div class="form-actions">  
      <div>       
            <h4 class="page-header"><b>Add Purchase Order</b></h4>
          </div>
        <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body">
              <form id="purchaseform" method="post" >
            <div class="col-xs-12"> 
              
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Purchase Order ID</label>
                  <input type="text" class="form-control" id="poid" name="poid">
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Supplier</label>
                  <input type="text" class="form-control" id="posupplier" name="posupplier">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Date</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  <input type="text" class="form-control pull-right" id="podatepicker" name="podatepicker">
                </div>
                </div>
              </div>
            
            </div>
            <div class="col-xs-12">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Remarks</label>
                  <textarea class="form-control" rows="3" id="poremarks" name="poremarks"></textarea>
                  
                </div>
              </div>
            </div>

            <div class="col-xs-12">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Product Catagory</label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Product Name</label>
                  <input type="text" class="form-control" name="productname" id="productname">
                </div>
              </div>

                <div class="col-md-2">
                <div class="form-group">
                  <label for="proid">Qty</label>
                  <input type="text" class="form-control" name="qty" id="qty">
                  
                </div>
              </div>
                
              
              <div class="col-xs-2">
                  <div class="col-xs-2">
                <div class="form-group">
                  <label for="proid" style="color: white;">gg</label>
                   <button type='button' class='btn btn-primary m-b-20' id='addproductbutton' >Add Items</button>
                </div>
              </div>
              </div>
            </div>
             <div class="col-xs-12">

                <div class="form-group">
                <table id="list5"></table>

                <div id="pager5"></div>                  
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
</div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
              <span class="blue bolder">Ace</span>
              Application &copy; 2013-2014
            </span>

            &nbsp; &nbsp;
            <span class="action-buttons">
              <a href="#">
                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
              </a>
            </span>
          </div>
        </div>
      </div>

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="../assets/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
    <script src="../assets/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/js/jquery.jqGrid.min.js"></script>
    <script src="../assets/js/grid.locale-en.js"></script>

    <!-- ace scripts -->
    <script src="../assets/js/ace-elements.min.js"></script>
    <script src="../assets/js/ace.min.js"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      var grid_data = 
      [ 
        {id:"1",name:"Desktop Computer",note:"note",stock:"Yes",ship:"FedEx", sdate:"2007-12-03"},
        {id:"2",name:"Laptop",note:"Long text ",stock:"Yes",ship:"InTime",sdate:"2007-12-03"},
        {id:"3",name:"LCD Monitor",note:"note3",stock:"Yes",ship:"TNT",sdate:"2007-12-03"},
        {id:"4",name:"Speakers",note:"note",stock:"No",ship:"ARAMEX",sdate:"2007-12-03"},
        {id:"5",name:"Laser Printer",note:"note2",stock:"Yes",ship:"FedEx",sdate:"2007-12-03"},
        {id:"6",name:"Play Station",note:"note3",stock:"No", ship:"FedEx",sdate:"2007-12-03"},
        {id:"7",name:"Mobile Telephone",note:"note",stock:"Yes",ship:"ARAMEX",sdate:"2007-12-03"},
        {id:"8",name:"Server",note:"note2",stock:"Yes",ship:"TNT",sdate:"2007-12-03"},
        {id:"9",name:"Matrix Printer",note:"note3",stock:"No", ship:"FedEx",sdate:"2007-12-03"},
        {id:"10",name:"Desktop Computer",note:"note",stock:"Yes",ship:"FedEx", sdate:"2007-12-03"},
        {id:"11",name:"Laptop",note:"Long text ",stock:"Yes",ship:"InTime",sdate:"2007-12-03"},
        {id:"12",name:"LCD Monitor",note:"note3",stock:"Yes",ship:"TNT",sdate:"2007-12-03"},
        {id:"13",name:"Speakers",note:"note",stock:"No",ship:"ARAMEX",sdate:"2007-12-03"},
        {id:"14",name:"Laser Printer",note:"note2",stock:"Yes",ship:"FedEx",sdate:"2007-12-03"},
        {id:"15",name:"Play Station",note:"note3",stock:"No", ship:"FedEx",sdate:"2007-12-03"},
        {id:"16",name:"Mobile Telephone",note:"note",stock:"Yes",ship:"ARAMEX",sdate:"2007-12-03"},
        {id:"17",name:"Server",note:"note2",stock:"Yes",ship:"TNT",sdate:"2007-12-03"},
        {id:"18",name:"Matrix Printer",note:"note3",stock:"No", ship:"FedEx",sdate:"2007-12-03"},
        {id:"19",name:"Matrix Printer",note:"note3",stock:"No", ship:"FedEx",sdate:"2007-12-03"},
        {id:"20",name:"Desktop Computer",note:"note",stock:"Yes",ship:"FedEx", sdate:"2007-12-03"},
        {id:"21",name:"Laptop",note:"Long text ",stock:"Yes",ship:"InTime",sdate:"2007-12-03"},
        {id:"22",name:"LCD Monitor",note:"note3",stock:"Yes",ship:"TNT",sdate:"2007-12-03"},
        {id:"23",name:"Speakers",note:"note",stock:"No",ship:"ARAMEX",sdate:"2007-12-03"}
      ];
      
      
      jQuery(function($) {
        var grid_selector = "#list5";
        var pager_selector = "#pager5";

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        //resize to fit page size
        $(window).on('resize.jqGrid', function () {
          $(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );
          })
        
        //resize on sidebar collapse/expand
        $(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
          if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
            //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
            setTimeout(function() {
              $(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );
            }, 20);
          }
          })

        jQuery(grid_selector).jqGrid({
          //direction: "rtl",
      
   
      
      
          data: grid_data,
          datatype: "local",
          height: "100%",
          colNames:[' ', 'ID','Last Sales','Name', 'Stock', 'Ship via','Notes'],
          colModel:[
            {name:'myac',index:'', width:80, fixed:true, sortable:false, resize:false,
              formatter:'actions', 
              formatoptions:{ 
                keys:true,
                //delbutton: false,//disable delete button
                

                //editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
              }
            },
            {name:'id',index:'id', width:60, sorttype:"int", editable: true},
            {name:'sdate',index:'sdate',width:90, editable:true, sorttype:"date"},
            {name:'name',index:'name', width:150,editable: true,editoptions:{size:"20",maxlength:"30"}},
            {name:'stock',index:'stock', width:70, editable: true,edittype:"checkbox",editoptions: {value:"Yes:No"}},
            {name:'ship',index:'ship', width:90, editable: true,edittype:"select",editoptions:{value:"FE:FedEx;IN:InTime;TN:TNT;AR:ARAMEX"}},
            {name:'note',index:'note', width:150, sortable:false,editable: true,edittype:"textarea", editoptions:{rows:"2",cols:"10"}}
          ], 
      
          viewrecords : true,
          rowNum:10,
          rowList:[10,20,30],
          pager : pager_selector,
          altRows: true,
          //toppager: true,
          
          multiselect: true,
          //multikey: "ctrlKey",
              multiboxonly: true,
      

      
          editurl: "./dummy.php",//nothing is saved
          caption: "jqGrid with inline editing"
      
          //,autowidth: true,
      
      
          /**
          ,
          grouping:true, 
          groupingView : { 
             groupField : ['name'],
             groupDataSorted : true,
             plusicon : 'fa fa-chevron-down bigger-110',
             minusicon : 'fa fa-chevron-up bigger-110'
          },
          caption: "Grouping"
          */
      
        });
      });
    </script>
  </body>
</html>
