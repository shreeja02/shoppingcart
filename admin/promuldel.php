<?php
if(isset($_POST['delall']))
{
 $cnt=array();
 $cnt=count($_POST['chk']);
//echo $cnt;
 for($i=0;$i<$cnt;$i++)
  {
     	$del_id=$_POST['chk'][$i];
     	$con=mysql_connect('localhost','root','');
			mysql_select_db('shoppingcart',$con);
		$res=mysql_query("delete from pro_tbl where pro_id='$del_id'");
		
  }
  header('Location:productdetail.php');
}
	


?>