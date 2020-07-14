<?php
require_once("../controllers/class_dbconnection.php");

if (isset($_GET["type"])) {
	$type = $_GET["type"];
	switch ($type) {			// checks the type 
		case "stockRouteSche":
			stockRouteSche();
			break;
		case "viewRouteStock":
			viewRouteStock();
			break;
		case "RouteStockSalesman":
			RouteStockSalesman();
			break;
		case "issueStock":
			issueStock();
			break;
		case "viewStockReport":
			viewStockReport();
			break;
		case "vehicleStock":
			vehicleStock();
			break;
		case "receiveRouteStock":
			receiveRouteStock();
			break;
		case "receiveVehStock":
			receiveVehStock();
			break;
		case "receiveStock":
			receiveStock();
			break;
		case "topEmp":
			topEmp();
			break;
		case "topProducts":
			topProducts();
			break;
	}
}

function stockRouteSche()
{

	$stockDate = $_POST["stockDate"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT rtsche.routesche_id, rt.route_name FROM tbl_route_sche rtsche, tbl_route rt where rtsche.route_date='$stockDate' and rtsche.route_id=rt.route_id";

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
			echo ("<option value='" . $rec["routesche_id"] . "'>" . $rec["routesche_id"] . "</option>");
		}
	}
	$con->close();
}

function viewRouteStock()
{
	$selectRouteSche = $_POST["selectRouteSche"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT rtsche.rtsche_proid, pd.pro_name, rtsche.rtsche_batch, rtsche.rtsche_qty
				FROM tbl_route_sche_details rtsche, tbl_products pd
				WHERE pd.pro_id=rtsche.rtsche_proid and rtsche.rtsche_id='$selectRouteSche' AND rtsche.rtsche_dstatus='1'";
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
		echo ('<td><div class="hidden-sm hidden-xs btn-group">
				<button class="btn btn-xs btn-success">
					<i class="ace-icon fa-info-circle bigger-120"></i>
				</button>

				<button class="btn btn-xs btn-info">
					<i class="ace-icon fa fa-pencil bigger-120"></i>
				</button>

				<button class="btn btn-xs btn-danger">
					<i class="ace-icon fa fa-trash-o bigger-120"></i>
				</button>

			</div></td>');
		echo ("</tr>");
		exit;
	}
	while ($rec = $result->fetch_assoc()) {
		// echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td> 
		// </tr>";	
		echo ("<tr id='" . $rec["rtsche_proid"] . "'>");
		echo ('<td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>');
		echo ("<td>" . $rec["rtsche_proid"] . "</td>");
		echo ("<td>" . $rec["pro_name"] . "</td>");
		echo ("<td>" . $rec["rtsche_batch"] . "</td>");
		echo ("<td>" . $rec["rtsche_qty"] . "</td>");

		echo ('<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success" id="btn_modelView" data-toggle="modal" data-target="#modelPoView" onclick="modalViewPo(\'' . $rec["pur_id"] . '\')">
						<i class="ace-icon fa fa-info-circle bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modelEditProduct">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modelDeleteProduct">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</button>

				</div></td>');
		echo ("</tr>");
	}

	$con->close();
}

function RouteStockSalesman()
{
	$selectRouteSche = $_POST["selectRouteSche"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT usr.emp_fullname as fname FROM tbl_route_sche rt, tbl_user_details usr where rt.routesche_id='$selectRouteSche' and rt.salesman=usr.emp_id";
	$sql2 = "SELECT vehicle FROM tbl_route_sche where routesche_id='$selectRouteSche'";

	// $result = $con->query($sql);
	$result2 = $con->query($sql2);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	// $rec = $result->fetch_assoc();
	// $name=$rec["fname"];

	$rec2 = $result2->fetch_assoc();
	$vehicle = $rec2["vehicle"];

	// $dataArray[0]["name"] = $name;
	$dataArray[0]["vehicle"] = $vehicle;

	echo json_encode($dataArray);

	$con->close();
}

function issueStock()
{
	$rtsche = $_POST["rtsche"];
	$db = new Connection();
	$con = $db->db_con();

	//query
	$sql = "SELECT issue_stock_id FROM tbl_issue_stock ORDER BY issue_stock_id DESC LIMIT 1;";

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
		$num = $rec["issue_stock_id"];
		//eliminate string S and get remaining ID no
		$num = substr($num, 2);
		//increment the ID
		$num++;
		//merge zeros to left side of ID (total length of ID should be 4)
		$no = str_pad($num, 4, '0', STR_PAD_LEFT);
		//merge string S to new sID
		$isid = "IS" . $no;
	} else {
		//first ID of student
		$isid = "IS0001";
	}

	$sql2 = "INSERT INTO tbl_issue_stock(issue_stock_id,issue_routesche)
		VALUES('$isid','$rtsche');";

	$result2 = $con->query($sql2);
	if ($con->error) {
		echo ("SQL error " . $con->error);
		exit;
	}
	if ($result2 > 0) {
		echo (json_encode($isid));
	} else {
		echo ("error");
	}
	$sqlupdate = "UPDATE tbl_route_sche SET rtsche_status='2' WHERE routesche_id='$rtsche'";

	$sqlupdate2 = $con->query($sqlupdate);

}
function viewStockReport()
{

	$db = new Connection();
	$con = $db->db_con();

	$sql = "SELECT batch_id,stock_qty,item_cost,item_mrp,pro_name FROM tbl_stock JOIN tbl_products ON tbl_products.pro_id = tbl_stock.pro_id";

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

		echo ("<tr>");

		echo ("<td>" . $rec["pro_name"] . "</td>");
		echo ("<td>" . $rec["batch_id"] . "</td>");
		echo ("<td>" . $rec["stock_qty"] . "</td>");
		echo ("<td>" . $rec["item_cost"] . "</td>");
		echo ("<td>" . $rec["item_mrp"] . "</td>");

		echo ("</tr>");
	}

	$con->close();
}

function vehicleStock()
{
	// Unescape the string values in the JSON array
	$tableData = stripcslashes($_POST['pTableData']);

	// Decode the JSON array
	$tableData = json_decode($tableData, TRUE);

	// now $tableData can be accessed like a PHP array
	//echo $tableData[1]['pname'];
	$tblDataLength = count($tableData);

	for ($x = 1; $x < $tblDataLength; $x++) {


		$pname = $tableData[$x]["pname"];
		$pid = $tableData[$x]["pid"];
		$pbatch = $tableData[$x]["pbatch"];
		$isid = $tableData[$x]["isid"];
		$vehnum = $tableData[$x]["vehnum"];
		$pqty = $tableData[$x]["pqty"];
		$rtsche = $tableData[$x]["rtsche"];

		$db = new Connection();
		$con = $db->db_con();

		$sqlStock = "SELECT * FROM tbl_stock WHERE batch_id='$pbatch'";
		$stockResult = $con->query($sqlStock);
		$stockCount = $stockResult->num_rows;

		if ($stockCount > 0) {
			$stockRec = $stockResult->fetch_assoc();
			$stockQty = $stockRec['stock_qty'];
			$stockQty = $stockQty - $pqty;
			$sqlUpdate = "UPDATE tbl_stock SET stock_qty='$stockQty' WHERE batch_id='$pbatch'";
			$con->query($sqlUpdate);
			echo ($stockQty);

			$sqlrtst = "UPDATE tbl_route_sche_details SET rtsche_dstatus='0' WHERE rtsche_batch='$pbatch' AND rtsche_id='$rtsche'";
			$con->query($sqlrtst);

			$sqlVehStock = "SELECT * FROM tbl_vehicle_products WHERE batch_id='$pbatch' AND veh_id='$vehnum'";
			$vehStockResult = $con->query($sqlVehStock);
			$vehStockCount = $vehStockResult->num_rows;
			if ($vehStockCount > 0) {
				$vehStockRec = $vehStockResult->fetch_assoc();
				$vehStockQty = $vehStockRec['qty'];
				$vehStockQty = $vehStockQty + $pqty;
				$sqlVehUpdate = "UPDATE tbl_vehicle_products SET qty='$vehStockQty' WHERE batch_id='$pbatch' AND veh_id='$vehnum'";
				$con->query($sqlVehUpdate);
				echo ($vehStockQty);
			} else {
				$sqlVehicle = "INSERT INTO tbl_vehicle_products(veh_id,pro_id,batch_id,qty)
				VALUES('$vehnum','$pid','$pbatch','$pqty')";
				$con->query($sqlVehicle);
				echo ("stock added success");
			}
		} else {
			echo ($pbatch);
		}
		$con->close();
	}
}
function receiveRouteStock()
{
	$routeVehicle = $_POST["routeVehicle"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT st.pro_id, pro.pro_name, veh.batch_id, veh.qty
				FROM tbl_vehicle_products veh, tbl_products pro, tbl_stock st
				WHERE veh.veh_id='$routeVehicle' AND veh.batch_id=st.batch_id AND st.pro_id=pro.pro_id";
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
		// echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td> 
		// </tr>";	
		echo ("<tr>");
		echo ('<td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>');
		echo ("<td>" . $rec["pro_id"] . "</td>");
		echo ("<td>" . $rec["pro_name"] . "</td>");
		echo ("<td>" . $rec["batch_id"] . "</td>");
		echo ("<td>" . $rec["qty"] . "</td>");
		echo ("</tr>");
	}

	$con->close();
}

function receiveStock()
{
	// Unescape the string values in the JSON array
	$tableData = stripcslashes($_POST['pTableData']);

	// Decode the JSON array
	$tableData = json_decode($tableData, TRUE);

	// now $tableData can be accessed like a PHP array
	//echo $tableData[1]['pname'];
	$tblDataLength = count($tableData);

	for ($x = 1; $x < $tblDataLength; $x++) {


		$batch = $tableData[$x]["batch"];
		$qty = $tableData[$x]["qty"];
		$routeVehicle = $tableData[$x]["routeVehicle"];



		$db = new Connection();
		$con = $db->db_con();

		$sql1 = "SELECT stock_qty FROM tbl_stock WHERE batch_id='$batch' ";
		$stockResult = $con->query($sql1);
		$stockCount = $stockResult->num_rows;

		if ($stockCount > 0) {
			$rec = $stockResult->fetch_assoc();
			$stockqty = $rec["stock_qty"];
			$stockqty = $stockqty + $qty;
			$sqlupdate = "UPDATE tbl_stock SET stock_qty='$stockqty' WHERE batch_id='$batch'";
			$con->query($sqlupdate);
			echo ($stockqty);

			$sqlveh = "DELETE FROM tbl_vehicle_products WHERE veh_id='$routeVehicle' AND batch_id='$batch'";
			$con->query($sqlveh);
			echo ('removed');
		}


		$con->close();
	}
}

function topEmp()
{
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT tbl_user_details.emp_fullname,tbl_sales_details.emp_id,SUM(sub_total) AS totalSales FROM `tbl_sales_details`,tbl_user_details WHERE tbl_user_details.emp_id =tbl_sales_details.emp_id GROUP BY emp_id ORDER BY totalSales DESC LIMIT 10 ";
	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("<tr>");
		echo ("<td></td>");
		echo ("<td></td>");
		echo ("</tr>");
		exit;
	}
	while ($rec = $result->fetch_assoc()) {

		echo ("<tr>");
		echo ("<td class='hidden-480'><span class='label label-success arrowed-in arrowed-in-right'>" . $rec["emp_fullname"] . "</span></td>");
		echo ("<td><b class='green'>" . $rec["totalSales"] . "</b></td>");
		echo ("</tr>");
	}

	$con->close();
}

function topProducts()
{
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT item_name, SUM(sales_qty) as total FROM `tbl_sales_details` GROUP BY item_name ORDER BY SUM(sales_qty) DESC";
	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("<tr>");
		echo ("<td></td>");
		echo ("<td></td>");
		echo ("</tr>");
		exit;
	}
	while ($rec = $result->fetch_assoc()) {

		echo ("<tr>");
		echo ("<td class='hidden-480'><span class='label label-info arrowed-right arrowed-in'>" . $rec["item_name"] . "</span></td>");
		echo ("<td><b class='blue'>" . $rec["total"] . "</b></td>");

		echo ("</tr>");
	}

	$con->close();
}

function receiveVehStock(){

	$rtscheid = $_POST["rtscheid"];
	$db = new Connection();
	$con = $db->db_con();
	$sqlupdate = "UPDATE tbl_route_sche SET rtsche_status='3' WHERE routesche_id='$rtscheid'";

	$sqlupdate2 = $con->query($sqlupdate);

	echo('gg');

}