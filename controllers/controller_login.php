<?php
	
	require_once("../controllers/class_dbconnection.php");

	$uname=$_POST["uname"];
	$pass=$_POST["pass"];
		//echo($uname);
	$obj=new Connection();
	$con=$obj->db_con();
	$sql="SELECT * FROM tbl_users WHERE emp_uname='$uname';";
	$result=$con->query($sql);
	if($con->errno)
	{
		echo("SQL Error".$con->error);
		exit;
	}
	$nor=$result->num_rows;
	//echo($nor);
	if($nor>0)
	{
		$rec=$result->fetch_assoc();
		// $pass=md5($pass);
		if($pass==$rec["emp_pw"])
		{
			if($rec["emp_status"]=="1")
			{
				session_start();
				$_SESSION["user"]["uname"]=$uname;
				$_SESSION["user"]["utype"]=$rec["emp_type"];
				echo("3");
			}
			else
			{
				echo("2");
			}
		}
		else
		{
			echo("1");
		}
	}
	else
	{
		echo("1");
	}
	$con->close();
?>