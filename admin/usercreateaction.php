<?php
	
	if(isset($_POST["btnsubmit"]))
	{
		/*include '../databaseclass.php';
		$res=new databaseclass();
		$ans=$res->getdata("select cat_id from cat_tbl where cat_name='$catname'");
		while($row=mysql_fetch_array($ans,MYSQL_ASSOC))
		{
			catid=$row['cat_id'];
		}*/
		
		$userid=$_POST["txtid"];
		$username=$_POST["txtname"];
		$mno=$_POST["txtmno"];
		$city=$_POST["txtcity"];
		$gen=$_POST["txtgen"];
		$pass=$_POST["txtpass"];
		$type=$_POST["txttype"];
		include '../databaseclass.php';
		$obj=new databaseclass();
//(pro_name,pro_price,description,
	//	mfg,SOH,warranty,color,fk_cat_id)
	$res=$obj->getdata("insert into user_tbl values('NULL','$userid','$username','$mno','$city','$gen','$pass','$type')");
	header('location:userdetail.php');
	}
?>