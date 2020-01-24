<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="4")){
      header("location:../index.php");
    } 
?>

<?php require_once("../incl/header.php");?>
  <link href="../assets/css/select2.min.css" rel="stylesheet" />
  <script src="../assets/js/select2.min.js"></script>



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
              <div class="col-md-4 form-group">
                  <div>
                    <label for="poSupplier">Supplier</label>
                    <select name="poSupplier" id="poSupplier" class="form-control selcet-filter">
                     <option value="0">--Select Supplier--</option>
                    </select>                  
                  </div>
              </div>

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
</div><!-- /.page-content -->

<script type="text/javascript">

  $(document).ready(function(){
    $.noConflict();
      // load supplier select box
      $.ajax({
      url:"../controllers/controller_products.php?type=selectSupplierLoad",
      method:"POST",
      processData: false,
      contentType: false,
    success: function(data){
      //alert(data); 
      $("#poSupplier").empty();
      $("#poSupplier").append("<option value=''>--Select Supplier--</option>");
      $("#poSupplier").append(data);
      
      }
    });
  });

      $('#poSupplier').change(function(){

      var supplierval = $('#poSupplier').val(); // get option's value

      //change product category select box
      $.post("../controllers/controller_products.php?type=get_filteredProCat",
      {supplierval:supplierval},
      function(data,status){
      if(status=="success"){
        // alert(data);
        $("#poProductCat").empty();
        $("#selectProductsubCat").empty();
        $("#poProductCat").append("<option value=''>--Select Product Category--</option>");        
        $("#selectProductCat").append("<option value=''>--Select Product Category--</option>");
        $("#poProductCat").append(data);
        // $("#poSupplier").attr("disabled", "disabled");
        }
      });

      });

    $('#poProductCat').change(function(){

          var supplierval = $('#poSupplier').val();
          var procatval = $('#poProductCat').val(); // get option's value

      // get filtered data to datatable
      $.post("../controllers/controller_purchase.php?type=get_productList",
      {procatval:procatval,supplierval:supplierval},
      function(data,status){
      if(status=="success"){
        // alert(data);
        $("#poProductList").empty();
        $("#poProductList").append("<option></option>");
        $("#poProductList").append(data);
      //   $('.select2gg').select2({
      //   placeholder: "Select a Product",
      //   allowClear: true
      // });
        }
      });



          var prosubcatval = $('#selectProductsubCat').val();

      $.post("../controllers/controller_products.php?type=get_filtered_data",
        {supplierval:supplierval,procatval:procatval,prosubcatval:prosubcatval},
        function(data,status){
        if(status=="success"){
          //alert(data);
          // $("#productTable").DataTable().destroy();
          // $("#productTable tbody").empty();
          // $("#productTable tbody").append(data);
          // $("#productTable").DataTable();
          }
      });

    });  

  $.noConflict();
  jQuery(function($){
          //   $('#purchaseform').validate({
          //   errorElement: 'div',
          //   errorClass: 'help-block',
          //   focusInvalid: false,
          //   ignore: "",
          //   rules: {
          //     qty: {
          //       required: true,
          //       number: true
          //     },
          //     poProductList: {
          //       required: true
          //     },
          //     poProductCat: {
          //       required: false
          //     }
          //   },
        
          //   messages: {
          //     qty: {
          //     number: "Please select a supplier.",
          //     required: "Please enter valid quantity."
          //   },
          //     poProductList: "Please select a product"
          //   },
        
        
          //   highlight: function (e) {
          //     $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
          //   },
        
          //   success: function (e) {
          //     $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
          //     $(e).remove();
          //   },
        
          //   errorPlacement: function (error, element) {
          //     if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
          //       var controls = element.closest('div[class*="col-"]');
          //       if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
          //       else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
          //     }
          //     else if(element.is('.select2')) {
          //       error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
          //     }
          //     else if(element.is('.chosen-select')) {
          //       error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
          //     }
          //     else error.insertAfter(element.parent());
          //   },
            
          // });
  $(document).ready(function() {


      // $('.date-picker').datepicker('setDate', 'today');
      $('.date-picker').datepicker({
        autoclose: true,
        minDate: 0,
        maxDate: 0,
        todayHighlight: true,
        dateFormat: 'yy-mm-dd'
      });
      $('.date-picker').datepicker('setDate', new Date());

      var myTable = $('#purchaseTable').DataTable();
   
      $('#addproductbutton').on( 'click', function () {


      var proname = $("#poProductList option:selected").text();
      var proid = $('#poProductList').val();
      var qnty = $('#qty').val();
      // var buttons = "<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div>"

      //<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div>

      var buttons = "<div class='hidden-sm hidden-xs btn-group'><button type='button' class='btn btn-xs btn-success' id='btn_modelView'><i class='ace-icon fa fa-info-circle bigger-120'></i></button><button type='button' class='btn btn-xs btn-info'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></div>"
      if(proid!=0){
          myTable.row.add( [
              proid,
              proname,              
              qnty,
              buttons
          ] ).draw( false );
      } else{
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Please select a product!'
          
        });
      }


      $("#qty").val("");
      $("#poProductList").empty();
      $('.select2gg').select2({
        placeholder: "--Select a Product--",
        allowClear: true
      });

          var supplierval = $('#poSupplier').val();
          var procatval = $('#poProductCat').val(); // get option's value

      // get filtered data to datatable
      $.post("../controllers/controller_purchaseCreate.php?type=get_productList",
      {procatval:procatval,supplierval:supplierval},
      function(data,status){
      if(status=="success"){
        // alert(data);
        $("#poProductList").empty();
        $("#poProductList").append("<option></option>");
        $("#poProductList").append(data);
      //   $('.select2gg').select2({
      //   placeholder: "Select a Product",
      //   allowClear: true
      // });
        }
      });

      });

    $('#purchaseTable tbody').on( 'click', '.fa-trash-o', function () {
      
      var btn = this;      

      var $row = $(this).closest("tr");    // Find the row
      var proname = $row.find("td:nth-child(2)").text();
      var proqty = $row.find("td:nth-child(3)").text();
      // alert(proqty);
      // alert(proname);

        Swal.fire({
          title: 'Remove following items?',
          text: proname +" - "+ proqty +" units",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Remove items'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Removed!',
              proname +" - "+ proqty +" units removed.",
              'success'
            );
            myTable.row($(btn).parents('tr')).remove().draw(false);
          }
        })
      
    } );
 
      $(".fa-trash-o").click(function(){
        myTable.row(".selected").remove().draw( false );
         alert('sda');
        // myTable.row('.selected').remove().draw( false );
      }); 

      $('#purchaseTable tbody').on( 'click', '.fa-pencil', function (){
        var btn = this; 
        // alert("gg");
        var $row = $(this).closest("tr");    // Find the row
        var proname = $row.find("td:nth-child(2)").text();
        // bootbox.prompt("What is your name?", function(result) {
        //   if (result === null) {

        //   } else {
        //     $row.find("td:nth-child(2)").append(result);
        //   }
        // });

        const { value: newQty } = Swal.fire({
          title: proname,
          input: 'text',
          inputPlaceholder: 'Change quantity',
          inputAttributes: {
            maxlength: 10,
            autocapitalize: 'off',
            autocorrect: 'off'
          }
        }).then((newQty) => {
        var noval = "''";
        var newQty2 = newQty['value']; 
        if (newQty2) {
          $row.find("td:nth-child(3)").empty();
          $row.find("td:nth-child(3)").append(newQty2);
          Swal.fire(`Quantity changed to: ${newQty2}`);

          // alert(newQty2);
          
        }
      });
        // myTable.row('.selected').remove().draw( false );
      });       
      // // Automatically add a first row of data
      // $('#addRow').click();
  });
});


      jQuery(function($){

        // var myTable = $('#purchaseTable').DataTable({
        //   bAutoWidth: false,
        //   aoColumns: [null, null,null, null],
        //   aaSorting: [],
        //   select: {style: 'multi'}
        //   });





      // $('#stockTable').on( 'click', 'tbody tr', function () {
      //   myTable.row( this ).delete( {
      //       buttons: [
      //           { label: 'Cancel', fn: function () { this.close(); } },
      //           'Delete'
      //       ]
      //     });
      //   });

        
      $(document).ready(function() {
        $.noConflict();
        $('.select2gg').select2({
          placeholder: "--Select a Product--",
          allowClear: true
        });


          // $.validator.addMethod("notEqual", function(value, element, param) {
          //   return this.optional(element) || value != param;
          // }, "Please specify a different (non-default) value");

          $('#purchaseform').validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            ignore: "",
            rules: {
              poSupplier: {
                required: true,
              },
              podate: {
                required: true
              },
              qty: {
                required: false,
                number: false
              },
              poProductList: {
                required: false
              },
            },
        
            messages: {
              poSupplier: {
              required: "Please select a supplier.",
              minlength: "Please select a supplier."
            },
              podate: "Please enter a date"
            },
        
        
            highlight: function (e) {
              $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
            },
        
            success: function (e) {
              $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
              $(e).remove();
            },
        
            errorPlacement: function (error, element) {
              if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                var controls = element.closest('div[class*="col-"]');
                if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
              }
              else if(element.is('.select2')) {
                error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
              }
              else if(element.is('.chosen-select')) {
                error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
              }
              else error.insertAfter(element.parent());
            },
            
          });





       
      });


      });

      // $('#addproductbutton').click(function(){
      //   var proname = $("#id_label_multiple option:selected").text();
      //   var proid = $('#id_label_multiple').val();
      //   var qnty = $('#qty').val();
      //   var buttons = "<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div>"
          

      //     // $('#tablebody').append("<tr><td>"+ proid +"</td><td>" + proname + "</td><td>" + qnty + "</td> '<td><div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div> </td>' </tr>" );
          
      //     $('#id_label_multiple').val("");
      //     $('#qty').val("");
      //     $('#productname').focus();

      //   });

      jQuery(function($){

        $("#pobtnSave").click(function(){

        if($("#purchaseform").valid()) {
              d= new FormData($("#purchaseform")[0]);
              alert(d);
                  $.ajax({
                      url:"../controllers/controller_purchase.php?type=purchaseSave",
                      method:"POST",
                      data:d,
                      processData: false,
                      contentType: false,
                   success: function(data){
                    // $('#purchaseform')[0].reset();
                    // location.reload(true);
                      alert(data);

                    // $("#poid").append(data);
                    var poidddata=jQuery.parseJSON(data);
                    function storeTblValues()
                        {
                            var TableData = new Array();

                            $('#tablebody tr').each(function(row, tr){
                                TableData[row]={
                                    "pid" : $(tr).find('td:eq(0)').text()                                    
                                    , "pname" : $(tr).find('td:eq(1)').text()
                                    , "pqty" :$(tr).find('td:eq(2)').text()
                                    , "poid" :poidddata
                                }
                              //   poid    
                              // TableData.push("Kiwi");
                            }); 
                            // TableData.shift();  // first row will be empty - so remove

                            return TableData;
                        }                    

                    TableData = storeTblValues()
                    TableData = JSON.stringify(TableData);
                    alert(TableData);                
                    $.ajax({
                        type: "POST",
                        url: "../controllers/controller_purchase.php?type=purchaseSaveDetails",
                        data: "pTableData=" + TableData,
                        success: function(msg){
                            alert(msg);
                            $('#purchaseform')[0].reset();
                            location.reload(true);

                        }
                    });
                  } 
                }); 
                }
        });     
        });  


</script>


  <script src="../assets/js/chosen.jquery.min.js"></script>
  <script src="../assets/js/jquery.validate.min.js"></script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php");?>
