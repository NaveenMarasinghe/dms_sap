<?php
require_once("../controllers/class_dbconnection.php");

if (isset($_GET["type"])) {
	$type = $_GET["type"];
	switch ($type) {			// checks the type addNewProductCat
		case "get_poid":
			get_poid();
			break;
		case "get_po":
			get_po();
			break;
		case "grnProductTable":
			grnProductTable();
			break;
		case "grnSave":
			grnSave();
			break;
		case "purchaseSaveDetails":
			purchaseSaveDetails();
			break;
		case "poLoad":
			poLoad();
			break;
		case "viewGrn":
			viewGrn();
			break;
		case "viewGrnModal":
			viewGrnModal();
			break;
			case "updatePoStatus":
				updatePoStatus();
				break;
	}
}
function get_poid()
{
	$supplierval = $_POST["supplierval"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT DISTINCT pur_id FROM tbl_po where sup_id='$supplierval' and (pur_status='3' OR pur_status='2')";

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

			echo ("<option value='" . $rec["pur_id"] . "'>" . $rec["pur_id"] . "</option>");
		}
	}
	$con->close();
}

function get_po()
{
	$supplierval = $_POST["supplierval"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT DISTINCT pur_id FROM tbl_po where sup_id='$supplierval' and pur_status='2' ";

	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}

	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("");
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {

			echo ("<option value='" . $rec["pur_id"] . "'>" . $rec["pur_id"] . "</option>");
		}
	}
	$con->close();
}

function grnProductTable()
{
	$poidVal = $_POST["poidVal"];
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT pod.pro_id, pro.pro_name, pod.pur_qty
				FROM tbl_products pro, tbl_po_details pod
				WHERE pod.pro_id=pro.pro_id and pod.purod_id='$poidVal' AND pur_prostatus='1'";
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

		echo ("<tr class='' id='" . $rec["pro_id"] . "'>");
		echo ('<td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>');
		echo ("<td>" . $rec["pro_id"] . "</td>");
		echo ("<td>" . $rec["pro_name"] . "</td>");

		echo ("<td style='text-align:center'><div><input class='tableQty' style='border:0px; text-align:center' value='" . $rec["pur_qty"] . "'/></div></td>");
		echo ("<td style='text-align:center'><div><input class='tableCost' style='border:0px; text-align:center' value=''/></div></td>");
		echo ("<td style='text-align:center'><div><input class='tableMRP' style='border:0px; text-align:center' value=''/></div></td>");
		
		echo ("</tr>");
	}

	$con->close();
}

function grnSave()
{
	$db = new Connection();
	$con = $db->db_con();

	//query
	$sql = "SELECT grn_id FROM tbl_grn ORDER BY grn_id DESC LIMIT 1;";

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
		$num = $rec["grn_id"];
		//eliminate string GRN and get remaining ID no
		$num = substr($num, 3);
		//increment the ID
		$num++;
		//merge zeros to left side of ID (total length of ID should be 4)
		$no = str_pad($num, 4, '0', STR_PAD_LEFT);
		//merge string S to new sID
		$grnid = "GRN" . $no;
	} else {
		//first ID of student
		$grnid = "GRN0001";
	}

	$grndate = $_POST["grndate"];
	$grnSupplier = $_POST["grnSupplier"];
	$grnremarks = $_POST["grnRemarks"];
	$purid = $_POST["grnPOID"];
	$postatus = "Pending";

	if ($purid == '0') {
		$purid = "Without PO";
	} else {
		$sqlupdate = "UPDATE tbl_po
			SET pur_status = '3'
			WHERE pur_id = '$purid';";
		$resultupdate = $con->query($sqlupdate);
	}

	$sql2 = "INSERT INTO tbl_grn(grn_id,sup_id,pur_id,grn_date,remarks)
		VALUES('$grnid','$grnSupplier','$purid','$grndate','$grnremarks');";

	$result2 = $con->query($sql2);

	if ($con->error) {
		echo ("SQL error " . $con->error);
		exit;
	}
	if ($result2 > 0) {
		echo (json_encode($grnid));
	} else {
		echo ("error");
	}
}

function purchaseSaveDetails()
{
	// Unescape the string values in the JSON array
	$tableData = stripcslashes($_POST['pTableData']);

	// Decode the JSON array
	$tableData = json_decode($tableData, TRUE);

	$tblDataLength = count($tableData);

	for ($x = 1; $x < $tblDataLength; $x++) {
		$grnpid = $tableData[$x]['grnpid'];
		$grnpqty = $tableData[$x]['grnpqty'];
		$itcost = $tableData[$x]['itcost'];
		$itmrp = $tableData[$x]['itmrp'];
		$grnid = $tableData[$x]['grnid'];
		$poId = $tableData[$x]['poId'];

		$db = new Connection();
		$con = $db->db_con();
		// check whether the product exist in the stock
		$sqlPrice = "SELECT item_cost, item_mrp FROM tbl_stock WHERE item_cost='$itcost' AND item_mrp='$itmrp' AND pro_id='$grnpid'";
		$resPrice = $con->query($sqlPrice);
		$norPrice = $resPrice->num_rows;

		//if product not exist in stock
		if ($norPrice == 0) {
			// create new batch id
			$sqlbatchid = "SELECT batch_id
			FROM tbl_stock
			WHERE pro_id='$grnpid' ORDER BY batch_id DESC LIMIT 1";

			//execute the query
			$resultbatchid = $con->query($sqlbatchid);

			//error handling
			if ($con->errno) {
				echo ("SQL Error: " . $con->error);
				exit;
			}

			//checks the number of rows in the result 
			$nor = $resultbatchid->num_rows;


			if ($nor > 0) {
				//fetch the result
				$rec = $resultbatchid->fetch_assoc();
				//assign ID to variable $num
				$num = $rec["batch_id"];
				//eliminate string GRN and get remaining ID no
				$num = substr($num, 7);
				//increment the ID
				$num++;
				//merge zeros to left side of ID (total length of ID should be 4)
				$no = str_pad($num, 3, '0', STR_PAD_LEFT);
				//merge string S to new sID
				$grnbatch = $grnpid . "BT" . $no;
			} else {
				//first ID of student
				$grnbatch = $grnpid . "GT001";
			}
			// insert data to grn details table
			$sql = "INSERT INTO tbl_grn_details(grn_id,pro_id,grn_batch,qty,item_cost,item_mrp)
				VALUES('$grnid','$grnpid','$grnbatch','$grnpqty','$itcost','$itmrp');";
			$con->query($sql);
			// insert new row to stock table
			$sql2 = "INSERT INTO tbl_stock(batch_id,pro_id,stock_qty,item_cost,item_mrp)
				VALUES('$grnbatch','$grnpid','$grnpqty','$itcost','$itmrp');";
			$con->query($sql2);
			// update purchase order product status to received
			$sqlStatus = "UPDATE tbl_po_details SET pur_prostatus='0' WHERE purod_id='$poId' AND pro_id='$grnpid'";
			$con->query($sqlStatus);
		} else {
			//if product exist in stock table
			$stocksql = "SELECT batch_id, stock_qty
				FROM tbl_stock
				WHERE item_cost='$itcost' AND item_mrp='$itmrp' AND pro_id='$grnpid';";

			$rec = $con->query($stocksql);
			$nor = $rec->num_rows;
			$num = $rec->fetch_assoc();
			$stock = $num["stock_qty"]; 	//get current stock value
			$grnbatch2 = $num["batch_id"];
			$grnpqty = $grnpqty + $stock;	//add current stock value to new value
			//update stock table with new value
			$sqlupdate = "UPDATE tbl_stock	
					SET stock_qty = '$grnpqty'
					WHERE batch_id = '$grnbatch2';";
			$con->query($sqlupdate);
			//insert data to grn details table
			$sql = "INSERT INTO tbl_grn_details(grn_id,pro_id,grn_batch,qty,item_cost,item_mrp)
			VALUES('$grnid','$grnpid','$grnbatch2','$grnpqty','$itcost','$itmrp');";
			$con->query($sql);
			// update purchase order product status to received
			$sqlStatus = "UPDATE tbl_po_details SET pur_prostatus='0' WHERE purod_id='$poId' AND pro_id='$grnpid'";
			$con->query($sqlStatus);
		}
		// check all products in purchase order are received

	}
}
function poLoad()
{
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT DISTINCT pur_id FROM tbl_po WHERE pur_status='1'";
	$result = $con->query($sql);
	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("No records");
		exit;
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {
			//merge province ID and name with HTML <option value="">--Select Supplier--</option>

			echo ("<option value='" . $rec["pur_id"] . "'>" . $rec["pur_id"] . "</option>");
		}
	}
	$con->close();
}

function viewGrn()
{
	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT grn.grn_id, grn.grn_date, grn.pur_id, sup.sup_name
			FROM tbl_grn grn, tbl_suppliers sup
			WHERE grn.sup_id=sup.sup_id";
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

		echo ("<tr id='" . $rec["grn_id"] . "'>");
		echo ("<td>" . $rec["grn_id"] . "</td>");
		echo ("<td>" . $rec["pur_id"] . "</td>");
		echo ("<td>" . $rec["sup_name"] . "</td>");
		echo ("<td>" . $rec["grn_date"] . "</td>");
		echo ('<td style="text-align:center"><div class="hidden-sm hidden-xs btn-group">
		
		<button class="btn btn-xs btn-info" id="btn_modelView" data-toggle="modal" data-target="#modelPoView" onclick="modalViewPo(\'' . $rec["grn_id"] . '\')">
			<i class="ace-icon fa fa-info-circle bigger-120"></i>
		</button>

	</div></td>');
		echo ("</tr>");
	}

	$con->close();
}

function viewGrnModal()
{ {

		$grnid = $_POST["grnid"];
		$db = new Connection();
		$con = $db->db_con();
		$sql = "SELECT grn.pro_id, pro.pro_name, grn.qty
					FROM tbl_grn_details grn, tbl_products pro
					WHERE grn.pro_id=pro.pro_id and grn.grn_id='$grnid'";
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


			echo ("</tr>");
			exit;
		}
		while ($rec = $result->fetch_assoc()) {

			echo ("<tr id='" . $rec["pro_id"] . "'>");
			echo ("<td>" . $rec["pro_id"] . "</td>");
			echo ("<td>" . $rec["pro_name"] . "</td>");
			echo ("<td>" . $rec["qty"] . "</td>");

			echo ("</tr>");
		}

		$con->close();
	}
}

function updatePoStatus(){
	$poid = $_POST["poid"];
	$db = new Connection();
	$con = $db->db_con();
	$sqlcount = "SELECT pro_id FROM tbl_po_details WHERE pur_prostatus='1' AND purod_id='$poid'";
	$countResult = $con->query($sqlcount);
	$norCount = $countResult->num_rows;

	if ($norCount == 0) {
		$sqlupdate = "UPDATE tbl_po
		SET pur_status = '4'
		WHERE pur_id ='$poid'";
		$resultupdate = $con->query($sqlupdate);
	}
	echo($norCount);
}