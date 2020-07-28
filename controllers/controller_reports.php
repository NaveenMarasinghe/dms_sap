<?php require_once("../controllers/class_dbconnection.php");

if (isset($_GET["type"])) {
    $type=$_GET["type"];

    switch ($type) {
        // checks the type
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
        case "getRoutes":
            getRoutes();
        break;
        case "viewSales":
            viewSales();
        break;
        case "viewSalesDate":
            viewSalesDate();
        break;
        case "getCustomers":
            getCustomers();
        break;
        case "viewSalesCus":
            viewSalesCus();
        break;
        case "getSuppliers":
            getSuppliers();
        break;
        case "viewPurchaseSup":
            viewPurchaseSup();
        break;
        case "viewPurchaseDate":
            viewPurchaseDate();
        break;
        case "viewInventorySup":
            viewInventorySup();
        break;
        case "viewGrnDate":
            viewGrnDate();
        break;
        case "getGrn":
            getGrn();
        break;
        case "viewGrn":
            viewGrn();
        break;
        case "viewRtscheSup":
            viewRtscheSup();
        break;
        case "getScheId":
            getScheId();
        break;
        case "viewSche":
            viewSche();
        break;
        case "getRouteName":
            getRouteName();
        break;
        case "getSup":
            getSup();
        break;
        case "getSalesman":
            getSalesman();
        break;
        case "getVehicle":
            getVehicle();
        break;
    }
}

function getFilteredData()
{
    $supplierval=$_POST["supplierval"];

    $db=new Connection();
    $con=$db->db_con();
    $sql="SELECT st.batch_id, pro.pro_name, st.stock_qty, st.item_cost, st.item_mrp
FROM tbl_products pro,
    tbl_stock st WHERE pro.pro_sup_id='$supplierval'AND pro.pro_id=st.pro_id";
    $result=$con->query($sql);

    if ($con->errno) {
        echo("SQL Error: ". $con->error);
        exit;
    }

    $nor=$result->num_rows;

    if ($nor==0) {
        echo("<tr>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("</tr>");
        exit;
    }

    while ($rec=$result->fetch_assoc()) {
        echo("<tr id='". $rec["batch_id"] . "'>");
        echo("<td>". $rec["batch_id"] . "</td>");
        echo("<td>". $rec["pro_name"] . "</td>");
        echo("<td>". $rec["stock_qty"] . "</td>");
        echo("<td>". $rec["item_cost"] . "</td>");
        echo("<td>". $rec["item_mrp"] . "</td>");
        echo("</tr>");
    }

    $con->close();
}

function selectProductCat()
{
    $db=new Connection();
    $con=$db->db_con();
    $sql="SELECT DISTINCT product_cat_id,product_cat_name FROM tbl_product_cat;";
    $result=$con->query($sql);

    if ($con->errno) {
        echo("SQL Error: ". $con->error);
        exit;
    }

    //alert('func');
    $nor=$result->num_rows;

    if ($nor==0) {
        echo("No records");
        exit;
    } else {

        //fetch all the records
        while ($rec=$result->fetch_assoc()) {
            //merge province ID and name with HTML <option value="">--Select Supplier--</option>

            echo("<option value='". $rec["product_cat_id"] . "'>". $rec["product_cat_name"] . "</option>");
        }
    }

    $con->close();
}

function proCatTable()
{
    $proCatVal=$_POST["proCatVal"];
    $db=new Connection();
    $con=$db->db_con();
    $sql="SELECT st.batch_id, pro.pro_name, st.stock_qty, st.item_cost, st.item_mrp
FROM tbl_products pro,
    tbl_stock st WHERE st.pro_id=pro.pro_id";
    $result=$con->query($sql);

    if ($con->errno) {
        echo("SQL Error: ". $con->error);
        exit;
    }

    $nor=$result->num_rows;

    if ($nor==0) {
        echo("<tr>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("</tr>");
        exit;
    }

    while ($rec=$result->fetch_assoc()) {
        // echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td>
        // </tr>";
        echo("<tr id='". $rec["batch_id"] . "'>");
        echo("<td>". $rec["batch_id"] . "</td>");
        echo("<td>". $rec["pro_name"] . "</td>");
        echo("<td>". $rec["stock_qty"] . "</td>");
        echo("<td>". $rec["item_cost"] . "</td>");
        echo("<td>". $rec["item_mrp"] . "</td>");
        echo("</tr>");
    }

    $con->close();
}

function get_filtered_data()
{
    $supplierval=$_POST["supplierval"];
    $procatval=$_POST["procatval"];
    $product=$_POST["prosubcatval"];


    $where="";

    if ($procatval !="") {
        if ($where !="") {
            $where .=" AND pro.pro_cat_id = ". "'". $procatval . "'";
        } else {
            $where .="WHERE pro.pro_cat_id = ". "'". $procatval . "'";
        }
    }

    if ($product !="") {
        if ($where !="") {
            $where .=" AND pro.pro_subcat_id = ". "'". $product . "'";
        } else {
            $where .="WHERE pro.pro_subcat_id = ". "'". $product . "'";
        }
    }

    if ($supplierval !="") {
        if ($where !="") {
            $where .=" AND pro.pro_sup_id = ". "'". $supplierval . "'";
        } else {
            $where .="WHERE pro.pro_sup_id = ". "'". $supplierval . "'";
        }
    }

    if ($where !="") {
        $joinwhere=" AND pro_status=0 and pro.pro_cat_id=cat.product_cat_id and pro.pro_subcat_id=sub.product_subcat_id and pro.pro_sup_id=sup.sup_id";
        $where=$where . $joinwhere;
    } else {
        $where="WHERE pro_status=0 and pro.pro_cat_id=cat.product_cat_id and pro.pro_subcat_id=sub.product_subcat_id and pro.pro_sup_id=sup.sup_id";
    }


    $db=new Connection();
    $con=$db->db_con();
    $sql="SELECT pro.pro_id, cat.product_cat_name, sub.product_subcat_name, pro.pro_name, sup.sup_name
FROM tbl_products pro,
    tbl_product_cat cat,
    tbl_product_subcat sub,
    tbl_suppliers sup $where;
    ";
    $result=$con->query($sql);



    if ($con->errno) {
        echo("SQL Error: ". $con->error);
        exit;
    }

    //alert('func');
    $nor=$result->num_rows;

    if ($nor==0) {
        echo("<tr>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("<td>No Record</td>");
        echo("</tr>");
    } else {

        //fetch all the records
        while ($rec=$result->fetch_assoc()) {
            $proid=$rec["pro_id"];
            $sql2="SELECT SUM(stock_qty) as stockqty FROM tbl_stock WHERE pro_id='$proid' GROUP BY pro_id";

            $result2=$con->query($sql2);
            $rec2=$result2->fetch_assoc();
            $stock=$rec2["stockqty"];

            $sql3="SELECT pro_reorder FROM tbl_products WHERE pro_id='$proid' ";
            $result3=$con->query($sql3);
            $rec3=$result3->fetch_assoc();
            $reorder=$rec3["pro_reorder"];

            if ($stock<$reorder) {
                $btn="<td style='background-color:#ffcccc; text-align:center'>". $stock . "</td>";
            } else {
                $btn="<td style='text-align:center'>". $stock . "</td>";
            }

            echo("<tr>");
            echo("<td>". $rec["pro_id"] . "</td>");
            echo("<td>". $rec["product_cat_name"] . "</td>");
            echo("<td>". $rec["product_subcat_name"] . "</td>");
            echo("<td>". $rec["pro_name"] . "</td>");
            echo($btn);
            echo("<td>". $rec["sup_name"] . "</td>");
            echo('<td><div class="hidden-sm hidden-xs btn-group">
<button class="btn btn-xs btn-info"data-toggle="modal"data-target="#modalEditProduct"onclick="modalEditProduct(\'' . $rec["pro_id"] . '\')"> <i class="ace-icon fa fa-pencil bigger-120"></i> </button> <button class="btn btn-xs btn-danger"data-toggle="modal"data-target="#modalDeleteProduct"onclick="modalDeleteProduct(\'' . $rec["pro_id"] . '\')"> <i class="ace-icon fa fa-trash-o bigger-120"></i> </button> </div></td>');
            echo("</tr>");
        }
    }

    $con->close();
}

    function getRoutes()
    {
        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT DISTINCT route_id,route_name FROM tbl_route;";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("No records");
            exit;
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo("<option value='". $rec["route_id"] . "'>". $rec["route_name"] . "</option>");
            }
        }

        $con->close();
    }

    function viewSales()
    {
        $routeId=$_POST["routeId"];

        $where="";

        if ($routeId !="") {
            if ($where !="") {
                $where .=" AND cus.route_id = ". "'". $routeId . "'";
            } else {
                $where .="WHERE cus.route_id = ". "'". $routeId . "'";
            }
        }

        if ($where !="") {
            $joinwhere=" AND so.cus_id=cus.cus_id AND cus.route_id=rt.route_id";
            $where=$where . $joinwhere;
        } else {
            $where="WHERE so.cus_id=cus.cus_id AND cus.route_id=rt.route_id";
        }


        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT so.sales_id, so.sales_date, cus.cus_name, so.sales_total, so.sales_paid FROM tbl_sales_order so, tbl_route rt, tbl_customers cus $where; ";
        $result=$con->query($sql);



        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("<tr>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("</tr>");
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo("<tr>");
                echo("<td>". $rec["sales_id"] . "</td>");
                echo("<td>". $rec["sales_date"] . "</td>");
                echo("<td>". $rec["cus_name"] . "</td>");
                echo("<td>". $rec["sales_total"] . "</td>");
                echo("<td>". $rec["sales_paid"] . "</td>");
                echo("</tr>");
            }
        }

        $con->close();
    }

    function viewSalesDate()
    {
        $startDate=$_POST["startDate"];
        $endDate=$_POST["endDate"];

        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT so.sales_id, so.sales_date, cus.cus_name, so.sales_total, so.sales_paid 
            FROM tbl_sales_order so, tbl_customers cus 
            WHERE so.sales_date BETWEEN '$startDate' AND '$endDate' AND so.cus_id=cus.cus_id";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }
        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("<tr>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("</tr>");
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo("<tr>");
                echo("<td>". $rec["sales_id"] . "</td>");
                echo("<td>". $rec["sales_date"] . "</td>");
                echo("<td>". $rec["cus_name"] . "</td>");
                echo("<td>". $rec["sales_total"] . "</td>");
                echo("<td>". $rec["sales_paid"] . "</td>");
                echo("</tr>");
            }
        }

        $con->close();
    }

    function getCustomers(){
        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT DISTINCT cus_id,cus_name FROM tbl_customers;";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("No records");
            exit;
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo("<option value='". $rec["cus_id"] . "'>". $rec["cus_name"] . "</option>");
            }
        }

        $con->close();
    }

    function viewSalesCus()
    {
        $cusId=$_POST["cusId"];

        $where="";

        if ($cusId !="") {
            if ($where !="") {
                $where .=" AND so.cus_id = ". "'". $cusId . "'";
            } else {
                $where .=" WHERE so.cus_id = ". "'". $cusId . "'";
            }
        }

        if ($where !="") {
            $joinwhere=" AND so.cus_id=cus.cus_id";
            $where=$where . $joinwhere;
        } else {
            $where="WHERE so.cus_id=cus.cus_id";
        }


        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT so.sales_id, so.sales_date, cus.cus_name, so.sales_total, so.sales_paid 
        FROM tbl_sales_order so, tbl_customers cus $where; ";
        $result=$con->query($sql);



        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("<tr>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("</tr>");
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo("<tr>");
                echo("<td>". $rec["sales_id"] . "</td>");
                echo("<td>". $rec["sales_date"] . "</td>");
                echo("<td>". $rec["cus_name"] . "</td>");
                echo("<td>". $rec["sales_total"] . "</td>");
                echo("<td>". $rec["sales_paid"] . "</td>");
                echo("</tr>");
            }
        }

        $con->close();
    }

    function getSuppliers(){

        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT DISTINCT sup_id,sup_name FROM tbl_suppliers;";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("No records");
            exit;
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo("<option value='". $rec["sup_id"] . "'>". $rec["sup_name"] . "</option>");
            }
        }

        $con->close();
    }

    function viewPurchaseSup(){
        $supId=$_POST["supId"];

        $where="";

        if ($supId !="") {
            if ($where !="") {
                $where .=" AND po.sup_id = ". "'". $supId . "'";
            } else {
                $where .=" WHERE po.sup_id = ". "'". $supId . "'";
            }
        }

        if ($where !="") {
            $joinwhere=" AND po.pur_id=pod.purod_id AND pod.pro_id=pro.pro_id";
            $where=$where . $joinwhere;
        } else {
            $where="WHERE po.pur_id=pod.purod_id AND pod.pro_id=pro.pro_id";
        }


        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT po.pur_id, po.pur_date, pro.pro_name, pod.pur_qty, pod.pur_prostatus
        FROM tbl_po po, tbl_po_details pod, tbl_products pro $where; ";
        $result=$con->query($sql);



        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("<tr>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("</tr>");
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                $status = $rec["pur_prostatus"];
                switch ($status) {
                    case "0":
                        $statustd = "Received";
                        break;
                    case "1":
                        $statustd = "Pending";
                        break;
                }
                echo("<tr>");
                echo("<td>". $rec["pur_id"] . "</td>");
                echo("<td>". $rec["pur_date"] . "</td>");
                echo("<td>". $rec["pro_name"] . "</td>");
                echo("<td>". $rec["pur_qty"] . "</td>");
                echo("<td>". $statustd . "</td>");
                echo("</tr>");
            }
        }

        $con->close();

    }

    function viewPurchaseDate(){
        $startDate=$_POST["startDate"];
        $endDate=$_POST["endDate"];

        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT po.pur_id, po.pur_date, sup.sup_name, po.pur_status
            FROM tbl_po po, tbl_suppliers sup
            WHERE po.pur_date BETWEEN '$startDate' AND '$endDate' AND po.sup_id=sup.sup_id";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }
        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("<tr>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("</tr>");
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                $status = $rec["pur_status"];
                switch ($status) {
                    case "1":
                        $statustd = "Pending";
                        break;
                    case "2":
                        $statustd = "Sent";
                        break;
                    case "3":
                        $statustd = "Received";
                        break;
                    case "4":
                        $statustd = "Completed";
                        break;
                    case "5":
                        $statustd = "Completed";
                        break;
                }
                echo("<tr>");
                echo("<td>". $rec["pur_id"] . "</td>");
                echo("<td>". $rec["pur_date"] . "</td>");
                echo("<td>". $rec["sup_name"] . "</td>");
                echo("<td>". $statustd . "</td>");
                echo("</tr>");
            }
        }

        $con->close();
    }

    function viewInventorySup(){
        $supId=$_POST["supId"];

        $where="";

        if ($supId !="") {
            if ($where !="") {
                $where .=" AND pro.pro_sup_id = ". "'". $supId . "'";
            } else {
                $where .=" WHERE pro.pro_sup_id = ". "'". $supId . "'";
            }
        }

        if ($where !="") {
            $joinwhere=" AND st.pro_id=pro.pro_id AND st.stock_qty>0";
            $where=$where . $joinwhere;
        } else {
            $where="WHERE st.pro_id=pro.pro_id AND st.stock_qty>0";
        }


        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT st.batch_id, pro.pro_name, st.stock_qty, st.item_cost, st.item_mrp
        FROM tbl_stock st, tbl_products pro $where; ";
        $result=$con->query($sql);



        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("<tr>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("</tr>");
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {

                echo("<tr>");
                echo("<td>". $rec["batch_id"] . "</td>");
                echo("<td>". $rec["pro_name"] . "</td>");
                echo("<td>". $rec["stock_qty"] . "</td>");
                echo("<td>". $rec["item_cost"] . "</td>");
                echo("<td>". $rec["item_mrp"] . "</td>");
                echo("</tr>");
            }
        }

        $con->close();
    }

    function viewGrnDate(){

        $startDate=$_POST["startDate"];
        $endDate=$_POST["endDate"];

        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT grn.grn_id, grn.grn_date, sup.sup_name, grn.pur_id
            FROM tbl_grn grn, tbl_suppliers sup
            WHERE grn.grn_date BETWEEN '$startDate' AND '$endDate' AND grn.sup_id=sup.sup_id";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }
        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("<tr>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("</tr>");
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {

                echo("<tr>");
                echo("<td>". $rec["grn_id"] . "</td>");
                echo("<td>". $rec["grn_date"] . "</td>");
                echo("<td>". $rec["sup_name"] . "</td>");
                echo("<td>". $rec["pur_id"] . "</td>");
                echo("</tr>");
            }
        }

        $con->close();
    }

    function getGrn(){
        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT DISTINCT grn_id,grn_id FROM tbl_grn ORDER BY grn_id DESC";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("No records");
            exit;
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo("<option value='". $rec["grn_id"] . "'>". $rec["grn_id"] . "</option>");
            }
        }

        $con->close();
    }

    function viewGrn(){
        $grnId=$_POST["grnId"];

        $where="";

        if ($grnId !="") {
            if ($where !="") {
                $where .=" AND grn.grn_id = ". "'". $grnId . "'";
            } else {
                $where .=" WHERE grn.grn_id = ". "'". $grnId . "'";
            }
        }

        if ($where !="") {
            $joinwhere=" AND grn.grn_id=grnd.grn_id AND grnd.pro_id=pro.pro_id";
            $where=$where . $joinwhere;
        } else {
            $where="WHERE grn.grn_id=grnd.grn_id AND grnd.pro_id=pro.pro_id";
        }


        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT grnd.grn_batch, pro.pro_name, grnd.qty, grnd.item_cost, grnd.item_mrp
        FROM tbl_grn grn, tbl_grn_details grnd, tbl_products pro $where; ";
        $result=$con->query($sql);



        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("<tr>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("</tr>");
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {

                echo("<tr>");
                echo("<td>". $rec["grn_batch"] . "</td>");
                echo("<td>". $rec["pro_name"] . "</td>");
                echo("<td>". $rec["qty"] . "</td>");
                echo("<td>". $rec["item_cost"] . "</td>");
                echo("<td>". $rec["item_mrp"] . "</td>");
                echo("</tr>");
            }
        }

        $con->close();
    }

    function viewRtscheSup(){
        $supId=$_POST["supId"];

        $where="";

        if ($supId !="") {
            if ($where !="") {
                $where .=" AND rtsche.sup_id = ". "'". $supId . "'";
            } else {
                $where .=" WHERE rtsche.sup_id = ". "'". $supId . "'";
            }
        }

        if ($where !="") {
            $joinwhere=" AND rtsche.route_id= rt.route_id AND rtsche.salesman=usr.emp_id ORDER BY rtsche.routesche_id DESC";
            $where=$where . $joinwhere;
        } else {
            $where="WHERE rtsche.route_id= rt.route_id AND rtsche.salesman=usr.emp_id ORDER BY rtsche.routesche_id DESC";
        }


        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT rtsche.routesche_id, rt.route_name, rtsche.route_date, usr.emp_fullname, rtsche.vehicle
        FROM tbl_route_sche rtsche, tbl_route rt, tbl_user_details usr $where; ";
        $result=$con->query($sql);



        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("<tr>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("</tr>");
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {

                echo("<tr>");
                echo("<td>". $rec["routesche_id"] . "</td>");
                echo("<td>". $rec["route_name"] . "</td>");
                echo("<td>". $rec["route_date"] . "</td>");
                echo("<td>". $rec["emp_fullname"] . "</td>");
                echo("<td>". $rec["vehicle"] . "</td>");
                echo("</tr>");
            }
        }

        $con->close();
    }

    function getScheId(){
        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT DISTINCT routesche_id,routesche_id FROM tbl_route_sche ORDER BY routesche_id DESC";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("No records");
            exit;
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo("<option value='". $rec["routesche_id"] . "'>". $rec["routesche_id"] . "</option>");
            }
        }

        $con->close();
    }

    function viewSche(){
        $scheId=$_POST["scheId"];

        $where="";

        if ($scheId !="") {
            if ($where !="") {
                $where .=" AND rtsd.rtsche_id = ". "'". $scheId . "'";
            } else {
                $where .=" WHERE rtsd.rtsche_id = ". "'". $scheId . "'";
            }
        }

        if ($where !="") {
            $joinwhere=" AND rtsd.rtsche_proid=pro.pro_id";
            $where=$where . $joinwhere;
        } else {
            $where="WHERE rtsd.rtsche_proid=pro.pro_id";
        }


        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT rtsd.rtsche_proid, pro.pro_name, rtsd.rtsche_batch, rtsd.rtsche_qty
        FROM tbl_route_sche_details rtsd, tbl_products pro $where; ";
        $result=$con->query($sql);



        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("<tr>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("<td>No Record</td>");
            echo("</tr>");
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {

                echo("<tr>");
                echo("<td>". $rec["rtsche_proid"] . "</td>");
                echo("<td>". $rec["pro_name"] . "</td>");
                echo("<td>". $rec["rtsche_batch"] . "</td>");
                echo("<td>". $rec["rtsche_qty"] . "</td>");
                echo("</tr>");
            }
        }

        $con->close();
    }

    function getRouteName(){
        $scheId=$_POST["scheId"];
        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT DISTINCT rt.route_name FROM tbl_route rt, tbl_route_sche rtsche WHERE rt.route_id=rtsche.route_id AND rtsche.routesche_id='$scheId'";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("No records");
            exit;
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo($rec["route_name"]);
            }
        }

        $con->close();
    }

    function getSup(){
        $scheId=$_POST["scheId"];
        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT DISTINCT sup.sup_name FROM tbl_suppliers sup, tbl_route_sche rtsche WHERE sup.sup_id=rtsche.sup_id AND rtsche.routesche_id='$scheId'";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("No records");
            exit;
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo($rec["sup_name"]);
            }
        }

        $con->close();
    }

    function getSalesman(){
        $scheId=$_POST["scheId"];
        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT DISTINCT usr.emp_fullname FROM tbl_user_details usr, tbl_route_sche rts WHERE usr.emp_id=rts.salesman AND rts.routesche_id='$scheId'";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("No records");
            exit;
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo($rec["emp_fullname"]);
            }
        }

        $con->close();
    }

    function getVehicle(){
        $scheId=$_POST["scheId"];
        $db=new Connection();
        $con=$db->db_con();
        $sql="SELECT DISTINCT vehicle FROM tbl_route_sche WHERE routesche_id='$scheId'";
        $result=$con->query($sql);

        if ($con->errno) {
            echo("SQL Error: ". $con->error);
            exit;
        }

        //alert('func');
        $nor=$result->num_rows;

        if ($nor==0) {
            echo("No records");
            exit;
        } else {

            //fetch all the records
            while ($rec=$result->fetch_assoc()) {
                echo($rec["vehicle"]);
            }
        }

        $con->close();
    }