<?php
session_id("log");
session_start();
if(isset($_SESSION["uid"]))
{
	$id_a=$_SESSION["uid"];
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
	     if(isset($_POST['submit']))
	     {
		
		$servername="localhost";
		$username="root";
		$password="";
		$database="tour";
		
		$con=mysqli_connect($servername,$username,$password,$database);
		$df=$_POST['date_from'];
		$dt=$_POST['date_to'];
		$loc_user=$_POST['loc'];
		$fee=$_POST['fee'];
		$resume=$_POST['resume'];
		
		$sql="INSERT INTO aval(UserId, loc, date_from, date_to, fee, resume)
		VALUES('$id_a', '$loc_user', '$df', '$dt', '$fee', '$resume')";
		if (mysqli_query($con, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	
	
	}
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="ISO-8859-1">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Availibility</title>
<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<!-- Custom CSS -->
<link href="stylish-portfolio.css" rel="stylesheet">
<link rel="stylesheet" href="log.css"></head>
<body>
<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle">
<i class="fa fa-bars"></i>
</a>
<nav id="sidebar-wrapper">
<ul class="sidebar-nav">
<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle">
<i class="fa fa-times"></i>
</a>
<li class="sidebar-brand">
<a class="js-scroll-trigger">  <?php

if(isset($_SESSION["uid"]))
{  $img=$_SESSION["image"];
?>
             <?php  echo "<img  src = '$img' height=50px; width=70px/>";?>
              </a></li>
              
              <li>
              <a class="js-scroll-trigger" style="color: white" >
          	<?php echo $_SESSION["name"];
          }
          else 
          {?>
          	</a></li>
          	<li>
          <a class="js-scroll-trigger" href="#top">
          tourLancer</a>
        </li>
        <?php }?>
        <li>
          <a class="js-scroll-trigger" href="tourLancer.php">Home</a>
        </li>
        <?php if(isset($_SESSION["uid"]))
        {?>
         <li>
          <a class="js-scroll-trigger" href="#">Update Account</a>
        </li>
         <li>
          <a class="js-scroll-trigger" href="prof.php">Open Profile</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="tg_setaval.php"> Availability</a>
        </li>
         <li>
          <a class="js-scroll-trigger" href="logout.php"> Logout</a>
        </li>
       <?php }
       else {?>
       <li>
          <a class="js-scroll-trigger" href="register.php">sign Up!</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="login.php">Login</a>
        </li>
       <?php } ?>
       <li>
          <a class="js-scroll-trigger" href="set_aval.php">Find Guides</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="#about">About</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="#services">Services</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="#portfolio">Portfolio</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="#contact" onclick=$( "#menu-close").click();>Contact</a>
        </li>
      </ul>
    </nav>
	


 <div class="login-page">
<h1 align="center">Set Availibility</h1>
<div class="form">
<form class="login-form" method="post">
     
      <input type="date" name="date_from" placeholder="Date from">
      <input type="date" name="date_to" placeholder="Date to">
      <input type="text" name="loc" placeholder="Enter Location">
      <input type="text" name="fee" placeholder="Fee">
      <input type="text" name="resume"  placeholder=resume maxlength="100" style="padding-bottom:30px">
      <h5>Tips of Writing Good Resume: </h5><br>
      <ul>
      
      <li>Mention your experience with various tour Guides.</li>
      <li>How Long a local?</li>
       <li>Flaunt your knowledge</li>
      </ul>
      
      <button type="submit" name="submit">Add</button>
     
    </form>
  </div>
  </div>


	<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.js"></script>
</body>
</html>
