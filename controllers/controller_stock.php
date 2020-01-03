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
		$sql="SELECT po.pur_id, po.pur_date, sup.sup_name, po.pur_remarks, po.pur_status
				FROM tbl_po po, tbl_suppliers sup
				WHERE po.sup_id=sup.sup_id and po.pur_status<>'Removed'";
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
			echo("<tr id='".$rec["pur_id"]."'>");
			echo("<td>".$rec["pur_id"]."</td>");
			echo("<td>".$rec["sup_name"]."</td>");
			echo("<td>".$rec["pur_date"]."</td>");
			echo("<td>".$rec["pur_status"]."</td>");
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

					<button class="btn btn-xs btn-warning">
						<i class="ace-icon fa fa-flag bigger-120"></i>
					</button>
				</div></td>');
			echo("</tr>");
			
		}
		
		$con->close();	
}
?>