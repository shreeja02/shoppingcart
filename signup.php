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
if(isset($_POST["btnsubmit"]))
{
	$pass=$_POST["txtpass"];
	$pass1=$_POST["txtpass1"];
	if($pass==$pass1)
	{
	$email=$_POST["txtemail"];
	$name=$_POST["txtname"];
	$pass=$_POST["txtpass"];
	$city=$_POST["txtcity"];
	$gen=$_POST["txtgen"];
	$mno=$_POST["txtmno"];
	$type="user";
	include 'databaseclass.php';
	$res=new databaseclass();
	$ans=$res->getdata("insert into user_tbl values('$email','$name','$mno','$city','$gen','$pass','$type')");
	/*$con=mysql_connect('localhost','root','');
	mysql_select_db('shoppingcart',$con);
	$res=mysql_query("insert into user_tbl values('$id','$name','$mno','$city','$gen','$pass','$type')",$con);*/
	header('location:Index.php');
	}
	else
	{
		echo "Can't match the password";
	}
}
?>
    <div class="container">
        <form method="post" action="signup.php">
        <div class="row">
        <div class="col-md-offset-3 col-md-5">
            <h1 class="text-center">Welcome..</h1>
            <div class="panel panel-info">
                <div class="panel-heading">Sign Up</div>
                    <div class="panel-body">
                    <label>Email ID:</label>
                     <input type="email" placeholder="Enter mail in @ format" name="txtemail" class="form-control" />
                     </div>
                     <div class="panel-body">
                     <label>Name:</label>
                     <input type="text" name="txtname" placeholder="Enter password" class="form-control" />
                     </div>
                     <div class="panel-body">
                     <label>Password:</label>
                     <input type="password" name="txtpass" placeholder="Enter password" class="form-control" />
                     </div>
                     <div class="panel-body">
                     <label>Confirm Password:</label>
                     <input type="password" name="txtpass1" placeholder="Enter password" class="form-control" />
                     </div>
                     <div class="panel-body">
                     <label>Mobile No.:</label>
                     <input type="number" name="txtmno" placeholder="Enter password" class="form-control" />
                     </div>
                     <div class="panel-body">
                     <label>City:</label>
                     <select name="txtcity" class="a">
					<?php
						include 'databaseclass.php';
						$obj=new databaseclass();
						$res=$obj->getdata("select * from city_tbl");
						while($row=mysql_fetch_array($res,MYSQL_ASSOC))
						{
						?>
						<option value="<?php echo $row["name"]?>"><?php echo $row["name"] ?></option>
			
		
						<?php
						}
					?>
					 </select>
                     </div>
                      <div class="panel-body">
                      <label>Gender:</label><br>
                     	<input  type="radio" value="male" name="txtgen" checked>Male 
						<input type="radio" value="female" name="txtgen">Female 
                     </div>
               </div>
            
			   <center>
          <p style="color:red">
		 
		  </p></center>
            <input type="submit" name="btnsubmit" value="Get Me In!" class="form-control btn btn-success" />
        </div>
            </div>
    </form>
        </div>
</body>
</html>
