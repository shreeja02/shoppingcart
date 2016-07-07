<?php
	session_start();
?>
<html>
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
		$email=$_SESSION["email"];
		$con=mysql_connect('localhost','root','');
		mysql_select_db('shoppingcart',$con);
		$res=mysql_query("select * from user_tbl where email_id='$email'",$con);
		$row=mysql_fetch_array($res);
		$name=$row['uname'];
		$city=$row['city'];
		$gen=$row["gender"];
		$mobile=$row['mobile'];
			
?>
<center>
<form method="post" action="x1.php" >
<fieldset>
<table>
<h1><u>Edit Form</u></h1>

<tr>
	<td>Email-Id :
	<td><input class="a" type="text" name="txtrno" value="<?php echo $email ?>"/>
</tr>

<tr>
	<td>Name :
	<td><input class="a" type="text" name="txtname" value="<?php echo $name ?>"/>
</tr>
<tr>
	<td>Mobile No :
	<td><input class="a" type="text" name="txtmno" value="<?php echo $mobile ?>"/>
</tr>

<tr>
<td>City</td>
<td>
	<select name="txtcity">
	<?php 
	$con=mysql_connect('localhost','root','');
	mysql_select_db('shoppingcart',$con);
	$res=mysql_query('select * from city_tbl',$con);
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	if($city==$row['name'])
	{
		$selected='selected="selected"';
	}
	else
	{
		$selected='';
	}
	?>
<option <?php echo $selected; ?> value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
<?php
}
	
	?>
	
	</select>
	</td>
</tr>

<tr>
	<td>Gender:
	<td><input type="radio" value="male" <?php if($gen=="male") echo "checked"; ?> name="male" />Male<input type="radio" <?php if($gen=="female") echo "checked"; ?> value="female" name="male" value="female"/>Female
</tr>

<tr>
	<td>&nbsp;</td>
	
	
<td><input class="btn" type="submit" name="btnsubmit" value="Submit" style="
    height: 30px;
    width: 90px;
"/>
<a href="viewpro1.php"><input class="btn" type="button" name="btnback" value="Back" style="
    height: 30px;
    width: 90px;
	
"/>
</a>
</tr>
</fieldset>
</table>
</center>
</form>
</body>
</html>