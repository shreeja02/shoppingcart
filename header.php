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
<script type="text/javascript">
  
   function userid_validation(uid,mx,my)
{
    var ul=uid.value.length;
        if(ul==0 || ul>=my || ul<mx)
    {
        alert("username should not be empty/length must be between "+mx+" to "+my);
        uid.focus();
        return false;
    }
    return true;
}

        function validate()
   {  
      var numbers = /^[0-9]+$/; 
      var x=document.myform.txtmno.value;
      if(x.length!=10)  
      {  
        alert('Please input 10 numeric characters only');  
        document.myform.txtmno.focus();  
        return false;  
      } 
      
         return true;  
      
      
   }  
</script>
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
        <li><a href="#" data-toggle="modal" data-target="#myModal1">Sign Up</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Log In <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <div class="container" style="width:260px;">
          <?php
              if(isset($_POST["txtans"])){
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
          <form action="" method="post">
            <li>Email ID:</li>
            <li><input type="email" class="form-control" name="txtemail"></li>
            <li>Password:</li>
            <li><input type="password" class="form-control" name="txtpassword"></li>
            <br>
            <li><input type="submit" value="Log In" class="btn btn-success form-control" name="txtans"></li>
            <a href="signup.php">Sign Up for free!</a>
            <p style="color:red;"><?php 
            if(isset($_POST["txtans"]))
              {
                if($count!=1){
                  echo "UserName Or Password is invalid!";
                }
              }
              ?></p>
              
            </form>
            </div>
          </ul>
        </li>
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        </div>


        <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:red;">Register Yourself Here!!! </h4>
      </div>
      <div class="modal-body">
      <form name="myform" method="post">
          <table>
              <tr>  
                  <td>Email:
                  <td><input type="email" required class="form-control" name="txtemail" placeholder="xyz@gmail.com">
                  <p><p>
              </tr>

              <tr>  
                  <td>Name:
                  <td><input type="text"  required  class="form-control" name="txtname"  placeholder="Enter Your Name">
                  <p><p>
              </tr>

              <tr>  
                  <td>Password:
                  <td><input type="password" required  class="form-control" name="txtpass"  placeholder="Enter Password"><p><p>
              </tr>
              <tr>  
                  <td>Confirm Password:
                  <td><input type="password"  required  class="form-control" name="txtemail" name="txtpass1"  placeholder="Re-enter Password"><p><p>
              </tr>
              <tr>  
                  <td>Mobileno:
                  <td><input type="number"  onblur="return validate();" required  class="form-control" name="txtmno"  placeholder="10 digit mobile no"><p><p>
              </tr>
               <tr>  
                  <td>City:
                  <td><select name="txtcity" class="form-control">
                  <option value="Ahmedabad">Ahmedabad</option>

           </select><p><p>
              </tr>
              <tr>  
                  <td>Gender:
                  <td><input type="radio" name="txtgen">Male
                  <input type="radio" name="txtgen">Female
                  <p><p>
              </tr>
                <tr>  
                  <td>Image:
                  <td><img style="height:80px;" src="captcha_code.php" class="form-control" >
              </tr>
                <tr>  
                  <td>Re-enter text:
                  <td><input type="text"  required  class="form-control" name="txtcode"  <p><p>
              </tr>
               <tr>  
                  <td>&nbsp;
                  <td><input type="submit" name="btnsubmit"  class="btn btn-success form-control" value="GetMeIn!">
              </tr>
          </table>
          </form>
        </div>
       </div>
    </div>
  </div>
</div>
