<?php
session_start();
$uid;
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width">
    <title>beta hackathon |Home</title>
        <link rel="stylesheet" href="./style.css">
  <body>
    <header>
    
    </head>
     <div class="container">
       <div id="branding">
      
          <h1><span class="highlight">
          tour</span> Lancer</h1>
          
       </div>
       
       <?php if(isset($_SESSION["name"]))
       		{
       			$uid=$_SESSION["uid"];?>
       			
       			<nav>
        <ul>
          
          <li><a href="update.php">update</a></li>
         
          
           <li><a href="logout.php">Logout</a></li>
           <li><a href="tg_setaval.php">Work as tourLancer</a></li>
            <li><a href="set_aval.php">Find tourGuides</a></li>
        </ul>
       </header>
        <?php } 
        else {?>
        
        <nav>
        <ul>
        <li class="current"><a href="index.php">HOME</a></li>
        <li><a href="register.html">register</a></li>
        <li><a href="login.html">Login</a></li>
         <li><a href="set_aval.php">Find tourGuides</a></li></ul>
       
        </header>
         <section id="showcase" >
      <div class="container" >
        <h1><i> travel with ease</i></h1>
        <p>your travel,our responsibility</p>
        </div>
    </section>
       
        
          <?php }?>
        
        
        
     </div>
     
    </header>
<?php  if(isset($_POST['image']))
{
	
	$servername="localhost";
	$username="root";
	$password="";
	$database="tour";
	
	$con=mysqli_connect($servername,$username,$password,$database);
	$target_dir="profilePic/";
	$target_file=$target_dir.basename($_FILES["image"]["name"]);
	$imageFileType= pathinfo($target_file,PATHINFO_EXTENSION);
	
	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
	
	$uid=$_SESSION["uid"];
	$sql="UPDATE register
	set 
	Image='$target_file'
	where Userid='$uid'";
	mysqli_query($con, $sql);
	mysqli_close($con);
	header('Location: index_new.php');
}
     
       
         if(isset($_SESSION["name"]))
        		{
        			$servername="localhost";
        			$username="root";
        			$password="";
        			$database="tour";
        			$con=mysqli_connect($servername,$username,$password,$database);
        			
        			$sql1= "SELECT * FROM register WHERE UserId='$uid'";
        			$result3=$result1=mysqli_query($con, $sql1);
        			$sql2= "SELECT * FROM aval WHERE UserId='$uid'";
        			$result2=mysqli_query($con, $sql2);
        			$sql3= "SELECT * FROM ratings WHERE UserId='$uid'";
        			$result3=mysqli_query($con, $sql3);
        			$sql4= "SELECT * FROM cust_rev WHERE UserId='$uid'";
        			$result4=mysqli_query($con, $sql4);
        			?>
                    <section id="newsletter">
      <div class="container">
        <h1>contact us</h1>
        <form>
          <input type="email" placeholder="Enter Email...">
          <button type="submit" class="button_1">login</button>
        </form>
      </div>
    </section>
		    		<div class="container" >
		    		
		    		<?php 
		    		while( $row4=mysqli_fetch_assoc($result3))
		    			$badge=$row4["points"];
 while($row1 = mysqli_fetch_assoc($result1)) {
	?>
	
	 <section ><?php echo "<img id='prof' src = '".$row1['Image']."' height=200px; width=300px/>";?>
	
	  <?php echo "<a href='update.php'> <img  src = 'image/edit.png' height=30px; width=30px/></a>";?>
	   </section>
	   
	<p id="name ">
	
	<?php echo "".$row1["Name"];  ?></p>
<?php if($badge<10)echo "<img  src = 'image/bronze.png' height=80px; width=80px/>";
else if(($badge>=20) && ($badge<=30)) echo "<img  src = 'image/silver.jpg' height=80px; width=80px/>";?>




	
	<section style=" background: linear-gradient(white,transparent);overflow: hidden; height: 400px; width:250px; position:relative; bottom: 400px; left: 400px; padding-left: 5px; ">
	<h1 style="color: black">About</h1>
	
	
	
    <p id="name" ><?php echo "Contact:    ".$row1["contact"];?></p>
	<p id="name" ><?php echo "Address:    ".$row1["Address"];?></p>
    <p id="name" ><?php echo "Date of Birth:    ".$row1["Dob"];?></p>
    <p id="name" ><?php echo "Gender:    ".$row1["Gender"];?></p>
    <p id="name" ><?php echo "City:    ".$row1["City"];?></p>
    <p id="name" ><?php echo "State:    ".$row1["State"];?></p>
    </section>
       
       <?php 
}
?>
<section style=" background: linear-gradient(white,transparent);overflow: auto; height: 400px; width:300px; position:relative; bottom:800px; left: 700px; padding-left: 5px; ">
	<h1 style="color: black">Availability</h1>
<?php 
while($row2 = mysqli_fetch_assoc($result2)) {
	?>
  <p id="name" ><?php echo "Place:    ".$row2["loc"];?></p>
	<p id="name" ><?php echo "From:    ".$row2["date_from"]; echo " To  ".$row2["date_to"];?></p>
    <p id="name" ><?php echo "Charge:    INR ".$row2["fee"];?></p>
    <p id="name" ><?php echo "Experience:    ".$row2["resume"];?></p>
   
    <?php echo "- - - - - - - - - - - -  - - - - - - - - - - - - - ";
        		}
        		}
?>
       </section>
      </div>
      		
    

    <section id="newsletter">
      <div class="container" >
        <h1> rate us</h1>
        <form>
          <input type="email" placeholder="Enter Location...">
          <button type="submit" class="button_1">search</button>
        </form>
    </section>


    <section id="boxes">
     <div class="container">
        <div class="box">
        <img src="./image/kolkata.jpg">
          <h3> Kolkata </h3>
          <p>Why India travel with us?</p>
        </div>
        <div class="box">
          <img src="./image/img2.jpg">
          <h3>TAJ MAHAL</h3>
          <p>MUGHAL ERA</p>
        </div>
        <div class="box">
          <img src="./image/kashmir.jpg">
          <h3>KASHMIR</h3>
          <p>WANNA VISIT?</p>
        </div>

     </div>
    </section>

    <footer>
      <p>Tourlancer &copy; 2017</p>

          <img src="./image/facebook.png">
          <img src="./image/instagram.png">
          <img src="./image/twitter.png">

    </footer>
  </body>
</html>
    