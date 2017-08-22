<?php
session_start();
if($_SERVER['REQUEST_METHOD']==$_POST)
{
	if(isset($_POST['login']))
	{
		$servername="localhost";
		$username="USER";
		$password="$sS17041998";
		$database="tour";
		
		$con=mysqli_connect($servername,$username,$password,$database);
		$pass=$_POST['pass'];
		$id=$_POST['id'];
		
		$sql="SELECT Password FROM Register WHERE UserId=$id";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		
		if($row['password']==$pass)
		{
			$_SESSION["name"]=$row["Name"];
			header('Location: website.html');
		}
		
	}
}
?>