<!DOCTYPE html>
<body>
<center>
<?php
	$pro_id=$_REQUEST["pro_id2"];
	include '../databaseclass.php';
		$obj=new databaseclass();
		$res=$obj->getdata("select * from pro_tbl where pro_id='$pro_id'");
		while($row=mysql_fetch_array($res))
		{
		$proid=$row['pro_id'];
		$proname=$row['pro_name'];
		$proprice=$row['pro_price'];
		$descp=$row['description'];
		$mfg=$row['mfg'];
		$soh=$row['SOH'];
		$warr=$row['warranty'];
		$clr=$row['color'];
		$catid=$row['fk_cat_id'];
		}
		
?>
<h1>Update Catagory</h1>
<form method="post" action="proupdateaction.php">
<table border="2">
	<tr>
		<td>Product Id:
		<td><input type="text" name="txtproid" value="<?php echo $proid; ?> readonly">
	</tr>
	<tr>
		<td>Product Name:
		<td><input type="text" required name="txtproname" value="<?php echo $proname; ?>">
	</tr>
	<tr>
		<td>Product Price:
		<td><input type="text" required name="txtproprice" value="<?php echo $proprice; ?>">
	</tr>
	<tr>
		<td>Description:
		<td><textarea name="desc" ><?php echo $descp; ?></textarea>
	</tr>
	<tr>
		<td>MFG:
		<td><input type="text" required name="txtmfg" value="<?php echo $mfg; ?>">
	</tr>
	<tr>
		<td>SOH:
		<td><input type="text" required name="txtsoh" value="<?php echo $soh; ?>">
	</tr>
	<tr>
		<td>Warranty:
		<td><input type="text" required name="txtwarr" value="<?php echo $warr; ?>">
	</tr>
	<tr>
		<td>Color:
		<td><input type="text" required name="txtclr" value="<?php echo $clr; ?>">
	</tr>
	<tr>
		<td>Catagory Name:
		
	<td><select name="cat_name">
	<?php 
		new databaseclass();
		$res=$obj->getdata("select * from cat_tbl");
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
		if($catid==$row['cat_id'])
		{
			$selected='selected';
		}
		else
		{
			$selected='';
		}
		
	?>
	
<option <?php echo $selected; ?> value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>

		<?php } ?>
		</select>
		</tr>
	<tr>
	<td>&nbsp;
	
	
<td><input class="btn" type="submit" name="btnsubmit" value="Update" style="
    height: 30px;
    width: 90px;
"/>
<a href="db1.php"><input class="btn" type="button" name="btnback" value="Back" style="
    height: 30px;
    width: 90px;
	
"/>
</a>
</tr>
</table>
</form>
</center>
</body>
</html>