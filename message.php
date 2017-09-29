<!DOCTYPE html>
		    		<html>
		    		<head>
		    		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
		    		<link rel="stylesheet" href="./style.css"></link>
		    		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<title>Notifications</title>
<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<!-- Custom CSS -->
<link href="stylish-portfolio.css" rel="stylesheet">
<link rel="stylesheet" href="log.css">
<script src="jquery-3.2.1.min.js">
</script>



	
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
<a class="js-scroll-trigger">  <?php
$stat=0; 
session_id("log");
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
    <div class="w3-card-2 w3-margin">
    <?php 
   $stat; $us;
    $avid;
    $not=$_SESSION["uid"];
    $servername="localhost";
    $username="root";
    $password="";
    $database="tour";
    $con=mysqli_connect($servername,$username,$password,$database);
    $sql="SELECT * FROM (SELECT * FROM messages ORDER BY time DESC )messages WHERE guideId='$not' ";
    $result=mysqli_query($con, $sql);
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    if(isset($_POST['confirm']))
    {   
    	
    	 $id=$_POST['confirm'];
    	 $sql6="SELECT * FROM messages WHERE id='$id' ";
    	 $result3=mysqli_query($con, $sql6);
         $msg=" has accepted your request. Have a nice journey";
         $gui=$_SESSION["name"];
         $today = date("F j, Y, g:i a");
         while($row4 = mysqli_fetch_assoc($result3)) { $us= $row4["Name"];}
    	$sql="INSERT INTO booked
    	( guideId, Message, userId, date, status, id)
    	VALUES( '$gui', '$msg','$us','$today', '1', '$id')";
			mysqli_query($con, $sql);
			
			$sq="UPDATE messages SET status='1' WHERE id='$id'";
			mysqli_query($con, $sq);
			}
			if(isset($_POST['cancel']))
			{   $id=$_POST['cancel'];
				$s="DELETE FROM messages WHERE id='$id'";
				mysqli_query($con, $s);
				
			}
    }
			
    
    $sql1="SELECT * FROM (SELECT * FROM booked ORDER BY date DESC )booked WHERE userId='$not' ";
    $result1=mysqli_query($con, $sql1);
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {?>
    	<form method="post">
		<ul class="w3-ul w3-hoverable w3-white">
            <li class="w3-padding-16">
             <span class="w3-large">
              <span><?php echo $row["Message"]."AVAILIBILITY ID: ".$row["id"];?> </span>
              <span class="w3-padding-large w3-right"><?php echo $row["time"];?> </span>
              </span>
              <span id="text" class="w3-padding-large w3-right"></span>
            <?php $n1=$row["id"];
            $sql_="SELECT * FROM messages WHERE id='$n1' ";
            $result_=mysqli_query($con, $sql_);
            while($_row_ = mysqli_fetch_assoc($result_)) { $stat= $_row_["status"];}
            if($stat!=1){
              ?>
               <button type="submit" name="confirm" value="<?php echo $row['id'];?>" id="confirm" >Confirm him</button>
              <button type="submit" name="cancel" value="<?php echo $row['id'];?>" id="cancel">Cancel</button>
              <?php }
              else {
              ?> <button disabled="disabled">Booked</button><?php }?>
              </li>
              
              </ul>
              </form>
    <?php }
    
    while($row1 = mysqli_fetch_assoc($result1)) {?>
    	<form method="post">
		<ul class="w3-ul w3-hoverable w3-white">
            <li class="w3-padding-16">
             <span class="w3-large">
              <span><?php echo $row1["guideId"].$row1["Message"];?> </span>
              <span class="w3-padding-large w3-right"><?php echo $row1["date"];?> </span>
              </span>
              
              </li>
              
              </ul>
              </form>
    <?php }
    ?>
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
    
    