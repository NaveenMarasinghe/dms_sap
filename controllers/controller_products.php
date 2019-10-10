<?php
require_once("../controllers/class_dbconnection.php");

if(isset($_GET["type"])){
		$type=$_GET["type"];
		switch($type){			// checks the type addNewProductCat
			case "viewProductTable":
				viewProductTable(); 		
				break;
			case "get_filtered_data":
				get_filtered_data(); 		
				break;
			case "selectSupplierLoad":
				selectSupplierLoad(); 		
				break;
			case "get_filteredProCat":
				get_filteredProCat(); 		
				break;
			case "get_filteredSubCat":
				get_filteredSubCat(); 		
				break;
			case "addNewProduct":
				addNewProduct(); 		
				break;
			case "addNewSupplier":
				addNewSupplier(); 		
				break;
			case "addNewProductCat":
				addNewProductCat(); 		
				break;
			case "addNewProductSubCat":
				addNewProductSubCat(); 		
				break;
				}
			}

function viewProductTable(){
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT spp.pro_id, cat.product_cat_name, sub.product_subcat_name, spp.pro_name, sup.sup_name
				FROM sap_products spp, tbl_product_cat cat, tbl_product_subcat sub, sap_suppliers sup
				WHERE pro_status=0 and spp.pro_cat_id=cat.product_cat_id and spp.pro_subcat_id=sub.product_subcat_id and spp.pro_sup_id=sup.sup_id";
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
					<i class="ace-icon fa fa-check bigger-120"></i>
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
		echo("<tr>");
			echo("<td>".$rec["pro_id"]."</td>");
			echo("<td>".$rec["product_cat_name"]."</td>");
			echo("<td>".$rec["product_subcat_name"]."</td>");
			echo("<td>".$rec["pro_name"]."</td>");
			echo("<td>".$rec["sup_name"]."</td>");
			echo('<td><div class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success">
						<i class="ace-icon fa fa-check bigger-120"></i>
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
			
		}
		
		$con->close();
}

function get_filtered_data(){

		$supplierval=$_POST["supplierval"];
		$procatval=$_POST["procatval"];
		$product=$_POST["prosubcatval"];
		

		$where ="";

		if($procatval !=""){
			if($where !=""){
				$where .=" AND spp.pro_cat_id = "."'".$procatval."'";
			}
			else{
			$where .="WHERE spp.pro_cat_id = "."'".$procatval."'" ;
			}
		}
		if($product !=""){
			if($where !=""){
				$where .=" AND spp.pro_subcat_id = "."'".$product."'" ;
			}
			else{
			$where .="WHERE spp.pro_subcat_id = "."'".$product."'" ;
			}
		}

		if($supplierval !=""){
			if($where !=""){
				$where .=" AND spp.pro_sup_id = "."'".$supplierval."'" ;
			}
			else{
			$where .="WHERE spp.pro_sup_id = "."'".$supplierval."'" ;
			}
		}
		if($where !=""){
			$joinwhere=" AND pro_status=0 and spp.pro_cat_id=cat.product_cat_id and spp.pro_subcat_id=sub.product_subcat_id and spp.pro_sup_id=sup.sup_id";
			$where = $where.$joinwhere;
		}
		else{
			$where ="WHERE pro_status=0 and spp.pro_cat_id=cat.product_cat_id and spp.pro_subcat_id=sub.product_subcat_id and spp.pro_sup_id=sup.sup_id";
		}
		

		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT spp.pro_id, cat.product_cat_name, sub.product_subcat_name, spp.pro_name, sup.sup_name
				FROM sap_products spp, tbl_product_cat cat, tbl_product_subcat sub, sap_suppliers sup $where;";
		$result=$con->query($sql);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		//alert('func');
		$nor=$result->num_rows;
		if($nor==0){
			echo("<tr>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("<td>No Record</td>");
			echo("</tr>");
		}
		else{
			//fetch all the records
			while($rec=$result->fetch_assoc())
			{
				//merge province ID and name with HTML
			echo("<tr>");
			echo("<td>".$rec["pro_id"]."</td>");
			echo("<td>".$rec["product_cat_name"]."</td>");
			echo("<td>".$rec["product_subcat_name"]."</td>");
			echo("<td>".$rec["pro_name"]."</td>");
			echo("<td>".$rec["sup_name"]."</td>");
			echo('<td><div class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success">
						<i class="ace-icon fa fa-check bigger-120"></i>
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
			}
		}
		$con->close();
}

function selectSupplierLoad(){
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
				//merge province ID and name with HTML <option value="">--Select Supplier--</option>

				echo("<option value='".$rec["sup_id"]."'>".$rec["sup_name"]."</option>");
			}
		}
		$con->close();

}

function get_filteredProCat(){
		$supplierval=$_POST["supplierval"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT DISTINCT product_cat_id,product_cat_name FROM tbl_product_cat where sup_id='$supplierval'";
		
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

function get_filteredSubCat(){
		$procatval=$_POST["procatval"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT DISTINCT product_subcat_id,product_subcat_name FROM tbl_product_subcat where product_cat_id='$procatval'";
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
				echo("<option value='".$rec["product_subcat_id"]."'>".$rec["product_subcat_name"]."</option>");
			}
		}
		$con->close();
}

function addNewProduct(){

			//db connection
		$db=new Connection();
		$con=$db->db_con();
		
		//query
		$sql="SELECT pro_id FROM sap_products ORDER BY pro_id DESC LIMIT 1;";
		
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
			$num=$rec["pro_id"];
			//eliminate string S and get remaining ID no
			$num=substr($num,1);
			//increment the ID
			$num++;
			//merge zeros to left side of ID (total length of ID should be 4)
			$no=str_pad($num,4,'0',STR_PAD_LEFT);
			//merge string S to new sID
			$new_id="P".$no;
		}
		else{
			//first ID of student
			$new_id="P0001";
		}


    $proid=$new_id;
	$supid=$_POST["pro_supplier"];
	$cat=$_POST["pro_cat"];
	$subcat=$_POST["pro_subcat"];
	$product=$_POST["pro_name"];
	$status="0";

		$sql="INSERT INTO sap_products(pro_id,pro_cat_id,pro_subcat_id,pro_name,pro_sup_id,pro_status)
		VALUES('$proid','$cat','$cat','$product','$supid','$status');";
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
				echo("Success");
			}
		}
		$con->close();
}

function addNewSupplier(){

		$db=new Connection();
		$con=$db->db_con();

		$sqlsup="SELECT sup_id FROM sap_suppliers ORDER BY sup_id DESC LIMIT 1;";
		
		//execute the query
		$result=$con->query($sqlsup);
		
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
			$num=$rec["sup_id"];
			//eliminate string S and get remaining ID no
			$num=substr($num,3);
			//increment the ID
			$num++;
			//merge zeros to left side of ID (total length of ID should be 3)
			$no=str_pad($num,3,'0',STR_PAD_LEFT);
			//merge string S to new sID
			$new_id="SUP".$no;
		}
		else{
			//first ID of student
			$new_id="SUP001";
		}
		//encode the new ID to JSON
		

    // $sup_id=$_POST["sup_id"];
	$sup_name=$_POST["sup_name"];
	$sup_add=$_POST["sup_add"];
	$sup_tel=$_POST["sup_tel"];



		$sql="INSERT INTO sap_suppliers(sup_id,sup_name,sup_add,sup_tel)
		VALUES('$new_id','$sup_name','$sup_add','$sup_tel');";
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
				echo("Success");
			}
		}
		$con->close();
}

function addNewProductCat(){


		$supid=$_POST["procat_supid"];
		$cat=$_POST["procat_procat"];
		$des=$_POST["procat_prodes"];


		$db=new Connection();
		$con=$db->db_con();
		$sql="INSERT INTO tbl_product_cat(sup_id,product_cat_name,product_cat_des)
		VALUES('$supid','$cat','$des');";
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
				
				echo("Success");
			}
		}
		$con->close();
}

?>