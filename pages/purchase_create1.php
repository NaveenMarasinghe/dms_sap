<?php
session_start();
if (!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"] == "3") || ($_SESSION["user"]["utype"] == "2") || ($_SESSION["user"]["utype"] == "5")) {
  header("location:../index.php");
}
?>
<?php require_once("../incl/header.php"); ?>
<link href="../assets/css/select2.min.css" rel="stylesheet" />
<script src="../assets/js/select2.min.js"></script>



<?php require_once("../incl/sidebar.php"); ?>
<?php require_once("../incl/pagetop.php"); ?>

<div class="page-content">


  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->

      <div class="widget-box" style="height:100%">
        <div class="widget-header widget-header-blue widget-header-flat">
          <h4 class="widget-title lighter">Create Purchase Order</h4>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <div id="fuelux-wizard-container">
              <div id="topBar">
                <ul class="steps">
                  <li data-step="1" class="active">
                    <span class="step">1</span>
                    <span class="title">Select Supplier</span>
                  </li>

                  <li data-step="2">
                    <span class="step">2</span>
                    <span class="title">Product List</span>
                  </li>

                  <li data-step="3">
                    <span class="step">3</span>
                    <span class="title">Complete Purchase Order</span>
                  </li>

                </ul>
              </div>



              <div class="step-content pos-rel">
                <div class="step-pane active" data-step="1">
                 

                  <form id="poSupplierForm" method="post">
                    <div class="row">

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="poId">Purchase Order ID</label>
                          <input readonly type="text" class="form-control" id="poId" name="poId">
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="proid">Date</label>
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="fa fa-calendar bigger-110"></i>
                            </span>
                            <input class="form-control date-picker" id="poDate" name="poDate" readonly type="text" data-date-format="dd-mm-yyyy" />
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
                      <div class="col-md-4 form-group">
                        <div>
                          <div class="form-group">
                            <label for="poRemarks">Remarks</label>
                            <textarea class="form-control" rows="3" id="poRemarks" name="poRemarks"></textarea>
                          </div>
                        </div>
                      </div>


                    </div>

                  </form>

                </div>

                <div class="step-pane" data-step="2">
                  <form id="productListForm" method="get">
                    <div class="row">
                      <div class="col-md-3">
                        <a href="../pages/product_add.php" id="id-btn-dialog1" class="btn btn-purple btn-sm" style='margin-bottom: 10px;'>Add New Product</a>
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
                          <label for="poProductList" style="width:100%">Product Name</label>
                          <select class="form-control selcet-filter select2gg" style="width:100%" id="poProductList" name="poProductList">
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
                            <button type='button' class='btn btn-primary m-b-20' id='addProductButton'>Add Items</button>
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="row">
                      <div class="col-xs-12">


                        <div class="row">
                          <div class="col-xs-12">

                            <div class="clearfix">
                              <div class="pull-right tableTools-container"></div>
                            </div>



                            <table id="purchaseTable" class="table table-striped table-bordered table-hover" style="width:100%">
                              <thead>
                                <tr>

                                  <th>Product ID</th>
                                  <th>Product Name</th>
                                  <th>Quantity</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>

                              <tbody id="tablebody">


                              </tbody>
                            </table>

                          </div>
                        </div>

                        <div id="grid-pager"></div>

                      </div>
                    </div>
                  </form>
                </div>

                <div class="step-pane" data-step="3">
                  <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="widget-box transparent">
                        <div class="widget-header widget-header-large" style="margin-right: 20px">
                          <h3 class="widget-title grey lighter">

                            Purchase Order
                          </h3>

                          <div class="widget-toolbar no-border invoice-info">
                            <span class="invoice-info-label">Purchase ID:</span>
                            <span class="red" id="purid"></span>

                            <br />
                            <span class="invoice-info-label">Date:</span>
                            <span class="blue" id="purdate"></span>
                          </div>

                        </div>

                        <div class="widget-body">
                          <div class="widget-main padding-24">
                            <div class="row">

                              <div class="col-sm-3">
                                <div class="row">
                                  <div class="col-xs-11 label label-lg">
                                    <b>Supplier</b>
                                  </div>

                                </div>

                                <div id="supplierAddress" style="text-align: left; ">
                                  Ceylon Biscuits Limited, </br>
                                  P.O. Box 03,
                                  Makumbura Pannipitiya.
                                  Sri Lanka

                                </div>
                              </div><!-- /.col -->
                              <div class="col-sm-6"></div>

                              <div class="col-sm-3">
                                <div class="row">
                                  <div class="col-xs-11 label label-lg">
                                    <b>Buyer</b>
                                  </div>
                                </div>

                                <div id="buyerAddress" style="text-align: right; margin-right:10px ">
                                  S.A.P. Distributors,
                                  Muthugala Road,
                                  Bihalpola,
                                  Nakkawaththa.

                                </div>
                              </div><!-- /.col -->

                            </div><!-- /.row -->

                            <div class="space"></div>

                            <div>
                              <table class="table table-striped table-bordered" id="purchaseViewData">
                                <thead>
                                  <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th class="hidden-xs">Quantity</th>

                                  </tr>
                                </thead>

                                <tbody>

                                </tbody>
                              </table>
                            </div>




                            <div class="space-6"></div>

                          </div>
                        </div>
                      </div>
                    </div>
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

              <button class="btn btn-success btn-next" data-last="Complete">
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
<!-- 		<script src="../assets/js/jquery-2.1.4.min.js"></script> -->

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

      document.title = "Create Purchase";

      $.noConflict();

      $('.select2gg').select2({
        placeholder: "--Select a Product--",
        allowClear: true
      });

      $.ajax({
        url: "../controllers/controller_products.php?type=selectSupplierLoad",
        method: "POST",
        processData: false,
        contentType: false,
        success: function(data) {

          $("#poSupplier").empty();
          $("#poSupplier").append("<option value=''>--Select Supplier--</option>");
          $("#poSupplier").append(data);

        }
      });
      // load options for supplier select box

      $('#poSupplier').change(function() {
        $("#poId").val('');
        var supplierval = $('#poSupplier').val(); 

        //change product category select box
        $.post("../controllers/controller_products.php?type=get_filteredProCat", {
            supplierval: supplierval
          },
          function(data, status) {
            if (status == "success") {

              $("#poProductCat").empty();
              $("#selectProductsubCat").empty();
              $("#poProductCat").append("<option value=''>--Select Product Category--</option>");
              $("#selectProductCat").append("<option value=''>--Select Product Category--</option>");
              $("#poProductCat").append(data);

            }
          });

      });

      $('#poProductCat').change(function() {

        var supplierval = $('#poSupplier').val();
        var procatval = $('#poProductCat').val(); 


        $.post("../controllers/controller_purchase.php?type=get_productList", {
            procatval: procatval,
            supplierval: supplierval
          },
          function(data, status) {
            if (status == "success") {

              $("#poProductList").empty();
              $("#poProductList").append("<option></option>");
              $("#poProductList").append(data);

            }
          });
        var prosubcatval = $('#selectProductsubCat').val();


      });

    });



    $('#addProductButton').on('click', function() {

      var proname = $("#poProductList option:selected").text();
      var proid = $('#poProductList').val();
      var qnty = $('#qty').val();
      var poId = $("#poId").val();

      $.post("../controllers/controller_purchase.php?type=purAddRow", {
          proname: proname,
          proid: proid,
          qnty: qnty,
          poId: poId
        },
        function(data, status) {
          if (status == "success") {

            var poId = $("#poId").val();
            $.post("../controllers/controller_purchase.php?type=purCreateTable", {
                poId: poId
              },
              function(data, status) {
                if (status == "success") {

                  $("#purchaseTable tbody").empty();
                  $("#purchaseTable tbody").append(data);

                }
              });
          }
        });

      $("#poProductList").empty();
      $("#qty").val("0");

      var supplierval = $('#poSupplier').val();
      var procatval = $('#poProductCat').val(); 

      // get filtered data to datatable
      $.post("../controllers/controller_purchase.php?type=get_productList", {
          procatval: procatval,
          supplierval: supplierval
        },
        function(data, status) {
          if (status == "success") {

            $("#poProductList").empty();
            $("#poProductList").append("<option></option>");
            $("#poProductList").append(data);

          }
        });

      $('.select2gg').select2({
        placeholder: "--Select a Product--",
        allowClear: true
      });

    });

    $("#purchaseTable tbody").on("change", '.tableQty', function() {

      var $row = $(this).closest("tr");
      var poId = $("#poId").val();
      var qty = parseFloat($row.find(".tableQty").val());
      var proid = $row.find("td:nth-child(1)").text();
      var proname = $row.find("td:nth-child(2)").text();

      $.post("../controllers/controller_purchase.php?type=updateTableRow", {
          poId: poId,
          qty: qty,
          proid: proid
        },
        function(data, status) {
          if (status == "success") {
            Swal.fire(
              'Changed!',
              proname + " - " + qty + " units.",
              'success'
            );
          }
        });
    });

    $('#purchaseTable tbody').on('click', '.fa-minus-circle', function() {

      var btn = this;
      var poId = $('#poId').val();
      var $row = $(this).closest("tr"); 
      var proid = $row.find("td:nth-child(1)").text();
      var proname = $row.find("td:nth-child(2)").text();
      var proqty = parseFloat($row.find(".tableQty").val());


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
          $.post("../controllers/controller_purchase.php?type=deleteTableRow", {
              poId: poId,
              proid: proid
            },
            function(data, status) {

              if (status == "success") {}
              $.post("../controllers/controller_purchase.php?type=purCreateTable", {
                  poId: poId
                },
                function(data, status) {
                  if (status == "success") {

                    $("#purchaseTable tbody").empty();
                    $("#purchaseTable tbody").append(data);

                  }
                });
            });

        } else {
          Swal.fire(
            'Items not removed!',
            '',
            'info'
          );
        }
      })

    });

    $('.date-picker').datepicker({
      autoclose: true,
      minDate: 0,
      maxDate: 0,
      todayHighlight: true,
      dateFormat: 'yy-mm-dd'
    });
    $('.date-picker').datepicker('setDate', new Date());

    $('[data-rel=tooltip]').tooltip();

    $('.select2').css('width', '200px').select2({
        allowClear: true
      })
      .on('change', function() {
        $(this).closest('form').validate().element($(this));
      });


    var $validation = false;
    $('#fuelux-wizard-container')
      .ace_wizard({

      })
      .on('actionclicked.fu.wizard', function(e, info) {
        if (info.step == 1) {
      
            d = new FormData($("#poSupplierForm")[0]);
            $.ajax({
              url: "../controllers/controller_purchase.php?type=poCreate",
              method: "post",
              data: d,
              processData: false,
              contentType: false,
              success: function(data) {
                var recData = JSON.parse(data);
                var poId = (recData[0].poid);
                var postatus = (recData[0].status);
                if (postatus == 2) {
                  Swal.fire(
                    'New Purchase Order Created!',
                    "Purchase Order ID: " + poId,
                    'info'
                  );
                } else {
                  Swal.fire(
                    'Existing Purchase Order loaded!',
                    "Purchase Order ID: " + poId,
                    'info'
                  );

                }
                $("#poId").val(poId);
                var poId = $("#poId").val();
                $.post("../controllers/controller_purchase.php?type=purCreateTable", {
                    poId: poId
                  },
                  function(data, status) {

                    $("#purchaseTable tbody").empty();
                    $("#purchaseTable tbody").append(data);



                  });

              }
            });

 

          $("#qty").val("0");
        }
        if (info.step == 2) {
          var poId = $("#poId").val();
          var podate = $("#poDate").val();
          $("#purid").text(poId);
          $("#purdate").text(podate);
          $.post("../controllers/controller_purchase.php?type=purViewData", {
              poId: poId
            },
            function(data, status) {
              if (status == "success") {

                $("#purchaseViewData tbody").empty();
                $("#purchaseViewData tbody").append(data);

              }
            });

        }
      })

      .on('finished.fu.wizard', function(e) {
        var poId = $("#poId").val();

        $.post("../controllers/controller_purchase.php?type=poComplete", {
            poId: poId
          },
          function(data, status) {
            if (status == "success") {
              Swal.fire({
                title: 'Purchase Order Completed',
                icon: 'info',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then((result) => {
                if (result.value) {
                  window.location.href = "purchase_view2.php";
                }
              });



            }
          });

      }).on('stepclick.fu.wizard', function(e) {

      });




    $.mask.definitions['~'] = '[+-]';
    $('#phone').mask('(999) 999-9999');

    jQuery.validator.addMethod("phone", function(value, element) {
      return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
    }, "Enter a valid phone number.");

    $('#poSupplierForm').validate({
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
        poSupplier: {
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




    $(document).one('ajaxloadstart.page', function(e) {
      //in ajax mode, remove remaining elements before leaving page
      $('[class*=select2]').remove();
    });
  })
</script>
</body>

</html>