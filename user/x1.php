<?php 
session_start();
?>
<?php
if(isset($_POST["btnsubmit"]))
		{
		$email=$_SESSION["email"];
		$name=$_POST["txtname"];
		$city=$_POST["txtcity"];
		$gen=$_POST["male"];
		$mobile=$_POST["txtmno"];
		/*$con=mysql_connect('localhost','root','');
		mysql_select_db('shoppingcart',$con);
		$res=mysql_query("update user_tbl set name='$name',mobile=$mobile,city='$city',gender='$gen' where email_id=$email",$con);*/
		include '../databaseclass.php';
		$res=new databaseclass();
		$ans=$res->getdata("update user_tbl set uname='$name',mobile='$mobile',city='$city',gender='$gen' where email_id='$email'");
		Header('Location:viewpro1.php');
		}
?>