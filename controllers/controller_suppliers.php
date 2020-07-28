<?php
require_once("../controllers/class_dbconnection.php");

if(isset($_GET["type"])){
		$type=$_GET["type"];
		switch($type){			// checks the type addNewProductCat
			case "viewSupplierTable":
				viewSupplierTable(); 		
				break;
				}
			}

function viewSupplierTable(){
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT sup_id, sup_name, sup_add, sup_tel
				FROM tbl_suppliers ";
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
			echo("<tr id='".$rec["sup_id"]."'>");
			echo("<td>".$rec["sup_id"]."</td>");
			echo("<td>".$rec["sup_name"]."</td>");
			echo("<td>".$rec["sup_add"]."</td>");
			echo("<td>".$rec["sup_tel"]."</td>");
			echo("</tr>");
			
		}
		
		$con->close();
}

?>