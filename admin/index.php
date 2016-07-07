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
    <style type="text/css">
      img{
        height:220px;
      }
    </style>
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
      <Buy type="Buy" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </Buy>
      <a class="navbar-brand" href="index.php">ShoppingKart</a>
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
           <li><a href="userdetail.php">User</a></li>
           <li><a href="userdetail.php">Bill</a></li>
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
        </li>
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        </div>
    </div>
    <div class="container">
    <div class="row">
  <?php
  include'../databaseclass.php';
    $obj=new databaseclass();
    $res=$obj->getdata("select * from pro_tbl");
    
    while($row=mysql_fetch_assoc($res))
    {
  echo  ' <div class="col-sm-6 col-md-4">';
   echo     ' <div class="thumbnail">';
    echo ' <img src="'.$row["pro_photo"].'" style="height:220px;" >';
     echo '<div class="caption">';
       echo ' <h3>'.$row["pro_name"].'</h3>';
       echo  '<p>'.$row["description"].'</p>';
       echo '<p><a href="#" class="btn btn-primary" role="Button">Buy</a> <a href="#" class="btn btn-danger" role="Button">Add To Wishlist</a></p>';
echo'      </div>
    </div>
  </div>
  ';
    }
  ?>
  
</div>


</div>
</body>
</html>
