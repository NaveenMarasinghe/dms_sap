<?php
require_once("../controllers/class_dbconnection.php");

if (isset($_GET["type"])) {
	$type = $_GET["type"];
	switch ($type) {			// checks the type 
		case "getFilteredData":
			getFilteredData();
			break;

	}
}

function getFilteredData(){
    $supplierval=$_POST["supplierval"];
    $procatval=$_POST["procatval"];

    $where ="";

    if($procatval !=""){
        if($where !=""){
            $where .=" AND pro.pro_cat_id = "."'".$procatval."'";
        }
        else{
        $where .="WHERE pro.pro_cat_id = "."'".$procatval."'" ;
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
        $joinwhere=" AND pro_status=0 and st.pro_id=pro.pro_id";
        $where = $where.$joinwhere;
    }
    else{
        $where ="WHERE pro_status=0 and st.pro_id=pro.pro_id";
    }

    $db=new Connection();
    $con=$db->db_con();
    $sql="SELECT st.batch_id, pro.pro_name, st.stock_qty, st.item_cost, st.item_mrp
            FROM tbl_products pro, tbl_stock st
            $where";
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
