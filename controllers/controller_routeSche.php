<?php require_once("../controllers/class_dbconnection.php");

if (isset($_GET["type"])) {
	$type=$_GET["type"];

	switch ($type) {
		// checks the type
		case "get_productsGroup":
			get_productsGroup();
		break;
		case "purchaseSave":
			save_pur_order(); //calls function
		break;
		case "purchaseSaveDetails":
			purchaseSaveDetails();
		break;
		case "rtscheProductTable":
			rtscheProductTable();
		break;
		case "get_batch":
			get_batch();
		break;
		case "routeScheSave":
			routeScheSave();
		break;
		case "rtscheSaveDetails":
			rtscheSaveDetails();
		break;
		case "selectTerritory":
			selectTerritory();
		break;
		case "selectRoute":
			selectRoute();
		break;
		case "rtscheViewDatatable":
			rtscheViewDatatable();
		break;
		case "getRouteScheDetails":
			getRouteScheDetails();
		break;
		case "selectSalesman":
			selectSalesman();
		break;
		case "selectDriver":
			selectDriver();
		break;
		case "selectVehicle":
			selectVehicle();
		break;
		case "getEventData":
			getEventData();
		break;
		case "viewScheModal":
			viewScheModal();
		break;
		case "viewScheSalesman":
			viewScheSalesman();
		break;
		case "viewScheDriver":
			viewScheDriver();
		break;
		case "avaqty":
			avaqty();
		break;
		case "deleteSche":
			deleteSche();
		break;
	}
}



function get_productsGroup() {
	$supplierval=$_POST["supplierval"];
	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT DISTINCT prdgroup_id,prdgroup_name FROM tbl_supplier_productgroup where prdgroup_supplier='$supplierval'";

	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	//alert('func');
	$nor=$result->num_rows;

	if ($nor==0) {
		echo("");
	}

	else {

		//fetch all the records
		while ($rec=$result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo("<option value='". $rec["prdgroup_id"] . "'>". $rec["prdgroup_name"] . "</option>");
		}
	}

	$con->close();
}

function rtscheProductTable() {
	$proGroup=$_POST["proGroup"];
	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT pd.pro_id, pd.pro_name, pdgrp.prd_qty FROM tbl_products pd,
tbl_group_product pdgrp WHERE pdgrp.prd_id=pd.pro_id and pdgrp.prd_group='$proGroup'";
$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	$nor=$result->num_rows;

	if ($nor==0) {
		echo("<tr>");
		echo("<td>No Record</td>");
		echo("<td>No Record</td>");
		echo("<td>No Record</td>");
		echo("<td>No Record</td>");
		echo("</tr>");
		exit;
	}

	while ($rec=$result->fetch_assoc()) {
		// echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td>
		// </tr>";
		echo("<tr id='". $rec["pro_id"] . "'>");
		echo("<td>". $rec["pro_id"] . "</td>");
		echo("<td>". $rec["pro_name"] . "</td>");
		echo("<td>". $rec["prd_qty"] . "</td>");
		echo('<td><div class="hidden-sm hidden-xs btn-group"> <button class="btn btn-xs btn-success"> <i class="ace-icon fa fa-info-circle bigger-120"></i> </button> <button class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </button> <button class="btn btn-xs btn-danger"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </button> </div></td>');
		echo("</tr>");
	}

	$con->close();
}

function save_pur_order() {
	$db=new Connection();
	$con=$db->db_con();

	//query
	$sql="SELECT pur_id FROM tbl_po ORDER BY pur_id DESC LIMIT 1;";

	//execute the query
	$result=$con->query($sql);

	//error handling
	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	//checks the number of rows in the result
	$nor=$result->num_rows;


	if ($nor > 0) {
		//fetch the result
		$rec=$result->fetch_assoc();
		//assign ID to variable $num
		$num=$rec["pur_id"];
		//eliminate string S and get remaining ID no
		$num=substr($num, 1);
		//increment the ID
		$num++;
		//merge zeros to left side of ID (total length of ID should be 4)
		$no=str_pad($num, 4, '0', STR_PAD_LEFT);
		//merge string S to new sID
		$poid="P". $no;
	}

	else {
		//first ID of student
		$poid="PO0001";
	}

	$podate=$_POST["podate"];
	$poSupplier=$_POST["poSupplier"];
	$remarks=$_POST["poremarks"];
	$postatus="Pending";

	$sql2="INSERT INTO tbl_po(pur_id,pur_date,sup_id,pur_remarks,pur_status) VALUES('$poid', '$podate', '$poSupplier', '$remarks', '$postatus'); ";

	$result2=$con->query($sql2);

	if ($con->error) {
		echo("SQL error ". $con->error);
		exit;
	}

	if ($result2 > 0) {
		echo(json_encode($poid));
	}

	else {
		echo("error");
	}
}

function purchaseSaveDetails() {
	// Unescape the string values in the JSON array
	$tableData=stripcslashes($_POST['pTableData']);

	// Decode the JSON array
	$tableData=json_decode($tableData, true);

	// now $tableData can be accessed like a PHP array
	//echo $tableData[1]['pname'];
	$tblDataLength=count($tableData);



	for ($x=0; $x < $tblDataLength; $x++) {
		$pid=$tableData[$x]['pid'];
		$pname=$tableData[$x]['pname'];
		$pqty=$tableData[$x]['pqty'];
		$poid=$tableData[$x]['poid'];

		$db=new Connection();
		$con=$db->db_con();

		$sql2="INSERT INTO tbl_po_details(purod_id,pro_id,pur_qty) VALUES('$poid', '$pid', '$pqty'); ";

		// $result=$con->query($sql);
		$result2=$con->query($sql2);

		if ($con->error) {
			echo("SQL error ". $con->error);
			exit;
		}

		if ($result2 > 0) {
			echo("success2");
		}

		else {
			echo("error");
		}
	}
}

function purchaseView() {
	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT po.pur_id, po.pur_date, sup.sup_name, po.pur_remarks, po.pur_status FROM tbl_po po, tbl_suppliers sup WHERE po.sup_id=sup.sup_id and po.pur_status<>'Removed'";
	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	$nor=$result->num_rows;

	if ($nor==0) {
		echo("<tr>");
		echo("<td>No Record</td>");
		echo("<td>No Record</td>");
		echo("<td>No Record</td>");
		echo("<td>No Record</td>");
		echo("<td>No Record</td>");
		echo('<td><div class="hidden-sm hidden-xs btn-group"> <button class="btn btn-xs btn-success"> <i class="ace-icon fa-info-circle bigger-120"></i> </button> <button class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </button> <button class="btn btn-xs btn-danger"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </button> <button class="btn btn-xs btn-warning"> <i class="ace-icon fa fa-flag bigger-120"></i> </button> </div></td>');
		echo("</tr>");
		exit;
	}

	while ($rec=$result->fetch_assoc()) {
		// echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td>
		// </tr>";
		echo("<tr id='". $rec["pur_id"] . "'>");
		echo("<td>". $rec["pur_id"] . "</td>");
		echo("<td>". $rec["sup_name"] . "</td>");
		echo("<td>". $rec["pur_date"] . "</td>");
		echo("<td>". $rec["pur_status"] . "</td>");
		echo('<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group"> <button type="button"class="btn btn-xs btn-success"id="btn_modelView"onclick="viewSingleProduct(\''. $rec["pur_id"] . '\')"> <i class="ace-icon fa fa-info-circle bigger-120"></i> </button> <button class="btn btn-xs btn-info"data-toggle="modal"data-target="#modelEditProduct"> <i class="ace-icon fa fa-pencil bigger-120"></i> </button> <button class="btn btn-xs btn-danger"data-toggle="modal"data-target="#modelDeleteProduct"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </button> </div></td>');
		echo("</tr>");
	}

	$con->close();
}

function get_batch() {
	$proid=$_POST["proid"];

	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT DISTINCT batch_id FROM tbl_stock where stock_qty>0 and pro_id='$proid'";

	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	//alert('func');
	$nor=$result->num_rows;

	if ($nor==0) {
		echo("");
	}

	else {

		//fetch all the records
		while ($rec=$result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo("<option value='". $rec["batch_id"] . "'>". $rec["batch_id"] . "</option>");
		}
	}

	$con->close();
}

function routeScheSave() {
	$db=new Connection();
	$con=$db->db_con();

	//query
	$sql="SELECT routesche_id FROM tbl_route_sche ORDER BY routesche_id DESC LIMIT 1;";

	//execute the query
	$result=$con->query($sql);

	//error handling
	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	//checks the number of rows in the result
	$nor=$result->num_rows;


	if ($nor > 0) {
		//fetch the result
		$rec=$result->fetch_assoc();
		//assign ID to variable $num
		$num=$rec["routesche_id"];
		//eliminate string GRN and get remaining ID no
		$num=substr($num, 3);
		//increment the ID
		$num++;
		//merge zeros to left side of ID (total length of ID should be 4)
		$no=str_pad($num, 4, '0', STR_PAD_LEFT);
		//merge string S to new sID
		$rtscheid="RSH". $no;
	}

	else {
		//first ID of student
		$rtscheid="RSH0001";
	}

	$rtscheSupplier=$_POST["rtscheSupplier"];
	$rtscheRoute=$_POST["rtscheRoute"];
	$rtscheDate=$_POST["rtscheDate"];
	$selectSalesman=$_POST["selectSalesman"];
	$selectDriver=$_POST["selectDriver"];
	$selectVehicle=$_POST["selectVehicle"];
	$rtscheRemarks=$_POST["rtscheRemarks"];
	$rtscheStatus="1";

	$sql2="INSERT INTO tbl_route_sche(routesche_id,route_id,route_date,sup_id,rtsche_remarks,rtsche_status,vehicle,driver,salesman) VALUES('$rtscheid', '$rtscheRoute', '$rtscheDate', '$rtscheSupplier', '$rtscheRemarks', '$rtscheStatus', '$selectVehicle', '$selectDriver', '$selectSalesman'); ";

	$result2=$con->query($sql2);

	if ($con->error) {
		echo("SQL error ". $con->error);
		exit;
	}

	if ($result2 > 0) {
		echo(json_encode($rtscheid));
	}

	else {
		echo("error");
	}

	$sqlCalUpdate1="INSERT INTO tbl_user_calender(emp_id,cal_date,cal_remarks) VALUES('$selectSalesman','$rtscheDate','$rtscheid');";
	$con->query($sqlCalUpdate1);

	if ($con->error) {
		echo("SQL error ". $con->error);
		exit;
	}

	$sqlCalUpdate2="INSERT INTO tbl_user_calender(emp_id,cal_date,cal_remarks) VALUES('$selectVehicle','$rtscheDate','$rtscheid');";
	$con->query($sqlCalUpdate2);

	if ($con->error) {
		echo("SQL error ". $con->error);
		exit;
	}

	$sqlCalUpdate3="INSERT INTO tbl_user_calender(emp_id,cal_date,cal_remarks) VALUES('$selectDriver','$rtscheDate','$rtscheid');";
	$con->query($sqlCalUpdate3);

	if ($con->error) {
		echo("SQL error ". $con->error);
		exit;
	}
}


function rtscheSaveDetails() {
	// Unescape the string values in the JSON array
	$tableData=stripcslashes($_POST['pTableData']);

	// Decode the JSON array
	$tableData=json_decode($tableData, true);

	// now $tableData can be accessed like a PHP array
	//echo $tableData[1]['pname'];
	$tblDataLength=count($tableData);



	for ($x=1; $x < $tblDataLength; $x++) {
		$rtschepid=$tableData[$x]['rtschepid'];
		$rtschpname=$tableData[$x]['rtschpname'];
		$rtschebatch=$tableData[$x]['rtschebatch'];
		$rtscheqty=$tableData[$x]['rtscheqty'];
		$rtscheid=$tableData[$x]['rtscheid'];

		$db=new Connection();
		$con=$db->db_con();

		$sql2="INSERT INTO tbl_route_sche_details(rtsche_id,rtsche_proid,rtsche_batch,rtsche_qty,rtsche_dstatus) VALUES('$rtscheid', '$rtschepid', '$rtschebatch', '$rtscheqty', '1'); ";

		// $result=$con->query($sql);
		$result2=$con->query($sql2);

		if ($con->error) {
			echo("SQL error ". $con->error);
			exit;
		}

		if ($result2 > 0) {
			echo("success2");
		}

		else {
			echo("error");
		}
	}
}

function selectTerritory() {
	$supplierval=$_POST["supplierval"];

	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT DISTINCT tr.trty_name, st.ter_id FROM tbl_supplier_territory st, tbl_territory tr where st.sup_id='$supplierval'";

	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	//alert('func');
	$nor=$result->num_rows;

	if ($nor==0) {
		echo("");
	}

	else {

		//fetch all the records
		while ($rec=$result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo("<option value='". $rec["ter_id"] . "'>". $rec["trty_name"] . "</option>");
		}
	}

	$con->close();
}

function selectRoute() {
	$rtscheTerritory=$_POST["rtscheTerritory"];

	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT DISTINCT rt.route_id,rt.route_name FROM tbl_route rt, tbl_territory tr where tr.trty_id='$rtscheTerritory'and tr.route_id=rt.route_id";

	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	//alert('func');
	$nor=$result->num_rows;

	if ($nor==0) {
		echo("");
	}

	else {

		//fetch all the records
		while ($rec=$result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo("<option value='". $rec["route_id"] . "'>". $rec["route_name"] . "</option>");
		}
	}

	$con->close();
}

function rtscheViewDatatable() {
	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT DISTINCT rtsch.routesche_id, rtsch.route_id, rt.route_name, rtsch.rtsche_status, rtsch.route_date FROM tbl_route_sche rtsch, tbl_route rt, tbl_territory tr WHERE rtsch.route_id=rt.route_id; ";
	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	$nor=$result->num_rows;

	if ($nor==0) {
		echo("<tr>");
		echo("<td>No Record</td>");
		echo("<td>No Record</td>");
		echo("<td>No Record</td>");
		echo("<td>No Record</td>");
		echo("<td>No Record</td>");
		echo('<td><div class="hidden-sm hidden-xs btn-group"> <button class="btn btn-xs btn-success"> <i class="ace-icon fa-info-circle bigger-120"></i> </button> <button class="btn btn-xs btn-info"> <i class="ace-icon fa fa-pencil bigger-120"></i> </button> <button class="btn btn-xs btn-danger"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </button> <button class="btn btn-xs btn-warning"> <i class="ace-icon fa fa-flag bigger-120"></i> </button> </div></td>');
		echo("</tr>");
		exit;
	}

	while ($rec=$result->fetch_assoc()) {
		$status=$rec["rtsche_status"];

		switch ($status) {
			case "1": $statustd="<span class='label label-sm label-warning'>Scheduled</span>";
			break;
			case "2": $statustd="<span class='label label-sm label-default arrowed arrowed-righ'>Distributing</span>";
			break;
			case "3": $statustd="<span class='label label-sm label-info arrowed arrowed-righ'>Completed</span>";
			break;
		}

		$status=$rec["rtsche_status"];

		switch ($status) {
			case "1": $btn='<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group"> <button type="button"class="btn btn-xs btn-success"id="btn_modelView"data-toggle="modal"data-target="#modelDeleteProduct"onclick="viewScheDetails(\''. $rec["routesche_id"] . '\')"> <i class="ace-icon fa fa-info-circle bigger-120"></i> </button> </div><div id="1"class="hidden-sm hidden-xs btn-group"> <button type="button"class="btn btn-xs btn-danger"id="btn_modelView"onclick="deleteRecord(\''. $rec["routesche_id"] . '\')"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </button> </div></td>';
			break;
			case "2": $btn='<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group"> <button type="button"class="btn btn-xs btn-success"id="btn_modelView"data-toggle="modal"data-target="#modelDeleteProduct"onclick="viewScheDetails(\''. $rec["routesche_id"] . '\')"> <i class="ace-icon fa fa-info-circle bigger-120"></i> </button> </div></td>';
			break;
			case "3": $btn='<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group"> <button type="button"class="btn btn-xs btn-success"id="btn_modelView"data-toggle="modal"data-target="#modelDeleteProduct"onclick="viewScheDetails(\''. $rec["routesche_id"] . '\')"> <i class="ace-icon fa fa-info-circle bigger-120"></i> </button> </div></td>';
			break;
		}

		echo("<tr id='". $rec["routesche_id"] . "'>");
		echo("<td>". $rec["routesche_id"] . "</td>");
		echo("<td>". $rec["route_id"] . "</td>");
		echo("<td>". $rec["route_name"] . "</td>");
		echo("<td>". $statustd . "</td>");
		echo("<td>". $rec["route_date"] . "</td>");
		echo($btn);
		echo("</tr>");
	}

	$con->close();
}

function get_routeSche() {
	$routeScheId=$_POST["routeScheId"];
	$db=new Connection();
	$con=$db->db_con();

	$sql="SELECT * FROM tbl_route_sche WHERE routesche_id='$routeScheId'";
	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	$rec=$result->fetch_assoc();
	echo(json_encode($rec));
	$con->close();
}

function selectSalesman() {
	$rtscheDate=$_POST["rtscheDate"];

	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT emp_id, emp_fullname FROM tbl_user_details WHERE emp_type='3'";

	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	//alert('func');
	$nor=$result->num_rows;

	if ($nor==0) {
		echo("");
	}

	else {

		//fetch all the records
		while ($rec=$result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo("<option value='". $rec["emp_id"] . "'>". $rec["emp_fullname"] . "</option>");
		}
	}

	$con->close();
}

function selectDriver() {
	$rtscheDate=$_POST["rtscheDate"];

	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT emp_id, emp_fullname FROM tbl_user_details WHERE emp_type='6'";

	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	//alert('func');
	$nor=$result->num_rows;

	if ($nor==0) {
		echo("");
	}

	else {

		//fetch all the records
		while ($rec=$result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo("<option value='". $rec["emp_id"] . "'>". $rec["emp_fullname"] . "</option>");
		}
	}

	$con->close();
}

function selectVehicle() {
	$rtscheDate=$_POST["rtscheDate"];

	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT veh_number FROM tbl_vehicles";

	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	//alert('func');
	$nor=$result->num_rows;

	if ($nor==0) {
		echo("<option value=''>No vehicles avaliable for today</option>");
	}

	else {

		//fetch all the records
		while ($rec=$result->fetch_assoc()) {
			//merge province ID and name with HTML
			echo("<option value='". $rec["veh_number"] . "'>". $rec["veh_number"] . "</option>");
		}
	}

	$con->close();
}

function getEventData() {
	$supplierval=$_POST["supplierval"];
	$territoryval=$_POST["territoryval"];

	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT DISTINCT route_id, route_date, rtsche_status FROM tbl_route_sche where sup_id='$supplierval' AND territory='$territoryval'";

	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	//alert('func');
	$nor=$result->num_rows;

	if ($nor==0) {
		echo("");
	}

	else {

		//fetch all the records
		while ($rec=$result->fetch_assoc()) {
			//merge province ID and name with HTML
			$id=$rec["route_id"];
			$date=$rec["route_date"];
			$status=$rec["rtsche_status"];

			$sql2="INSERT INTO tbl_events VALUES ('$id','$date','$status');";
			$con->query($sql2);

			$sql3="SELECT * FROM tbl_events";
			$result3=$con->query($sql3);
			$myArray=array();
			$nor=$result3->num_rows;

			if ($nor > 0) {

				// output data of each row
				while ($row=$result->fetch_assoc()) {
					$myArray[]=$row;
					echo json_encode($myArray);
				}
			}

			else {
				echo "0 results";
			}
		}
	}

	$con->close();
}

function getRouteScheDetails() {
	$routeScheId=$_POST['routeScheId'];
	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT * FROM tbl_route_sche WHERE ";
}

function viewScheModal() {
	$proid=$_POST["proid"];

	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT vehicle FROM tbl_route_sche WHERE routesche_id='$proid'";
	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	$rec=$result->fetch_assoc();
	echo(json_encode($rec));
	$con->close();
}

function viewScheDriver() {
	$proid=$_POST["proid"];

	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT usr.emp_fullname FROM tbl_route_sche rt, tbl_user_details usr WHERE routesche_id='$proid'AND rt.driver=usr.emp_id";
	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	$rec=$result->fetch_assoc();
	echo(json_encode($rec));
	$con->close();
}

function viewScheSalesman() {
	$proid=$_POST["proid"];

	$db=new Connection();
	$con=$db->db_con();
	$sql="SELECT usr.emp_fullname FROM tbl_route_sche rt, tbl_user_details usr WHERE routesche_id='$proid'AND rt.salesman=usr.emp_id";
	$result=$con->query($sql);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	$rec=$result->fetch_assoc();
	echo(json_encode($rec));
	$con->close();
}

function avaqty() {
	$rtscheBatch=$_POST["rtscheBatch"];
	$db=new Connection();
	$con=$db->db_con();
	$sql1="SELECT SUM(stock_qty) AS stock_qty FROM tbl_stock WHERE batch_id='$rtscheBatch'";
	$result1=$con->query($sql1);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	$rec1=$result1->fetch_assoc();
	$stockqty=$rec1["stock_qty"];

	$sql2="SELECT SUM(rtsche_qty) AS rtsche_qty FROM tbl_route_sche_details rtd WHERE rtd.rtsche_batch='$rtscheBatch'AND rtd.rtsche_dstatus='1'";
	$result2=$con->query($sql2);

	if ($con->errno) {
		echo("SQL Error: ". $con->error);
		exit;
	}

	$rec2=$result2->fetch_assoc();
	$scheqty=$rec2["rtsche_qty"];
	$avaqty=$stockqty - $scheqty;
	echo($avaqty);
	$con->close();
}

function deleteSche(){
    $sche = $_POST["cusid"];
    $db = new Connection();
    $con = $db->db_con();
    $sql = "DELETE FROM tbl_route_sche WHERE routesche_id='$sche'";
	$result = $con->query($sql);
	$sql2 = "DELETE FROM tbl_route_sche_details WHERE rtsche_id='$sche'";
    $result = $con->query($sql2);
    $con->close();
}