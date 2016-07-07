<?php 
  session_start();
   if($_SESSION["email_id"]=="")
 {
  header('location:../index.php');
 }
?>
<!DOCTYPE html>
<head><title>Insert</title>
  <link href="Content/bootstrap.css" rel="stylesheet" />
    <script src="Scripts/jquery-1.9.1.js"></script>
    <script src="Scripts/bootstrap.js"></script>
</head>
<body>
  <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
			<div class="container-fluid">
                <div class="jumbotron" style="
    background-color: rgba(191, 6, 6, 0.27);
">
                    <h1>ShoppingKart<small>.com</small></h1>
                </div>
				</div>
            </div>
        </div>
        <div class="row">   
            <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ShoppingKart</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="productdetail.php">Product</a></li>
       <li class="dropdown">
          <a href="catdetail.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catagory <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="catupdate1.php">Catagory Update</a></li>
            <li><a href="catdelete1.php">Catagory Delete</a></li>
          </ul>
        </li>
           <li><a href="userdetail.php">User</a></li>
           <li><a href="#">Bill</a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["name"]; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <div class="container" style="width:260px;">
            <li><h3><?php echo $_SESSION["name"];?></h3></li>
            <li role="separator" class="divider"></li>
            <li><label>Email ID &nbsp;&nbsp;&nbsp; :</label><?php echo $_SESSION["email_id"];?></li>
            <li><label>Mobile No &nbsp;:</label><?php echo $_SESSION["mobile"];?></li>
            <li><label>City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><?php echo $_SESSION["city"];?></li>
            <li><label>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><?php echo $_SESSION["gender"];?></li>
            <li role="separator" class="divider"></li>
            <li><center><a href="../Index.php" class="btn btn-primary">Sign Out</a></center></li>
            </div>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        </div>
    </div>
	<div class="container">
	<form action="proinsaction.php" method="post" enctype="multipart/form-data">
	    <div class="panel panel-info">
                <div class="panel-heading">Insert Record</div>
                    <div class="panel-body">
	<label class="form-control">Product Name:</label>
	<input class="form-control type="text" name="txtname" required placeholder="Enter product name"/>
<br>
	<label class="form-control">Product Price:</label>
	<td><input class="form-control" type="text" name="txtprice" required placeholder="Enter product price"/>
<br>
<label class="form-control">Photo:</label>
 <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
<br>
	<label class="form-control">Discription:</label>
	<td><textarea class="form-control" placeholder="Enter description" name="txtdesc"></textarea>
	
	
<br>	<label class="form-control">Manufacturer:</label>
	<td><input class="form-control" type="text" name="txtmfg" required placeholder="Enter menufactuere name"/>
<br>
	<label class="form-control">Stock on hand:</label>
	<td><input class="form-control" type="text" name="txtsoh" required placeholder="Enter stock on hold"/>
<br>
	<label class="form-control">Warranty</label>
	<td><input class="form-control" type="text" name="txtwarranty" required placeholder="Enter product warranty"/>
<br>
<label class="form-control">Color:</label>
	<td><select class="form-control" name="txtclr">
	<option>Black</option>
	<option>White</option>
	<option>Silver</option>
	<option>Red</option>
	<option>Blue</option>
	<option>Pink</option>
	</select>
<br>
	<label class="form-control">Catagory Name:</label>
	<td><select name="txtcat" class="form-control"><br>
	<?php
	include '../databaseclass.php';
	$res=new databaseclass();
	$ans=$res->getdata("select * from cat_tbl");
	while($row=mysql_fetch_array($ans,MYSQL_ASSOC))
	{
		echo '<option value="'.$row["cat_id"].'"';
		echo ">".$row["cat_name"]."</option>";
	}
	?>
	</select>
<br>
	
	<input class="btn" type="submit" name="btnsubmit" value="Insert">
	<a href="prodetail.php"><input class="btn" type="button" name="btnback" value="Back To List">
    </div>
               </div>
	</form>
    </div>
</center>
</body>
</html>