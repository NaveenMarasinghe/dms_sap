<?php
  session_start();
    if(!isset($_SESSION["user"]) || ($_SESSION["user"]["utype"]=="3") || ($_SESSION["user"]["utype"]=="4")){
      header("location:../index.php");
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Blank Page - Ace Admin</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/datatables/css/dataTables.bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="../assets/sweetalert/css/sweetalert.css" /> -->
    <link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
    <!-- 		<link rel="stylesheet" href="../assets/jqueryui/jquery-ui.min.css" /> -->
    <link rel="stylesheet" href="../assets/css/ui.jqgrid.min.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
    <link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="../assets/js/jquery-2.1.4.min.js"></script>

    <script src="../assets/jquery/js/jquery.js"></script>
    <script src="../assets/jquery/js/jquery.min.js"></script>
    <script src="../assets/jqueryui/jquery-ui.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="../assets/datatables/js/dataTables.bootstrap.min.js"></script>
    <!-- 		<script src="../assets/datatables/js/jquery.dataTables.min.js"></script> -->
    <script src="../assets/js/ace-extra.min.js"></script>

    <!-- 		<script src="../assets/js/bootstrap.min.js"></script> -->
    <script src="../assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../assets/js/dataTables.buttons.min.js"></script>
    <script src="../assets/js/buttons.flash.min.js"></script>
    <script src="../assets/js/buttons.html5.min.js"></script>
    <script src="../assets/js/buttons.print.min.js"></script>
    <script src="../assets/js/buttons.colVis.min.js"></script>
    <script src="../assets/js/dataTables.select.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <!-- <script src="../assets/js/bootstrap-datepicker.min.js"></script> -->
    <script src="../assets/js/bootbox.js"></script>




    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="no-skin">


    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>

        <link href="../assets/css/select2.min.css" rel="stylesheet" />
        <script src="../assets/js/select2.min.js"></script>


        <div class="page-content">


            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <input type="hidden" id="salesid" value="<?php echo $_GET['salesid'] ?>">
                    <div>
                        <div>
                          
                        </div>
                        <div class="box box-info">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-6">

                                        <div class="row page-header">
                                            <div class="col-md-6" style="text-align:left">
                                                <h4 style="text-align:left"><b>Sales Invoice</b></h4>
                                            </div>
                                            <div class="col-md-6" style="text-align:right">
                                                <div style="margin-bottom: 12px;">
                                                <h4>
                                                    S.A.P. Distributors, </br>
                                                    Muthugala Road,</br>
                                                    Bihalpola, Nakkawaththa. </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col-md-6" style="text-align:left">
                                                <table id='invHeader'>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                    <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sales ID:</td>
                                                        <td id="invSalesId"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:2%">Date:</td>
                                                        <td style="width:5%" id="invDate"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6" style="text-align:right">
                                                <h5>Customer</h5>
                                                    <div style="margin-bottom: 12px;">
                                                        <div id="customer"> </div>
                                                        <div id="cusAdd"> </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-12">

                                                            <div>
                                                                <table id="salesTable" class="table table-bordered">
                                                                    <thead>
                                                                        <tr>

                                                                            
                                                                            <th style="width:10%">List No</th>
                                                                            <th style="width:40%">Product Name</th>
                                                                            <th style="width:10%">Item Price</th>
                                                                            <th style="width:10%">Quantity</th>
                                                                            <th style="width:10%">Discount %</th>
                                                                            <th style="width:15%">Total</th>

                                                                        </tr>
                                                                    </thead>

                                                                    <tbody id="salesTableBody">

                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>

                                                                            <td colspan="3" class="blank"> </td>
                                                                            <td colspan="2" style='text-align:right'>Sub Total</td>
                                                                            <td class="subTotal" id="subTotal" style='text-align:right'>
                                                                                0.00
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td colspan="3" class="blank"> </td>
                                                                            <td colspan="2" style='text-align:right'>Amount Paid</td>
                                                                            <td lass="amountPaid" id="amountPaid" style='text-align:right'>
                                                                                0.00
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td colspan="3" class="blank"> </td>
                                                                            <td colspan="2" style='text-align:right'>Previous Balance</td>
                                                                            <td class="preBalance" id="preBalance" style='text-align:right'>
                                                                                0.00
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td colspan="3" class="blank"> </td>
                                                                            <td colspan="2" style='text-align:right'>Balance due</td>
                                                                            <td class="balanceVal" id="balanceVal" style='text-align:right'>
                                                                                0.00
                                                                            </td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col-md-4">



                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-default btn-block btn-flat" id="btnBack">Back</button>
                                            </div>
                                
                                        </div>

                                    </div>
                                </div>

                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->

        <script type="text/javascript">
            $(document).ready(function() {
                document.title = "Sales Invoice";
                var salesId = $("#salesid").val();
                $.post("../controllers/controller_sales.php?type=salesInvoiceTable", {
                        salesId: salesId
                    },
                    function(data, status) {
                        if (status == "success") {
                            $("#salesTable tbody").empty();
                            $("#salesTable tbody").append(data);
                        }
                    });

                $.post("../controllers/controller_sales.php?type=salesInvoiceData", {
                        salesId: salesId
                    },
                    function(data, status) {
                        if (status == "success") {
                            var invoiceData = JSON.parse(data);
                            $('#subTotal').text(invoiceData.sales_total);
                            $('#amountPaid').text(invoiceData.sales_paid);
                            $('#balanceVal').text(invoiceData.sales_balance);
                            $('#preBalance').text(invoiceData.sales_prebal);
                            $('#invDate').text(invoiceData.sales_date);
                            $('#invSalesId').text(invoiceData.sales_id);
                        }
                    });

                    $.post("../controllers/controller_sales.php?type=salesCus", {
                        salesId: salesId
                    },
                    function(data, status) {
                        if (status == "success") {
                            var invoiceCusData = JSON.parse(data);
                            $('#customer').append(invoiceCusData.cus_name);
                            $('#cusAdd').append(invoiceCusData.cus_add);
                        }
                    });
                $("#btnBack").click(function() {
                    window.location.href = "sales_view.php";
                });

            });
        </script>


        <script src="../assets/js/chosen.jquery.min.js"></script>
        <script src="../assets/js/jquery.validate.min.js"></script>
        <!-- Require footer here -->
        </div>
			</div><!-- /.main-content -->


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

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>
