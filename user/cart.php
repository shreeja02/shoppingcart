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
      <a class="navbar-brand" href="#">ShoppingKart</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="productdetail.php">About Us</a></li>
        <li><a href="admin/catdetail.php">Contact Us</a></li>
           <li><a href="userdetail.php">FAQ</a></li>
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
<!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>

      
      
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        </div>
    </div>
    <div class="container-fluid">
          <div class="col-md-3">
  <div class="row">
    <ul class="list-group">
  
   <?php
              include'../databaseclass.php';
              $obj=new databaseclass();
              $res=$obj->getdata("select * from pro_tbl");
              $cnt=mysql_num_rows($res);
     ?>
       
  <a href="#" class="list-group-item active">Filters</a>
    <a href="home.php" class="list-group-item">All Products
    <span class="badge"><?php echo "$cnt";?></span> 

    </a>
   
   
    <?php
             
              $obj1=new databaseclass();
              $res1=$obj1->getdata('select count(p.pro_id) "cnt1",c.cat_name,p.fk_cat_id,c.cat_id from cat_tbl as c,pro_tbl as p
                where p.fk_cat_id=c.cat_id group by(c.cat_name)');

              while($row=mysql_fetch_assoc($res1))
              {
                echo '<a href="probycat.php?id='.$row["cat_id"].'" class="list-group-item"> 
                '.$row["cat_name"].'';?>
                <span class="badge">
                 <?php echo $row['cnt1'];?></span>
              <?php
              }

              
     ?>
     </a>
    </ul>

    </div> 

</div>
<form method="post" action="cart.php">
<?php
 
	$id=$_SESSION["id"];
	$obj=new databaseclass();
	$user_id=$_SESSION["email_id"];
	$res=$obj->getdata("select b.*,p.* from bill_tbl as b,pro_tbl as p where b.fk_pro_id=p.pro_id and b.fk_email_id='$user_id' and flag='kart'");
	$count=mysql_num_rows($res);
	//echo $count;
	$obj3=new databaseclass();
	$res3=$obj3->getdata("select * from pro_tbl where pro_id='$id'");
	

	 $amt=0;?>
	  <div class="col-sm-9 col-md-8">
  		<center><h1>Your Kart<small>(<?php echo $count; ?> item)</small></h1></center><?php
  		?>
  			<table class="table table-bordered">
  				<tr>
  					<th>Image</th>
  					<th>Name</th>
  					<th>Qty</th>
  					<th>Price</th>
  					<th></th>
  				</tr>
  				<?php
    while($row=mysql_fetch_assoc($res))
    { $no=$row["bill_no"];
  		?>
  				<tr>
  					<td><img style="height:100px; width:100px;" src="<?php echo $row["pro_photo"];?>" /></td>
  					<td><?php echo $row["pro_name"];?></td>
  					<td><select name="txtqty">
                                    <option value="1">1</option>
                                     <option value="2">2</option>
                                      <option value="3">3</option>
                                       <option value="4">4</option>
                                    </select></td>
  					<td><?php echo $row["pro_price"];?></td>

  				   <td><a href="delfromcart.php?id=<?php echo $row["bill_no"]; ?>" ><span class="btn btn-danger glyphicon glyphicon-trash"></span>
  					</a></td>
  				</tr>

  		<?php
		echo '</div>';
		$amt+=$row["pro_price"];
}?>
				<tr>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td>Total Amount  : <?php echo $amt;?> </td>
            <?php $_SESSION["amount"]=$amt; ?>
  					<td></td>
  				</tr>
  			</table>
  			<a href="index.php"><button class="btn btn-danger" type="button">Back</button></a>
  			                         <?php
                                 if($amt!=0)
                                  {?>
                                  <a href="payment.php"><button type="button" class="btn" name="" style="float:right;width:200px;background-color:orange;">Continue</button></a><?php
                                  }
                                  ?>
 
</div>
</form>
</body>
</html>
