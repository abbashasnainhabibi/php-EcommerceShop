<?php
session_start();
include("connection.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ARTS index page</title>

  <!-- ::::::::::::::Favicon icon::::::::::::::-->
  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">


  <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
  <!-- Vendor CSS -->
  <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/vendor/icofont.min.css">
  <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
  <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
  <link rel="stylesheet" href="assets/css/plugins/venobox.min.css">

  <!-- Main CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Use the minified version files listed below for better performance and remove the files listed above -->
  <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>

<body>
  <style>
    img {
      height: 200px;
    }

    @media (max-width: 767.98px) {
      .border-sm-start-none {
        border-left: none !important;
      }
    }
    .card {
  width: 300px;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
  margin: 10px;
  display: inline-block;
}

.logo {
  width: 100px;
  height: 100px;
}

.card-content {
  margin-top: 10px;
}

h3 {
  font-size: 16px;
}

p {
  font-size: 14px;
}
.h{
font-style: italic;
color: orange;
}
  </style>
  <main class="main-wrapper">
    <!-- .....:::::: Start Header Section :::::.... -->
    <?php include "navbar.php" ?>
    <!-- .....:::::: End Header Section :::::.... -->

    <!-- .....:::::: Start Mobile Header Section :::::.... -->
    <div class="mobile-header d-block d-xl-none">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col">
            <div class="mobile-logo">
              <a href="index.php"><img src="" alt=""></a>
            </div>
          </div>
          <div class="col">
            <div class="mobile-action-link text-end">
              <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu"><i class="icofont-navigation-menu"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- .....:::::: Start MobileHeader Section :::::.... -->

    <!--  Start Offcanvas Mobile Menu Section -->
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
      <!-- Start Offcanvas Header -->
      <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="icofont-close-line"></i></button>
      </div> <!-- End Offcanvas Header -->
      <!-- Start Offcanvas Mobile Menu Wrapper -->
      <div class="offcanvas-mobile-menu-wrapper">
        <!-- Start Mobile Menu  -->
        <div class="mobile-menu-bottom">
          <!-- Start Mobile Menu Nav -->
          <div class="offcanvas-menu">
            <ul>
            <li><a href="index.php"><span> Home</span></a></li>
         
              <li>

              <li class="has-dropdown">
                            <a href="#">select Category</a>
                            <ul class="mobile-sub-menu">
                                <?php
                                $query = "SELECT * FROM category";
                                $result = $conn->query($query);
                                $count = 1;
                                while ($data = mysqli_fetch_array($result)) {
                                    echo "<li><a href='search.php?categoryid=$data[0]'>$data[1]</a></li>";
                                    $count++;
                                }
                                ?>

                            </ul>
                        </li>

                        <li class="has-dropdown">
                            <a href="#">select Shop</a>
                            <ul class="mobile-sub-menu">
                                <?php
                                $query1 = "SELECT * FROM shop";
                                $result1 = $conn->query($query1);
                                $count1 = 1;
                                while ($data1 = mysqli_fetch_array($result1)) {
                                    echo "<li><a href='search.php?shopid=$data1[0]'>$data1[1]</a></li>";
                                    $count1++;
                                }
                                ?>

                            </ul>
                        </li>
  
<li>
                <a href="contact.php"><span>Contact</span></a>
              </li>
            </ul>
            <div class="header-btn-link text-end">
              <a href="destroysesh.php" class="btn btn-lg btn-default-outline-alt btn-animate"><span>logout
                </span></a>
            </div>
          </div> <!-- End Mobile Menu Nav -->
        </div> <!-- End Mobile Menu -->

        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info text-center">
          <ul class="social-link">
            <li><a target="_blank" href="https://example.com"><i class="icofont-facebook"></i></a>
            </li>
            <li><a target="_blank" href="https://example.com"><i class="icofont-twitter"></i></a>
            </li>
            <li><a target="_blank" href="https://example.com"><i class="icofont-skype"></i></a></li>
          </ul>
        </div>
        <!-- End Mobile contact Info -->

      </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div>
    <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...::: Start Breadcrumb Section :::... -->
    <div class="breadcrumb-section breadcrumb-bg">
      <div class="box-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="container text-center">
                <h2 class="title">Home</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">About us</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <a href="contact.php"> contact</a></li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>




      <!-- End Book Image -->
    </div>
    </div>
    </div>
    <!-- End Booking Area -->
    </div>
    </div>
    </div>
    </div>
    <!-- ...::: End Essential Display Section :::... -->

    <section style="background-color: #eee;">
      <div class="container py-5">
        <div class="row">
          <?php
          include "product-card.php";
          $sql = "SELECT `name`,`stock`,`image`,`desc`,`price`,`status`,`id`,`category` FROM `products`";
          $run = mysqli_query($conn, $sql);
          $count = 1;

          while ($data = mysqli_fetch_row($run)) {
            card($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);

              $count++;
            }
          ?>




          <!-- ...::: Start Doctors Team Display Section :::... -->
          <div class="doctors-team-display section-inner-padding-200 section-top-gap-200 section-inner-bg pos-relative overflow-hidden">
            <div class="box-wrapper">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <!-- Start Section Content -->
                    <div class="secton-content section-shape text-center">
                      <span class="section-tag">ARTS(stationary shop)</span>
                      <h2 class="section-title">
                        <span class="title-bold">Are you looking for</span>
                        <br>
                        <span class="title-normal">best products</span>
                      </h2>
                    </div>
                    <!-- End Section Content -->
                  </div>
                </div>
                <!-- Start Doctors Team Area -->
                <div class="doctors-team-area section-top-gap-150">
                  <div class="row">
                    <div class="col-12">
                      <!-- Start Doctor Team Slider -->
                      <div class="doctors-team-slider default-slider-nav pos-relative">
                        <!-- Slider main container -->
                        <div class="swiper-container">
                          <!-- Additional required wrapper -->
                          <div class="swiper-wrapper">
                            <!-- Start Doctors Team Single Item -->
                            <div class="doctors-team-single-item swiper-slide">
                              <a href="" class="images img-responsive">
                                <img src="images/leatherwallet.jpg" alt="">
                              </a>
                              <div class="content text-center">
                                <h4 class="name"><a href="">leather wallet</a></h4>
                                <h6 class="profession">Burhani stationary shop</h6>
                              </div>
                            </div>
                            <!-- End Doctors Team Single Item -->
                            <!-- Start Doctors Team Single Item -->
                            <div class="doctors-team-single-item swiper-slide">
                              <a href="" class="images img-responsive">
                                <img src="productimages/doll.jpg" alt="">
                              </a>
                              <div class="content text-center">
                                <h4 class="name"><a href="">doll</a></h4>
                                <h6 class="profession">The stationary Heaven</h6>
                              </div>
                            </div>
                            <!-- End Doctors Team Single Item -->
                            <!-- Start Doctors Team Single Item -->
                            <div class="doctors-team-single-item swiper-slide">
                              <a href="" class="images img-responsive">
                                <img src="productimages/art.jpg" alt="">
                              </a>
                              <div class="content text-center">
                                <h4 class="name"> <a href=""></a>file</h4>
                                <h6 class="profession">Creative Corner</h6>
                              </div>
                            </div>
                            <!-- End Doctors Team Single Item -->
                            <!-- Start Doctors Team Single Item -->
                            <div class="doctors-team-single-item swiper-slide">
                              <a href="" class="images img-responsive">
                                <img src="productimages/card.avif" alt="">
                              </a>
                              <div class="content text-center">
                                <h4 class="name"><a href="">gift card</a></h4>
                                <h6 class="profession">The Artful desk</h6>
                              </div>
                            </div>
                            <!-- End Doctors Team Single Item -->
                          </div>
                        </div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                      </div>
                      <!-- End Doctor Team Slider -->
                    </div>
                  </div>
                </div>
                <!-- End Doctors Team Area -->
              </div>
              <!-- Start Doctor Shape -->
              <div class="doctor-shape doctor-shape-1"></div>
              <div class="doctor-shape doctor-shape-2"></div>
              <div class="doctor-shape doctor-shape-3"></div>
              <div class="doctor-shape doctor-shape-4"></div>
              <!-- End Doctor Shape -->
            </div>
          </div>
          <!-- ...::: End Doctors Team Display Section :::... -->

          <!-- ...::: Start Contat Banner Display Section :::... -->
          <div class="contact-banner-display-section section-top-gap-200">
            <div class="box-wrapper">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <!-- Start Contact Banner Area -->
                    <div class="contact-banner-area">
                      <div class="content">
                        <h3 class="title">You want to add your shop ?
                          <span>Signup as dealer and add your shop to.
                          </span>
                        </h3>
                        <a href="dealerSignup.php" class="btn btn-lg btn-default btn-animate icon-space-left"><span>signup as dealer <i class="icofont-double-right"></i></span></a>
                      </div>
                      <div class="image-1">
                        <img class="img-fluid animate-left-right" src="" alt="">
                      </div>
                      <div class="image-2">

                      </div>
                    </div>
                    <!-- End Contact Banner Area -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ...::: End Contat Banner Display Section :::... -->

          <!-- ...::: Start Testimonial Display Section :::... -->
          <div class="testimonial-display-section section-fluid-185 section-top-gap-200">
            <div class="box-wrapper">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <!-- Start Section Content -->
                    <div class="secton-content text-center">
                      <span class="section-tag"></span>
                      <h2 class="section-title">
                        <span class="title-bold">Our best shops</span>
                        <br>
                        <span class="title-normal">from ARTS(stationary shop) </span>
                      </h2>
                    </div>
                    <!-- End Section Content -->
                  </div>

                  <!-- Start Testimonial Area -->
                 <div class="d-flex">
                  <div class="card">
    <img src="images/cart.JPG" alt="Shop Logo" class="logo">
    <div class="  col-lg-9 card-content">
      <h3  class="h" >Hussaini Bookstore</h3>
      <p> <ul> Welcome to our stationery store, your haven for all things paper and office supplies! Step into a world where creativity meets organization, and where the power of putting pen to paper is celebrated. </ul></p>
    </div>
  </div>
  <div class="card">
    <img src="productimages/burhanishop.png" alt="Shop Logo" class="logo">
    <div class="card-content">
      <h3  class="h" >Burhani traders</h3>
      <p> <ul>Welcome to our stationery store, your haven for all things paper and office supplies! Step into a world where creativity meets organization, and where the power of putting pen to paper is celebrated.</ul></p>
    </div>
 
  </div> 
  <div class="card">
    <img src="productimages/stationaryheaven.png" alt="Shop Logo" class="logo">
    <div class="card-content">
      <h3  class="h" >abbas shop</h3>
      <p> <ul>Welcome to our stationery store, your haven for all things paper and office supplies! Step into a world where creativity meets organization, and where the power of putting pen to paper is celebrated.</ul></p>
    </div>
 
  </div>
  <div class="card">
    <img src="productimages/print.png" alt="Shop Logo" class="logo">
    <div class="card-content">
      <h3  class="h" >Print Shack</h3>
      <p> <ul>Welcome to our stationery store, your haven for all things paper and office supplies! Step into a world where creativity meets organization, and where the power of putting pen to paper is celebrated.</ul></p>
    </div>
                  <!-- End Testimonial Area -->
                </div>
              </div>
            </div>
          </div>
          <!-- ...::: End Testimonial Display Section :::... -->
          <br>
          <br>
          <br>
         


          <!-- ::::::::::::::All JS Files here :::::::::::::: -->
          <!-- Global Vendor, plugins JS -->
          <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
          <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
          <script src="assets/js/vendor/jquery-migrate-3.3.3.min.js"></script>
          <script src="assets/js/vendor/popper.min.js"></script>
          <script src="assets/js/vendor/bootstrap.min.js"></script>
          <script src="assets/js/vendor/jquery-ui.min.js"></script>

          <!--Plugins JS-->
          <script src="assets/js/plugins/swiper-bundle.min.js"></script>
          <script src="assets/js/plugins/circle-progress.min.js"></script>
          <script src="assets/js/plugins/ajax-mail.js"></script>
          <script src="assets/js/plugins/venobox.min.js"></script>
          <script src="assets/js/plugins/material-scrolltop.js"></script>


          <!-- Use the minified version files listed below for better performance and remove the files listed above -->
          <!-- <script src="assets/js/vendor/vendor.min.js"></script>
  <script src="assets/js/plugins/plugins.min.js"></script> -->

          <!-- Main JS -->
          <script src="assets/js/main.js"></script>

</body>

</html>