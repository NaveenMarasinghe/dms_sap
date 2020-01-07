<?php
	require_once("../controllers/class_dbconnection.php");

	if(isset($_GET["type"])){
		$type=$_GET["type"];
		switch($type){			// checks the type
			case "get_productList":
				get_productList(); 		// calls function new_id
				break;
			case "purchaseSave":
				save_pur_order(); //calls function save_student 
				break;
			case "purchaseSaveDetails":
				purchaseSaveDetails();
				break;
			case "purchaseView":
				purchaseView();
				break;	
			case "viewPurchaseModal":
				viewPurchaseModal();
				break;		
			case "viewPurchaseModalText":
				viewPurchaseModalText();
				break;			
				case "viewPurchaseReport":
					viewPurchaseReport();
					break;														
		}
	}



function get_productList(){
		$procatval=$_POST["procatval"];
		$supplierval=$_POST["supplierval"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT DISTINCT pro_id,pro_name FROM tbl_products where pro_sup_id='$supplierval' and pro_cat_id='$procatval'";
		
		$result=$con->query($sql);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		//alert('func');
		$nor=$result->num_rows;
		if($nor==0){
			echo("");
		}
		else{
			//fetch all the records
			while($rec=$result->fetch_assoc())
			{
				//merge province ID and name with HTML
				echo("<option value='".$rec["pro_id"]."'>".$rec["pro_name"]."</option>");
			}
		}
		$con->close();
}

	function save_pur_order(){

		$db=new Connection();
		$con=$db->db_con();
		
		//query
		$sql="SELECT pur_id FROM tbl_po ORDER BY pur_id DESC LIMIT 1;";
		
		//execute the query
		$result=$con->query($sql);
		
		//error handling
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		
		//checks the number of rows in the result 
		$nor=$result->num_rows;
		
	
		if($nor>0){
			//fetch the result
			$rec=$result->fetch_assoc();
			//assign ID to variable $num
			$num=$rec["pur_id"];
			//eliminate string S and get remaining ID no
			$num=substr($num,1);
			//increment the ID
			$num++;
			//merge zeros to left side of ID (total length of ID should be 4)
			$no=str_pad($num,4,'0',STR_PAD_LEFT);
			//merge string S to new sID
			$poid="P".$no;
		}
		else{
			//first ID of student
			$poid="PO0001";
		}		

		$podate=$_POST["podate"];
		$poSupplier=$_POST["poSupplier"];
		$remarks=$_POST["poremarks"];
		$postatus="Pending";

		$sql2="INSERT INTO tbl_po(pur_id,pur_date,sup_id,pur_remarks,pur_status)
		VALUES('$poid','$podate','$poSupplier','$remarks','$postatus');";

		$result2=$con->query($sql2);
		if($con->error){
			echo("SQL error ".$con->error);
			exit;
		}
		if($result2>0){
			echo(json_encode($poid));

		}
		else{
			echo("error");
		}



	}
function purchaseSaveDetails(){
		// Unescape the string values in the JSON array
		$tableData = stripcslashes($_POST['pTableData']);

		// Decode the JSON array
		$tableData = json_decode($tableData,TRUE);

		// now $tableData can be accessed like a PHP array
		//echo $tableData[1]['pname'];
		$tblDataLength = count($tableData);
		


		for ($x=0; $x<$tblDataLength; $x++){
			$pid = $tableData[$x]['pid'];
			$pname = $tableData[$x]['pname'];
			$pqty = $tableData[$x]['pqty'];
			$poid = $tableData[$x]['poid'];

			$db=new Connection();
			$con=$db->db_con();

			$sql2="INSERT INTO tbl_po_details(purod_id,pro_id,pur_qty)
			VALUES('$poid','$pid','$pqty');";

			// $result=$con->query($sql);
			$result2=$con->query($sql2);
			if($con->error){
				echo("SQL error ".$con->error);
				exit;
			}
			if($result2>0){
				echo("success2");
				
			}
			else{
				echo("error");
			}

		}
}

function purchaseView(){
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT po.pur_id, po.pur_date, sup.sup_name, po.pur_remarks, po.pur_status
				FROM tbl_po po, tbl_suppliers sup
				WHERE po.sup_id=sup.sup_id and po.pur_status<>'Removed'";
		$result = $con->query($sql);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		$nor=$result->num_rows;
		if($nor==0){
			echo("<tr>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo('<td><div class="hidden-sm hidden-xs btn-group">
				<button class="btn btn-xs btn-success">
					<i class="ace-icon fa-info-circle bigger-120"></i>
				</button>

				<button class="btn btn-xs btn-info">
					<i class="ace-icon fa fa-pencil bigger-120"></i>
				</button>

				<button class="btn btn-xs btn-danger">
					<i class="ace-icon fa fa-trash-o bigger-120"></i>
				</button>

				<button class="btn btn-xs btn-warning">
					<i class="ace-icon fa fa-flag bigger-120"></i>
				</button>
			</div></td>');
			echo("</tr>");
			exit;
		
		}
		while($rec=$result->fetch_assoc()){
		// echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td> 
		// </tr>";	
			echo("<tr id='".$rec["pur_id"]."'>");
			echo("<td>".$rec["pur_id"]."</td>");
			echo("<td>".$rec["sup_name"]."</td>");
			echo("<td>".$rec["pur_date"]."</td>");
			echo("<td>".$rec["pur_status"]."</td>");
			echo('<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success" id="btn_modelView" data-toggle="modal" data-target="#modelPoView" onclick="modalViewPo(\''.$rec["pur_id"].'\')">
						<i class="ace-icon fa fa-info-circle bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modelEditProduct">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modelDeleteProduct">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-warning">
						<i class="ace-icon fa fa-flag bigger-120"></i>
					</button>
				</div></td>');
			echo("</tr>");
			
		}
		
		$con->close();
}

function viewPurchaseModal(){

		$purid=$_POST["purid"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT pod.pro_id, pro.pro_name, pod.pur_qty
				FROM tbl_po_details pod, tbl_products pro
				WHERE pod.pro_id=pro.pro_id and pod.purod_id='$purid'";
		$result = $con->query($sql);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		$nor=$result->num_rows;
		if($nor==0){
			echo("<tr>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");

		
			echo("</tr>");
			exit;
		
		}
		while($rec=$result->fetch_assoc()){
		// echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td> 
		// </tr>";	
			echo("<tr id='".$rec["pro_id"]."'>");
			echo("<td>".$rec["pro_id"]."</td>");
			echo("<td>".$rec["pro_name"]."</td>");
			echo("<td>".$rec["pur_qty"]."</td>");

			echo("</tr>");
			
		}
		
		$con->close();	
}
function viewPurchaseReport()
{
	$date_from = $_POST['dateFrom'];
	$date_to = $_POST['dateTo'];

	$db = new Connection();
	$con = $db->db_con();

	$sql="SELECT po.pur_id, po.pur_date, sup.sup_name, po.pur_remarks, po.pur_status
				FROM tbl_po po, tbl_suppliers sup
				WHERE po.sup_id=sup.sup_id and po.pur_status<>'Removed'";

		if($date_from != "")
		{
			$sql .= ' AND pur_date >='.'"'.$date_from.'"';
		}

		if($date_to != "")
		{
			$sql .= ' AND pur_date <='.'"'.$date_to.'"';
		}		

		$result = $con->query($sql);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		$nor=$result->num_rows;
		if($nor==0){
			echo("<tr>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("</tr>");
			exit;
		
		}
		while($rec=$result->fetch_assoc()){
		// echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td> 
		// </tr>";	
			echo("<tr id='".$rec["pur_id"]."'>");
			echo("<td>".$rec["pur_id"]."</td>");
			echo("<td>".$rec["sup_name"]."</td>");
			echo("<td>".$rec["pur_date"]."</td>");
			echo("<td>".$rec["pur_status"]."</td>");
			
			echo("</tr>");
			
		}
		
		$con->close();
}
?>