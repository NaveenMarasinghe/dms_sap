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
		case "get_itemPrice":
			get_itemPrice();
			break;
		case "calculate_linetotal":
			calculate_linetotal();
			break;
		case "loadSalesman";
			loadSalesman();
			break;
	}
}
function get_route()
{

	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT route_id, route_name FROM tbl_route";

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
			echo ("<option value='" . $rec["route_id"] . "'>" . $rec["route_name"] . "</option>");
		}
	}
	$con->close();
}

function get_customers()
{
	$salesRoute = $_POST["salesRoute"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT cus_id, cus_name FROM tbl_customers";

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

	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT sup_id, sup_name FROM tbl_suppliers;";

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
			echo ("<option value='" . $rec["sup_id"] . "'>" . $rec["sup_name"] . "</option>");
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

			$balanceResult=$con->query($salesBalanceSql);
			$nor=$balanceResult->num_rows;

			if($nor>0){
				$balanceRec=$balanceResult->fetch_assoc();
				$balanceNow=$balanceRec["sales_balance"];
				$balanceVal=$balanceVal+$balanceNow;
				$balanceUpdate="UPDATE tbl_customers
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

function calculate_linetotal(){
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

function loadSalesman(){
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
			echo ("<option value='" . $rec["emp_id"] . "'>" . $rec["emp_fname"] ." ".$rec["emp_lname"]. "</option>");
		}
	}
	$con->close();
}
?>