<?php
session_start();
if(isset($_SESSION["uid"]))
{
	$servername="localhost";
	$username="root";
	$password="";
	$database="tour";
	$con=mysqli_connect($servername,$username,$password,$database);
	
	$sql1= "SELECT * FROM register WHERE UserId='$uid'";
    $target_dir="profilePic/";
	$target_file=$target.dir . basename($_FILES["image"]["name"]);
	$imageFileType= pathinfo($target_file,PATHINFO_EXTENSION);
	
	move_uploaded_file($_FILES(["image"]["tmp_name"]), $target_dir);}
?>
<!DOCTYPE html>
<html>
<body>
<form style="margin-top:150px;"  method="post"  enctype="multipart/form-data">
</body>
</html>