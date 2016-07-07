<?php
	if(isset($_REQUEST["btnsubmit"]))
	{
		$proid=$_POST['txtproid'];
		$proname=$_POST['txtproname'];
		$proprice=$_POST['txtproprice'];
		$descp=$_POST['desc'];
		$mfg=$_POST['txtmfg'];
		$soh=$_POST['txtsoh'];
		$warr=$_POST['txtwarr'];
		$clr=$_POST['txtclr'];
		$catid=$_POST['cat_name'];
		require '../databaseclass.php';
		$obj=new databaseclass();
		$res=$obj->getdata("update pro_tbl set pro_name='$proname',
												pro_price='$proprice',
												description='$descp',
												mfg='$mfg',
												SOH='$soh',
												warranty='$warr',
												color='$clr',
												fk_cat_id='$catid'
												where pro_id='$proid'");
					header('location:productdetail.php');
	}
?>