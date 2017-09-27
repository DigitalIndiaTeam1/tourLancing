<?php
session_id("log");
session_start();?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>tour Lancer</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="stylish-portfolio.css" rel="stylesheet">

  </head>

  
    <!-- Navigation -->
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
         <li>
          <a class="js-scroll-trigger" href="message.php">Notifications</a>
          
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
          <a class="js-scroll-trigger" href="#callout">Find Guides</a>
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

    <!-- Header -->
    <header class="header" id="top" >
      <div class="text-vertical-center" >
        <h1>tour Lancer</h1>
        <h3>travel with ease</h3>
        <br>
        <a href="#about" class="btn btn-dark btn-lg js-scroll-trigger">Start Exploring</a>
        <br>
        <br>
        <?php if(isset($_SESSION["uid"])){?><a href="prof.php" class="btn btn-dark btn-lg js-scroll-trigger">Go to Profile</a>
     <?php }?></div>
    </header>

    <!-- About -->
    <section id="about" class="about" >
      <div class="container text-center">
        <h2>Love travelling? you travel, our responsibility!</h2>
        <p class="lead">Book tour Guides/Work as tour guides at a single Go. Now!
          <a target="_blank" href="http://join.deathtothestockphoto.com/">...</a>.</p>
      </div>
      <!-- /.container -->
    </section>

    <!-- Services -->
    <section id="services" class="services bg-primary text-white">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-10 mx-auto">
            <h2>Services</h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="service-item">
                  <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                  </span>
                  <h4>
                    <strong>TourLancing</strong>
                  </h4>
                  <p>We Provide a platform for people all over India, who want to serve as a tourGuide in their free time. 
                  tourLancer makes travelling easy, by connecting tourists with Guides in a fashionable way.
                  Just Apply as a Guide and get Going! </p>
                  <a href="#home" class="btn btn-light">Explore</a>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="service-item">
                  <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-compass fa-stack-1x text-primary"></i>
                  </span>
                  <h4>
                    <strong>Review Guides</strong>
                  </h4>
                  <p>
                  We have a built-in system, where the tourists review and rate the tourGuides.
                  Tourists share their experience with us, and make people more aware of the best tourGuides in the country.
                  A tough competition for the Guides, I guess!</p>
                  <a href="#" class="btn btn-light">Rate us</a>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="service-item">
                  <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-flask fa-stack-1x text-primary"></i>
                  </span>
                  <h4>
                    <strong>Get Certified</strong>
                  </h4>
                  <p>Want more tourists? Here, we have the certification system, enabling you to get Certified
                  as a Professional tourGuide, and increase your reputation.
                  Just appear for the test, and get promoted. 
                  This helps you attract tourists toward you.</p>
                  <a href="#" class="btn btn-light">get Certified</a>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="service-item">
                  <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-shield fa-stack-1x text-primary"></i>
                  </span>
                  <h4>
                    <strong>Subscriptions</strong>
                  </h4>
                  <p> Go get your Premium Account for your better Profile.
                  Remember, tourits only prefer Guides with full-proof identity and a Verified one. 
                  Get, tourLancer verified and give a head start to your earnings.</p>
                  <a href="#" class="btn btn-light">Learn More</a>
                </div>
              </div>
            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

    <!-- Callout -->
    <aside class="callout" id="callout">
      <div class="text-vertical-center">
     <aside id="sidebar">
          <div class="dark"  >
            <h1>Search Tour Guides</h1>
            <form class="quote" action="set_aval.php" method="post">
  						<div >
  							<label style="font-size: 20px">Tour Start Date</label><br>
  							<input type="date" placeholder="date_from" name="date_from" >
  						</div>
  						<div>
  							<label style="font-size: 20px">Tour End Date</label><br>
  							<input type="date" placeholder="date_to" name="date_to">
  						</div>
  						<br>
  						
  						<div>
  							<label style="font-size: 20px">Specify Location</label>
  							<select name="loc">
  							<option>kolkata</option>
  							<option>Mumbai</option>
  							<option>Delhi</option>
  							<option>Hyderabad</option>
  							<option>Chennai</option>
  							<option>Punjab</option>
  							<option>Rajasthan</option>
  							<option>Bangalore</option>
  							<option>Kerala</option>
  							<option>Tamil Nadu</option>
  							<option>Pune</option>
  							<option>Odissa</option>
  							<option>Amritsar</option>
  							<option>Kashmir</option>
  							
  							</select>
  						</div>
  						<br>
  						<button class="btn btn-lg btn-dark" type="submit"name="submit">Find !</button>
					</form>
          </div>
        </aside>
       </div>
    </aside>

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio" style="background-image: url('image/s.jpg')">
      <div class="container" >
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2>Our Work</h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-6">
                <div class="portfolio-item">
                  <a href="#">
                    <img class="img-portfolio img-fluid" src="image/up.jpg" style="opacity: 20%">
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="portfolio-item">
                  <a href="#">
                    <img class="img-portfolio img-fluid" src="image/kolkata.jpg">
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="portfolio-item">
                  <a href="#">
                    <img class="img-portfolio img-fluid" src="image/img1.jpg">
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="portfolio-item">
                  <a href="#">
                    <img class="img-portfolio img-fluid" src="image/img2.jpg">
                  </a>
                </div>
              </div>
            </div>
            <!-- /.row (nested) -->
            <a href="#" class="btn btn-dark">View More Items</a>
          </div>
          <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

   

    <!-- Map -->
    <section id="contact" class="map">
      <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
      <br/>
      <small>
        <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
      </small>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
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
      </a>
    </footer>

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
