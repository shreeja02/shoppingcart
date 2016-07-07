<?php
  session_start();
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
              include'databaseclass.php';
              $obj=new databaseclass();
              $res=$obj->getdata("select * from pro_tbl");
              $cnt=mysql_num_rows($res);
     ?>
       
  <a href="#" class="list-group-item active">Filters</a>
    <a href="Index.php" class="list-group-item">All Products
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
              $catid=$_REQUEST["id"];
              $obj2=new databaseclass();
              $res2=$obj2->getdata("select * from pro_tbl where fk_cat_id='$catid'");
          while($row=mysql_fetch_assoc($res2))
		{
	echo	'	<div class="col-sm-9 col-md-4">';
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
</body>
</html>
