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
          <h4 class="page-header"><b>Add Purchase Order</b></h4>
        </div>
        <div class="box box-info">
          <!-- /.box-header -->
          <div class="box-body">
            <form id="purchaseform" method="post">
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
                      <select name="posupplier" id="posupplier" class="form-control selcet-filter">
                        <option value="0">--Select Supplier--</option>
                        <option value="12">--Select Sggggggggggggggggggggggggggupplier--</option>

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
                      <input class="form-control date-picker" id="purdate" name="podate" type="text" data-date-format="dd-mm-yyyy" />
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
                      <select name="selectSupplier" id="selectSupplier" class="form-control selcet-filter">
                        <option value="0">--Select Product Category--</option>
                        <option value="0">--Select Sggggggggggggggggggggggggggupplier--</option>

                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="proid">Product Name</label>
                    <select class="form-control selcet-filter select2gg" id="id_label_multiple">
                      <option></option>
                      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas</option>
                      <option value="CA">California</option>
                      <option value="CO">Colorado</option>
                    </select>
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
                      <button type='button' class='btn btn-primary m-b-20' id='addproductbutton'>Add Items</button>
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
                          Results for "Latest Registered Domains"
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
                    <button class="btn btn-warning" type="reset">
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
  $.noConflict();
  $('#purchaseTable').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    } );
  jQuery(function($) {
    $(document).ready(function() {
      var myTable = $('#purchaseTable').DataTable();

      $('#addproductbutton').on('click', function() {

        var proname = $("#id_label_multiple option:selected").text();
        var proid = $('#id_label_multiple').val();
        var qnty = $('#qty').val();
        var buttons = "<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div>"

        //<div class='hidden-sm hidden-xs action-buttons'><a class='blue' href='#''> <i class='ace-icon fa fa-search-plus bigger-130'></i></a> <a class='green' href='#''> <i class='ace-icon fa fa-pencil bigger-130'></i></a><a class='red' href='#''> <i class='ace-icon fa fa-trash-o bigger-130'></i> </a> </div>

        myTable.row.add([
          proid,
          proname,
          qnty,
          buttons
        ]).draw(false);

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

        const {
          value: formValues
        } = Swal.fire({
          title: 'Change values',
          html: '<div class="form-group" style="text-align: left;"><label for="swal-input1" >Product Name</label><input id="swal-input1" class="swal2-input" style="margin-top: 0px;"></div>' +
            '<div class="form-group" style="text-align: left;"><label for="swal-input1" >Product Quantity</label><input id="swal-input2" class="swal2-input" style="margin-top: 0px; margin-bottom: 0px;"></div>',
          focusConfirm: false,
          preConfirm: () => {
            return [
              document.getElementById('swal-input1').value,
              document.getElementById('swal-input2').value
            ]
          }
        })

        if (formValues) {
          Swal.fire(JSON.stringify(formValues))
        }

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
      $('.select2gg').select2({
        placeholder: "Select a Product",
        allowClear: true
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



  $("#pobtnSave").click(function() {


    d = new FormData($("#purchaseform")[0]);
    alert(d);
    $.ajax({
      url: "../controllers/controller_purchase.php?type=purchaseSave",
      method: "POST",
      data: d,
      processData: false,
      contentType: false,
      success: function(data) {
        // $('#purchaseform')[0].reset();
        // location.reload(true);
        //alert(data);

        // $("#poid").append(data);
        var poidddata = jQuery.parseJSON(data);

        function storeTblValues() {
          var TableData = new Array();

          $('#tablebody tr').each(function(row, tr) {
            TableData[row] = {
              "pid": $(tr).find('td:eq(0)').text(),
              "pname": $(tr).find('td:eq(1)').text(),
              "pqty": $(tr).find('td:eq(2)').text(),
              "poid": poidddata
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
          success: function(msg) {
            alert(msg);
            $('#purchaseform')[0].reset();
            location.reload(true);

          }
        });
      }
    });
  });
</script>


<script src="../assets/js/chosen.jquery.min.js"></script>

<!-- Require footer here -->
<?php require_once("../incl/footer.php"); ?>