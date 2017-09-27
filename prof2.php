<?php
session_id("prof");
session_start();
$badge="";
$n;
$servername="localhost";
$username="root";
$password="";
$database="tour";
$con=mysqli_connect($servername,$username,$password,$database);

$uid=$_SESSION["idd"];
$sql_reg= "SELECT * FROM register WHERE UserId='$uid'";
$result_reg=mysqli_query($con, $sql_reg);

$sql_aval= "SELECT * FROM aval WHERE UserId='$uid'";
$result_aval=mysqli_query($con, $sql_aval);
$sql_rat= "SELECT * FROM ratings WHERE UserId='$uid'";
$result_rat=mysqli_query($con, $sql_rat);
$sql_cust= "SELECT * FROM cust_rev WHERE UserId='$uid'";
$result_cust=mysqli_query($con, $sql_cust);


while( $rowb=mysqli_fetch_assoc($result_rat))
	$badge=$rowb["points"];
	?>
<!DOCTYPE html>
<html>
<title>Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<!-- Bootstrap Core CSS -->
 <style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">


<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>Profile</b></h1>
  <p><span class="w3-tag">tourLancer</span></p>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <?php  while($row12 = mysqli_fetch_assoc($result_reg)) {
	?>
  <div class="w3-card-4 w3-margin w3-white">
     <?php
  	echo "<img  src = '".$row12['Image']."' width=100%/>";
  ?>
    <div class="w3-container ">
      <h3><b><u>About</u></b></h3>
      
       <h4 >User ID <span class="w3-opacity"><?php echo $row12["UserId"];?></span></h4>
    <h4 >Name <span class="w3-opacity"><?php echo $row12["Name"]; ?></span></h4>
	<h4 >Phone No <span class="w3-opacity"><?php echo $row12["contact"];?></span></h4>
    <h4 >Address <span class="w3-opacity"><?php echo $row12["Address"].", ". $row12["City"].", ". $row12["State"];?></span></h4>
    <h4 >Birthday <span class="w3-opacity"><?php echo $row12["Dob"];?></span></h4>
    <h4 >Gender <span class="w3-opacity"><?php echo $row12["Gender"];?></span></h4>
    </div>
   

    <div class="w3-container">
      <h4 > <span class="w3-opacity"><?php echo $row12["About"];?></span></h4>
     
      <?php }?>
       
    </div>
  </div>
  <hr>

  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
 
    <div class="w3-container">
    <h3><b>Reviews</b></h3>
    <?php  while($row22 = mysqli_fetch_assoc($result_cust)) {
	?>
      
     <h4 > <?php echo $row22["Cust_id"].":"?><span class="w3-opacity"><?php echo $row22["review"];?></span></h4>
   <?php }?> </div>

    
  </div>
<!-- END BLOG ENTRIES -->

</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card-2 w3-margin w3-margin-top">
  
  
    <div class="w3-container w3-white">
      <h4 class="w3-opacity"><b>League
      	</b></h4>
      <?php if($badge<10)echo "<img  src = 'image/bronze.png' height=80px; width=80px/>"."Bronze League";
      else if(($badge>=10) && ($badge<=30)) echo "<img  src = 'image/silver.jpg' height=80px; width=80px/>"."Silver League";
      else if(($badge>=31) && ($badge<=40)) echo "<img  src = 'image/crystal.jpg' height=80px; width=80px/>"."Cystal League";
      else if(($badge>=41) && ($badge<=50)) echo "<img  src = 'image/champion.jpg' height=80px; width=80px/>"."Champion League";;?>
      
    </div>
  </div>
  <hr>
  
  <!-- Posts -->
  <div class="w3-card-2 w3-margin">
    <div class="w3-container w3-padding">
      <h4>Availibity</h4>
    </div>
    <?php 
while($row3 = mysqli_fetch_assoc($result_aval)) {
	?>
    <ul class="w3-ul w3-hoverable w3-white">
      
      <li class="w3-padding-16">
        
        <span class="w3-large">
  <span  ><?php echo "Place:    ".$row3["loc"];?></span><br>
	<span  ><?php echo "From:    ".$row3["date_from"]." To  ".$row3["date_to"];?></span><br>
    <span  ><?php echo "Charge:    INR ".$row3["fee"];?></span><br>
    <span  ><?php echo "Experience:    ".$row3["resume"];?></span><br>
        </span>
      </li> 
      
    </ul>
    <?php }?>
  </div>
  <hr> 
 
  <!-- Labels / tags -->
  
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<div class="w3-col m4 w3-hide-small">
         <a href="tourlancer.php" class="w3-padding-large w3-right">Go back</a>
          <a href="notify.php" class="w3-padding-large w3-right">Request him</a>
          <a href="pro.php" class="w3-padding-large w3-right">Rate Me</a>
        </div>


   
   

</body>
</html>
