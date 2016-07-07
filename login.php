<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>
    <link href="Content/bootstrap.css" rel="stylesheet" />
    <script src="Scripts/bootstrap.js"></script>
    <script src="Scripts/jquery-1.9.1.js"></script>
    <title></title>
</head>
<body>
<?php
//gfklsgklsglksdfglksdfgjksdfgjdlsfglkdf
//how r u
            if(isset($_POST["ans"])){
              include 'databaseclass.php';
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
    <div class="container">
        <form method="post" action="login.php">
        <div class="row">
        <div class="col-md-offset-3 col-md-5">
            <h1 class="text-center">Welcome..</h1>
            <div class="panel panel-info">
                <div class="panel-heading">Email ID</div>
                    <div class="panel-body">
                     <input type="email" placeholder="Enter mail in @ format" name="txtemail" class="form-control" />
                     </div>
               </div>
            <div class="panel panel-info">
                <div class="panel-heading">Password</div>
                    <div class="panel-body">
                     <input type="password" name="txtpass" placeholder="Enter password" class="form-control" />
                     </div>
               </div>
			   <center>
          <p style="color:red">
		  <?php
			if(isset($_POST["ans"]))
			{
				if($count!=1)
				{
					echo "invalid username or password!";
				}
			}
		  ?>
		  </p></center>
            <input type="submit" name="ans" value="Log In" class="form-control btn btn-success" />
        </div>
            </div>
    </form>
        </div>
</body>
</html>



