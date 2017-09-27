<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['submit']))
	{
		$servername="localhost";
		$username="root";
		$password="";
		$database="tour";
		
		$con=mysqli_connect($servername,$username,$password,$database);
		
		if (!$con) {
			die("Connection failed: " . mysqli_connect_error());
		}
		echo "Connected successfully";
		$id=$_POST['id'];
		$name=$_POST['name'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$abu=$_POST['abu'];
		$lang = implode(",",$_POST["l"]);
		$ad=$_POST['adh'];
		$pan=$_POST['pan'];
		
		
		$pass=$_POST['pass'];
		
		$target_dir="profilePic/";
		$target_file=$target_dir.basename($_FILES["image"]["name"]);
		$imageFileType= pathinfo($target_file,PATHINFO_EXTENSION);
		
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
		
		
			$sql="INSERT INTO register(UserId, Name, Address, Email, contact, Dob, Gender, Image, City, state, Password, About, lang, adhn, pan)
			VALUES('$id', '$name', '$address', '$email', '$contact', '$dob', '$gender', '$target_file', '$city', '$state', '$pass', '$abu' ,'$lang', '$ad', '$pan')";
			if (mysqli_query($con, $sql)) {
				header('Location: login.php');
				
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
			
			
	}
}?>
