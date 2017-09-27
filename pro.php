<?php 
session_start();
$flag=0;
$flag1=0;
$point=0;
$rev="";
$badge="";
$point_fetch=0;
$point_badge="";
$phone="";
$stop=false;
$id1=$_SESSION["idd"];
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['submit']))
	{
		$servername="localhost";
		$username="root";
		$password="";
		$database="tour";
		
		
		$point=$_POST['rate'];
		$rev=$_POST['review'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		
		if(!isset($point) || trim($point) == '')
		{   $stop=true;
			echo "You did not fill out the required fields.";
		}
		
		if(!isset($rev) || trim($rev) == '')
		{   $stop=true;
		echo "You did not fill out the required fields.";
		}
		
		if(!isset($email) || trim($email) == '')
		{   $stop=true;
		echo "You did not fill out the required fields.";
		}
		
		if(!isset($contact) || trim($contact) == '')
		{   $stop=true;
		echo "You did not fill out the required fields.";
		}
		
		
		$con=mysqli_connect($servername,$username,$password,$database);
		$sql_check="SELECT * FROM ratings WHERE UserId='$id1'";
		$check1=mysqli_query($con, $sql_check);
		while($id_check1 = mysqli_fetch_assoc($check1))
		{
			if($id_check1['UserId']==$id1)
			{
				$flag1=1;
				break;
			}
		}
		
		$badge="New FreeLancer";
		
		$sql_check_id="SELECT * FROM cust_rev WHERE Cust_id='$email'";
		$check_id=mysqli_query($con, $sql_check_id);
		while($id_check1 = mysqli_fetch_assoc($check_id))
		{
			$phone=$id_check1['contact'];
		}
		
		$sql_verify="SELECT * FROM register";
		$ver=mysqli_query($con, $sql_verify);
		while($v=mysqli_fetch_assoc($ver))
		{
			if(($v['contact']==$contact) || ($v['Email']==$email))
				$stop=true;
		}
		
		
		if(($flag1==1) && ($stop==false))
		{
			$sql_poiUp="SELECT * FROM ratings WHERE UserId='$id1'";
			$res=mysqli_query($con, $sql_poiUp);
			while($row_upd = mysqli_fetch_assoc($res)) {
				$point_fetch=$row_upd['points'];
				$badge_fetch=$row_upd['badge'];
			}
			
			
			$points=$point_fetch+$point;
			
			if($points>5)
				$badge="Bronze";
				elseif($points>15)
				$badge="Silver";
				
				
				$sql_rev= "INSERT into cust_rev(UserId,review,cust_id,contact) VALUES('$id1','$rev','$email','$contact')";
				$sql_poi="UPDATE ratings SET points='$points', badge='$badge' WHERE UserId='$id1'";
				mysqli_query($con, $sql_rev);
				mysqli_query($con, $sql_poi);
				
				
				
				
		}
		
		
		else if ($stop==false){
			$servername="localhost";
			$username="root";
			$password="";
			$database="tour";
			$con=mysqli_connect($servername,$username,$password,$database);
			
			$sql_rev= "INSERT into cust_rev(UserId,review,cust_id,contact) VALUES('$id1','$rev','$email','$contact')";
			$sql_poi= "INSERT into ratings(UserId,points,badge) VALUES('$id1','$point','$badge')";
			mysqli_query($con, $sql_rev);
			mysqli_query($con, $sql_poi);
			
			
			
		}
		
		
	}
	
}
$flag=0;$flag1=0;



?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width">
    
   <meta charset="ISO-8859-1">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" href="log.css">
<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

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
<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle">
<i class="fa fa-bars"></i>
</a>
 <nav id="sidebar-wrapper">
<ul class="sidebar-nav">
<a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle">
<i class="fa fa-times"></i>
</a>
<li class="sidebar-brand">
<a class="js-scroll-trigger"> 
<?php

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
          <a class="js-scroll-trigger" href="#top">Home</a>
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
    <h1 align="center">Rate me</h1>
     <div class="login-page">
  <div class="form">
<form method="post" class="login-form" >

<table >
<tr>
<td>UserId</td>
<td>
<input type="text" name="id" value="<?php echo $_SESSION["idd"];?>" disabled="disabled">
</td>
</tr>

<tr>
<td>Rate</td>
<td><input type="number" name="rate" >
</td>
</tr>
<tr><td>Short Review</td>
<td><input type="text" name="review" ></td></tr>
<tr>
<tr>
<td>Email</td>
<td><input type="email" name="email" >
</td>
</tr>
<tr>
<td>Contact</td>
<td><input type="number" name="contact" >
</td>
</tr>
<tr>
<td colspan="2" align="center">
<button type="submit" name="submit" onclick="myFunction()">Rate</button>

</td>
</tr>
</table>

</form>
<div id="snackbar">Rated Successfully!!</div>
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

