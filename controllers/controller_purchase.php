<?php
	require_once("../controllers/class_dbconnection.php");

	if(isset($_GET["type"])){
		$type=$_GET["type"];
		switch($type){			// checks the type
			case "newPurID":
				new_pur_id(); 		// calls function new_id
				break;
			case "get_supplierlist":
				get_supplierlist(); 		// calls function new_id
				break;
			case "purchaseSave":
				save_pur_order(); //calls function save_student
				break;
			case "get_oneStudent":
				get_oneStudent();
				break;
			case "saveNewProduct":
				saveNewProduct();
				break;
			case "delete_student":
				delete_student();
				break;
			case "purchaseSaveDetails":
				purchaseSaveDetails();
				break;
		}
	}

function viewProduct(){
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT *
				FROM sap_products
				WHERE pro_status=0  ORDER BY pro_id DESC;";
		$result = $con->query($sql);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		$nor=$result->num_rows;
		if($nor==0){
			echo("No Records Found");
			exit;
		
		}
		while($rec=$result->fetch_assoc()){
			
			echo("<td>".$rec["pro_id"]."</td>");
			echo("<td>".$rec["pro_cat"]."</td>");
			echo("<td>".$rec["pro_subcat"]."</td>");
			echo("<td>".$rec["pro_name"]."</td>");
			echo("<td>".$rec["pro_sup"]."</td>");
			echo('<td><div class="btn-group">
                  <button type="button" class="btn btn-default btn-flat">Action</button>
                  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Edit</a></li>
                    <li><a href="#">Delete</a></li>
                    
                  </ul>
                </div></td>');
			echo("</tr>");
			
		}
		
		$con->close();
	}

	function new_pur_id(){// function for next ID generator
		
		//db connection
		$db=new Connection();
		$con=$db->db_con();
		
		//query
		$sql="SELECT pur_id FROM sap_purorder ORDER BY pur_id DESC LIMIT 1;";
		
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
			$pur_id="P".$no;
		}
		else{
			//first ID of student
			$pur_id="PO0001";
		}
		//encode the new ID to JSON
		echo(json_encode($new_id));
		//close the connection
		$con->close();
	}

	function get_supplierlist(){
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT DISTINCT sup_id,sup_name FROM sap_suppliers;";
		$result=$con->query($sql);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		//alert('func');
		$nor=$result->num_rows;
		if($nor==0){
			echo("No records");
			exit;
		}
		else{
			//fetch all the records
			while($rec=$result->fetch_assoc())
			{
				//merge province ID and name with HTML
				echo("<option value='".$rec["sup_name"]."'>".$rec["sup_name"]."</option>");
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
		$posupplier=$_POST["posupplier"];
		$remarks=$_POST["poremarks"];

		$sql2="INSERT INTO tbl_po(pur_id,pur_date,sup_id,pur_remarks)
		VALUES('$poid','$podate','$posupplier','$remarks');";

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
?>



