<?php
	$id=$_POST["txtproid"];
	include '../databaseclass.php';
		$obj=new databaseclass();

	$res=$obj->getdata("delete from pro_tbl where pro_id='$id'");
	header('location:productdetail.php');
	
	?>