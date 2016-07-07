<?php
	if(isset($_POST["btnsubmit"]))
	{
		$catid=$_POST["txtcatid"];
		$catname=$_POST["txtcatname"];
		include '../databaseclass.php';
		$obj=new databaseclass();
		$res=$obj->getdata("update cat_tbl set cat_name='$catname' where cat_id='$catid'");
		header('location:catdetail.php');
	}
?>