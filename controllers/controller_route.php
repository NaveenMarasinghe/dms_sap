<?php
	session_start();
	if(!isset($_SESSION["user"]))
	{
	 	header("Location:../index.php");
	}
	$utype=$_SESSION["user"]["utype"];
	if($utype=="1")
	{
		header("Location:../pages/dashboard.php");
		
	}
	else if($utype=="2")
	{
		header("Location:../pages/dashboard.php");
		
	}
	else if($utype=="3")
	{
		header("Location:../pages/dashboard.php");
		
	}
	else if($utype=="4")
	{
		header("Location:../pages/dashboard.php");
		
	}
	else if($utype=="5")
	{
		header("Location:../pages/dashboard.php");
		
	}

?>