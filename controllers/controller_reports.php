<?php
require_once("../controllers/class_dbconnection.php");

if (isset($_GET["type"])) {
    $type = $_GET["type"];
    switch ($type) {            // checks the type 
        case "getFilteredData":
            getFilteredData();
            break;
        case "selectProductCat":
            selectProductCat();
            break;
        case "proCatTable":
            proCatTable();
            break;
            case "get_filtered_data":
                get_filtered_data();
                break;
    }
}

function getFilteredData()
{
    $supplierval = $_POST["supplierval"];

    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT st.batch_id, pro.pro_name, st.stock_qty, st.item_cost, st.item_mrp
            FROM tbl_products pro, tbl_stock st WHERE pro.pro_sup_id='$supplierval' AND pro.pro_id=st.pro_id";
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

        echo ("<tr id='" . $rec["batch_id"] . "'>");
        echo ("<td>" . $rec["batch_id"] . "</td>");
        echo ("<td>" . $rec["pro_name"] . "</td>");
        echo ("<td>" . $rec["stock_qty"] . "</td>");
        echo ("<td>" . $rec["item_cost"] . "</td>");
        echo ("<td>" . $rec["item_mrp"] . "</td>");
        echo ("</tr>");
    }

    $con->close();
}

function selectProductCat()
{
  
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT DISTINCT product_cat_id,product_cat_name FROM tbl_product_cat;";
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

            echo ("<option value='" . $rec["product_cat_id"] . "'>" . $rec["product_cat_name"] . "</option>");
        }
    }
    $con->close();
}

function proCatTable()
{

    $proCatVal = $_POST["proCatVal"];
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT st.batch_id, pro.pro_name, st.stock_qty, st.item_cost, st.item_mrp
				FROM tbl_products pro, tbl_stock st
				WHERE st.pro_id=pro.pro_id";
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
        // echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td> 
        // </tr>";	
        echo ("<tr id='" . $rec["batch_id"] . "'>");
        echo ("<td>" . $rec["batch_id"] . "</td>");
        echo ("<td>" . $rec["pro_name"] . "</td>");
        echo ("<td>" . $rec["stock_qty"] . "</td>");
        echo ("<td>" . $rec["item_cost"] . "</td>");
        echo ("<td>" . $rec["item_mrp"] . "</td>");
        echo ("</tr>");
    }

    $con->close();
}

function get_filtered_data()
{

	$supplierval = $_POST["supplierval"];
	$procatval = $_POST["procatval"];
	$product = $_POST["prosubcatval"];


	$where = "";

	if ($procatval != "") {
		if ($where != "") {
			$where .= " AND pro.pro_cat_id = " . "'" . $procatval . "'";
		} else {
			$where .= "WHERE pro.pro_cat_id = " . "'" . $procatval . "'";
		}
	}
	if ($product != "") {
		if ($where != "") {
			$where .= " AND pro.pro_subcat_id = " . "'" . $product . "'";
		} else {
			$where .= "WHERE pro.pro_subcat_id = " . "'" . $product . "'";
		}
	}

	if ($supplierval != "") {
		if ($where != "") {
			$where .= " AND pro.pro_sup_id = " . "'" . $supplierval . "'";
		} else {
			$where .= "WHERE pro.pro_sup_id = " . "'" . $supplierval . "'";
		}
	}
	if ($where != "") {
		$joinwhere = " AND pro_status=0 and pro.pro_cat_id=cat.product_cat_id and pro.pro_subcat_id=sub.product_subcat_id and pro.pro_sup_id=sup.sup_id";
		$where = $where . $joinwhere;
	} else {
		$where = "WHERE pro_status=0 and pro.pro_cat_id=cat.product_cat_id and pro.pro_subcat_id=sub.product_subcat_id and pro.pro_sup_id=sup.sup_id";
	}


	$db = new Connection();
	$con = $db->db_con();
	$sql = "SELECT pro.pro_id, cat.product_cat_name, sub.product_subcat_name, pro.pro_name, sup.sup_name
				FROM tbl_products pro, tbl_product_cat cat, tbl_product_subcat sub, tbl_suppliers sup $where;";
	$result = $con->query($sql);



	if ($con->errno) {
		echo ("SQL Error: " . $con->error);
		exit;
	}
	//alert('func');
	$nor = $result->num_rows;
	if ($nor == 0) {
		echo ("<tr>");
		echo ("<td>No Record</td>");
		echo ("<td>No Record</td>");
		echo ("<td>No Record</td>");
		echo ("<td>No Record</td>");
		echo ("<td>No Record</td>");
		echo ("<td>No Record</td>");
		echo ("<td>No Record</td>");
		echo ("</tr>");
	} else {
		//fetch all the records
		while ($rec = $result->fetch_assoc()) {
			$proid = $rec["pro_id"];
			$sql2 = "SELECT SUM(stock_qty) as stockqty FROM tbl_stock WHERE pro_id='$proid' GROUP BY pro_id";
			
			$result2 = $con->query($sql2);
			$rec2 = $result2->fetch_assoc();
			$stock = $rec2["stockqty"];
	
			$sql3 = "SELECT pro_reorder FROM tbl_products WHERE pro_id='$proid' ";		
			$result3 = $con->query($sql3);
			$rec3 = $result3->fetch_assoc();
			$reorder = $rec3["pro_reorder"];
	
			if($stock<$reorder){
				$btn = "<td style='background-color:#ffcccc; text-align:center'>" . $stock . "</td>";
			} else{
				$btn = "<td style='text-align:center'>" . $stock . "</td>";
			}
			
			echo ("<tr>");
			echo ("<td>" . $rec["pro_id"] . "</td>");
			echo ("<td>" . $rec["product_cat_name"] . "</td>");
			echo ("<td>" . $rec["product_subcat_name"] . "</td>");
			echo ("<td>" . $rec["pro_name"] . "</td>");
			echo ($btn);
			echo ("<td>" . $rec["sup_name"] . "</td>");
			echo ('<td><div class="hidden-sm hidden-xs btn-group">



					<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modalEditProduct" onclick="modalEditProduct(\'' . $rec["pro_id"] . '\')">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalDeleteProduct" onclick="modalDeleteProduct(\'' . $rec["pro_id"] . '\')">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</button>

				</div></td>');
			echo ("</tr>");
		}
	}
	$con->close();
}
