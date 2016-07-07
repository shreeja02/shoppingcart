<?php
  session_start();
  $_SESSION["email_id"]="";
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
      .caption
      {
        height:200px;
      }
    </style>
</head>
<body>
	<?php include 'header.php';?>
    <div class="container-fluid">
        <div class="row">
           
                <div class="jumbotron" style="
    background-color: rgba(191, 6, 6, 0.27);
">
                    <h1>ShoppingKart<small>.com</small></h1>
                </div>
				
        </div>
      
    </div>
    <div class="container-fluid">
          <div class="col-md-3">
  <div class="row">
    <ul class="list-group">
  
   <?php
	//hello
              include'databaseclass.php';
              $obj=new databaseclass();
              $res=$obj->getdata("select * from pro_tbl");
              $cnt=mysql_num_rows($res);
     ?>
       
  <a href="#" class="list-group-item active">Filters</a>
    <a href="index.php" class="list-group-item">All Products
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

   <div class="col-md-9">
   
<?php
    while($row=mysql_fetch_assoc($res))
    {
  echo  ' <div class="col-sm-9 col-md-4">';
   echo     ' <div class="thumbnail">';
    echo ' <img src="'.$row["pro_photo"].'" style="height:220px;" >';
     echo '<div class="caption">';
       echo ' <h3>'.$row["pro_name"].'</h3>';
       echo  '<p>'.$row["description"].'</p>';
       echo '<p><a href="#" class="btn btn-primary" role="Button">Buy</a>';
     echo ' <a href="" class="btn btn-danger" role="Button" data-toggle="modal" data-target="#myModal">Add To Wishlist</a></p>';
        ?> </div>

    </div>
  </div>
  <?php
    }
  ?>
  </div>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:red;">Please Login First!</h4>
      </div>
      <div class="modal-body">
        <?php
            if(isset($_POST["txtans"])){
              //include 'databaseclass.php';
              $obj=new databaseclass();
              $email=$_POST["txtemail"];
              $password=$_POST["txtpassword"];
              $res=$obj->getdata("select * from user_tbl where email_id='$email' and password='$password'");
              $count=mysql_num_rows($res);
              $row=mysql_fetch_assoc($res);
              $name=$row["uname"];
              $email=$row["email_id"];
              $mobile=$row["mobile"];
              $city=$row["city"];
              $gender=$row["gender"];

              if($count==1)
              {
                  $_SESSION["name"]=$name;
                  $_SESSION["email_id"]=$email;
                  $_SESSION["mobile"]=$mobile;
                  $_SESSION["city"]=$city;
                  $_SESSION["gender"]=$gender;
                if($row['type']=="user")
                {
                  
                  header('location:user/index.php');
                }
                else
                {
                  
                  header('location:admin/index.php');
                }
              }
            }
          ?>
          <form action="" method="post">
            <label>Email ID:</label>
            <input type="email" class="form-control" name="txtemail">
            <label>Password:</label>
            <input type="password" class="form-control" name="txtpassword">
            
      <div class="modal-footer">
        <input type="submit" value="Log In" class="btn btn-success form-control" name="txtans">
            <a href="signup.php">Sign Up for free!</a>
            <p style="color:red;"><?php 
            if(isset($_POST["txtans"]))
              {
                if($count!=1){
                  echo "UserName Or Password is invalid!";
                }
              }
              ?></p>
      </div>
      </form>
       </div>
    </div>
  </div>
</div>

</body>
</html>
