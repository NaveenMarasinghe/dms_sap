<?php
require_once("../controllers/class_dbconnection.php");

if(isset($_GET["type"])){
		$type=$_GET["type"];
		switch($type){			// checks the type addNewProductCat
			case "get_poid":
				get_poid(); 		
				break;
			case "get_po":
				get_po(); 		
				break;	
			case "grnProductTable":
				grnProductTable(); 		
				break;		
			case "grnSave":
				grnSave(); 		
				break;		
			case "purchaseSaveDetails":
				purchaseSaveDetails(); 		
				break;													
				}
			}
function get_poid(){
		$supplierval=$_POST["supplierval"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT DISTINCT pur_id FROM tbl_po where sup_id='$supplierval' and pur_status='Pending'";
		
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
				echo("<option value='".$rec["pur_id"]."'>".$rec["pur_id"]."</option>");
			}
		}
		$con->close();
}

function get_po(){
		$supplierval=$_POST["supplierval"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT DISTINCT pur_id FROM tbl_po where sup_id='$supplierval' and pur_status='Pending'";
		
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
				echo("<option value='".$rec["pur_id"]."'>".$rec["pur_id"]."</option>");
			}
		}
		$con->close();
}

function grnProductTable(){
		$poidVal=$_POST["poidVal"];
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT pod.pro_id, pro.pro_name, pod.pur_qty
				FROM tbl_products pro, tbl_po_details pod
				WHERE pod.pro_id=pro.pro_id and pod.purod_id='$poidVal'";
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
			echo("<td>No Record</td>");
			echo("</tr>");
			exit;
		
		}
		while($rec=$result->fetch_assoc()){
		// echo "<tr><td>".$rec["pro_id"]."</td><td>".$rec["pro_cat"]."</td><td>".$rec["pro_subcat"]."</td><td>".$rec["pro_name"]."</td><td>".$rec["pro_sup"]."</td> 
		// </tr>";	
			echo("<tr id='".$rec["pro_id"]."'>");
			echo("<td>".$rec["pro_id"]."</td>");
			echo("<td>".$rec["pro_name"]."</td>");
			echo("<td>".$rec["pur_qty"]."</td>");
			echo("<td></td>");
			echo("<td></td>");
			echo('<td><div class="hidden-sm hidden-xs btn-group">
				<button class="btn btn-xs btn-success">
					<i class="ace-icon fa fa-info-circle bigger-120"></i>
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

function grnSave(){
		$db=new Connection();
		$con=$db->db_con();
		
		//query
		$sql="SELECT grn_id FROM tbl_grn ORDER BY grn_id DESC LIMIT 1;";
		
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
			$num=$rec["grn_id"];
			//eliminate string GRN and get remaining ID no
			$num=substr($num,3);
			//increment the ID
			$num++;
			//merge zeros to left side of ID (total length of ID should be 4)
			$no=str_pad($num,4,'0',STR_PAD_LEFT);
			//merge string S to new sID
			$grnid="GRN".$no;
		}
		else{
			//first ID of student
			$grnid="GRN0001";
		}		

		$grndate=$_POST["grndate"];
		$grnSupplier=$_POST["grnSupplier"];
		$grnremarks=$_POST["grnRemarks"];
		$purid=$_POST["grnPOID"];		
		$postatus="Pending";

		if($purid=='1'){
			$purid="Without PO";
		} else{
			$sqlupdate="UPDATE tbl_po
						SET pur_status = 'Received'
						WHERE pur_id = '$purid';";
			$resultupdate=$con->query($sqlupdate);
		}

		$sql2="INSERT INTO tbl_grn(grn_id,sup_id,pur_id,grn_date,remarks)
		VALUES('$grnid','$grnSupplier','$purid','$grndate','$grnremarks');";

		$result2=$con->query($sql2);
		
		if($con->error){
			echo("SQL error ".$con->error);
			exit;
		}
		if($result2>0){
			echo(json_encode($grnid));

		}
		else{
			echo("error");
		}

}

function purchaseSaveDetails(){
		// Unescape the string values in the JSON array
		$tableData = stripcslashes($_POST['pTableData']);

		// Decode the JSON array
		$tableData = json_decode($tableData,TRUE);

		// now $tableData can be accessed like a PHP array
		//echo $tableData[1]['pname'];
		$tblDataLength = count($tableData);
		


		for ($x=1; $x<$tblDataLength; $x++){
			$grnpid = $tableData[$x]['grnpid'];
			$grnpqty = $tableData[$x]['grnpqty'];
			$itcost = $tableData[$x]['itcost'];
			$itmrp = $tableData[$x]['itmrp'];						
			$grnid = $tableData[$x]['grnid'];
			$grnbatch = $tableData[$x]['grnbatch'];

			$db=new Connection();
			$con=$db->db_con();

			$sql="INSERT INTO tbl_grn_details(grn_id,pro_id,grn_batch,qty,item_cost,item_mrp)
			VALUES('$grnid','$grnpid','$grnbatch','$grnpqty','$itcost','$itmrp');";


			$stocksql="SELECT stock_qty
					FROM tbl_stock
					WHERE batch_id='$grnbatch' and pro_id='$grnpid';";

			$rec=$con->query($stocksql);
			$nor=$rec->num_rows;

			if($nor>0){
				$num=$rec->fetch_assoc();
				$stock=$num["stock_qty"];
				$grnpqty==$grnpqty+$stock;
				$sqlupdate="UPDATE tbl_stock
							SET stock_qty = '$grnpqty'
							WHERE batch_id = '$grnbatch';";
				$resultupdate=$con->query($sqlupdate);				
		
			} else{
				$sql2="INSERT INTO tbl_stock(batch_id,pro_id,stock_qty,item_cost,item_mrp)
				VALUES('$grnbatch','$grnpid','$grnpqty','$itcost','$itmrp');";		
				$result2=$con->query($sql2);						
			}			

			// $result=$con->query($sql);
			$result=$con->query($sql);
			
			if($con->error){
				echo("SQL error ".$con->error);
				exit;
			}
			if($result>0){
				echo("success2");
				
			}
			else{
				echo("error");
			}

		}
}
?>
