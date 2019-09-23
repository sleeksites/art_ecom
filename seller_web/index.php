<?php 
    session_start(); 
    require 'db_info.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Art - Kart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container-fluid px-md-4 ">
        <a class="navbar-brand" href="index.php">Art-Kart</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <?php 

                if (isset($_SESSION['is_logged_in']) && ($_SESSION['is_logged_in'] == 1) )
                {
                    ?>
                        <li class="nav-item active" style="color: black;"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="admin" class="nav-link"><?php echo$_SESSION['logged_in_user']; ?></a></li>
                        <li class="nav-item cta mr-md-1"><a href="logout.php" class="nav-link">Log Out!</a></li>
                    <?php
                }
                else
                {
                    ?>
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item cta mr-md-1 mb-4"><a href="login" class="nav-link">Login</a></li>
                        <li class="nav-item cta cta-colored mb-4"><a href="signup" class="nav-link">Sign Up</a></li>
                    <?php  
                }
            ?>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
    <div class="hero-wrap img" style="background-image: url(https://images.unsplash.com/photo-1564934304050-e9bb87a29c13?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80);">
      <div class="overlay"></div>
      <div class="container">
      	<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
	        <div class="col-md-10 d-flex align-items-center ftco-animate">
	        	<div class="text pt-5 mt-md-5" style="text-align:center;margin:auto;">
	            <h1 class="mb-5 text-center" >"Find the Art, In your Kart"</h1>
	            	<h3 class="mb-4">Find the Art you need for your Home</h3>
	          </div>
	        </div>
	    	</div>
      </div>
    </div>
<!--     <section class="ftco-section services-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-resume"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Millions of Jobs</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-team"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Easy To Manage Jobs</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-career"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Top Careers</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-employees"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Expert Candidates</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section> -->
    <section class="ftco-section ftco-candidates bg-primary">
      <div class="container">
        <div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section heading-section-white text-center ftco-animate">
            <span class="subheading">Art</span>
            <h2 class="mb-4">Latest Art</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="carousel-candidates owl-carousel">
                <?php 
                  $sql = "select * from image_db";
                  $result = $con -> query($sql);
                  if ($result->num_rows > 0) 
                  {
                    while ($row = $result->fetch_assoc()) 
                    {
                       ?>
                       <div class="item">
                          <a href="#" class="team text-center">
                          <div class="img" style="background-image: url(<?php echo $row['og_link']; ?>);"></div>
                          <h2><?php echo $row['title'] ?></h2>
                          <span class="position"><?php echo $row['company_name'] ?></span>
                        </a>
                        </div>
                       <?php 
                    }
                  }
                ?>              
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-4">
            <p><span>Address:</span>Shivaji Nagar Mumbai, Maharastra</p>
          </div>
          <div class="col-md-4">
            <p><span>Phone:</span> <a href="tel:+91 9833528488"></a>+91 9833528488</p>
          </div>
          <div class="col-md-4">
            <p><span>Email:</span> <a href="mailto:anilpakhare37@gmail.com">anilpakhare37@gmail.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="save_message.php" class="bg-white p-5 contact-form" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" name="name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" name="email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" name="subject">
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
          <div class="col-md-6 d-flex" style="width:100%;">
              <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d15083.852942107651!2d72.91443227144791!3d19.065353974260518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3be7c66ab9d46cd5%3A0x1468e9735fb0e69a!2sShivaji%20Nagar%2C%20Mumbai%2C%20Maharashtra!3m2!1d19.0641325!2d72.9240619!5e0!3m2!1sen!2sin!4v1569259207991!5m2!1sen!2sin" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </section>	
<?php include "footer.php" ?>