<?php require_once("../incl/header.php"); ?>
<link href="../assets/css/select2.min.css" rel="stylesheet" />
<script src="../assets/js/select2.min.js"></script>



<?php require_once("../incl/sidebar.php"); ?>
<?php require_once("../incl/pagetop.php"); ?>

<div class="page-content">


  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->

      <div class="form-actions">
        <div>
          <h4 class="page-header"><b>Create Sales</b></h4>
        </div>
        <div class="box box-info">
          <!-- /.box-header -->
          <div class="box-body">
            <form id="salesform" method="post">
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="salesid">Sales ID</label>
                    <input readonly type="text" class="form-control" id="salesid" name="salesid">
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                    <label for="salesDate">Date</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-calendar bigger-110"></i>
                      </span>
                      <input class="form-control date-picker" id="salesDate" name="salesDate" readonly type="text" data-date-format="dd-mm-yyyy" />
                    </div>
                  </div>
                </div>


              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <div>
                    <label for="salesRoute">Route</label>
                    <select class="form-control selcet-filter select2gg" id="salesRoute" name="salesRoute">
                      <option></option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4 form-group">
                  <div>
                    <label for="salesCustomer">Customer</label>
                    <select class="form-control selcet-filter select2gg" id="salesCustomer" name="salesCustomer">
                      <option></option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 form-group">
                  <div>
                    <label for="salesSupplier">Supplier</label>
                    <select class="form-control selcet-filter select2gg" id="salesSupplier" name="salesSupplier">
                      <option></option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <div>
                    <label for="salesProductCat">Product Category</label>
                    <select class="form-control selcet-filter select2gg" id="salesProductCat" name="salesProductCat">
                      <option></option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="row">

                <div class="col-md-4 form-group">
                  <div>
                    <label for="salesProductName">Product Name</label>
                    <select class="form-control selcet-filter select2gg" id="salesProductName" name="salesProductName">
                      <option></option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4 form-group">
                  <div>
                    <label for="salesBatch">Batch</label>
                    <select class="form-control selcet-filter select2gg" id="salesBatch" name="salesBatch">
                      <option></option>
                    </select>
                  </div>
                </div>




                <div class="col-md-2 form-group">
                  <div>
                    <div class="form-group">
                      <label for="itemPrice">Item Price</label>
                      <input type="text" class="form-control" name="itemPrice" id="itemPrice">
                    </div>
                  </div>
                </div>

                <div class="col-md-2 form-group">
                  <div>
                    <label for="qty">Qty</label>
                    <input type="text" class="form-control" name="qty" id="qty">

                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-xs-10">
                  <div class="col-xs-2">
                    <div class="form-group">

                    </div>
                  </div>
                </div>
                <div class="col-xs-2">
                  <div class="col-xs-2">
                    <div class="form-group">
                      
                      <button type='button' class='btn btn-primary' id='salesProductAdd'>Add Items</button>
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




                        <!-- div.table-responsive -->

                        <!-- div.dataTables_borderWrap -->
                        <div>
                          <table id="salesTable" class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <!--                             <th class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </th> -->
                                <th style="width:10%"></th>
                                <th style="width:10%">Batch ID</th>
                                <th style="width:40%">Product Name</th>
                                <th style="width:10%">Item Price</th>
                                <th style="width:10%">Quantity</th>
                                <th style="width:10%">Discount %</th>
                                <th style="width:10%">Total</th>

                              </tr>
                            </thead>

                            <tbody id="salesTableBody">

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
                            <tfoot>
                              <tr>

                                <td colspan="5" class="blank"> </td>
                                <td colspan="1">Sub Total</td>
                                <td class="subTotal" id="subTotal">
                                  0.00
                                </td>
                              </tr>
                              <tr>

                                <td colspan="5" class="blank"> </td>
                                <td colspan="1">Amount Paid</td>
                                <td>
                                  <div id="total"><input class="amountPaid" id="amountPaid" style="border:0px; width:50%" value="" /></div>
                                </td>
                              </tr>
                              <tr>

                                <td colspan="5" class="blank"> </td>
                                <td colspan="1">Balance due</td>
                                <td class="balanceVal" id="balanceVal">
                                  0.00
                                </td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>

                    <!-- <div id="grid-pager"></div> -->
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
              <!-- 
<div class="row">
              <div class="col-sm-3 pull-right" style="margin-right: 50px;">
  <div class="col-sm-6"><h4>Sub Total :</h4></div><div class="col-sm-6"><h4 class="subTotal"></h4></div>
  <div class="col-sm-6"><h4>Amount paid :</h4></div><div class="col-sm-6"><h4><input class="amountPaid" style='border:0px' value="0.00"/></h4></div>
  <div class="col-sm-6"><h4>Balance Due :</h4></div><div class="col-sm-6"><h4 class="balance">0.00</h4></div>
              </div>

          </div> -->

              <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                  <div class="pull-right">


                    &nbsp; &nbsp; &nbsp;
                    <button class="btn btn-info" type="button" id="salessave">
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

function storeTblValues(test) {
            var TableData = new Array();

            $('#salesTableBody tr').each(function(row, tr) {
              TableData[row] = {
                "batch_id": $(tr).find('td:eq(1)').text(),
                "item_name": $(tr).find('td:eq(2)').text(),
                "item_price": $(tr).find('td:eq(3)').text(),
                "item_qty": $(tr).find('.qtyTable').val(),
                "item_dis": $(tr).find('.discountVal').val(),
                "item_total": $(tr).find('.subTol').val(),
                "salesId": test
              }
              //   poid    
              // TableData.push("Kiwi");
            });
            // TableData.shift();  // first row will be empty - so remove

            return TableData;
          }

  jQuery(function($) {
    function toFixedFunction(numb) {
      // var num = 5.56789;
      var n = numb.toFixed(2);
      return n;
    }
  });

  function getItemPrice() {

    var batch = $("#salesBatch option:selected").text();
    var proid = $('#salesProductName').val();

    $.post("../controllers/controller_sales.php?type=get_itemPrice", {
        proid: proid,
        batch: batch
      },
      function(data, status) {
        if (status == "success") {
          $("#itemPrice").val(data);
        }
      });
  }

  $(document).ready(function() {

    $.noConflict();
    // load supplier select box
    $.post("../controllers/controller_sales.php?type=get_route",
      function(data, status) {
        if (status == "success") {
          //alert(data);
          $("#salesRoute").empty();
          $("#salesRoute").append("<option value=''>--Select Route--</option>");
          $("#salesRoute").append(data);

        }
      });
    $.post("../controllers/controller_sales.php?type=get_suppliers",
      function(data, status) {
        if (status == "success") {
          //alert(data); 
          $("#salesSupplier").empty();
          $("#salesSupplier").append("<option value=''>--Select Supplier--</option>");
          $("#salesSupplier").append(data);

        }
      });
  });

  $('#salesRoute').change(function() {

    var salesRoute = $('#salesRoute').val(); // get option's value

    //change product category select box
    $.post("../controllers/controller_sales.php?type=get_customers", {
        salesRoute: salesRoute
      },
      function(data, status) {
        if (status == "success") {
          // alert(data);
          $("#salesCustomer").empty();

          $("#salesCustomer").append("<option value=''>--Select Product Category--</option>");

          $("#salesCustomer").append(data);
          // $("#poSupplier").attr("disabled", "disabled");
        }
      });

  });

  $('#salesSupplier').change(function() {


    var salesSupplier = $('#salesSupplier').val(); // get option's value
    // alert(salesSupplier);
    //change product category select box
    $.post("../controllers/controller_sales.php?type=get_ProCat", {
        salesSupplier: salesSupplier
      },
      function(data, status) {
        if (status == "success") {
          //alert(data);
          $("#salesProductCat").empty();

          $("#salesProductCat").append("<option value=''>--Select Product Category--</option>");

          $("#salesProductCat").append(data);
          // $("#poSupplier").attr("disabled", "disabled");
        }
      });

  });

  $('#salesProductCat').change(function() {

    var supplierval = $('#salesSupplier').val();
    var procatval = $('#salesProductCat').val(); // get option's value

    // get filtered data to datatable
    $.post("../controllers/controller_purchase.php?type=get_productList", {
        procatval: procatval,
        supplierval: supplierval
      },
      function(data, status) {
        if (status == "success") {
          // alert(data);
          $("#salesProductName").empty();
          $("#salesProductName").append("<option></option>");
          $("#salesProductName").append(data);
          //   $('.select2gg').select2({
          //   placeholder: "Select a Product",
          //   allowClear: true
          // });
        }
      });


  });

  $('#salesProductName').change(function() {

    var proid = $('#salesProductName').val(); // get option's value
    // var procatval = $('#rtscheProCat').val();
    //alert(proid);
    //change product name select box options
    $.post("../controllers/controller_sales.php?type=get_batch", {
        proid: proid
      },
      function(data, status) {
        if (status == "success") {
          //alert(data);
          $("#salesBatch").empty();
          $("#salesBatch").append("<option value=''>--Select Batch--</option>");
          $("#salesBatch").append(data);
        }
      });

  });

  $('#salesBatch').change(function() {

    var proid = $('#salesBatch').val(); // get option's value
    // var procatval = $('#rtscheProCat').val();
    //alert(proid);
    //change product name select box options
    getItemPrice()

  });

  $.noConflict();
  jQuery(function($) {
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

      $(".amountPaid").val("0.00");
      $(".balanceVal").text("0.00");
      // $('.date-picker').datepicker('setDate', 'today');
      $('.date-picker').datepicker({
        autoclose: true,
        minDate: 0,
        maxDate: 0,
        todayHighlight: true,
        dateFormat: 'yy-mm-dd'
      });
      $('.date-picker').datepicker('setDate', new Date());


      // var myTable = $('#salesTable').DataTable({

      //   "order": [
      //     [0, "dsec"]
      //   ],
      //   "columnDefs": [{
      //       "width": "15%",
      //       "targets": 6
      //     },
      //     {
      //       "width": "15%",
      //       "targets": 5
      //     },
      //     {
      //       "width": "15%",
      //       "targets": 4
      //     },
      //     {
      //       "width": "15%",
      //       "targets": 3
      //     },
      //     {
      //       "width": "15%",
      //       "targets": 2
      //     },
      //     {
      //       "width": "15%",
      //       "targets": 1
      //     },
      //     {
      //       "width": "10%",
      //       "targets": 0
      //     }
      //   ],

      //   "searching": false,
      //   "paging": false,
      //   "info": false
      // });





      $("#qty").change(function() {
        getItemPrice();
      });

      function updateSubTol() {

        // $("#salesTable tbody").on("change", '.discountVal', function() { 
        var $row = $(this).closest("tr");
        var subTotal = 0;

        $('#salesTableBody tr').each(function(row, tr) {
          var $row = $(this).closest("tr");
          // var rows = $("#invoice-table tbody").children('tr');
          var rowTotalVal = parseFloat($row.find(".subTol").text());
          rowTotalVal = rowTotalVal;
          subTotal = subTotal + rowTotalVal;
          // alert(subTotal);
          // totalVal = totalVal.toFixed(2);

          // TableData[row] = {
          //   "item_id": $(tr).find('td:eq(0)').text(),
          //   "item_name": $(tr).find('td:eq(1)').text(),
          //   "item_batch": $(tr).find('td:eq(2)').text(),
          //   "item_qty": $(tr).find('td:eq(3)').text(),
          //   "salesId": salesId
          // }
          //   poid    
          // TableData.push("Kiwi");
        });
        $(".subTotal").text(subTotal.toFixed(2));

        // });
      }

      function updateAmountDue() {
        // alert("gg");
        // var balance = 0;
        var amountPaid = $(".amountPaid").val();
        var subTotal = parseFloat($(".subTotal").text());
        subTotal = subTotal.toFixed(2);
        // alert(subTotal);
        balance = subTotal - amountPaid;
        balance = balance.toFixed(2);
        $(".balanceVal").text(balance);
        $(".amountPaid").text(subTotal);
      }

      $('#salesProductAdd').on('click', function() {

        var batch = $("#salesBatch option:selected").text();
        var proid = $('#salesProductName').val();

        $.post("../controllers/controller_sales.php?type=get_itemPrice", {
            proid: proid,
            batch: batch
          },
          function(data, status) {
            if (status == "success") {
              //alert(data);

              // $('#item_cost').val(data);
              $('#itemPrice').val(data);
              // var item_mrp = data;
              //   $('.select2gg').select2({
              //   placeholder: "Select a Product",
              //   allowClear: true
              // });
            }
          });

        var proname = $("#salesProductName option:selected").text();
        var qnty = $('#qty').val();
        var buttons = "<div class='hidden-sm hidden-xs btn-group'><button type='button' class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></div>"
        var item_cost = $('#itemPrice').val();
        // alert(item_cost); 
        var discount = parseInt($('.discountVal').text());
        var total = item_cost * qnty;
        var discTol = total;
        var subTol = discTol.toFixed(2);
        var tablerow = "<tr class='item-row'><td>" + buttons + "</td><td>" + batch + "</td><td>" + proname + "</td><td>" + item_cost + "</td><td><div><input class='qtyTable' style='border:0px' value='" + qnty + "'/></div></td><td><div><input class='discountVal' style='border:0px' value='0%'/><div></td><td class='subTol'>" + subTol + "</td></tr>";

        // var buttons = "<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div>"

        //<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div>
        // if(batch!=""){
        // alert(item_cost);
        // $("#salesTable").DataTable().destroy();
        $("#salesTable tbody").append(tablerow);
        // $("#salesTable").DataTable();
        updateSubTol();
        updateAmountDue();

        // } else{
        //   Swal.fire({
        //     icon: 'error',
        //     title: 'Oops...',
        //     text: 'Please select a product!'

        //   });
        // }

        $("#salesProductName").empty();
        $("#qty").val("");
        $("#salesBatch").empty();
        $('.select2gg').select2({
          placeholder: "--Select a Product--",
          allowClear: true
        });


        var supplierval = $('#salesSupplier').val();
        var procatval = $('#salesProductCat').val(); // get option's value

        // get filtered data to datatable
        $.post("../controllers/controller_purchase.php?type=get_productList", {
            procatval: procatval,
            supplierval: supplierval
          },
          function(data, status) {
            if (status == "success") {
              // alert(data);
              $("#salesProductName").empty();
              $("#salesProductName").append("<option></option>");
              $("#salesProductName").append(data);
              //   $('.select2gg').select2({
              //   placeholder: "Select a Product",
              //   allowClear: true
              // });
            }
          });

      });
      var oldVal = "";

      // $("#salesTable tbody").on("change keyup paste", '.discountVal', function() {
      //   var currentVal = $(this).val();
      //   if (currentVal == oldVal) {
      //     return; //check to prevent multiple simultaneous triggers
      //   }

      //   oldVal = currentVal;
      //   //action to be performed on textarea changed
      //   alert("currentVal");


      // });



      $("#salesTable tbody").on("keyup", '.discountVal', function() {

        var discPer = $(this).val();
        var $row = $(this).closest("tr");
        var itemPrice = parseFloat($row.find("td:nth-child(4)").text());
        var qty = parseFloat($row.find(".qtyTable").val());
        // alert(qty);

        //alert(discPer);
        // var $row = $(this).closest("tr"); // Find the row
        var total = itemPrice * qty;
        //alert(total);
        var discTotal = (total - total * discPer / 100).toFixed(2);
        // alert(discTotal);
        $row.find("td:nth-child(7)").text(discTotal);
        // $row.find(".discountVal").text(discPer+"%");
        updateSubTol();
        updateAmountDue();
      });

      $("#salesTable tbody").on("keyup", '.qtyTable', function() {


        var $row = $(this).closest("tr");
        var qty = parseFloat($row.find(".qtyTable").val());
        var itemPrice = parseFloat($row.find("td:nth-child(4)").text());
        var total = (itemPrice * qty).toFixed(2);
        // alert(total);
        $row.find(".subTol").text(total);
        updateSubTol();
        updateAmountDue();
      });

      $("#salesTable tfoot").on("keyup", '.amountPaid', function() {
        // alert("gg");
        var balance = 0;
        var amountPaid = $(".amountPaid").val();
        var subTotal = parseFloat($(".subTotal").text());
        subTotal = subTotal.toFixed(2);
        // alert(subTotal);
        balance = subTotal - amountPaid;
        balance = balance.toFixed(2);
        $(".balanceVal").text(balance);
        $(".amountPaid").text(subTotal);
      });
      $('#salesTable tbody').on('click', '.fa-trash-o', function() {

        var btn = this;

        var $row = $(this).closest("tr"); // Find the row
        var proname = $row.find("td:nth-child(2)").text();
        var proqty = $row.find("td:nth-child(4)").text();
        // alert(proqty);
        // alert(proname);

        Swal.fire({
          title: 'Remove following items?',
          text: proname + " - " + proqty + " units",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Remove items'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Removed!',
              proname + " - " + proqty + " units removed.",
              'success'
            );
            $(this).closest('tr').remove();
            updateSubTol();
            updateAmountDue();
          }
        })

      });

      $(".fa-trash-o").click(function() {
        myTable.row(".selected").remove().draw(false);
        alert('sda');

        // myTable.row('.selected').remove().draw( false );
      });

      $('#salesTable tbody').on('click', '.fa-pencil', function() {
        var btn = this;
        // alert("gg");
        var $row = $(this).closest("tr"); // Find the row
        var proname = $row.find("td:nth-child(3)").text();
        // bootbox.prompt("What is your name?", function(result) {
        //   if (result === null) {

        //   } else {
        //     $row.find("td:nth-child(2)").append(result);
        //   }
        // });

        const {
          value: newQty
        } = Swal.fire({
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
            $row.find("td:nth-child(5)").empty();
            $row.find("td:nth-child(5)").append(newQty2);
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


  jQuery(function($) {

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


        highlight: function(e) {
          $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },

        success: function(e) {
          $(e).closest('.form-group').removeClass('has-error'); //.addClass('has-info');
          $(e).remove();
        },

        errorPlacement: function(error, element) {
          if (element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
            var controls = element.closest('div[class*="col-"]');
            if (controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
          } else if (element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
          } else if (element.is('.chosen-select')) {
            error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
          } else error.insertAfter(element.parent());
        },

      });


    });


  });

  jQuery(function($) {

    $("#salessave").click(function() {

      // if($("#purchaseform").valid()) {
      d = new FormData($("#salesform")[0]);
      //alert(d);
      var subTol = $("#subTotal").text();
      var balanceVal = $("#balanceVal").text();    
      var balanceValFloat = parseFloat(balanceVal);
      var amountPaid = $('#amountPaid').val();
      var cusid = $('#salesCustomer').val();
      var salesDate = $('#salesDate').val();
      
      
      alert(subTol);
        
        d.append("cusid",cusid); 
        d.append("subTol",subTol); 
        d.append("amountPaid",amountPaid); 
        d.append("salesDate",salesDate); 
        d.append("balanceVal",balanceValFloat); 
      $.ajax({
        url: "../controllers/controller_sales.php?type=save_stock",
        method: "POST",
        data: d,
        processData: false,
        contentType: false,
        success: function(data) {
          // $('#purchaseform')[0].reset();
          // location.reload(true);
          alert(data);

          // $("#poid").append(data);
          var salesId = jQuery.parseJSON(data);

          TableData = storeTblValues(salesId)
          TableData = JSON.stringify(TableData);
          alert(TableData);
          $.ajax({
            type: "POST",
            url: "../controllers/controller_sales.php?type=salesDetailsSave",
            data: "pTableData=" + TableData,
            success: function(msg) {
              alert(msg);
              // $('#salesform').reset();
              location.reload(true);

            }
          });
        }
      });
      // }
    });
  });
</script>


<script src="../assets/js/chosen.jquery.min.js"></script>
<script src="../assets/js/jquery.validate.min.js"></script>
<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>