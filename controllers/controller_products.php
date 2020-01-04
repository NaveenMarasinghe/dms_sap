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
			case "selectSupplierLoadModal":
				selectSupplierLoadModal(); 		
				break;
			case "viewProductModal":
				viewProductModal(); 		
				break;
			case "viewStock":
				viewStock(); 		
				break;	
				case "modalEditSave":
					modalEditSave(); 		
					break;		
					case "modalDeleteSave":
						modalDeleteSave(); 		
						break;						
				}
			}

function viewProductTable(){
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT pro.pro_id, cat.product_cat_name, sub.product_subcat_name, pro.pro_name, sup.sup_name
				FROM tbl_products pro, tbl_product_cat cat, tbl_product_subcat sub, tbl_suppliers sup
				WHERE pro.pro_status=0 and pro.pro_cat_id=cat.product_cat_id and pro.pro_subcat_id=sub.product_subcat_id and pro.pro_sup_id=sup.sup_id";
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


			</div></td>');
			echo("</tr>");
			exit;
		
		}
		while($rec=$result->fetch_assoc()){
		// echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td> 
		// </tr>";	
			echo("<tr id='".$rec["pro_id"]."'>");
			echo("<td>".$rec["pro_id"]."</td>");
			echo("<td>".$rec["product_cat_name"]."</td>");
			echo("<td>".$rec["product_subcat_name"]."</td>");
			echo("<td>".$rec["pro_name"]."</td>");
			echo("<td>".$rec["sup_name"]."</td>");
			echo('<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">


					<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modalEditProduct" onclick="modalEditProduct(\''.$rec["pro_id"].'\')">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalDeleteProduct" onclick="modalDeleteProduct(\''.$rec["pro_id"].'\')">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
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
				$where .=" AND pro.pro_cat_id = "."'".$procatval."'";
			}
			else{
			$where .="WHERE pro.pro_cat_id = "."'".$procatval."'" ;
			}
		}
		if($product !=""){
			if($where !=""){
				$where .=" AND pro.pro_subcat_id = "."'".$product."'" ;
			}
			else{
			$where .="WHERE pro.pro_subcat_id = "."'".$product."'" ;
			}
		}

		if($supplierval !=""){
			if($where !=""){
				$where .=" AND pro.pro_sup_id = "."'".$supplierval."'" ;
			}
			else{
			$where .="WHERE pro.pro_sup_id = "."'".$supplierval."'" ;
			}
		}
		if($where !=""){
			$joinwhere=" AND pro_status=0 and pro.pro_cat_id=cat.product_cat_id and pro.pro_subcat_id=sub.product_subcat_id and pro.pro_sup_id=sup.sup_id";
			$where = $where.$joinwhere;
		}
		else{
			$where ="WHERE pro_status=0 and pro.pro_cat_id=cat.product_cat_id and pro.pro_subcat_id=sub.product_subcat_id and pro.pro_sup_id=sup.sup_id";
		}
		

		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT pro.pro_id, cat.product_cat_name, sub.product_subcat_name, pro.pro_name, sup.sup_name
				FROM tbl_products pro, tbl_product_cat cat, tbl_product_subcat sub, tbl_suppliers sup $where;";
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


					<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modalEditProduct" onclick="modalEditProduct(\''.$rec["pro_id"].'\')">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalDeleteProduct" onclick="modalDeleteProduct(\''.$rec["pro_id"].'\')">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
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
		$sql="SELECT DISTINCT sup_id,sup_name FROM tbl_suppliers;";
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
		$sql="SELECT pro_id FROM tbl_products ORDER BY pro_id DESC LIMIT 1;";
		
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

		$sql="INSERT INTO tbl_products(pro_id,pro_cat_id,pro_subcat_id,pro_name,pro_sup_id,pro_status)
		VALUES('$proid','$cat','$subcat','$product','$supid','$status');";
		$result2=$con->query($sql);
		if($con->errno)
		{
			// echo("SQL Error: ".$con->error); 
			echo("SQL Error: ".$con->error);
			exit;
		}
		else{
			//fetch all the records
		
				//merge province ID and name with HTML
			echo("Success");
		
		}


		//alert('func');
		// $nor2=$result2->num_rows;
		// if($nor2==0){
		// 	echo("Success");
		// }
		// else{
		// 	//fetch all the records
		// 	while($rec=$result2->fetch_assoc())
		// 	{
		// 		//merge province ID and name with HTML
		// 		echo("Success");
		// 	}
		// }
		$con->close();
}

function addNewSupplier(){

		$db=new Connection();
		$con=$db->db_con();

		$sqlsup="SELECT sup_id FROM tbl_suppliers ORDER BY sup_id DESC LIMIT 1;";
		
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



		$sql="INSERT INTO tbl_suppliers(sup_id,sup_name,sup_add,sup_tel)
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


		$supid=$_POST["procat_supplier"];
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

function selectSupplierLoadModal(){
		$supplierval=$_POST["supplierval"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT DISTINCT sup_id,sup_name FROM tbl_suppliers;";
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

function addNewProductSubCat(){


		$supid=$_POST["prosubcat_supplier"];
		$cat=$_POST["prosubcat_procat"];
		$subcat=$_POST["prosubcat_prosubcat"];
		$des=$_POST["prosubcat_subcatdes"];

		$db=new Connection();
		$con=$db->db_con();
		$sql="INSERT INTO tbl_product_subcat(product_cat_id,product_subcat_name,product_subcat_des)
		VALUES('$cat','$subcat','$des');";
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

function viewProductModal(){

		$proid=$_POST["proid"];

		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT pro.pro_id, cat.product_cat_name, sub.product_subcat_name, pro.pro_name, sup.sup_name
				FROM tbl_products pro, tbl_product_cat cat, tbl_product_subcat sub, tbl_suppliers sup
				WHERE pro_status=0 and pro.pro_cat_id=cat.product_cat_id and pro.pro_subcat_id=sub.product_subcat_id and pro.pro_sup_id=sup.sup_id and pro.pro_id='$proid'";
		$result=$con->query($sql);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		
		$rec=$result->fetch_assoc();
			echo(json_encode($rec));
		$con->close();	
}

function viewStock(){
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT st.batch_id, pro.pro_name, st.stock_qty, st.item_cost, st.item_mrp
				FROM tbl_products pro, tbl_stock st
				WHERE st.pro_id=pro.pro_id";
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
			echo("<tr id='".$rec["batch_id"]."'>");
			echo("<td>".$rec["batch_id"]."</td>");
			echo("<td>".$rec["pro_name"]."</td>");
			echo("<td>".$rec["stock_qty"]."</td>");
			echo("<td>".$rec["item_cost"]."</td>");
			echo("<td>".$rec["item_mrp"]."</td>");
			echo("</tr>");
			
		}
		
		$con->close();
}
function modalEditSave(){

	$editModalProductName=$_POST["editModalProductName"];
	$editModalProductId=$_POST["editModalProductId"];
	$db=new Connection();
	$con=$db->db_con();
	$sql="UPDATE tbl_products SET pro_name='$editModalProductName' WHERE pro_id='$editModalProductId'";
	

	$result=$con->query($sql);

	if($con->errno)
	{
		echo("SQL Error: ".$con->error);
		exit;
	}
	

	echo ("Success");
	$con->close();
}

function modalDeleteSave(){


	$deleteModalProductId=$_POST["deleteModalProductId"];
	$db=new Connection();
	$con=$db->db_con();
	$sql="UPDATE tbl_products SET pro_status='1' WHERE pro_id='$deleteModalProductId'";
	

	$result=$con->query($sql);

	if($con->errno)
	{
		echo("SQL Error: ".$con->error);
		exit;
	}
	

	echo ("Success");
	$con->close();
}
?>