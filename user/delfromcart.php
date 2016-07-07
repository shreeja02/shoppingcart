<?php
	$id=$_REQUEST["id"];
	include '../databaseclass.php';
	$obj=new databaseclass();
	$res=$obj->getdata("delete from bill_tbl where bill_no='$id'");
    header('location:index.php');
?>