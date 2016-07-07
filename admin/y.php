<?php
	if(isset($_POST["btnsubmit"]))
	{
		$catid=$_POST["txtcatid"];
		include '../databaseclass.php';
		$obj=new databaseclass();
		$res=$obj->getdata("delete from cat_tbl where cat_id='$catid'");
		Header('Location:catdetail.php');
	}
?>