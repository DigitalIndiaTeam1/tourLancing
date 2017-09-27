<?php

session_start();

if(isset($_SESSION["uid"]))
{
	$row;$res;
	$uid=$_SESSION["uid"];
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if(isset($_POST['submit']))
		{
			
			$servername="localhost";
			$username="root";
			$password="";
			$database="tour";
			
			$con=mysqli_connect($servername,$username,$password,$database);
			
			
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
			$target_file=$target_dir.basename($_FILES["image"]["name"]);
			$imageFileType= pathinfo($target_file,PATHINFO_EXTENSION);
			
			move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
			
			$uid=$_SESSION["uid"];
			
			
				$sql="UPDATE register
				set  Name='$name', Address='$address', Email='$email', contact='$contact', Dob='$dob', gender='$gender',
				Image='$target_file', City='$city', state='$state', Password='$pass'
				where Userid='$uid'";
				mysqli_query($con, $sql);
				mysqli_close($con);
				header('Location: index_new.php');
		}
	}
}
else 
{
	header('Location: login.html');
}


?>

<!DOCTYPE html>

<html>

<body>

		<h1><b>Update your account<b></h1>

		<form style="margin-top:150px;"  method="post"  enctype="multipart/form-data">
		
		<?php 
		
		$servername="localhost";
		$username="root";
		$password="";
		$database="tour";
		
		$con=mysqli_connect($servername,$username,$password,$database);
		$sql1="SELECT * FROM register
		where Userid='$uid'";
		$res=mysqli_query($con, $sql1);
		while($row= mysqli_fetch_assoc($res)) {?>
		
			<table border='2'>
			<tr>
				<td>User_ID</td>
				<td><input type="text" name="id" id="userid" disabled="disabled" value="<?php echo $_SESSION["uid"];?>" ></td>
				
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value ="<?php echo $row["Name"];?>"></td>
			</tr>

			<tr>
				<td>Address</td>
				<td><input type="text" name="address"  value ="<?php echo $row["Address"];;?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"  value ="<?php echo $row["Email"];?>"></td>
			</tr>
			<tr>
				<td>contact_No</td>
				<td><input type="text" name="contact"  value ="<?php echo $row["contact"];?>"></td>
			</tr>
			<tr>
				<td>Date_of_Birth</td>
				<td><input type="text" name="dob"  value ="<?php echo $row["Dob"];?>"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><input style="padding-right:20px;"type="radio" name="gender" value="male" checked="checked">Male
				<input type="radio" name="gender" value="female" >female
				</td>


			</tr>
			<tr>
				<td>City</td>
				<td><input type="text" name="city"  value ="<?php echo $row["City"];?>"></td>
			</tr>
			<tr>
				<td>State</td>
				<td><input type="text" name="state"  value ="<?php echo $row["State"];?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="pass"  value ="<?php echo $row["Password"];?>"></td>
			</tr>
					
						<tr>
				<td>Image</td>
				<td><input type="file" name="image" value ="<?php echo "<img  src = '".$row['Image']."' height=200px; width=300px/>";?>" ></td>
			</tr>
	</table>
	<?php } ?>
		<p><b><u>N.B-All Fields are mandatory</u></b><p>
		<td><input type="submit" name="submit" value="submit"></td>
		</form>
		
		<footer>
			<p> hackathon beta website &copy; 2017</p>

					<img src="./image/facebook.png">
					<img src="./image/instagram.png">
					<img src="./image/twitter.png">

		</footer>
	
</body>
</html>