<?php
	if(isset($_POST["delall"]))
	{
		include '../databaseclass.php';
		$obj=new databaseclass();
		$res=$obj->getdata("select * from pro_tbl");
		$count=mysql_num_rows($res);
		while($row=mysql_fetch_assoc($res))
			{
				if(isset($_POST["chk"]))
				{
					$obj->getdata("delete from pro_tbl where pro_id='" . $row["pro_id"] . "'");
				}
				
			}
		
		//header('Location:productdetail.php');
	}


?>