
<!DOCTYPE html>
<html>
<head>
    <link href="Content/bootstrap.css" rel="stylesheet" />
    <script src="Scripts/jquery-1.9.1.js"></script>
    <script src="Scripts/bootstrap.js"></script>
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
        <li><a href="catdetail.php">Catagory</a></li>
           <li><a href="userdetail.php">User</a></li>
           <li><a href="#">Bill</a></li>
       
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        </div>
    </div>
    <form method="post" action="catdetail.php" enctype="multipart/form-data">
<center>
<h1>List Of Catagory</h1>
</center>
<p>
<a href="catcreate.php">Insert new catagory</a>
<div class="container">
<table class="table table-stripped"> 


	<tr>
		<th>Catagory Id</th>
		<th>Catagory Name</th>
		<th>Action</th>
	</tr>
	<?php
	include '../databaseclass.php';
	$res=new databaseclass();
	$ans=$res->getdata("select * from cat_tbl");
	while($row=mysql_fetch_array($ans,MYSQL_ASSOC))
	{
		echo "<tr> <td>".$row['cat_id']."</td>";
		echo " <td>".$row['cat_name']."</td>";
		echo "<td>
				
	}
	echo $row["cat_id"];
	
?>
	</table>
  </div>
	</form >
</body>
</html>


	
