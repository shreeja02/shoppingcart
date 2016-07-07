<?php
	session_start();
?>
<!DOCTYPE html>
<head><title>Update</title>
<style type="text/css">

td
{
	font-size:20px;
}
.a
{
	height:32px;
	width:300px;
	border-style:ridge;
	border-color:rgba(0,0,0,0.46)
}
.btn{
	background-color: #4CAF50; /* Green */
    border: none;
    color: white;
     text-align: center;
    text-decoration: none;
    font-size: 16px;
}

</style>
</head>
<body>
<?php
	if(isset($_POST["btnsubmit"]))
	{
		$email=$_SESSION["email"];
		$con=mysql_connect('localhost','root','');
		mysql_select_db('shoppingcart',$con);
		$res=mysql_query("select password from user_tbl where email_id='$email'",$con);
		$op=$_POST["oldpass"];
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
			$pass=$row["password"];
		
		}
		if($op==$pass)
		{
			$np=$_POST["newpass"];
			$cp=$_POST["confirmpass"];
			if($np==$cp)
			{
				$res=mysql_query("update user_tbl set password='$np' where email_id='$email'",$con);
				header('location:viewpro1.php');
				
			}
			else
			{
				echo "Passwords are not same";
			}
		}
		else
		{
			echo "Enter correct password";
		}
	}
?>
<center>
<form method="post" action="changepass.php">
<h1>Change Password</h1>
<table border="2">
	<tr>
		<td>Old password:
		<td><input class="a" type="password" name="oldpass" placeholder="Enter old password">
	</tr>
	<tr>
		<td>New password:
		<td><input class="a" type="password" name="newpass" placeholder="Enter new password">
	</tr>
	<tr>
		<td>Confirm password:
		<td><input class="a" type="password" name="confirmpass" placeholder="Enter password again">
	</tr>
	<tr>
	<td>&nbsp;</td>
	
	
<td><input class="btn" type="submit" name="btnsubmit" value="Submit" style="
    height: 30px;
    width: 90px;
"/>
</table>
</form>
</center>
</body>
</html>