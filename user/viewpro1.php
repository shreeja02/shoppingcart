<?php
	session_start();
?>
<!DOCTYPE html>
<head>
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
	$email=$_SESSION["email"];
	/*$con=mysql_connect('localhost','root','');
	mysql_select_db('shoppingcart',$con);
	$res=mysql_query("select * from user_tbl where email_id='$email'");*/
	include '../databaseclass.php';
	$res=new databaseclass();
	$ans=$res->getdata("select * from user_tbl where email_id='$email'");
	while($row=mysql_fetch_array($ans,MYSQL_ASSOC))
	{
		$name=$row['uname'];
		$city=$row['city'];
		$gender=$row['gender'];
		$mobile=$row['mobile'];
	}
?>
</body>
<center>
<table border=2>
<h1><u>Detail</u></h1>

<tr>
	<td>Email-Id :
	<td><label><?php echo $email ?></label>
</tr>

<tr>
	<td>Name :
	<td><label><?php echo $name ?></label>
</tr>
<tr>
	<td>City :
	<td><label><?php echo $city ?></label>
</tr>

<tr>
	<td>Gender:
	<td> <label><?php echo $gender ?></label>
</tr>
<tr>
	<td>Mobile:
	<td> <label><?php echo $mobile ?></label>
</tr>
<tr>
	<td>&nbsp;</td>
	
	
<td><a href="editpro.php"><input class="btn" type="button" name="btnback" value="Edit" style="
    height: 30px;
    width: 90px;
	
"/>
</a>

<a href="changepass.php"><input class="btn" type="button" name="btnchange" value="Change Password" style="
    height: 30px;
    width: 150px;
	
"/>
</a>

</tr>
</center>
</fieldset>
</html>