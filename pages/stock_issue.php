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
          <h4 class="page-header"><b>Issue Stock</b></h4>
        </div>
        <div class="box box-info">
          <input type="hidden" class="form-control date-picker" id="grndate" name="grndate" type="text" data-date-format="dd-mm-yyyy" />
          <!-- /.box-header -->
          <div class="box-body">
            <form id="issueStock" method="post" enctype="multipart/form-data">


              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="proid">Route Schedule</label>
                    <select name="selectRouteSche" id="selectRouteSche" class="form-control selcet-filter">
                      <option value="0">--Select Route Schedule--</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="routeSalesman">Salesman</label>
                    <textarea id="routeSalesman" class="form-control" readonly style=" overflow: hidden; resize: none; background: transparent;"></textarea>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                    <label for="routeVehicle">Vehicle</label>
                    <div class="form-group">
                      <textarea id="routeVehicle" class="form-control" readonly style=" overflow: hidden; resize: none; background: transparent;"></textarea>
                    </div>
                  </div>
                </div>

              </div>
                <div class="row">
                <div class="col-md-3">
                <a href="" id="id-btn-dialog1" class="btn btn-purple btn-sm" style='margin-bottom: 10px;'>Add More Product</a>
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


                        <!-- div.table-responsive -->

                        <!-- div.dataTables_borderWrap -->
                        <div>
                          <table id="routeStockTable" class="table table-striped table-bordered table-hover">
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
                                <th>Batch ID</th>                                
                                <th>Quantity</th>
                                <th>Actions</th>

                              </tr>
                            </thead>

                            <tbody id="routeStockTable">

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
                    <button class="btn btn-info" type="button" id="issueProduct">
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
  jQuery(function($) {
    $.noConflict();
    var routeStockTable = $('#routeStockTable').DataTable({
      bAutoWidth: false,
      aoColumns: [null, null, null, null, null],
      aaSorting: [],
      select: {
        style: 'multi'
      }
    });

    $(document).ready(function() {
      $.noConflict();

      function print_today() {
        var now = new Date();
        var months = new Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
        var date = ((now.getDate() < 10) ? "0" : "") + now.getDate();

        function fourdigits(number) {
          return (number < 1000) ? number + 1900 : number;
        }
        var today = (fourdigits(now.getYear())) + "-" + months[now.getMonth()] + "-" + date;
        return today;
      }

      var stockDate = print_today();
      //alert(stockDate);
      $.post("../controllers/controller_stock.php?type=stockRouteSche", {
          stockDate: stockDate
        },
        function(data, status) {
          if (status == "success") {
            //alert(data); 
            $("#selectRouteSche").empty();
            $("#selectRouteSche").append("<option value=''>--Select Route Schedule--</option>");
            $("#selectRouteSche").append(data);

          }
        });
    });



    $('#selectRouteSche').change(function() {
      $.noConflict();
      var selectRouteSche = $('#selectRouteSche').val();

      $.post("../controllers/controller_stock.php?type=viewRouteStock", {
          selectRouteSche: selectRouteSche
        },
        function(data, status) {
          if (status == "success") {
            //alert(data);
            $("#routeStockTable").DataTable().destroy();
            $("#routeStockTable tbody").empty();
            $("#routeStockTable tbody").append(data);
            $("#routeStockTable").DataTable();
          }
        });

        //   f = new FormData($("#purchaseform")[0]);
        //  $.ajax({
        //     method: "POST",
        //     url: "../controllers/controller_stock.php?type=RouteStockSalesman",
        //     data: f,
        //     processData: false,
        //     contentType: false
        // })
        //   .done(function(data) {
        //       var testdata = JSON.parse(data);
        //       //console.log(data);
        //      $("#routeSalesman").val(testdata.emp_fname + ' ' + testdata.emp_lname);
        //      $("#routeVehicle").val(testdata.veh_number);
        //       // $("#eq_name").val(testdata[0].name);
             
        //       });    

    });

  })

  $.noConflict();
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

      var myTable = $('#purchaseTable').DataTable();

      $('#addproductbutton').on('click', function() {


        var proname = $("#poProductList option:selected").text();
        var proid = $('#poProductList').val();
        var qnty = $('#qty').val();


        var buttons = "<div class='hidden-sm hidden-xs btn-group'><button type='button' class='btn btn-xs btn-success' id='btn_modelView'><i class='ace-icon fa fa-info-circle bigger-120'></i></button><button type='button' class='btn btn-xs btn-info'><i class='ace-icon fa fa-pencil bigger-120'></i></button><button type='button' class='btn btn-xs btn-danger'><i class='ace-icon fa fa-trash-o bigger-120'></i></button></div>"
        if (proid != 0) {
          myTable.row.add([
            proid,
            proname,
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


        $("#qty").val("");
        $("#poProductList").empty();
        $('.select2gg').select2({
          placeholder: "--Select a Product--",
          allowClear: true
        });

        var supplierval = $('#poSupplier').val();
        var procatval = $('#poProductCat').val(); // get option's value

        // get filtered data to datatable
        $.post("../controllers/controller_purchaseCreate.php?type=get_productList", {
            procatval: procatval,
            supplierval: supplierval
          },
          function(data, status) {
            if (status == "success") {
              // alert(data);
              $("#poProductList").empty();
              $("#poProductList").append("<option></option>");
              $("#poProductList").append(data);

            }
          });

      });

      $('#purchaseTable tbody').on('click', '.fa-trash-o', function() {

        var btn = this;

        var $row = $(this).closest("tr"); // Find the row
        var proname = $row.find("td:nth-child(2)").text();
        var proqty = $row.find("td:nth-child(3)").text();
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

      $('#purchaseTable tbody').on('click', '.fa-pencil', function() {
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

  jQuery(function($) {

    $("#issueProduct").click(function() {

      // if ($("#issueStock").valid()) {
        d = new FormData($("#issueStock")[0]);
        alert(d);
        $.ajax({
          url: "../controllers/controller_stock.php?type=issueStock",
          method: "POST",
          data: d,
          processData: false,
          contentType: false,
          success: function(data) {
            // $('#purchaseform')[0].reset();
            // location.reload(true);
            alert(data);

            // $("#poid").append(data);
            var issueStockId = jQuery.parseJSON(data);

            function storeTblValues() {
              var TableData = new Array();

              $('#routeStockTable tr').each(function(row, tr) {
                TableData[row] = {
                  "pid": $(tr).find('td:eq(0)').text(),
                  "pname": $(tr).find('td:eq(1)').text(),
                  "pqty": $(tr).find('td:eq(2)').text(),
                  "poid": issueStockId
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
              url: "../controllers/controller_stock.php?type=issueStockDetails",
              data: "pTableData=" + TableData,
              success: function(msg) {
                alert(msg);
                $('#issueStock')[0].reset();
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