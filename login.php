<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Login</title>
   <meta charset="ISO-8859-1">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="log.css">
<!-- Custom CSS -->
<link href="stylish-portfolio.css" rel="stylesheet">
<script type="text/javascript">
function myFunction() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar")

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}</script>


  </head>
  <body>
<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['login']))
	{
		$servername="localhost";
		$username="root";
		$password="";
		$database="tour";
		
		$con=mysqli_connect($servername,$username,$password,$database);
		$pass=$_POST['pass'];
		$id=$_POST['id'];
		
		$sql="SELECT * FROM register WHERE UserId='$id'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		if($row["Password"]==$pass)
		{   session_id("log");
		    session_start();
		    $_SESSION["image"]=$row["Image"];
		$_SESSION["name"]=$row["Name"];
		$_SESSION["uid"]=$row["UserId"];
		header('Location: tourLancer.php');
		}
		else 
		{
			?>
<div onload="myFunction()" id="snackbar">Invalid</div><?php 
		}
      }
	}

?>

   
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
session_start();
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
          <a class="js-scroll-trigger" href="#">Open Profile</a>
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
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="post">
      <input type="text" name="id" placeholder="username"/>
      <input type="password" name="pass"  placeholder="password"/>
      <button type="submit" name="login">login</button>
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>
   

    <footer> <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h4>
              <strong>tourLancer</strong>
            </h4>
            <p>Netaji Subhash engineering College
              <br>New garia, 700019</p>
            <ul class="list-unstyled">
              <li>
                <i class="fa fa-phone fa-fw"></i>
                (+91) 7044750098</li>
              <li>
                <i class="fa fa-envelope-o fa-fw"></i>
                <a href="mailto:name@example.com">soham17041998@gmail.com</a>
              </li>
            </ul>
            <br>
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook fa-fw fa-3x"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter fa-fw fa-3x"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble fa-fw fa-3x"></i>
                </a>
              </li>
            </ul>
            <hr class="small">
            <p class="text-muted">Copyright &copy; Your Website 2017</p>
          </div>
        </div>
      </div>
      <a id="to-top" href="#top" class="btn btn-dark btn-lg js-scroll-trigger">
        <i class="fa fa-chevron-up fa-fw fa-1x"></i>
      </a></footer>
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
