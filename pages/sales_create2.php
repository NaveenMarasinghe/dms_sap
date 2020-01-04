<?php require_once("../incl/header.php"); ?>
<link href="../assets/css/select2.min.css" rel="stylesheet" />
<script src="../assets/js/select2.min.js"></script>



<?php require_once("../incl/sidebar.php"); ?>
<?php require_once("../incl/pagetop.php"); ?>

<div class="page-content">


  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->

      <div class="widget-box">
        <div class="widget-header widget-header-blue widget-header-flat">
          <h4 class="widget-title lighter">Create Route Schedule</h4>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <div id="fuelux-wizard-container">
              <div>
                <ul class="steps">
                  <li data-step="1" class="active">
                    <span class="step">1</span>
                    <span class="title">Select Route</span>
                  </li>

                  <li data-step="2">
                    <span class="step">2</span>
                    <span class="title">Product List</span>
                  </li>

                  <li data-step="3">
                    <span class="step">3</span>
                    <span class="title">Assign Resources</span>
                  </li>

                  <li data-step="4">
                    <span class="step">4</span>
                    <span class="title">Complete Schedule</span>
                  </li>
                </ul>
              </div>

              <hr />

              <div class="step-content pos-rel">
                <div class="step-pane active" data-step="1">
                  <!-- <h3 class="lighter block green">Enter the following information</h3> -->

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
                  </form>

                </div>

                <div class="step-pane" data-step="2">
                  <form id="routeScheProductListForm" method="get">

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
                          <label for="qty">Qty</label>
                          <input type="text" class="form-control" name="qty" id="qty">

                        </div>
                      </div>


                      <div class="col-xs-2">
                        <div class="col-xs-2">
                          <div class="form-group">
                            <label for="proid" style="color: white;">&nbsp;</label>
                            <button type='button' class='btn btn-primary m-b-20' id='salesProductAdd'>Add Items</button>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-xs-12">


                        <table id="salesTable" class="table table-striped table-bordered table-hover" style="width:100%;">
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
                              <th>Batch</th>
                              <th>Quantity</th>
                              <th>Actions</th>
                            </tr>
                          </thead>

                          <tbody id="salesTableBody">

                          </tbody>
                        </table>

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

                      </div>
                    </div>
                  </form>
                </div>

                <div class="step-pane" data-step="3">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Vehicle</label>
                        <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                          <option value="0">--Select Vehicle--</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Driver</label>
                        <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                          <option value="0">--Select Driver--</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Salesman</label>
                        <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                          <option value="0">--Select Salesman--</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="step-pane" data-step="4">
                  <div class="center">
                    <h3 class="green">Route Schedule Completed!</h3>

                  </div>
                </div>
              </div>
            </div>

            <hr />
            <div class="wizard-actions">
              <button class="btn btn-prev">
                <i class="ace-icon fa fa-arrow-left"></i>
                Prev
              </button>

              <button class="btn btn-success btn-next" data-last="Finish">
                Next
                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
              </button>
            </div>
          </div><!-- /.widget-main -->
        </div><!-- /.widget-body -->
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
<!--    <script src="../assets/js/jquery-2.1.4.min.js"></script> -->

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
  if ('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="../assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="../assets/js/wizard.min.js"></script>
<script src="../assets/js/jquery.validate.min.js"></script>
<script src="../assets/js/jquery-additional-methods.min.js"></script>
<script src="../assets/js/bootbox.js"></script>
<script src="../assets/js/jquery.maskedinput.min.js"></script>
<script src="../assets/js/select2.min.js"></script>

<!-- ace scripts -->
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
  $.noConflict();
  jQuery(function($) {



    $(document).ready(function() {


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

      $.noConflict();

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

    jQuery(function($) {
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

        var myTable = $('#salesTable').DataTable({
          "searching": false,
          "paging": false,
          "info": false
        });
        $('#salesProductAdd').on('click', function() {


          var proname = $("#salesProductName option:selected").text();
          var batch = $("#salesBatch option:selected").text();
          var proid = $('#salesProductName').val();
          var qnty = $('#qty').val();
          // var buttons = "<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div>"

          //<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div>

          var buttons = "<div class='hidden-sm hidden-xs btn-group'><button type='button' class='btn btn-xs btn-success' id='btn_modelView'><i class='ace-icon fa fa-info-circle bigger-120'></i></button><button type='button' class='btn btn-xs btn-info'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></div>"
          if (proid != 0) {
            myTable.row.add([
              proid,
              proname,
              batch,
              qnty,
              buttons
            ]).draw(false);
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Please select a product!'

            });
          }

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
              myTable.row($(btn).parents('tr')).remove().draw(false);
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
          var proname = $row.find("td:nth-child(2)").text();
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
              $row.find("td:nth-child(4)").empty();
              $row.find("td:nth-child(4)").append(newQty2);
              Swal.fire(`Quantity changed to: ${newQty2}`);

              // alert(newQty2);

            }
          });
          // myTable.row('.selected').remove().draw( false );
        });

        jQuery(function($) {

          $("#salessave").click(function() {

            // if($("#purchaseform").valid()) {
            d = new FormData($("#salesform")[0]);
            alert(d);
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

                function storeTblValues() {
                  var TableData = new Array();

                  $('#salesTableBody tr').each(function(row, tr) {
                    TableData[row] = {
                      "item_id": $(tr).find('td:eq(0)').text(),
                      "item_name": $(tr).find('td:eq(1)').text(),
                      "item_batch": $(tr).find('td:eq(2)').text(),
                      "item_qty": $(tr).find('td:eq(3)').text(),
                      "salesId": salesId
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
                  url: "../controllers/controller_sales.php?type=salesDetailsSave",
                  data: "pTableData=" + TableData,
                  success: function(msg) {
                    alert(msg);
                    $('#salesForm')[0].reset();
                    location.reload(true);

                  }
                });
              }
            });
            // }
          });
        });
      });
    })




    $('.date-picker').datepicker({
      autoclose: true,
      minDate: 0,
      maxDate: 30,
      todayHighlight: true,
      dateFormat: 'yy-mm-dd'
    });





    var $validation = false;
    $('#fuelux-wizard-container')
      .ace_wizard({
        //step: 2 //optional argument. wizard will jump to step "2" at first
        //buttons: '.wizard-actions:eq(0)'
      })

      //.on('changed.fu.wizard', function() {
      //})
      .on('finished.fu.wizard', function(e) {
        //save to database
        d = new FormData($("#routeScheForm")[0]);
        alert(d);
        $.ajax({
          url: "../controllers/controller_routeSche.php?type=routeScheSave",
          method: "POST",
          data: d,
          processData: false,
          contentType: false,
          success: function(data) {
            // $('#purchaseform')[0].reset();
            // location.reload(true);
            alert(data);

            // $("#poid").append(data);
            var rtscheid = jQuery.parseJSON(data);

            function storeTblValues() {
              var TableData = new Array();

              $('#rtscheTable tr').each(function(row, tr) {
                TableData[row] = {
                  "rtschepid": $(tr).find('td:eq(0)').text(),
                  "rtschpname": $(tr).find('td:eq(1)').text(),
                  "rtschebatch": $(tr).find('td:eq(2)').text(),
                  "rtscheqty": $(tr).find('td:eq(3)').text(),
                  "rtscheid": rtscheid
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
              url: "../controllers/controller_routeSche.php?type=rtscheSaveDetails",
              data: "pTableData=" + TableData,
              success: function(msg) {
                alert(msg);
                // $('#purchaseform')[0].reset();
                location.reload(true);

              }
            });
          }
        });
        bootbox.dialog({
          message: "GRN Saved!",
          buttons: {
            "success": {
              "label": "OK",
              "className": "btn-sm btn-primary"
            }
          }
        });
      }).on('stepclick.fu.wizard', function(e) {
        //e.preventDefault();//this will prevent clicking and selecting steps
      });







    //documentation : http://docs.jquery.com/Plugins/Validation/validate


    $.mask.definitions['~'] = '[+-]';
    $('#phone').mask('(999) 999-9999');

    jQuery.validator.addMethod("phone", function(value, element) {
      return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
    }, "Enter a valid phone number.");

    $('#validation-form').validate({
      errorElement: 'div',
      errorClass: 'help-block',
      focusInvalid: false,
      ignore: "",
      rules: {
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 5
        },
        password2: {
          required: true,
          minlength: 5,
          equalTo: "#password"
        },
        name: {
          required: true
        },
        phone: {
          required: true,
          phone: 'required'
        },
        url: {
          required: true,
          url: true
        },
        comment: {
          required: true
        },
        state: {
          required: true
        },
        platform: {
          required: true
        },
        subscription: {
          required: true
        },
        gender: {
          required: true,
        },
        agree: {
          required: true,
        }
      },

      messages: {
        email: {
          required: "Please provide a valid email.",
          email: "Please provide a valid email."
        },
        password: {
          required: "Please specify a password.",
          minlength: "Please specify a secure password."
        },
        state: "Please choose state",
        subscription: "Please choose at least one option",
        gender: "Please choose gender",
        agree: "Please accept our policy"
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

      submitHandler: function(form) {},
      invalidHandler: function(form) {}
    });




    $('#modal-wizard-container').ace_wizard();
    $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');


    /**
    $('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
      $(this).closest('form').validate().element($(this));
    });
    
    $('#mychosen').chosen().on('change', function(ev) {
      $(this).closest('form').validate().element($(this));
    });
    */


    $(document).one('ajaxloadstart.page', function(e) {
      //in ajax mode, remove remaining elements before leaving page
      $('[class*=select2]').remove();
    });
  })
</script>
</body>

</html>