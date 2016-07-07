<?php
 class databaseclass
	{
		public function myconnection()
		{
			$con=mysql_connect('localhost','root','');
			mysql_select_db('shoppingcart',$con);
			return $con;
		}
		
		public function getdata($query)
		{
			$ans=new databaseclass();
			$con=$ans->myconnection();
			$res=mysql_query($query,$con);
			return $res;
		}
	}
?>