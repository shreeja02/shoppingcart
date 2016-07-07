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
      <a class="navbar-brand" href="index.php">ShoppingKart</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="productdetail.php">Product</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catagory <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Catagory Update</a></li>
            <li><a href="#">Catagory Delete</a></li>
          </ul>
        </li>
           <li><a href="userdetail.php">User</a></li>
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
	<form action="proupdateaction.php" method="post">
	    <div class="panel panel-info">
                <div class="panel-heading">Update Record</div>
                    <div class="panel-body">
                    <label>Product Id:</label>
                     <input type="text" name="txtproid" class="form-control" value="<?php echo $proid; ?> "readonly>
                      <br>
                      <label>Product Name:</label>
                     <input type="text"  class="form-control" required name="txtproname" value="<?php echo $proname; ?>">
                     <br>
                      <label>Product Price:</label>
                     <input type="text"  class="form-control" required name="txtproprice" value="<?php echo $proprice; ?>">
                       <br>
                      <label>Description :</label>
                  <textarea name="desc"  class="form-control"><?php echo $descp; ?></textarea>
                     <br>
                    <label>Manufacturer:</label>
                    <input type="text"  class="form-control" required name="txtmfg" value="<?php echo $mfg; ?>">
                       <br>
                       <label>Warranty:</label>
                     <input type="text" class="form-control" required name="txtwarr" value="<?php echo $warr; ?>">
                       <br>
                       <label>Stock On Hand:</label>
                     <input type="text" class="form-control" required name="txtsoh" value="<?php echo $soh; ?>">
                       <br>
                       <label>Color:</label>
                     <input type="text" class="form-control" required name="txtclr" value="<?php echo $clr; ?>">
                       <br>
                     <label>Catagory:</label>
                     <select name="cat_name" class="form-control">
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

                         <br>
                        <input class="btn" class="form-control" type="submit" name="btnsubmit" value="Update" style="height: 30px;width: 90px;"/>
                        <a href="productdetail.php"><input class="btn" class="form-control" type="button" name="btnback" value="Back" style="height: 30px;width: 90px;"/>
</a>
                     </div>
               </div>
	</form>
    </div>
</body>
</html>
