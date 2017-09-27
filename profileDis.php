<?php
$row="";$flag=0;
session_start();
$id1=$_SESSION["idd"];
if(isset($_POST['submit'])==false)
{
$servername="localhost";
$username="root";
$password="";
$database="tour";
$con=mysqli_connect($servername,$username,$password,$database);

$sql1= "SELECT * FROM register WHERE UserId='$id1'";
$sql2= "SELECT * FROM cust_rev WHERE UserId='$id1'";
$sql3= "SELECT * FROM ratings WHERE UserId='$id1'";
$sql4= "SELECT * FROM aval WHERE UserId='$id1'";

$result1=mysqli_query($con, $sql1);
$result2=mysqli_query($con, $sql2);
$result3=mysqli_query($con, $sql3);
$result4=mysqli_query($con, $sql4);?>
                    <section id="main">
		    		<div class="container">
		    		<article id="main-col">
		    		<?php 
echo "<b>Personal Info<b>";
echo"<br>";
while($row1 = mysqli_fetch_assoc($result1)) {
	?> <ul id="services">
	<li>
	
	<p><?php echo "Name:    ".$row1["Name"]; $_SESSION["Nm"]=$row1["Name"];?></p></li>
    <li><p><?php echo "Contact:    ".$row1["contact"];?></p></li>
	<li><p><?php echo "Address:    ".$row1["Address"];?></p></li>
    <li><p><?php echo "Date of Birth:    ".$row1["Dob"];?></p>
</li>
<li><p><?php echo "Gender:    ".$row1["Gender"];?></p>
</li>
<li><p><?php echo "City:    ".$row1["City"];?></p>
</li>
<li><p><?php echo "State:    ".$row1["State"];?></p>
</li>
       </ul><?php 
}?>
</article>
   </div>
 </section>
<?php 
echo"<br>";
echo"<br>";
echo"<br>";
?> 
                    <section id="main">
		    		<div class="container">
		    		<article id="main-col"><?php 
echo "Availabilities";
while($row4 = mysqli_fetch_assoc($result4)) {
	?>
	<ul id="services">
	<li><p><?php echo "Location:  ".$row4["loc"];?></p></li>
	
	<li><p><?php echo "Amount : ".$row4["fee"];?></p></li>
	
	<li><p><?php echo "Resume : ".$row4["resume"];?></p></li>
	
	<p><?php echo "----------------------------------"?></p>
	 </ul><?php }?>
	 
	 </article>
	 </div>
	 </section>
<?php 
echo "<br>";
echo "<br>";
echo "<br>";

?>
                    <section id="main">
		    		<div class="container">
		    		<article id="main-col"><?php 
echo "Reviews";
while($row2 = mysqli_fetch_assoc($result2)) {
	?>
	
	<ul id="services">
	<li><p><?php echo $row2["Cust_id"];echo "::  ::  ::";echo $row2["review"];?></p></li>
	
</ul><?php }?>
	 
	 </article>
	 </div>
	 </section>
<?php 
echo"<br>";
echo"<br>";
echo"<br>";
	

while($row3 = mysqli_fetch_assoc($result3)) {
	
	echo "SCORE  ".$row3["points"];
	echo "<br>";
	echo"<br>";
	echo"<br>";
	echo"<br>";
	echo "BADGE GAINED:::::::::::::;".$row3["badge"];
	echo "<br>";
}

}
?>

<!DOCTYPE html>
<head>
<meta http-equiv="refresh" content="60"></head>
<html>
<body>
<a href="pro.php">Rate him</a>
</body>
</html>