<?php
require_once("../controllers/class_dbconnection.php");

if (isset($_GET["type"])) {
    $type = $_GET["type"];
    switch ($type) {            // checks the type addNewProductCat
        case "viewCustomerTable":
            viewCustomerTable();
            break;
        case "addNewCustomer":
            addNewCustomer();
            break;
        case "getTerritory":
            getTerritory();
            break;
        case "getRoute":
            getRoute();
            break;
        case "getEmpType":
            getEmpType();
            break;
        case "addNewEmp":
            addNewEmp();
            break;
        case "createRtscheSesson":
            createRtscheSesson();
            break;
        case "viewEmpTable":
            viewEmpTable();
            break;
        case "updateCustomer":
            updateCustomer();
            break;
    }
}

function viewCustomerTable()
{
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT cus_id, cus_name, cus_add, cus_tel, sales_balance
				FROM tbl_customers ";
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
        echo ("<td>No Record</td>");
        echo ("<td>No Record</td>");
        exit;
    }
    while ($rec = $result->fetch_assoc()) {

        echo ("<tr id='" . $rec["cus_id"] . "'>");
        echo ("<td>" . $rec["cus_id"] . "</td>");
        echo ("<td>" . $rec["cus_name"] . "</td>");
        echo ("<td>" . $rec["cus_add"] . "</td>");
        echo ("<td>" . $rec["cus_tel"] . "</td>");
        echo ("<td>" . $rec["sales_balance"] . "</td>");
        echo ('<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">
					
                    
                    <button class="btn btn-xs btn-info" onclick="editRecord(\''.$rec["cus_id"].'\')">
                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </button>
                    
					<button class="btn btn-xs btn-success" >
						<i class="ace-icon fa fa-info bigger-120"></i>
					</button>
                    
					<button class="btn btn-xs btn-danger" onclick="deleteRecord(\''.$rec["cus_id"].'\')">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</button>

				</div></td>');
        echo ("</tr>");
    }

    $con->close();
}

function addNewCustomer()
{
    $db = new Connection();
    $con = $db->db_con();

    $sqlsup = "SELECT cus_id FROM tbl_customers ORDER BY cus_id DESC LIMIT 1;";

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
        $num = $rec["cus_id"];
        //eliminate string S and get remaining ID no
        $num = substr($num, 3);
        //increment the ID
        $num++;
        //merge zeros to left side of ID (total length of ID should be 3)
        $no = str_pad($num, 3, '0', STR_PAD_LEFT);
        //merge string S to new sID
        $cus_id = "CUS" . $no;
    } else {
        //first ID of student
        $cus_id = "CUS001";
    }
    //encode the new ID to JSON

    $cus_name = $_POST["cus_name"];
    $cus_add = $_POST["cus_add"];
    $cus_tel = $_POST["cus_tel"];
    $cus_ter = $_POST["cus_ter"];
    $cus_route = $_POST["cus_route"];

    $sql = "INSERT INTO tbl_customers(cus_id,route_id,cus_name,cus_add,cus_tel,cus_type,sales_balance)
    VALUES('$cus_id','$cus_route','$cus_name','$cus_add','$cus_tel','0','0');";
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
            echo ("Success");
        }
    }
    $con->close();
}

function getTerritory()
{
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT ter_id,ter_name FROM tbl_terr;";
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

            echo ("<option value='" . $rec["ter_id"] . "'>" . $rec["ter_name"] . "</option>");
        }
    }
    $con->close();
}

function getRoute()
{
    $custer = $_POST["custer"];
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT route_id,route_name FROM tbl_route WHERE territory='$custer'";
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

            echo ("<option value='" . $rec["route_id"] . "'>" . $rec["route_name"] . "</option>");
        }
    }
    $con->close();
}
function getEmpType()
{
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT user_type,user_typename FROM tbl_user_type;";
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

            echo ("<option value='" . $rec["user_type"] . "'>" . $rec["user_typename"] . "</option>");
        }
    }
    $con->close();
}

function viewEmpTable()
{
    $db = new Connection();
    $con = $db->db_con();
    $sql = "SELECT usr.emp_id, usr.emp_fullname, usr.emp_tel, usr.emp_add, ut.user_typename
				FROM tbl_user_details usr, tbl_user_type ut WHERE usr.emp_type=ut.user_type";
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
        echo ("<td>No Record</td>");
        echo ("<tr>");
        exit;
    }
    while ($rec = $result->fetch_assoc()) {

        echo ("<tr id='" . $rec["emp_id"] . "'>");
        echo ("<td>" . $rec["emp_id"] . "</td>");
        echo ("<td>" . $rec["emp_fullname"] . "</td>");
        echo ("<td>" . $rec["emp_add"] . "</td>");
        echo ("<td>" . $rec["emp_tel"] . "</td>");
        echo ("<td>" . $rec["user_typename"] . "</td>");
        echo ('<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success" id="btn_modelView" data-toggle="modal" data-target="#modelViewProduct" onclick="modalViewProduct(\'' . $rec["pro_id"] . '\')">
						<i class="ace-icon fa fa-info-circle bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modelEditProduct">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modelDeleteProduct">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-warning">
						<i class="ace-icon fa fa-flag bigger-120"></i>
					</button>
				</div></td>');
        echo ("</tr>");
    }

    $con->close();
}
function addNewEmp()
{
    $db = new Connection();
    $con = $db->db_con();

    $sqlsup = "SELECT emp_id FROM tbl_user_details ORDER BY emp_id DESC LIMIT 1;";

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
        $num = $rec["emp_id"];
        //eliminate string S and get remaining ID no
        $num = substr($num, 3);
        //increment the ID
        $num++;
        //merge zeros to left side of ID (total length of ID should be 3)
        $no = str_pad($num, 3, '0', STR_PAD_LEFT);
        //merge string S to new sID
        $emp_id = "EMP" . $no;
    } else {
        //first ID of student
        $emp_id = "EMP001";
    }
    //encode the new ID to JSON

    $emp_name = $_POST["emp_name"];
    $emp_fullname = $_POST["emp_fullname"];
    $emp_add = $_POST["emp_add"];
    $emp_tel = $_POST["emp_tel"];
    $emp_add = $_POST["emp_add"];
    $emp_email = $_POST["emp_email"];
    $emp_dob = $_POST["emp_dob"];
    $emp_type = $_POST["emp_type"];
    $emp_pw = $_POST["emp_pw"];

    $sql = "INSERT INTO tbl_user_details(emp_id,emp_name,emp_fullname,emp_tel,emp_add,emp_email,emp_type,emp_dob)
    VALUES('$emp_id','$emp_name','$emp_fullname','$emp_tel','$emp_add','$emp_email','$emp_type','$emp_dob');";
    $result = $con->query($sql);
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }

    $sql2 = "INSERT INTO tbl_users(emp_id,emp_uname,emp_type,emp_pw,emp_status)
    VALUES('$emp_id','$emp_name','$emp_type','$emp_pw','1');";
    $result2 = $con->query($sql2);
    if ($con->errno) {
        echo ("SQL Error: " . $con->error);
        exit;
    }

    $con->close();
}

function createRtscheSesson()
{
    $rtscheid = $_POST["rtscheid"];
    session_start();
    $_SESSION["rtsche"]["rtscheid"] = $rtscheid;
}

function updateCustomer()
{
    echo ("gg");
}
