<?php
	$id=$_POST["txtusrid"];
	include '../databaseclass.php';
		$obj=new databaseclass();

	$res=$obj->getdata("delete from user_tbl where email_id='$id'");
	header('location:userdetail.php');
	
	?>