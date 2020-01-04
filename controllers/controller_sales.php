<?php
require_once("../controllers/class_dbconnection.php");

if(isset($_GET["type"])){
		$type=$_GET["type"];
		switch($type){			// checks the type addNewProductCat
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
				}
			}
function get_route(){

		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT route_id, route_name FROM tbl_route";
		
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
				echo("<option value='".$rec["route_id"]."'>".$rec["route_name"]."</option>");
			}
		}
		$con->close();		

}	

function get_customers(){
		$salesRoute=$_POST["salesRoute"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT cus_id, cus_name FROM tbl_customers";
		
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
				echo("<option value='".$rec["cus_id"]."'>".$rec["cus_name"]."</option>");
			}
		}
		$con->close();		
}

function get_ProCat(){

		$salesSupplier=$_POST["salesSupplier"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT DISTINCT product_cat_id,product_cat_name FROM tbl_product_cat where sup_id='$salesSupplier'";
		
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
				echo("<option value='".$rec["product_cat_id"]."'>".$rec["product_cat_name"]."</option>");
			}
		}
		$con->close();
}

function get_suppliers(){

		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT sup_id, sup_name FROM tbl_suppliers;";
		
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
				echo("<option value='".$rec["sup_id"]."'>".$rec["sup_name"]."</option>");
			}
		}
		$con->close();		


}		

function get_batch(){

		$proid=$_POST["proid"];

		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT DISTINCT batch_id FROM tbl_stock where stock_qty>0 and pro_id='$proid'";
		
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
				echo("<option value='".$rec["batch_id"]."'>".$rec["batch_id"]."</option>");
			}
		}
		$con->close();
}

function save_stock(){
		$db=new Connection();
		$con=$db->db_con();
		
		//query
		$sql="SELECT sales_id FROM tbl_sales_order ORDER BY sales_id DESC LIMIT 1;";
		
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
			$num=$rec["sales_id"];
			//eliminate string S and get remaining ID no
			$num=substr($num,2);
			//increment the ID
			$num++;
			//merge zeros to left side of ID (total length of ID should be 4)
			$no=str_pad($num,4,'0',STR_PAD_LEFT);
			//merge string S to new sID
			$salesId="SL".$no;
		}
		else{
			//first ID of student
			$salesId="SL0001";
		}		

		$salesDate=$_POST["salesDate"];
		$salesCustomer=$_POST["salesCustomer"];

		$sql2="INSERT INTO tbl_sales_order(sales_id,sales_date,cus_id)
		VALUES('$salesId','$salesDate','$salesCustomer');";

		$result2=$con->query($sql2);
		if($con->error){
			echo("SQL error ".$con->error);
			exit;
		}
		if($result2>0){
			echo(json_encode($salesId));

		}
		else{
			echo("error");
		}	
}

function salesDetailsSave(){
		// Unescape the string values in the JSON array
		$tableData = stripcslashes($_POST['pTableData']);

		// Decode the JSON array
		$tableData = json_decode($tableData,TRUE);

		// now $tableData can be accessed like a PHP array
		//echo $tableData[1]['pname'];
		$tblDataLength = count($tableData);
		


		for ($x=0; $x<$tblDataLength; $x++){
			$item_id = $tableData[$x]['item_id'];
			$item_name = $tableData[$x]['item_name'];
			$item_batch = $tableData[$x]['item_batch'];
			$item_qty = $tableData[$x]['item_qty'];
			$salesId = $tableData[$x]['salesId'];			

			$db=new Connection();
			$con=$db->db_con();

			$sql2="INSERT INTO tbl_sales_details(sales_id,item_id,sales_qty)
			VALUES('$salesId','$item_id','$item_qty');";

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