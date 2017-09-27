<!DOCTYPE html>
<html>
<head>

     <script type="text/javascript">
     function myFunction() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar")

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 6000);
    }</script>
    </head>

<?php

session_id("log");
session_start();

if(isset($_SESSION["uid"]))
{   $name=$_SESSION['uid'];
			session_write_close();
			$servername="localhost";
			$username="root";
			$password="";
			$database="tour";
			session_id("prof");
			session_start();
			 $gui=$_SESSION['idd'];
			 $today = date("F j, Y, g:i a");
			 $msg= " tried to book you as a tourLancer for his tour on. All the Best! Hope you perform your best to make tourists satisfied.";
			$con=mysqli_connect($servername,$username,$password,$database);
			$sql="INSERT INTO messages
            ( Name, Message, guideId, time)
			VALUES( '$name', '$msg','$gui','$today')";
			mysqli_query($con, $sql);?>
			
			<body>
			<div id="snackbar">You have sent him a request. Thank You!!</div>
			</body>
		<?php }
		else 
		{?>
  
    <body>
    <div id="snackbar">You are not Logged in!</div>
    </body>
    </html>
    
		<?php }
	
?>
