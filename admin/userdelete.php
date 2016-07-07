<?php
    session_start();
     if($_SESSION["email_id"]=="")
 {
  header('location:../index.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
    <link href="Content/bootstrap.css" rel="stylesheet" />
    <script src="Scripts/jquery-1.9.1.js"></script>
    <script src="Scripts/bootstrap.js"></script>
    <title></title>
</head>
<body>
<?php
	$id=$_REQUEST["id"];
	include '../databaseclass.php';
		$obj=new databaseclass();
		$res=$obj->getdata("select * from user_tbl where email_id='$id'");
		while($row=mysql_fetch_array($res))
		{
		  $id=$row["email_id"];
      $name=$row["uname"];
      $mobile=$row["mobile"];
      $city=$row["city"];
      $gender=$row["gender"];
		}
		
?>
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
        <li><a href="productdetail.php">Product</a></li>
       <li class="dropdown">
          <a href="catdetail.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catagory <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="catupdate1.php">Catagory Update</a></li>
            <li><a href="catdelete1.php">Catagory Delete</a></li>
          </ul>
        </li>
           <li  class="active"><a href="userdetail.php">User</a></li>
           <li><a href="#">Catagory</a></li>
       
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
	<form action="userdeleteaction.php" method="post">
	    <div class="panel panel-info">
                <div class="panel-heading">Delete Record</div>
                    <div class="panel-body">
                    <label>Email Id:</label>
                     <input type="text" name="txtusrid" read only class="form-control" value="<?php echo $id; ?> "readonly>
                      <br>
                      <label>Name:</label>
                     <label class="form-control"><?php echo $name; ?></label>
                     <br>
                      <label>Mobile:</label>
                 <label class="form-control"><?php echo $mobile; ?></label>
                       <br>
                      <label>City :</label>
                      <label class="form-control"><?php echo $city; ?></label>
                     <br>
                    <label>Gender:</label><br>
                  <label class="form-control"><?php echo $gender; ?></label>
                         <br>
                        <input class="form-control btn btn-danger" type="submit" name="btnsubmit" value="Delete" style="height: 30px;width: 90px;"/>
                        <a href="userdetail.php" ><input class="btn" class="form-control" type="button" name="btnback" value="back" style="height: 30px;width: 90px;"/>
</a>
                     </div>
               </div>
	</form>
    </div>
</body>
</html>
