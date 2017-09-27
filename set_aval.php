<!DOCTYPE html>
		    		<html>
		    		<head>
		    		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Availibility</title>
		    		<link rel="stylesheet" href="./style.css"></link>
		    		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
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
          <a class="js-scroll-trigger" href="tourLancer.php">
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
          <a class="js-scroll-trigger" href="tourlancer.php">Find Guides</a>
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
<?php
$uid;$nm;$id1;
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['button']))
	{
		echo $_POST['button'];
		session_id("prof");
		session_start();
		$_SESSION["idd"]=$_POST['button'];
		$uid=$_SESSION["idd"];
		$sql= "SELECT * FROM register WHERE UserId='$uid'";
		$result1=mysqli_query($con, $sql);
		// output data of each row
		while($row1 = mysqli_fetch_assoc($result1)) {
			$nm=$row1["Name"];
		}
		$_SESSION["name1"]=$nm;
		header('Location: prof2.php');
		
		
		
	}
}
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
		    $sql_dateChecker= "SELECT * FROM aval ";
		    $result=mysqli_query($con, $sql_dateChecker);
		    while($row1=mysqli_fetch_assoc($result))
		    {
		    	$df_tg=$row1['date_from'];
		    	$dt_tg=$row1['date_to'];
		    	$loc=$row1['loc'];
		    	$uid=$row1['UserId'];
		    	if($loc==$loc_user)
		    	{  
		    		$start_time_user= strtotime($df);
		    	$end_time_user= strtotime($dt);
		    	$start_time_guide= strtotime($df_tg);
		    	$end_time_guide= strtotime($dt_tg);
		    	
		    	
		    	if(($start_time_user >= $start_time_guide) && ($end_time_user <= $end_time_guide))
		    	{
		    		?>
		    		

		    		<div class="w3-card-2 w3-margin">
     		<?php
		    		$sql= "SELECT * FROM register WHERE UserId='$uid'";
		    		$result1=mysqli_query($con, $sql);
		    		// output data of each row
		    		while($row = mysqli_fetch_assoc($result1)) {
		    			$nm=$row["Name"];
		    			?>
		<form method="post">
		<ul class="w3-ul w3-hoverable w3-white">
            <li class="w3-padding-16">
             <span class="w3-large">
              <span><?php echo "Name:    ".$row["Name"]; ?> </span><br>
              <span><?php echo "Contact:    ".$row["contact"];?></span><br>
						  <span><?php echo "Address:    ".$row["Address"];?></span>
						  
						   <?php $id1=$row["UserId"]; ?>
						   </span>
						   <br>
						  <button type="submit" name="button" value="<?php echo $id1?>">Visit</button>
						 </li>
						 
       </ul>
            </form>
             <?php }
             ?>
             </div>
		    	<?php }
		    	}
	   	
		    }
			}
	}
?>
	  
  
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



