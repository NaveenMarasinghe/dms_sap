<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="4")){
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
      <div>       
            <h4 class="page-header"><b>Add Purchase Order</b></h4>
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
              
              <div class="col-md-4">
                  <div class="form-group">
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
              <div class="col-md-4">
                <div class="form-group">
                  <label for="proid">Date</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar bigger-110"></i>
                        </span>
                        <input class="form-control date-picker" id="purdate"
                         type="text" data-date-format="dd-mm-yyyy"/>
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
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Category</label>
                    <div class="input-group">
<!--                         <span class="input-group-addon">
                          <input type="checkbox" class="column_filter" id="col2_smart">
                        </span> -->
                    <select name="selectProductCat" id="selectProductCat" class="form-control selcet-filter">
                     <option value="0">--Select Product Category--</option>
                     <option value="0">--Select Sggggggggggggggggggggggggggupplier--</option>

                    </select>
                    </div>                    
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
                  <label for="proid" style="color: white;">&nbsp;</label>
                   <button type='button' class='btn btn-primary m-b-20' id='addproductbutton' >Add Items</button>
                </div>
              </div>
              </div>
            </div>
             <div class="row">
              <div class="col-xs-12">

                <div class="form-group">
                <table id="grid-table"></table>

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
        jQuery(function($) {
          $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
          })
          
          .next().on(ace.click_event, function () {
              $(this).prev().focus();
          });
        });

      var grid_data = 
      [ 
        {id:"P0001",pname:"Chocolate Biscuits 80g",qty:"120"},
        {id:"P0002",pname:"Ninja Mosquito Coil 200g",qty:"60"},
        {id:"P0003",pname:"Lemon Puff 80g",qty:"72"},
        {id:"P0004",pname:"Lemon Puff 400g",qty:"56"},


      ];
      
      
      jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";
        
        
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
        
        //if your grid is inside another element, for example a tab pane, you should use its parent's width:
        /**
        $(window).on('resize.jqGrid', function () {
          var parent_width = $(grid_selector).closest('.tab-pane').width();
          $(grid_selector).jqGrid( 'setGridWidth', parent_width );
        })
        //and also set width when tab pane becomes visible
        $('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
          if($(e.target).attr('href') == '#mygrid') {
          var parent_width = $(grid_selector).closest('.tab-pane').width();
          $(grid_selector).jqGrid( 'setGridWidth', parent_width );
          }
        })
        */
        
        
      
      
      
        jQuery(grid_selector).jqGrid({
          //direction: "rtl",
      
   
      
          data: grid_data,
          datatype: "local",
          height: "100%",
          colNames:['Product ID','Product Name','Quentity', 'Actions'],
          colModel:[

            
            {name:'id',index:'id', width:60, sorttype:"int", editable: true},
            {name:'pname',index:'pname', width:150,editable: true,editoptions:{size:"20",maxlength:"30"}},
            {name:'qty',index:'qty', width:150,editable: true,editoptions:{size:"20",maxlength:"30"}},
            {name:'myac',index:'', width:80, fixed:true, sortable:false, resize:false,
              formatter:'actions', 
              formatoptions:{ 
                keys:true,
                //delbutton: false,//disable delete button
                
                delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
                //editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
              }
            }
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
      
          loadComplete : function() {
            var table = this;
            setTimeout(function(){
              styleCheckbox(table);
              
              updateActionIcons(table);
              updatePagerIcons(table);
              enableTooltips(table);
            }, 0);
          },
      
          editurl: "./dummy.php",//nothing is saved
          caption: "Product List"
      
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
        $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size
        
        
      
        //enable search/filter toolbar
        //jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
        //jQuery(grid_selector).filterToolbar({});
      
      
        //switch element when editing inline
        function aceSwitch( cellvalue, options, cell ) {
          setTimeout(function(){
            $(cell) .find('input[type=checkbox]')
              .addClass('ace ace-switch ace-switch-5')
              .after('<span class="lbl"></span>');
          }, 0);
        }
        //enable datepicker
        function pickDate( cellvalue, options, cell ) {
          setTimeout(function(){
            $(cell) .find('input[type=text]')
              .datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
          }, 0);
        }
      
      
        //navButtons
        jQuery(grid_selector).jqGrid('navGrid',pager_selector,
          {   //navbar options
            edit: true,
            editicon : 'ace-icon fa fa-pencil blue',
            add: true,
            addicon : 'ace-icon fa fa-plus-circle purple',
            del: true,
            delicon : 'ace-icon fa fa-trash-o red',
            search: true,
            searchicon : 'ace-icon fa fa-search orange',
            refresh: true,
            refreshicon : 'ace-icon fa fa-refresh green',
            view: true,
            viewicon : 'ace-icon fa fa-search-plus grey',
          },
          {
            //edit record form
            //closeAfterEdit: true,
            //width: 700,
            recreateForm: true,
            beforeShowForm : function(e) {
              var form = $(e[0]);
              form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
              style_edit_form(form);
            }
          },
          {
            //new record form
            //width: 700,
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            beforeShowForm : function(e) {
              var form = $(e[0]);
              form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
              .wrapInner('<div class="widget-header" />')
              style_edit_form(form);
            }
          },
          {
            //delete record form
            recreateForm: true,
            beforeShowForm : function(e) {
              var form = $(e[0]);
              if(form.data('styled')) return false;
              
              form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
              style_delete_form(form);
              
              form.data('styled', true);
            },
            onClick : function(e) {
              //alert(1);
            }
          },
          {
            //search form
            recreateForm: true,
            afterShowSearch: function(e){
              var form = $(e[0]);
              form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
              style_search_form(form);
            },
            afterRedraw: function(){
              style_search_filters($(this));
            }
            ,
            multipleSearch: true,
            /**
            multipleGroup:true,
            showQuery: true
            */
          },
          {
            //view record form
            recreateForm: true,
            beforeShowForm: function(e){
              var form = $(e[0]);
              form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            }
          }
        )
      
      
        
        function style_edit_form(form) {
          //enable datepicker on "sdate" field and switches for "stock" field
          form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
          
          form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
                 //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
                //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');
      
              
          //update buttons classes
          var buttons = form.next().find('.EditButton .fm-button');
          buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
          buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
          buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')
          
          buttons = form.next().find('.navButton a');
          buttons.find('.ui-icon').hide();
          buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
          buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');   
        }
      
        function style_delete_form(form) {
          var buttons = form.next().find('.EditButton .fm-button');
          buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
          buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
          buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
        }
        
        function style_search_filters(form) {
          form.find('.delete-rule').val('X');
          form.find('.add-rule').addClass('btn btn-xs btn-primary');
          form.find('.add-group').addClass('btn btn-xs btn-success');
          form.find('.delete-group').addClass('btn btn-xs btn-danger');
        }
        function style_search_form(form) {
          var dialog = form.closest('.ui-jqdialog');
          var buttons = dialog.find('.EditTable')
          buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
          buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
          buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
        }
        
        function beforeDeleteCallback(e) {
          var form = $(e[0]);
          if(form.data('styled')) return false;
          
          form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
          style_delete_form(form);
          
          form.data('styled', true);
        }
        
        function beforeEditCallback(e) {
          var form = $(e[0]);
          form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
          style_edit_form(form);
        }
      
      
      
        //it causes some flicker when reloading or navigating grid
        //it may be possible to have some custom formatter to do this as the grid is being created to prevent this
        //or go back to default browser checkbox styles for the grid
        function styleCheckbox(table) {
        /**
          $(table).find('input:checkbox').addClass('ace')
          .wrap('<label />')
          .after('<span class="lbl align-top" />')
      
      
          $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
          .find('input.cbox[type=checkbox]').addClass('ace')
          .wrap('<label />').after('<span class="lbl align-top" />');
        */
        }
        
      
        //unlike navButtons icons, action icons in rows seem to be hard-coded
        //you can change them like this in here if you want
        function updateActionIcons(table) {
          /**
          var replacement = 
          {
            'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
            'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
            'ui-icon-disk' : 'ace-icon fa fa-check green',
            'ui-icon-cancel' : 'ace-icon fa fa-times red'
          };
          $(table).find('.ui-pg-div span.ui-icon').each(function(){
            var icon = $(this);
            var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
            if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
          })
          */
        }
        
        //replace icons with FontAwesome icons like above
        function updatePagerIcons(table) {
          var replacement = 
          {
            'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
            'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
            'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
            'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
          };
          $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
            var icon = $(this);
            var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
            
            if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
          })
        }
      
        function enableTooltips(table) {
          $('.navtable .ui-pg-button').tooltip({container:'body'});
          $(table).find('.ui-pg-div').tooltip({container:'body'});
        }
      
        //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');
      
        $(document).one('ajaxloadstart.page', function(e) {
          $.jgrid.gridDestroy(grid_selector);
          $('.ui-jqdialog').remove();
        });
      });
    </script>
  </body>
</html>
