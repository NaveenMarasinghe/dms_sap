<?php
require_once("../controllers/class_dbconnection.php");

if (isset($_GET["type"])) {
	$type = $_GET["type"];
	switch ($type) {			// checks the type addNewProductCat
		case "get_route":
			get_route();
			break;
		case "get_customers":
			get_customers();
			break;
		case "get_suppliers":
			get_suppliers();
			break;
		case "get_ProCat":
			get_ProCat();
			break;
		case "get_batch":
			get_batch();
			break;
		case "save_stock":
			save_stock();
			break;
		case "salesDetailsSave":
			salesDetailsSave();
			break;
		case "salesCreate":
			salesCreate();
			break;
		case "get_itemPrice":
			get_itemPrice();
			break;
		case "calculate_linetotal":
			calculate_linetotal();
			break;
		case "loadSalesman";
			loadSalesman();
			break;
		case "salesCreateTable";
			salesCreateTable();
			break;
		case "salesAddRow";
			salesAddRow();
			break;
		case "updateTableRow";
			updateTableRow();
			break;
		case "deleteTableRow";
			deleteTableRow();
			break;
		case "getSalesBalance";
			getSalesBalance();
			break;
		case "salesSubmit";
			salesSubmit();
			break;
		case "salesInvoiceData";
			salesInvoiceData();
			break;
		case "salesPreBal";
			salesPreBal();
			break;
		case "salesCancel";
			salesCancel();
			break;
		case "salesInvoiceTable";
			salesInvoiceTable();
			break;
		case "getTodayRouteSche";
			getTodayRouteSche();
			break;
		case "viewSales";
			viewSales();
			break;
		case "get_rtscheid";
			get_rtscheid();
			break;
		case "get_supplierId";
			get_supplierId();
			break;
		case "get_avaQty";
			get_avaQty();
			break;
	}
}
function get_route()
{
	$rtsche = $_POST["rtsche"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT rt.route_name AS route_name FROM tbl_route rt, tbl_route_sche rtsche WHERE rt.route_id=rtsche.route_id AND rtsche.routesche_id='$rtsche'";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("");
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo ($rec["route_name"]);
		}
	}
	$con->close();
}

function get_customers()
{
	$rtsche = $_POST["rtsche"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT cus.cus_id, cus.cus_name FROM tbl_customers cus, tbl_route_sche rtsche 
			WHERE rtsche.routesche_id='$rtsche' AND cus.route_id=rtsche.route_id";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("");
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo ("<option value='" . $rec["cus_id"] . "'>" . $rec["cus_name"] . "</option>");
		}
	}
	$con->close();
}

function get_ProCat()
{

	$salesSupplier = $_POST["salesSupplier"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT DISTINCT product_cat_id,product_cat_name FROM tbl_product_cat where sup_id='$salesSupplier'";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("");
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo ("<option value='" . $rec["product_cat_id"] . "'>" . $rec["product_cat_name"] . "</option>");
		}
	}
	$con->close();
}

function get_suppliers()
{
	$rtsche = $_POST["rtsche"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT sup.sup_name FROM tbl_suppliers sup, tbl_route_sche rtsche 
	WHERE rtsche.routesche_id='$rtsche' AND sup.sup_id=rtsche.sup_id";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("");
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo ($rec["sup_name"]);
		}
	}
	$con->close();
}

function get_supplierId()
{
	$rtsche = $_POST["rtsche"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT sup_id FROM tbl_route_sche WHERE routesche_id='$rtsche'";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("");
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo ($rec["sup_id"]);
		}
	}
	$con->close();
}

function get_batch()
{

	$proid = $_POST["proid"];

	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT DISTINCT batch_id FROM tbl_stock where stock_qty>0 and pro_id='$proid'";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("");
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo ("<option value='" . $rec["batch_id"] . "'>" . $rec["batch_id"] . "</option>");
		}
	}
	$con->close();
}

function save_stock()
{
	$db = new Connection();
	$con = $db->db_con();

	//query
	$sql = "SELECT sales_id FROM tbl_sales_order ORDER BY sales_id DESC LIMIT 1;";

	//execute the query
	$result = $con->query($sql);

	//error handling
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}

	//checks the number of rows in the result 
	$nor = $result->num_rows;


	if ($nor > 0) {
		//fetch the result
		$rec = $result->fetch_assoc();
		//assign ID to variable $num
		$num = $rec["sales_id"];
		//eliminate string S and get remaining ID no
		$num = substr($num, 2);
		//increment the ID
		$num++;
		//merge zeros to left side of ID (total length of ID should be 4)
		$no = str_pad($num, 4, '0', STR_PAD_LEFT);
		//merge string S to new sID
		$salesId = "SL" . $no;
	} else {
		//first ID of student
		$salesId = "SL0001";
	}

	$salesDate = $_POST["salesDate"];
	$subTol = $_POST["subTol"];
	$cusid = $_POST["cusid"];
	$balanceVal = $_POST["balanceVal"];
	$amountPaid = $_POST["amountPaid"];

	$sql2 = "INSERT INTO tbl_sales_order(sales_id,sales_date,cus_id,sales_total,sales_paid,sales_balance)
		VALUES('$salesId','$salesDate','$cusid','$subTol','$amountPaid','$balanceVal');";

	$salesBalanceSql = "SELECT sales_balance FROM tbl_customers WHERE cus_id='$cusid'";

	$balanceResult = $con->query($salesBalanceSql);
	$nor = $balanceResult->num_rows;

	if ($nor > 0) {
		$balanceRec = $balanceResult->fetch_assoc();
		$balanceNow = $balanceRec["sales_balance"];
		$balanceVal = $balanceVal + $balanceNow;
		$balanceUpdate = "UPDATE tbl_customers
							SET sales_balance = '$balanceVal'
							WHERE cus_id = '$cusid';";
		$con->query($balanceUpdate);
	}

	$result2 = $con->query($sql2);
	if ($con->error) {
		echo ("SQL error " . $con->error);
		exit;
	}
	if ($result2 > 0) {
		echo (json_encode($salesId));
	} else {
		echo ("error");
	}
}

function salesDetailsSave()
{
	// Unescape the string values in the JSON array
	$tableData = stripcslashes($_POST['pTableData']);

	// Decode the JSON array
	$tableData = json_decode($tableData, TRUE);

	// now $tableData can be accessed like a PHP array
	//echo $tableData[1]['pname'];
	$tblDataLength = count($tableData);



	for ($x = 0; $x < $tblDataLength; $x++) {
		$batch_id = $tableData[$x]['batch_id'];
		$item_price = $tableData[$x]['item_price'];
		$item_dis = $tableData[$x]['item_dis'];
		$item_qty = $tableData[$x]['item_qty'];
		$salesId = $tableData[$x]['salesId'];

		$db = new Connection();
		$con = $db->db_con();

		$sql2 = "INSERT INTO tbl_sales_details(sales_id,batch_id,item_price,sales_qty,sale_disrate)
			VALUES('$salesId','$batch_id','$item_price','$item_qty','$item_dis');";

		// $result=$con->query($sql);
		$result2 = $con->query($sql2);
		if ($con->error) {
			echo ("SQL error " . $con->error);
			exit;
		}
		if ($result2 > 0) {
			echo ("success2");
		} else {
			echo ("error");
		}
	}
}

function get_itemPrice()
{

	$batch = $_POST["batch"];
	$proid = $_POST["proid"];

	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT DISTINCT item_mrp FROM tbl_stock where stock_qty>0 and batch_id='$batch'";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("");
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo ($rec["item_mrp"]);
		}
	}
	$con->close();
}

function get_avaQty()
{

	$batch = $_POST["batch"];
	$rtsche = $_POST["rtsche"];

	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT SUM(veh.qty) AS stock_sum FROM tbl_vehicle_products veh, tbl_route_sche rtsche where veh.batch_id='$batch' AND rtsche.vehicle=veh.veh_id AND rtsche.routesche_id='$rtsche'";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("");
	} else {
		//fetch all the records
		$rec = $result->fetch_assoc();
			//merge province ID and name with HTML
		echo ($rec["stock_sum"]);
		
	}
	$con->close();
}

function calculate_linetotal()
{
	$txtCusPrdId = $_POST["txtCusPrdId"];
	$batchId = $_POST["batchId"];
	$txtOrdDtQty = $_POST["txtOrdDtQty"];

	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT * FROM tbl_stock where batch_id='$batchId'";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("");
	} else {
		//fetch all the records
		$rec = $result->fetch_assoc();
		$line_tot = $txtOrdDtQty * $rec["item_mrp"];
		echo json_encode($line_tot);
	}
	$con->close();
}

function loadSalesman()
{
	$schedate = $_POST["schedate"];

	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT DISTINCT usr.emp_fname, usr.emp_lname, usr.emp_id FROM tbl_user_details usr, tbl_route_sche rt where rt.route_date<>'$schedate' and rt.salesman=usr.emp_id";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("empty");
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo ("<option value='" . $rec["emp_id"] . "'>" . $rec["emp_fname"] . " " . $rec["emp_lname"] . "</option>");
		}
	}
	$con->close();
}

function salesCreate()
{

	$db = new Connection();
	$con = $db->db_con();

	//query
	$sql = "SELECT sales_id FROM tbl_sales_order ORDER BY sales_id DESC LIMIT 1;";

	//execute the query
	$result = $con->query($sql);

	//error handling
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}

	//checks the number of rows in the result 
	$nor = $result->num_rows;


	if ($nor > 0) {
		//fetch the result
		$rec = $result->fetch_assoc();
		//assign ID to variable $num
		$num = $rec["sales_id"];
		//eliminate string S and get remaining ID no
		$num = substr($num, 2);
		//increment the ID
		$num++;
		//merge zeros to left side of ID (total length of ID should be 4)
		$no = str_pad($num, 4, '0', STR_PAD_LEFT);
		//merge string S to new sID
		$salesId = "SL" . $no;
	} else {
		//first ID of student
		$salesId = "SL0001";
	}

	$salesDate = $_POST["salesDate"];
	$salesRoute = $_POST["salesRoute"];
	$salesCustomer = $_POST["salesCustomer"];
	$salesSupplier = $_POST["salesSupplier"];
	$salesEditStatus = "1";

	$sql2 = "INSERT INTO tbl_sales_order(sales_id,sales_date,cus_id,sup_id,sales_status)
		VALUES('$salesId','$salesDate','$salesCustomer','$salesSupplier','$salesEditStatus');";

	$lastEdit = "SELECT sales_status,sales_id FROM tbl_sales_order WHERE cus_id='$salesCustomer' ORDER BY sales_id DESC LIMIT 1";

	$lastEditResult = $con->query($lastEdit);
	$nor = $lastEditResult->num_rows;

	if ($nor > 0) {
		$lastEditRec = $lastEditResult->fetch_assoc();
		$status = $lastEditRec["sales_status"];
		$id = $lastEditRec["sales_id"];
		// echo($status);

		if ($status == 0) {
			// create new sales order
			$resultsql2 = $con->query($sql2);
			if ($con->error) {
				echo ("SQL error " . $con->error);
				exit;
			}
			echo ($salesId);
		} elseif ($status == 1) {
			// existing sales order
			echo ($id);
		}
	} else {
		$resultsql2 = $con->query($sql2);
		if ($con->error) {
			echo ("SQL error " . $con->error);
			exit;
		}
		echo ($salesId);
	}
}

function salesCreateTable()
{
	$salesId = $_POST["salesId"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT *
			FROM tbl_sales_details
			WHERE sales_id = '$salesId' ORDER BY list_no";
	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	$nor = $result->num_rows;
	if ($nor == 0) {

		exit;
	}
	while ($rec = $result->fetch_assoc()) {

		echo ("<tr id='" . $rec["list_no"] . "'>");
		echo ("<td><div class='hidden-sm hidden-xs btn-group'><button type='button' class='btn btn-xs btn-danger' style='margin: auto'><i class='ace-icon fa fa-minus-circle bigger-120'></i></button></div></td>");
		echo ("<td style='text-align:center'>" . $rec["list_no"] . "</td>");
		echo ("<td>" . $rec["item_name"] . "</td>");
		echo ("<td>" . $rec["item_price"] . "</td>");
		echo ("<td style='text-align:center'><div><input class='tableQty' style='border:0px; width:50%; text-align:center' value='" . $rec["sales_qty"] . "'/></div></td>");
		echo ("<td style='text-align:center'><div><input class='tableDis' style='border:0px; width:50%; text-align:center' value='" . $rec["sale_disrate"] . "'/></div></td>");
		echo ("<td class='subTolRow' style='text-align:right'>" . $rec["sub_total"] . "</td>");
		
		echo ("</tr>");
	}

	$con->close();
}

function salesInvoiceTable()
{
	$salesId = $_POST["salesId"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT *
			FROM tbl_sales_details
			WHERE sales_id = '$salesId' ORDER BY list_no";
	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("<tr>");
		echo ("<td colspan='6' style='text-align:center'>No Products Added</td>");
		echo ("</tr>");
		exit;
	}
	while ($rec = $result->fetch_assoc()) {
		
		echo ("<tr id='" . $rec["list_no"] . "'>");
		echo ("<td style='text-align:center'>" . $rec["list_no"] . "</td>");
		echo ("<td>" . $rec["item_name"] . "</td>");
		echo ("<td>" . $rec["item_price"] . "</td>");
		echo ("<td style='text-align:center'><div><input class='tableQty' style='border:0px; width:50%; text-align:center' value='" . $rec["sales_qty"] . "'/></div></td>");
		echo ("<td style='text-align:center'><div><input class='tableDis' style='border:0px; width:50%; text-align:center' value='" . $rec["sale_disrate"] . "'/></div></td>");
		echo ("<td class='subTolRow' style='text-align:right'>" . $rec["sub_total"] . "</td>");
		
		echo ("</tr>");
	}

	$con->close();
}

function salesAddRow()
{
	$proname = $_POST["proname"];
	$salesId = $_POST["salesId"];
	$item_cost = $_POST["item_cost"];
	$batch = $_POST["batch"];
	$qnty = $_POST["qnty"];
	$discount = $_POST["discount"];
	$subTotal = $_POST["subTotal"];

	$db = new Connection();
	$con = $db->db_con();

	$sqlBatch = "SELECT * FROM tbl_sales_details WHERE batch_id='$batch' AND sales_id='$salesId'";
	$batchResult = $con->query($sqlBatch);
	$batchCount = $batchResult->num_rows;



	if ($batchCount > 0) {
		$batchRec = $batchResult->fetch_assoc();
		$batchQty = $batchRec['sales_qty'];
		$batchQty = $batchQty + $qnty;
		$total = $batchQty * $item_cost;
		$subTol = $total - $total * $discount / 100;

		$sqlUpdate = "UPDATE tbl_sales_details SET sales_qty='$batchQty', sub_total='$subTol', sale_disrate='$discount' WHERE batch_id='$batch'";
		$con->query($sqlUpdate);
		echo ("success1");
	} else {

		$sql = "SELECT * FROM tbl_sales_details WHERE sales_id='$salesId'";
		$result = $con->query($sql);
		$nor = $result->num_rows;
		$nor = $nor + 1;

		$sql2 = "INSERT INTO tbl_sales_details(sales_id,list_no,batch_id,item_name,item_price,sales_qty,sale_disrate,sub_total)
		VALUES('$salesId','$nor','$batch','$proname','$item_cost','$qnty','$discount','$subTotal');";

		// $result=$con->query($sql);
		$result2 = $con->query($sql2);
		if ($con->error) {
			echo ("SQL error " . $con->error);
			exit;
		}
		if ($result2 > 0) {
			echo ("success2");
		} else {
			echo ("error");
		}
	}
	$con->close();
}

function updateTableRow()
{
	$salesid = $_POST["salesid"];
	$listNo = $_POST["listNo"];
	$qty = $_POST["qty"];
	$dis = $_POST["dis"];
	$rowTotalVal = $_POST["grossTotal"];


	$db = new Connection();
	$con = $db->db_con();
	$sql = "UPDATE tbl_sales_details 
			SET sales_qty='$qty', sale_disrate='$dis', sub_total='$rowTotalVal'
			WHERE sales_id='$salesid' and list_no='$listNo'";
	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}

	$con->close();
}

function deleteTableRow()
{
	$salesid = $_POST["salesid"];
	$listNo = $_POST["listNo"];

	$db = new Connection();
	$con = $db->db_con();
	$sql = "DELETE
			FROM tbl_sales_details 
			WHERE sales_id='$salesid' and list_no='$listNo'";
	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	$sql2 = "SELECT * FROM tbl_sales_details WHERE sales_id='$salesid'";
	$result2 = $con->query($sql2);
	// $nor=$result2->num_rows;
	$count = 0;
	while ($rec = $result2->fetch_assoc()) {
		$count = $count + 1;
		$batchId = $rec['batch_id'];
		$sql3 = "UPDATE tbl_sales_details SET list_no='$count' WHERE batch_id='$batchId'";
		$con->query($sql3);
	}

	$con->close();
}

function getSalesBalance()
{
	$selectCustomer = $_POST['selectCustomer'];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT sales_balance FROM tbl_customers WHERE cus_id='$selectCustomer'";
	$result = $con->query($sql);
	$rec = $result->fetch_assoc();
	$balance = $rec['sales_balance'];
	echo ($balance);
	$con->close();
}

function salesSubmit()
{
	$salesid = $_POST["salesid"];
	$subTotal = $_POST["subTotal"];
	$amountPaid = $_POST["amountPaid"];
	$salesCustomer = $_POST["salesCustomer"];
	$empId = $_POST["empId"];
	$balanceVal = $_POST["balanceVal"];
	$preBalance = $_POST["preBalance"];
	$status = 0;
	$db = new Connection();
	$con = $db->db_con();
	$sql = "UPDATE tbl_sales_order SET sales_total='$subTotal', sales_paid='$amountPaid', sales_balance='$balanceVal', sales_prebal='$preBalance', sales_status='$status', emp_id='$empId' WHERE sales_id='$salesid'";
	$result = $con->query($sql);
	if ($con->error) {
		echo ("SQL error " . $con->error);
		exit;
	} elseif ($result > 0) {
		echo ("success");
	} else {
		echo ("error");
	}
	$sql2 = "UPDATE tbl_customers SET sales_balance='$balanceVal' WHERE cus_id='$salesCustomer'";
	$result2 = $con->query($sql2);
	if ($con->error) {
		echo ("SQL error " . $con->error);
		exit;
	} elseif ($result2 > 0) {
		echo ("success");
	} else {
		echo ("error");
	}
	$con->close();
}

function salesInvoiceData()
{
	$salesId = $_POST["salesId"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT * FROM tbl_sales_order WHERE sales_id='$salesId'";
	$result = $con->query($sql);
	$rec = $result->fetch_assoc();
	echo (json_encode($rec));
	$con->close();
}

function salesCancel()
{
	$salesid = $_POST["salesid"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "UPDATE tbl_sales_order SET sales_status='0' WHERE sales_id='$salesid'";
	$result = $con->query($sql);
	if ($con->error) {
		echo ("SQL error " . $con->error);
		exit;
	} elseif ($result > 0) {
		echo ("success");
	} else {
		echo ("error");
	}
	$con->close();
}

function salesPreBal()
{
	$salesId = $_POST["salesId"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT cus.sales_balance FROM tbl_customers cus, tbl_sales_order so WHERE cus.cus_id=so.cus_id AND so.sales_id='$salesId'";
	$result = $con->query($sql);
	$rec = $result->fetch_assoc();
	echo (json_encode($rec));
	$con->close();
}

function getTodayRouteSche()
{
	$empid = $_POST["empid"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT DISTINCT routesche_id FROM tbl_route_sche where salesman='$empid' ORDER BY routesche_id DESC LIMIT 1 ";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("");
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo ($rec["routesche_id"]);
		}
	}
	$con->close();
}

function viewSales()
{
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT sl.sales_id, cus.cus_name, sup.sup_name, sl.sales_total, sl.sales_paid
			FROM tbl_sales_order sl, tbl_customers cus, tbl_suppliers sup
			WHERE sl.cus_id=cus.cus_id AND sl.sup_id=sup.sup_id";
	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("<tr>");
		echo ("<td>No Record</td>");
		echo ("<td>No Record</td>");
		echo ("<td>No Record</td>");
		echo ("<td>No Record</td>");
		echo ("<td>No Record</td>");

		echo ("</tr>");
		exit;
	}
	while ($rec = $result->fetch_assoc()) {

		echo ("<tr id='" . $rec["sales_id"] . "'>");
		echo ("<td>" . $rec["sales_id"] . "</td>");
		echo ("<td>" . $rec["cus_name"] . "</td>");
		echo ("<td>" . $rec["sales_total"] . "</td>");
		echo ("<td>" . $rec["sales_paid"] . "</td>");
		echo ('<td style="text-align:center"><div class="hidden-sm hidden-xs btn-group">
		<a href="sales_create_invoice.php?salesid='. $rec["sales_id"] . '">
		<button class="btn btn-xs btn-info">
			<i class="ace-icon fa fa-info-circle bigger-120"></i>
		</button></a>

	</div></td>');
		echo ("</tr>");
	}

	$con->close();
}

function get_rtscheid()
{
	$empId = $_POST["empId"];
	$date = $_POST["date"];

	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT routesche_id FROM tbl_route_sche WHERE route_date='$date' AND salesman='$empId'";
	$sql2 = "SELECT routesche_id FROM tbl_route_sche WHERE route_date='$date'";

	if($empId=='EMP001'){
		$result = $con->query($sql2);
		if ($con->errno) {
			echo ("SQL Error: " . $con->error);
			exit;
		}
		//alert('func');
		$nor = $result->num_rows;
		if ($nor == 0) {
			echo ("");
		} else {
			//fetch all the records
			while ($rec = $result->fetch_assoc()) {
				//merge province ID and name with HTML
				echo ("<option value='" . $rec["routesche_id"] . "'>" . $rec["routesche_id"] . "</option>");
			}
		}
	}else{
		$result = $con->query($sql);
		if ($con->errno) {
			echo ("SQL Error: " . $con->error);
			exit;
		}
		//alert('func');
		$nor = $result->num_rows;
		if ($nor == 0) {
			echo ("");
		} else {
			//fetch all the records
			while ($rec = $result->fetch_assoc()) {
				//merge province ID and name with HTML
				// echo ($rec["routesche_id"]);
				echo ("<option value='" . $rec["routesche_id"] . "'>" . $rec["routesche_id"] . "</option>");
			}
		}
	}

	$con->close();
}
