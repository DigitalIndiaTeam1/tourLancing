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
       <nav>
       <?php if(isset($_SESSION["name"]))
       		{;?>
        <ul>
          
          <li><a href="update.php">update</a></li>
         
          
           <li><a href="logout.php">Logout</a></li>
           <li><a href="tg_setaval.php">Work as tourLancer</a></li>
            <li><a href="set_aval.php">Find tourGuides</a></li>
        </ul>
        </nav>
        <?php } 
        else {?>
        <nav>
        <ul>
        <li class="current"><a href="index.php">HOME</a></li>
        <li><a href="register.html">register</a></li>
        <li><a href="login.html">Login</a></li>
         <li><a href="set_aval.php">Find tourGuides</a></li></ul>
        
        </nav>
          <?php }?>
        
        
     </div>
    </header>

     <section id="showcase" >
      <div class="container" >
        <h1><i> travel with ease</i></h1>
        <p>your travel,our responsibility</p>
        </div>
    </section>

    <section id="newsletter">
      <div class="container">
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
    