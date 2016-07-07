<?php
	session_start();
	
	$id=$_REQUEST["id"];
	$_SESSION["id"]=$id;
	$user_id=$_SESSION["email_id"];
	$amt=$_SESSION["amt"];
	$date=date("d/m/y");
	$qty=$_POST["txtqty"];
	include '../databaseclass.php';
	$obj=new databaseclass();
	$res=$obj->getdata("insert into bill_tbl values(null,'$amt','$date','$id','$user_id','1','kart')");
	echo $res;
	header("location:cart.php");
?>

