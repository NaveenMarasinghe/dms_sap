<?php
require_once("../controllers/class_dbconnection.php");

if (isset($_GET["type"])) {
	$type = $_GET["type"];
	switch ($type) {			// checks the type 
		case "getItemBatch":
			getItemBatch();
			break;
            case "getReturnVal":
                getReturnVal();
                break;
                case "salesCreate":
                    salesCreate();
                    break;
                    case "salesCreateTable":
                        salesCreateTable();
                        break;
                        case "save_stock":
                            save_stock();
                            break;
                            case "salesDetailsSave":
                                salesDetailsSave();
                                break;
	}
}

function getItemBatch(){
    $proid = $_POST["proid"];
    $itemPrice = $_POST["itemPrice"];

	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT batch_id FROM tbl_stock WHERE pro_id='$proid' AND item_mrp='$itemPrice' ORDER BY batch_id DESC LIMIT 1";

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
            $batch=$rec["batch_id"];
			echo ($batch);
		}
	}
	$con->close();
}

function getReturnVal(){
    $salesBatch = $_POST["salesBatch"];


	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT item_cost FROM tbl_stock WHERE batch_id='$salesBatch'";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("0");
	} else {
        $rec = $result->fetch_assoc();
        $cost = $rec["item_cost"];
        echo(100);
		
	}
	$con->close();
}

function salesCreate()
{

	$db = new Connection();
	$con = $db->db_con();

	//query
	$sql = "SELECT return_id FROM tbl_sales_return ORDER BY return_id DESC LIMIT 1;";

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
		$num = $rec["return_id"];
		//eliminate string S and get remaining ID no
		$num = substr($num, 2);
		//increment the ID
		$num++;
		//merge zeros to left side of ID (total length of ID should be 4)
		$no = str_pad($num, 4, '0', STR_PAD_LEFT);
		//merge string S to new sID
		$salesId = "RN" . $no;
	} else {
		//first ID of student
		$salesId = "RN0001";
	}

	$salesDate = $_POST["salesDate"];
	$salesRoute = $_POST["salesRoute"];
	$salesCustomer = $_POST["salesCustomer"];
	$salesSupplier = $_POST["salesSupplier"];
	$salesEditStatus = "1";

	$sql2 = "INSERT INTO tbl_sales_return(return_id,return_date,cus_id,sup_id,sales_status)
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
		echo ("<tr>");
		echo ("<td colspan='7' style='text-align:center'>No Products Added</td>");
		echo ("</tr>");
		exit;
	}
	while ($rec = $result->fetch_assoc()) {
		// echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td> 
		// </tr>";	
		// sql2 ="select sum(stock_qty) from tbl_stock where pro_id='.$rec["pro_id"].';";
		// $result2 = $con->query($sql2);
		// // $rec2=$result2->fetch_assoc();

		echo ("<tr id='" . $rec["list_no"] . "'>");
		echo ("<td><div class='hidden-sm hidden-xs btn-group'><button type='button' class='btn btn-xs btn-danger' style='margin: auto'><i class='ace-icon fa fa-minus-circle bigger-120'></i></button></div></td>");
		echo ("<td style='text-align:center'>" . $rec["list_no"] . "</td>");
		echo ("<td>" . $rec["item_name"] . "</td>");
		echo ("<td>" . $rec["item_price"] . "</td>");
		echo ("<td style='text-align:center'><div><input class='tableQty' style='border:0px; width:50%; text-align:center' value='" . $rec["sales_qty"] . "'/></div></td>");
		echo ("<td style='text-align:center'><div><input class='tableDis' style='border:0px; width:50%; text-align:center' value='" . $rec["sale_disrate"] . "'/></div></td>");
		echo ("<td class='subTolRow' style='text-align:right'>" . $rec["sub_total"] . "</td>");
		// echo("<td>".$rec2["sum(stock_qty)"]."</td>");
		echo ("</tr>");
	}

	$con->close();
}

function save_stock(){
    $db = new Connection();
	$con = $db->db_con();

	//query
	$sql = "SELECT return_id FROM tbl_sales_return ORDER BY return_id DESC LIMIT 1;";

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
		$num = $rec["return_id"];
		//eliminate string S and get remaining ID no
		$num = substr($num, 2);
		//increment the ID
		$num++;
		//merge zeros to left side of ID (total length of ID should be 4)
		$no = str_pad($num, 4, '0', STR_PAD_LEFT);
		//merge string S to new sID
		$salesId = "RN" . $no;
	} else {
		//first ID of student
		$salesId = "RN0001";
	}

	$salesDate = $_POST["salesDate"];
	$subTol = $_POST["subTol"];
	$cusid = $_POST["cusid"];
	$balanceVal = $_POST["balanceVal"];
	

	$sql2 = "INSERT INTO tbl_sales_return(return_id,return_date,cus_id,return_total,return_status)
		VALUES('$salesId','$salesDate','$cusid','$subTol','0')";

	$salesBalanceSql = "SELECT sales_balance FROM tbl_customers WHERE cus_id='$cusid'";

	$balanceResult = $con->query($salesBalanceSql);
	$nor = $balanceResult->num_rows;

	if ($nor > 0) {
		$balanceRec = $balanceResult->fetch_assoc();
		$balanceNow = $balanceRec["sales_balance"];
		// $balanceVal = $balanceVal + $balanceNow;
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
		$item_total = $tableData[$x]['item_total'];
		$item_qty = $tableData[$x]['item_qty'];
		$salesId = $tableData[$x]['salesId'];

		$db = new Connection();
		$con = $db->db_con();

		$sql2 = "INSERT INTO tbl_return_details(return_id,batch_id,item_price,return_qty,return_total)
			VALUES('$salesId','$batch_id','$item_price','$item_qty','$item_total');";

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
?>