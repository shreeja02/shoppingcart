<?php
	
	if(isset($_POST["btnsubmit"]))
	{
		/*include '../databaseclass.php';
		$res=new databaseclass();
		$ans=$res->getdata("select cat_id from cat_tbl where cat_name='$catname'");
		while($row=mysql_fetch_array($ans,MYSQL_ASSOC))
		{
			catid=$row['cat_id'];
		}*/
		
		$proname=$_POST["txtname"];
		$proprice=$_POST["txtprice"];
		$prodesc=$_POST["txtdesc"];
		$promfg=$_POST["txtmfg"];
		$prosoh=$_POST["txtsoh"];
		$prowarr=$_POST["txtwarranty"];
		$proclr=$_POST["txtclr"];
		$catid=$_POST["txtcat"];
		$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
/*if ($_FILES["txtphoto"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["txtphoto"]["name"]). " has been uploaded.";
		$con=mysql_connect('localhost','root','');
		mysql_select_db('shoppingcart',$con);
		$res=mysql_query("insert into pro_tbl values('null','$proname','$proprice','$prodesc','$promfg','$prosoh','$target_file','$prowarr','$proclr','$catid')",$con);
	header('location:productdetail.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>