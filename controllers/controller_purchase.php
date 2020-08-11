<?php
require_once "../controllers/class_dbconnection.php";

if (isset($_GET["type"])) {
    $type = $_GET["type"];
    switch ($type) { // checks the type
        case "get_productList":
            get_productList(); // calls function new_id
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
        case "poCreate":
            poCreate();
            break;
        case "viewPurchaseReport":
            viewPurchaseReport();
            break;
        case "purCreateTable":
            purCreateTable();
            break;
        case "purAddRow":
            purAddRow();
            break;
        case "updateTableRow":
            updateTableRow();
            break;
        case "deleteTableRow":
            deleteTableRow();
            break;
        case "purViewData":
            purViewData();
            break;
        case "poComplete":
            poComplete();
            break;
        case "getEditSup":
            getEditSup();
            break;
    }
}

function get_productList()
{
    $procatval = $_POST["procatval"];
    $supplierval = $_POST["supplierval"];
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT DISTINCT pro_id,pro_name FROM tbl_products where pro_sup_id='$supplierval' and pro_cat_id='$procatval'";

    $result = $con->query($sql);
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }
    //alert('func');
    $nor = $result->num_rows;
    if ($nor == 0) {
        echo ("");
    } else {
        //fetch all the records
        while ($rec = $result->fetch_assoc()) {
            //merge province ID and name with HTML
            echo ("<option value='" . $rec["pro_id"] . "'>" . $rec["pro_name"] . "</option>");
        }
    }
    $con->close();
}

function save_pur_order()
{

    $db = new Connection();
    $con = $db->db_con();

    //query
    $sql = "SELECT pur_id FROM tbl_po ORDER BY pur_id DESC LIMIT 1;";

    //execute the query
    $result = $con->query($sql);

    //error handling
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }

    //checks the number of rows in the result
    $nor = $result->num_rows;

    if ($nor > 0) {
        //fetch the result
        $rec = $result->fetch_assoc();
        //assign ID to variable $num
        $num = $rec["pur_id"];
        //eliminate string S and get remaining ID no
        $num = substr($num, 1);
        //increment the ID
        $num++;
        //merge zeros to left side of ID (total length of ID should be 4)
        $no = str_pad($num, 4, '0', STR_PAD_LEFT);
        //merge string S to new sID
        $poid = "P" . $no;
    } else {
        //first ID of student
        $poid = "PO0001";
    }

    $podate = $_POST["podate"];
    $poSupplier = $_POST["poSupplier"];
    $remarks = $_POST["poremarks"];
    $postatus = "Pending";

    $sql2 = "INSERT INTO tbl_po(pur_id,pur_date,sup_id,pur_remarks,pur_status)
		VALUES('$poid','$podate','$poSupplier','$remarks','$postatus');";

    $result2 = $con->query($sql2);
    if ($con->error) {
        echo ("SQL error " . $con->error);
        exit;
    }
    if ($result2 > 0) {
        echo (json_encode($poid));
    } else {
        echo ("error");
    }
}
function purchaseSaveDetails()
{
    // Unescape the string values in the JSON array
    $tableData = stripcslashes($_POST['pTableData']);

    // Decode the JSON array
    $tableData = json_decode($tableData, true);

    // now $tableData can be accessed like a PHP array
    //echo $tableData[1]['pname'];
    $tblDataLength = count($tableData);

    for ($x = 0; $x < $tblDataLength; $x++) {
        $pid = $tableData[$x]['pid'];
        $pname = $tableData[$x]['pname'];
        $pqty = $tableData[$x]['pqty'];
        $poid = $tableData[$x]['poid'];
        $status = 0;

        $db = new Connection();
        $con = $db->db_con();

        $sql2 = "INSERT INTO tbl_po_details(purod_id,pro_id,pur_qty,pur_prostatus)
			VALUES('$poid','$pid','$pqty','$status');";

        // $result=$con->query($sql);
        $result2 = $con->query($sql2);
        if ($con->error) {
            echo ("SQL error " . $con->error);
            exit;
        }
        if ($result2 > 0) {
            echo ("success2");
        } else {
            echo ("error");
        }
    }
}

function purchaseView()
{
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT po.pur_id, po.pur_date, sup.sup_name, po.pur_remarks, po.pur_status
				FROM tbl_po po, tbl_suppliers sup
				WHERE po.sup_id=sup.sup_id and po.pur_status<>'Removed'";
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

        $status = $rec["pur_status"];
        switch ($status) {
            case "1":
                $statustd = "<span class='label label-sm label-warning'>Pending</span>";
                break;
            case "2":
                $statustd = "<span class='label label-sm label-default arrowed arrowed-righ'>Sent</span>";
                break;
            case "3":
                $statustd = "<span class='label label-sm label-info arrowed arrowed-righ'>Received</span>";
                break;
            case "4":
                $statustd = "<span class='label label-sm label-success arrowed arrowed-righ'>Completed</span>";
                break;
            case "5":
                $statustd = "Completed";
                break;
        }

        $buttons = $rec["pur_status"];
        switch ($status) {
            case "1":
                $buttons = '<button class="btn btn-xs btn-success" id="btn_modelView" data-toggle="modal" data-target="#modelPoView" onclick="modalViewPo(\'' . $rec["pur_id"] . '\')">
					<i class="ace-icon fa fa-info-circle bigger-120"></i>
				</button>

				<button class="btn btn-xs btn-info" onclick="editPurchaseOrder(\'' . $rec["pur_id"] . '\')"">
					<i class="ace-icon fa fa-pencil bigger-120"></i>
				</button>

				';
                break;
            case "2":
                $buttons = '<button class="btn btn-xs btn-success" id="btn_modelView" data-toggle="modal" data-target="#modelPoView" onclick="modalViewPo(\'' . $rec["pur_id"] . '\')">
				<i class="ace-icon fa fa-info-circle bigger-120"></i>
			</button>

			';
                break;
            case "3":
                $buttons = '<button class="btn btn-xs btn-success" id="btn_modelView" onclick="modalViewPo(\'' . $rec["pur_id"] . '\')">
					<i class="ace-icon fa fa-info-circle bigger-120"></i>
				</button>

				';
                break;
            case "4":
                $buttons = '<button class="btn btn-xs btn-success" id="btn_modelView" data-toggle="modal" data-target="#modelPoView" onclick="modalViewPo(\'' . $rec["pur_id"] . '\')">
						<i class="ace-icon fa fa-info-circle bigger-120"></i>
					</button>

					';
                break;
        }

        echo ("<tr id='" . $rec["pur_id"] . "'>");
        echo ("<td>" . $rec["pur_id"] . "</td>");
        echo ("<td>" . $rec["sup_name"] . "</td>");
        echo ("<td>" . $rec["pur_date"] . "</td>");
        echo ("<td class='" . $rec["pur_status"] . "'>" . $statustd . "</td>");
        echo ('<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">' . $buttons . '</div></td>');
        echo ("</tr>");
    }

    $con->close();
}

function viewPurchaseModal()
{

    $purid = $_POST["purid"];
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT pod.pro_id, pro.pro_name, pod.pur_qty
				FROM tbl_po_details pod, tbl_products pro
				WHERE pod.pro_id=pro.pro_id and pod.purod_id='$purid'";
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

        echo ("</tr>");
        exit;
    }
    while ($rec = $result->fetch_assoc()) {
        // echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td>
        // </tr>";
        echo ("<tr id='" . $rec["pro_id"] . "'>");
        echo ("<td>" . $rec["pro_id"] . "</td>");
        echo ("<td>" . $rec["pro_name"] . "</td>");
        echo ("<td>" . $rec["pur_qty"] . "</td>");

        echo ("</tr>");
    }

    $con->close();
}
function viewPurchaseReport()
{
    $date_from = $_POST['dateFrom'];
    $date_to = $_POST['dateTo'];

    $db = new Connection();
    $con = $db->db_con();

    $sql = "SELECT po.pur_id, po.pur_date, sup.sup_name, po.pur_remarks, po.pur_status
				FROM tbl_po po, tbl_suppliers sup
				WHERE po.sup_id=sup.sup_id and po.pur_status<>'Removed'";

    if ($date_from != "") {
        $sql .= ' AND pur_date >=' . '"' . $date_from . '"';
    }

    if ($date_to != "") {
        $sql .= ' AND pur_date <=' . '"' . $date_to . '"';
    }

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
        echo ("<tr id='" . $rec["pur_id"] . "'>");
        echo ("<td>" . $rec["pur_id"] . "</td>");
        echo ("<td>" . $rec["sup_name"] . "</td>");
        echo ("<td>" . $rec["pur_date"] . "</td>");
        echo ("<td>" . $rec["pur_status"] . "</td>");

        echo ("</tr>");
    }

    $con->close();
}

function poCreate()
{

    $db = new Connection();
    $con = $db->db_con();

    //query
    $sql = "SELECT pur_id FROM tbl_po ORDER BY pur_id DESC LIMIT 1";

    //execute the query
    $result = $con->query($sql);

    //error handling
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }

    //checks the number of rows in the result
    $nor = $result->num_rows;

    if ($nor > 0) {
        //fetch the result
        $rec = $result->fetch_assoc();
        //assign ID to variable $num
        $num = $rec["pur_id"];
        //eliminate string S and get remaining ID no
        $num = substr($num, 2);
        //increment the ID
        $num++;
        //merge zeros to left side of ID (total length of ID should be 4)
        $no = str_pad($num, 4, '0', STR_PAD_LEFT);
        //merge string S to new sID
        $poId = "PO" . $no;
    } else {
        //first ID of student
        $poId = "PO0001";
    }

    //receive ajax post variables
    $poDate = $_POST["poDate"];
    $poSupplier = $_POST["poSupplier"];
    $poRemarks = $_POST["poRemarks"];

    $poStatus = "1";
    $sql2 = "INSERT INTO tbl_po(pur_id,pur_date,sup_id,pur_remarks,pur_status)
		VALUES('$poId','$poDate','$poSupplier','$poRemarks','$poStatus')";

    //get last edited purchase order
    $lastEdit = "SELECT pur_status, pur_id FROM tbl_po WHERE sup_id='$poSupplier' ORDER BY pur_id DESC LIMIT 1";
    $lastEditResult = $con->query($lastEdit);
    $nor = $lastEditResult->num_rows;

    if ($nor > 0) {
        $lastEditRec = $lastEditResult->fetch_assoc();
        $status = $lastEditRec["pur_status"];
        $id = $lastEditRec["pur_id"];
        // check whether the last edit purchase is in pending status
        if ($status == 1) {
            $sqlupdate = "UPDATE tbl_po SET pur_remarks='$poRemarks' WHERE pur_id='$id'";
            $con->query($sqlupdate);
            // echo ($id);
            $dataArray[0]["poid"] = $id;
            $dataArray[0]["status"] = 1;
        } else {
            // create new purchase order
            $resultsql2 = $con->query($sql2);
            if ($con->error) {
                echo ("SQL error " . $con->error);
                exit;
            }
            // echo ($poId);
            $dataArray[0]["poid"] = $poId;
            $dataArray[0]["status"] = 2;
        }
    } else { // create first purchase order of supplier
        $resultsql2 = $con->query($sql2);
        if ($con->error) {
            echo ("SQL error " . $con->error);
            exit;
        }
        // echo ($poId);
        $dataArray[0]["poid"] = $poId;
        $dataArray[0]["status"] = 2;
    }

    echo json_encode($dataArray);
}

function purCreateTable()
{
    $poId = $_POST["poId"];
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT pod.pur_detailsid, pod.purod_id, pod.pro_id, pod.pur_qty, pro.pro_name
			FROM tbl_po_details pod, tbl_products pro
			WHERE pod.purod_id = '$poId' AND pod.pro_id=pro.pro_id ORDER BY pur_detailsid";
    $result = $con->query($sql);
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }
    $nor = $result->num_rows;
    if ($nor == 0) {
        echo ("<tr>");
        echo ("<td colspan='4' style='text-align:center'>No Products Added</td>");
        echo ("</tr>");
        exit;
    }
    while ($rec = $result->fetch_assoc()) {
        echo ("<tr id='" . $rec["pur_detailsid"] . "'>");
        echo ("<td>" . $rec["pro_id"] . "</td>");
        echo ("<td>" . $rec["pro_name"] . "</td>");
        echo ("<td style='text-align:center'><div><input class='tableQty' style='border:0px; width:50%; text-align:center' value='" . $rec["pur_qty"] . "'/></div></td>");
        echo ("<td><div class='hidden-sm hidden-xs btn-group'><button type='button' class='btn btn-xs btn-danger' style='margin: auto'><i class='ace-icon fa fa-minus-circle bigger-120'></i></button></div></td>");
        echo ("</tr>");
    }

    $con->close();
}

function purAddRow()
{
    $proname = $_POST["proname"];
    $proid = $_POST["proid"];
    $poId = $_POST["poId"];
    $qnty = $_POST["qnty"];

    $db = new Connection();
    $con = $db->db_con();

    $sqlPro = "SELECT * FROM tbl_po_details WHERE pro_id='$proid' AND purod_id='$poId'";
    $proResult = $con->query($sqlPro);
    $proCount = $proResult->num_rows;

    if ($proCount > 0) {
        $proRec = $proResult->fetch_assoc();
        $proQty = $proRec['pur_qty'];
        $proQty = $proQty + $qnty;

        $sqlUpdate = "UPDATE tbl_po_details SET pur_qty='$proQty' WHERE purod_id='$poId' AND pro_id='$proid'";
        $con->query($sqlUpdate);
        echo ("success1");
    } else {

        $sqlInsert = "INSERT INTO tbl_po_details(purod_id,pro_id,pur_qty,pur_prostatus)
		VALUES('$poId','$proid','$qnty','1')";

        $resultInsert = $con->query($sqlInsert);
        if ($con->error) {
            echo ("SQL error " . $con->error);
            exit;
        }
        if ($resultInsert > 0) {
            echo ("success");
        } else {
            echo ("error");
        }
    }
    $con->close();
}

function updateTableRow()
{
    $poId = $_POST["poId"];
    $qty = $_POST["qty"];
    $proid = $_POST["proid"];

    $db = new Connection();
    $con = $db->db_con();
    $sql = "UPDATE tbl_po_details
			SET pur_qty='$qty'
			WHERE purod_id='$poId' and pro_id='$proid'";
    $result = $con->query($sql);
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }

    $con->close();
}

function deleteTableRow()
{
    $poId = $_POST["poId"];
    $proid = $_POST["proid"];

    $db = new Connection();
    $con = $db->db_con();
    $sql = "DELETE
			FROM tbl_po_details
			WHERE purod_id='$poId' and pro_id='$proid'";
    $result = $con->query($sql);
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }
    $con->close();
}
function purViewData()
{
    $poId = $_POST["poId"];
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT pod.pur_detailsid, pod.purod_id, pod.pro_id, pod.pur_qty, pro.pro_name
			FROM tbl_po_details pod, tbl_products pro
			WHERE pod.purod_id = '$poId' AND pod.pro_id=pro.pro_id ORDER BY pur_detailsid";
    $result = $con->query($sql);
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }
    $nor = $result->num_rows;
    if ($nor == 0) {
        echo ("<tr>");
        echo ("<td colspan='3' style='text-align:center'>No Products Added</td>");
        echo ("</tr>");
        exit;
    }
    while ($rec = $result->fetch_assoc()) {
        echo ("<tr id='" . $rec["pur_detailsid"] . "'>");
        echo ("<td>" . $rec["pro_id"] . "</td>");
        echo ("<td>" . $rec["pro_name"] . "</td>");
        echo ("<td>" . $rec["pur_qty"] . "</td>");

        echo ("</tr>");
    }

    $con->close();
}
function poComplete()
{
    $poId = $_POST["poId"];
    $db = new Connection();
    $con = $db->db_con();
    $sql = "UPDATE tbl_po
			SET pur_status='2'
			WHERE pur_id='$poId'";
    $result = $con->query($sql);
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }

    $con->close();
}

function getEditSup()
{
    $poId = $_POST["poId"];
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT sup_id
			FROM tbl_po
			WHERE pur_id='$poId'";
    $result = $con->query($sql);
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }
    $nor = $result->num_rows;
    if ($nor == 0) {

        exit;
    }
    while ($rec = $result->fetch_assoc()) {
        $poid = $rec["sup_id"];
        echo ($poid);
    }

    $con->close();

}
