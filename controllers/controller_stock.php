<?php
	require_once("../controllers/class_dbconnection.php");

	if(isset($_GET["type"])){
		$type=$_GET["type"];
		switch($type){			// checks the type 
			case "stockRouteSche":
				stockRouteSche(); 		
				break;
			case "viewRouteStock":
				viewRouteStock(); 		
				break;	
			case "RouteStockSalesman":
				RouteStockSalesman(); 		
				break;	
			case "issueStock":
				issueStock(); 		
				break;												
																			
		}
	}

function stockRouteSche(){

		$stockDate=$_POST["stockDate"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT rtsche.routesche_id, rt.route_name FROM tbl_route_sche rtsche, tbl_route rt where rtsche.route_date='$stockDate' and rtsche.route_id=rt.route_id";
		
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
				echo("<option value='".$rec["routesche_id"]."'>".$rec["route_name"]."</option>");
			}
		}
		$con->close();	
}

function viewRouteStock(){
		$selectRouteSche=$_POST["selectRouteSche"];	
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT rtsche.rtsche_proid, pd.pro_name, rtsche.rtsche_batch, rtsche.rtsche_qty
				FROM tbl_route_sche_details rtsche, tbl_products pd
				WHERE pd.pro_id=rtsche.rtsche_proid and rtsche.rtsche_id='$selectRouteSche'";
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
			echo("<tr id='".$rec["rtsche_proid"]."'>");
			echo("<td>".$rec["rtsche_proid"]."</td>");
			echo("<td>".$rec["pro_name"]."</td>");			
			echo("<td>".$rec["rtsche_batch"]."</td>");
			echo("<td>".$rec["rtsche_qty"]."</td>");

			echo('<td id="2"><div id="1" class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-success" id="btn_modelView" data-toggle="modal" data-target="#modelPoView" onclick="modalViewPo(\''.$rec["pur_id"].'\')">
						<i class="ace-icon fa fa-info-circle bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modelEditProduct">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</button>

					<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modelDeleteProduct">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</button>

				</div></td>');
			echo("</tr>");
			
		}
		
		$con->close();	
}

function RouteStockSalesman(){
		$selectRouteSche=$_POST["selectRouteSche"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT usr.emp_fname, usr.emp_lname FROM tbl_route_sche rt, tbl_user_details usr where rt.routesche_id='$selectRouteSche' and rt.salesman=usr.emp_id";
		$sql2="SELECT veh.veh_number FROM tbl_route_sche rt, tbl_vehicles veh where rt.routesche_id='$selectRouteSche' and veh.veh_id=rt.vehicle";

		$result=$con->query($sql);
		$result2=$con->query($sql2);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		$rec=$result->fetch_assoc();
		$rec2=$result2->fetch_assoc();
		$merge=array_merge($rec,$rec2);
		echo json_encode($merge);
		$con->close();	

}

function issueStock(){
	
		$db=new Connection();
		$con=$db->db_con();
		
		//query
		$sql="SELECT pur_id FROM tbl_po ORDER BY pur_id DESC LIMIT 1;";
		
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
			$num=$rec["pur_id"];
			//eliminate string S and get remaining ID no
			$num=substr($num,1);
			//increment the ID
			$num++;
			//merge zeros to left side of ID (total length of ID should be 4)
			$no=str_pad($num,4,'0',STR_PAD_LEFT);
			//merge string S to new sID
			$poid="P".$no;
		}
		else{
			//first ID of student
			$poid="PO0001";
		}		

		$podate=$_POST["podate"];
		$poSupplier=$_POST["poSupplier"];
		$remarks=$_POST["poremarks"];
		$postatus="Pending";

		$sql2="INSERT INTO tbl_po(pur_id,pur_date,sup_id,pur_remarks,pur_status)
		VALUES('$poid','$podate','$poSupplier','$remarks','$postatus');";

		$result2=$con->query($sql2);
		if($con->error){
			echo("SQL error ".$con->error);
			exit;
		}
		if($result2>0){
			echo(json_encode($poid));

		}
		else{
			echo("error");
		}

}

?>