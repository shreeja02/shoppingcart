<?php
  session_start();
  if(isset($_POST["btnpay"]))
  {
  	include '../databaseclass.php';
  	$obj=new databaseclass();
  	$res=$obj->getdata("update bill_tbl set flag='buy'");
  	header('location:index.php');
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
    <script type="text/javascript">
    	$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
    	$('#myTabs a[href="#profile"]').tab('show') // Select tab by name
$('#myTabs a:first').tab('show') // Select first tab
$('#myTabs a:last').tab('show') // Select last tab
$('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)
    </script>
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
            </ul>
        </div>
 </li>

 </div>
 
 </div>
 <div class="row">
 <div class="col-md-3">
     <!--<div class="list-group">
  <a href="#" class="list-group-item list-group-item-danger">
   Payment Modes
  </a>
  <a href="#" class="list-group-item">Cash On Delivery</a>
  <a href="#" class="list-group-item">Debit Card</a>
  <a href="#" class="list-group-item">Credit Card</a>
  <a href="#" class="list-group-item">Net banking</a>
 </div>
 </div>
 <div>-->

  <!-- Nav tabs -->
  <ul class="list-group">
  <a href="#" class="list-group-item list-group-item-danger">
   Payment Modes
  </a>
    <a href="#home" class="list-group-item" aria-controls="home" role="tab" data-toggle="tab">Cash On Delivery</a></li>
   <a href="#profile"  class="list-group-item" aria-controls="profile" role="tab" data-toggle="tab">Credit Card</a></li>
   <a href="#messages" class="list-group-item" aria-controls="messages" role="tab" data-toggle="tab">Net Banking</a></li>
    <a href="#settings" class="list-group-item" aria-controls="settings" role="tab" data-toggle="tab">Debit Card</a></li>
  </ul>
</div>
<form method="post" action="payment.php">
<div class="col-md-9">
<?php $amt=$_SESSION["amount"]; ?>
  <!-- Tab panes -->
  <div class="text-center" style="background-color:lightgray;height:35px;"><span style="font-size:25px; color: grey;">You Pay: <strong>Rs.<?php echo $amt;?>/-</strong></span></div>
  <div class="tab-content"><br>
    <div role="tabpanel" class="tab-pane active" id="home"><span style="font-size:25px;">Pay using Cash On Delivery</span>
    <hr style="
    margin-top: -1px;
">
    <center><button class="btn btn-default btn-lg" type="submit" name="btnpay" style="background-color
    :rgb(255,136,49); align:center;">Place Order</button></center><br>
    <center><small>By placing order, I have read and agreed to ShoppingKart.com <u>Terms of use</u>|<u>Terms of sale</u></small><br>
    <small>FreeCharge balance is issued by</small>
    <img src="yesbanklogo.jpg" style="height:35px;width:50px;">
    </center>
    </div>


    <div role="tabpanel" class="tab-pane" id="profile">
    	<span style="font-size:25px;">Pay using Credit Card</span>
    <hr style="
    margin-top: -1px;
">
	<table>
		<tr>
			<td>Card Number:&nbsp;&nbsp;&nbsp;
			<td><input type="text" class="form-control" placeholder="Card Number"/>
		</tr>
		<tr>
			<td>&nbsp;
			<td>&nbsp;
		</tr>
		<tr>
			<td>Expiry Date:
			<td>
			<div class="row">
			<div class="col-md-1">
			<select name="txtmonth" class="form-control" style="
    width: 72px;
">
			<option selected="MM">MM</option>
			<option>01</option>
			<option>02</option>
			<option>03</option>
			<option>04</option>
			<option>05</option>
			<option>06</option>
			<option>07</option>
			<option>08</option>
			<option>09</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			</select>
			</div>
			
				<div class="col-md-1 col-md-offset-3">
			<select name="txtyr" class="form-control" style="
    width: 72px;
">
			<option selected="MM">YY</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			<option>19</option>
			<option>20</option>
			</select>
			</div>
			</div>
			<td><span>CVV&nbsp;&nbsp;</span> 
			<td><input type="text" placeholder="CVV" class="form-control" style=" width: 72px;" name="txtcvv">
		</tr>
	</table>
	<br>
	<br>
	<div class="col-md-5">
	 <center><button class="btn btn-default btn-lg" type="submit" name="btnpay" style="background-color
    :rgb(255,136,49); align:center;">Make Payment</button></center><br>
    <center><small>By placing order, I have read and agreed to ShoppingKart.com <u>Terms of use</u>|<u>Terms of sale</u></small><br>
    <small>FreeCharge balance is issued by</small>
    <img src="yesbanklogo.jpg" style="height:35px;width:50px;">
    </center>
    </div>
    </div>



    <div role="tabpanel" class="tab-pane" id="messages">
    	
    	<span style="font-size:25px;">Pay using Net Banking</span>
    <hr style="
    margin-top: -1px;
">
	<table>
		<tr>
			<td>Select Bank :&nbsp;&nbsp;&nbsp;
			<td><input type="radio" name="a"/><img src="axis.png" style="height:40px;width:90px;">
			<input type="radio" name="a"/><img src="hdfc.png" style="height:40px;width:90px;">
			<input type="radio" name="a"/><img src="icici.jpg" style="height:40px;width:90px;">
		</tr>
		<tr>
			<td>&nbsp;
			<td>&nbsp;
		</tr>
		<tr>
			<td>Other Banks: &nbsp;&nbsp;
			<td>			
			<select name="txtbnk" class="form-control">
			<option selected="selected">Other Banks</option>
			<option>SBI</option>
			<option>BOB</option>
			<option>PNB</option>
			<option>HSBC</option>
			<option>BOI</option>
			<option>DENA BANK</option>
			
			</select>
			
			
				
			</div>
			
		</tr>
	</table>
	<br>
	<br>
	<div class="col-md-5">
	 <center><button class="btn btn-default btn-lg" type="submit" name="btnpay" style="background-color
    :rgb(255,136,49); align:center;">Make Payment</button></center><br>
    <center><small>By placing order, I have read and agreed to ShoppingKart.com <u>Terms of use</u>|<u>Terms of sale</u></small><br>
    <small>FreeCharge balance is issued by</small>
    <img src="yesbanklogo.jpg" style="height:35px;width:50px;">
    </center>
    </div>
    </div>




    <div role="tabpanel" class="tab-pane" id="settings">
    	
    	<span style="font-size:25px;">Pay using Credit Card</span>
    <hr style="
    margin-top: -1px;
">
	<table>
		<tr>
			<td>Card Number:&nbsp;&nbsp;&nbsp;
			<td><input type="text" class="form-control" placeholder="Card Number"/>
		</tr>
		<tr>
			<td>&nbsp;
			<td>&nbsp;
		</tr>
		<tr>
			<td>Expiry Date:
			<td>
			<div class="row">
			<div class="col-md-1">
			<select name="txtmonth" class="form-control" style="
    width: 72px;
">
			<option selected="MM">MM</option>
			<option>01</option>
			<option>02</option>
			<option>03</option>
			<option>04</option>
			<option>05</option>
			<option>06</option>
			<option>07</option>
			<option>08</option>
			<option>09</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			</select>
			</div>
			
				<div class="col-md-1 col-md-offset-3">
			<select name="txtyr" class="form-control" style="
    width: 72px;
">
			<option selected="MM">YY</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			<option>19</option>
			<option>20</option>
			</select>
			</div>
			</div>
			<td><span>CVV&nbsp;&nbsp;</span> 
			<td><input type="text" placeholder="CVV" class="form-control" style=" width: 72px;" name="txtcvv">
		</tr>
	</table>
	<br>
	<br>
	<div class="col-md-5">
	 <center><button class="btn btn-default btn-lg" type="submit" name="btnpay" style="background-color
    :rgb(255,136,49); align:center;">Make Payment</button></center><br>
    <center><small>By placing order, I have read and agreed to ShoppingKart.com <u>Terms of use</u>|<u>Terms of sale</u></small><br>
    <small>FreeCharge balance is issued by</small>
    <img src="yesbanklogo.jpg" style="height:35px;width:50px;">
    </center>
    </div>
    </div>


  </div>
</div>
</div>
</div>
</form>
 </body>
 </html>