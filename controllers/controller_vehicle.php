<?php
require_once "../controllers/class_dbconnection.php";

if (isset($_GET["type"])) {
    $type = $_GET["type"];
    switch ($type) { // checks the type
        case "getVehicleNum":
            getVehicleNum();
            break;
        case "viewVehicleStock":
            viewVehicleStock();
            break;
        case "filteredVehStock":
            filteredVehStock();
            break;
        case "addNewVehicle":
            addNewVehicle();
            break;
    }
}

function getVehicleNum()
{
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT DISTINCT veh_number FROM tbl_vehicles;";
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

            echo ("<option value='" . $rec["veh_number"] . "'>" . $rec["veh_number"] . "</option>");
        }
    }
    $con->close();
}

function viewVehicleStock()
{
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT veh.veh_id, veh.pro_id, pro.pro_name, veh.batch_id, veh.qty
    FROM tbl_vehicle_products veh, tbl_products pro
    WHERE veh.pro_id=pro.pro_id";
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
        echo ("<tr>");
        echo ("<td>" . $rec["veh_id"] . "</td>");
        echo ("<td>" . $rec["pro_id"] . "</td>");
        echo ("<td>" . $rec["pro_name"] . "</td>");
        echo ("<td>" . $rec["batch_id"] . "</td>");
        echo ("<td>" . $rec["qty"] . "</td>");
        echo ("</tr>");
    }

    $con->close();
}

function filteredVehStock()
{
    $vehNum = $_POST["vehNum"];
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT veh.veh_id, veh.pro_id, pro.pro_name, veh.batch_id, veh.qty
            FROM tbl_vehicle_products veh, tbl_products pro
            WHERE veh_id='$vehNum' AND veh.pro_id=pro.pro_id";
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
        echo ("<tr>");
        echo ("<td>" . $rec["veh_id"] . "</td>");
        echo ("<td>" . $rec["pro_id"] . "</td>");
        echo ("<td>" . $rec["pro_name"] . "</td>");
        echo ("<td>" . $rec["batch_id"] . "</td>");
        echo ("<td>" . $rec["qty"] . "</td>");
        echo ("</tr>");
    }

    $con->close();
}

function addNewVehicle()
{
    $db = new Connection();
    $con = $db->db_con();

    $sqlsup = "SELECT veh_id FROM tbl_vehicles ORDER BY veh_id DESC LIMIT 1;";

    //execute the query
    $result = $con->query($sqlsup);

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
        $num = $rec["veh_id"];
        //eliminate string S and get remaining ID no
        $num = substr($num, 3);
        //increment the ID
        $num++;
        //merge zeros to left side of ID (total length of ID should be 3)
        $no = str_pad($num, 3, '0', STR_PAD_LEFT);
        //merge string S to new id
        $new_id = "VEH" . $no;
    } else {
        //first ID of student
        $new_id = "VEH001";
    }

    $veh_name = $_POST["veh_name"];
    $veh_type = $_POST["veh_type"];
    $veh_num = $_POST["veh_num"];

    $sql = "INSERT INTO tbl_vehicles(veh_id,veh_number,veh_name,veh_type)
		VALUES('$new_id','$veh_num','$veh_name','$veh_type');";
    $result = $con->query($sql);
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }
    $con->close();
}
