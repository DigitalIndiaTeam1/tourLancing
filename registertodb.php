<?php
if($_SERVER['REQUEST_METHOD']==$_POST)
{
	if(isset($_POST['submit']))
	{
		$servername="localhost";
		$username="USER";
		$password="$sS17041998";
		$database="tour";
		
		$con=mysqli_connect($servername,$username,$password,$database);
		$id=$_POST['id'];
		$name=$_POST['name'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$pass=$_POST['pass'];
		
		$target_dir="profilePic/";
		$target_file=$target.dir . basename($_FILES["image"]["name"]);
		$imageFileType= pathinfo($target_file,PATHINFO_EXTENSION);
		
		move_uploaded_file($_FILES(["image"]["tmp_name"]), $target_dir);
		
		if(mysqli_query($con, $sql))
			$sql="INSERT data into register(UserId, Name, Address, Email, contact, Dob, gender,Image, City, state, Password)
			VALUES($id, $name, $address, $email, $contact, $dob, $gender, $target_file, $city, $state, $pass)";
			mysqli_close($con);
	}
}?>
