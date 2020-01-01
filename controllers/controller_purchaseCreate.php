<?php
require_once("../controllers/class_dbconnection.php");

if(isset($_GET["type"])){
		$type=$_GET["type"];
		switch($type){			// checks the type addNewProductCat
			case "get_productList":
				get_productList(); 		
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
?>