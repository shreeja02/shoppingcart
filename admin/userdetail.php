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
    <link href="../Content/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jquery.dataTables_themeroller.css" rel="stylesheet">
    <link href="../css/endless.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
   
   
    <script src="../js/jquery-1.10.2.min.js"></script>
  <script src="../Scripts/bootstrap.min.js"></script>
  <script src='../js/jquery.dataTables.min.js'></script>

    <script>
        $(function () {
            $('#dataTable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            });

            $('#chk-all').click(function () {
                if ($(this).is(':checked')) {
                    $('#responsiveTable').find('.chk-row').each(function () {
                        $(this).prop('checked', true);
                        $(this).parent().parent().parent().addClass('selected');
                    });
                }
                else {
                    $('#responsiveTable').find('.chk-row').each(function () {
                        $(this).prop('checked', false);
                        $(this).parent().parent().parent().removeClass('selected');
                    });
                }
            });
        });
    </script>
    <title></title>
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
        <li><a href="productdetail.php">Product</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catagory <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="catupdate1.php">Catagory Update</a></li>
            <li><a href="catdelete1.php">Catagory Delete</a></li>
          </ul>
        </li>
           <li class="active"><a href="userdetail.php">User</a></li>
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
    <form method="post" action="userdetail.php" enctype="multipart/form-data">
<center>
<h1>List Of Users</h1>
</center>
<p>
<div class="container">
<a class=" btn btn-success" href="usercreate.php">+</a>

<br>
<br>
<div>
<table class="table table-striped" id="dataTable"> 

<thead>
	<tr>
  <!--<th><input type="checkbox" name="chkhead"></th>-->
  
		<th>Email Id</th>
		<th>User Name</th>
		<th>Mobile No.</th>
		<th>City</th>
		<th>Gender</th>
		<th>Action</th>
	</tr>
  </thead>
  <tbody>
	<?php
	include '../databaseclass.php';
	$res=new databaseclass();
	$ans=$res->getdata("select * from user_tbl");
	while($row=mysql_fetch_array($ans,MYSQL_ASSOC))
	{
   //echo '<tr><td><input type="checkbox" name="chk[]">';
    echo '<tr>';
		echo "<td>".$row['email_id']."</td>";
		echo " <td>".$row['uname']."</td>";
		echo " <td>".$row['mobile']."</td>";
		echo " <td>".$row['city']."</td>";
		echo " <td>".$row['gender']."</td>";
		echo "<td>
					
			<a href='userdelete.php?id=".$row['email_id']."'><input class='btn btn-danger' type='button' value='Delete' name='btndel'/></a> </td></tr>";
	}
	
?>
</tbody>
	</table>
  </div>
  <br>
   <input type="submit" name="delall" value="DeleteAll" class="btn btn-danger"/>
  </div>
</body>
</html>


	
