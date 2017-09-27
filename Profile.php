<?php
session_start();
$row="";
$result="";
$ud=$_SESSION['avlid'];
if(!isset($_POST['button']))
{
		$servername="localhost";
		$username="root";
		$password="";
		$database="tour";
        $con=mysqli_connect($servername,$username,$password,$database);
		//$uid=$_POST['id'];
		$sql= "SELECT * FROM register WHERE UserId='$ud'";
		$result=mysqli_query($con, $sql);
		//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		
}
		
		
		if($_SERVER['REQUEST_METHOD']=='POST')
		{   
		if(isset($_POST['button']))
		{
			echo $_POST['button'];
			$_SESSION["idd"]=$_POST['button'];
			header('Location: profileDis.php');
			
			
			
		}
		}
		session_unset();	
		session_destroy();
	?>
	
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./style.css"></link>

</head>

<body>

<section id="main">
      <div class="container">
        <article id="main-col">
          
          
        </article>
<?php 
// output data of each row
	while($row = mysqli_fetch_assoc($result)) {
		?>
		<form method="post">
		<ul id="services">
            <li>
              <p><?php echo "Name:    ".$row["Name"];?></p>
              <p><?php echo "Contact:    ".$row["contact"];?></p>
						  <p><?php echo "Address:    ".$row["Address"];?></p>
						  <p><?php echo "Date of Birth:    ".$row["Dob"];?></p>
						   <?php $id1=$row["UserId"];
						   ?>
						  <button type="submit" name="button" value="<?php echo $id1?>">View Details</button>
						  
            </li>
           </ul>
            </form>
            
            
          
	    <?php } 
	    mysqli_close($con);
	   
    ?>
    
   
</div>
 
</section>

</body>
</html>