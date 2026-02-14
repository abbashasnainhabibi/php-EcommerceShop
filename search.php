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
    <title>ARTS searchpage</title>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    </style>


    <!-- //search// -->
    <!-- <div class="container my-4">
    <form action="post">
<input type="text"placeholder="serach product"name="search">
<button class="btn btn-primary" name="submit" >search</button>
    </form>
</div> -->





<header style="background-color: #3232ac;" class="header-section sticky-header d-none d-xl-block section-fluid-185">
    <div class="header-wrapper">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <!-- Start Header Logo -->
                    <!-- End Header Logo -->
                </div>
                <div class="col-auto d-flex align-items-center">
                    <!-- Start Header Menu -->
                    <ul class="header-nav">

                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php">About Us</a></li>


                        </li>
                        <li class="has-dropdown">
                            <a href="#">select Category</a>
                            <ul class="submenu">
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
                            <ul class="submenu">
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

                        <li><a href="contact.php">Contact</a></li>
                        <li>
                            <form action="search.php" style="padding-top: 40px;">
                                <input type="search" class="form-control" name="prompt" id="">
                            
                        </li>
                        <li>
                            
                        <button class="btn " type="submit" style="margin-top: 40px;">Search</button>
                        </li>
                    </ul></form>
                    <!-- End Header Menu -->
                    <?php

                    if (isset($_SESSION['loggedin'])) {
                        echo " <div class='header-btn-link text-end'>
    <a href='destroysesh.php' class='btn btn-lg btn-default-outline-alt btn-animate'><span>Logout
        </span></a>
</div>";
                    } else {
                        echo "<div class='header-btn-link text-end'>
    <a href='login.php' class='btn btn-lg btn-default-outline-alt btn-animate'><span>Login
        </span></a>
</div>";
                    }


                    ?>

                </div>

            </div>
        </div>
    </div>

</header>

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
              <li><a href="index.php"><span>About Us</span></a></li>
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
                <a href="contact.html"><span>Contact</span></a>
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
   





<br>
<br>
<br>
<br>
<br>
<br>
<br>


   
<div>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                
                
<br>
<br>
<br>
                <?php
                include "product-card.php";

                if (isset($_GET['prompt'])) {
                    $prompt = $_GET['prompt'];
                    $searchTerm = mysqli_real_escape_string($conn, $prompt); // Escape input to prevent SQL injection
                
                    $sql = "SELECT `name`, `stock`, `image`, `desc`, `price`, `status`, `id`, `category` FROM `products` WHERE LOWER(`name`) LIKE LOWER('%$searchTerm%')";
                    $run = mysqli_query($conn, $sql);
                
                    if (mysqli_num_rows($run) > 0) {
                        while ($data = mysqli_fetch_row($run)) {
                            card($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
                        }
                    } else {
                        echo "No products found.";
                    }
                }



                if (isset($_GET['categoryid']) && isset($_GET['shopid']) && isset($_GET['prompt'])) {
                    $cat = $_GET['categoryid'];
                    $shop = $_GET['shopid'];
                    $prompt = $_GET['prompt'];
                    $sql = "SELECT `name`,`stock`,`image`,`desc`,`price`,`status`,`id`,`category` FROM `products`where category=$cat AND shopID=$shop";
                    $run = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($data = mysqli_fetch_row($run)) {
                        if (str_contains($data[0], $prompt)) {
                            card($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
                            $count++;
                        }
                    }
                } else if (isset($_GET['categoryid']) && isset($_GET['shopid'])) {
                    $cat = $_GET['categoryid'];
                    $shop = $_GET['shopid'];
                    $sql = "SELECT `name`,`stock`,`image`,`desc`,`price`,`status`,`id`,`category` FROM `products`where category=$cat AND shopID=$shop";
                    $run = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($data = mysqli_fetch_row($run)) {
                        card($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
                        $count++;
                    }
                } else if (isset($_GET['shopid']) && isset($_GET['prompt'])) {
                    $shop = $_GET['shopid'];
                    $prompt = $_GET['prompt'];
                    $sql = "SELECT `name`,`stock`,`image`,`desc`,`price`,`status`,`id`,`category` FROM `products`where shopID=$shop";
                    $run = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($data = mysqli_fetch_row($run)) {
                        if (str_contains($data[0], $prompt)) {
                            card($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
                            $count++;
                        }
                    }
                } else if (isset($_GET['categoryid']) && isset($_GET['prompt'])) {
                    $cat = $_GET['categoryid'];
                    $prompt = $_GET['prompt'];
                    $sql = "SELECT `name`,`stock`,`image`,`desc`,`price`,`status`,`id`,`category` FROM `products`where category=$cat";
                    $run = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($data = mysqli_fetch_row($run)) {
                        if (str_contains($data[0], $prompt)) {
                            card($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
                            $count++;
                        }
                    }
                } else if (isset($_GET['prompt'])) {

                    $prompt = $_GET['prompt'];
                    $sql = "SELECT `name`,`stock`,`image`,`desc`,`price`,`status`,`id`,`category` FROM `products`";
                    $run = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($data = mysqli_fetch_row($run)) {
                        if (str_contains($data[0], $prompt)) {
                            card($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
                            $count++;
                        }
                    }
                } else if (isset($_GET['shopid'])) {
                    $shop = $_GET['shopid'];
                    $sql = "SELECT `name`,`stock`,`image`,`desc`,`price`,`status`,`id`,`category` FROM `products` WHERE shopid=$shop";
                    $run = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($data = mysqli_fetch_row($run)) {
                        card($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6] ,$data[7]);
                            $count++;
                        

                    }
                } else if (isset($_GET['categoryid'])) {
                    $cat = $_GET['categoryid'];
                    $sql = "SELECT `name`,`stock`,`image`,`desc`,`price`,`status`,`id`,`category` FROM `products` WHERE category=$cat";
                    $run = mysqli_query($conn, $sql);
                    $count = 1;
                        while ($data = mysqli_fetch_row($run)) {
                            card($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6] ,$data[7]);
                                $count++;
                            

                        }
                } else {
                    $sql = "SELECT `name`,`stock`,`image`,`desc`,`price`,`status`,`id`,`category` FROM `products`";
                    $run = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($data = mysqli_fetch_row($run)) {
                        card($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
                        $count++;
                    }
                }
                ?>



</div>
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