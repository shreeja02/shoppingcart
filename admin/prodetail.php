
<html>
<head>
<style type="text/css">
a{
	font-family:arial;
	font-size:20px;
}
table{
	
	font-family:arial;
	font-size:20px;
}
th{
	border-bottom-style:groove;
}
td{
	height:20px;
	width:310px;
	text-align:center;
	border-bottom-style:solid;
	border-bottom-width:1px;
	
}
.btn1{
	background-color: #4CAF50; /* Green */
    border: none;
    color: white;
     text-align: center;
    text-decoration: none;
    font-size: 16px;
}
.btn2{
	background-color: #F00; /* Red */
    border: none;
    color: white;
     text-align: center;
    text-decoration: none;
    font-size: 16px;
}
.btn3{
	background-color: #00F; /* Blue */
    border: none;
    color: white;
     text-align: center;
    text-decoration: none;
    font-size: 16px;
}
</style>
</head>
<body>

<form method="post" action="catdetail.php" enctype="multipart/form-data">
<center>
<h1>List Of Product</h1>
</center>
<a href="procreate.php">Insert new product</a>
<center>
<table>


	<tr>
		<th>Product-Id</th>
		<th>Product Name</th>
		<th>Product price</th>
		<th>Description</th>
		<th>MFG</th>
		<th>SOH</th>
		<th>Warranty</th>
		<th>Color</th>
		<th>Catagory Name</th>
		<th>Action</th>
	</tr>
	<?php
	include '../databaseclass.php';
	$res=new databaseclass();
	$ans=$res->getdata("select p.*,c.cat_name from pro_tbl as p,cat_tbl as c
						where p.fk_cat_id=c.cat_id");
	while($row=mysql_fetch_array($ans,MYSQL_ASSOC))
	{
		echo "<tr> <td>".$row['pro_id']."</td>";
		echo " <td>".$row['pro_name']."</td>";
		echo " <td>".$row['pro_price']."</td>";
		echo " <td>".$row['description']."</td>";
		echo " <td>".$row['mfg']."</td>";
		echo " <td>".$row['SOH']."</td>";
		echo " <td>".$row['warranty']."</td>";
		echo " <td>".$row['color']."</td>";
		echo " <td>".$row['cat_name']."</td>";
		echo "<td>
					<a href='proupdate.php?pro_id2=".$row['pro_id']."'><input class='btn2' type='button' value='Update' name='btnupdate'/></a>
					<a href='prodelete.php?pro_id3=".$row['pro_id']."'>	<input class='btn3' type='submit' value='Delete' name='btndel'/></a> </td></tr>";
	}
	
?>
		
	
</table>
</center>
</form>
</body>
</html>