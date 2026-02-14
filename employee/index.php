<?php

session_start();
if ($_SESSION["loggedin"] == 0) {
	header("Location: ../login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
   
    <meta charset="utf-8" />
    <title>employee account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <?php
    // if ($_SESSION["role"] !== "Admin") {
    //     header("Location: ../404-error.html");
    // }


    ?>

</head>


<body data-sidebar="dark">

    <!-- Loader -->
   

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.php" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="20">
                            </span>
                        </a>

                        <a href="index.php" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="20">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="d-none d-sm-block ms-2">
                        <h4 class="page-title font-size-18">Employee Details</h4>
                    </div>

                </div>

                <div class="d-flex">

                    <div class="dropdown d-none d-lg-inline-block">
                    </div>

                    <div class="dropdown d-none d-md-block ms-2">
                    </div>

                    <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>
                    <?php
                    echo '<div class="dropdown d-inline-block ms-2">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" width="30px" src="../images/headeravatar.png"
                            alt="Header Avatar">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <span class="dropdown-item"><i 
                                class="dripicons-wallet font-size-16 align-middle px-3"></i>' . $_SESSION['Role'] . '</span>
                        <span class="dropdown-item"><i
                                class="dripicons-wallet font-size-16 align-middle  px-3"></i>' . $_SESSION['email'] . '</span>
                        <a class="dropdown-item" href="index.php"><i
                                class="dripicons-wallet font-size-16 align-middle  px-3"></i></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../destroysesh.php"><i
                                class="dripicons-exit font-size-16 align-middle px-3"></i>
                            Logout</a>
                    </div>
                </div>
                ';
?>
                </div>
            </div>
        </header>




        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Main</li>

                        <li>
                            <a  class="waves-effect">
                                <i class="dripicons-device-desktop"></i>
                                <span>employee panel</span>

                            </a>
                        </li>
                        <li>
                          
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="index.php">employee details</a></li>
                                <li><a href="orders.php">employee orders</a></li>
                               
                        </li>
                    </ul>
                    </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">

                <div class="container-fluid">

                   
                <?php
                    include("../connection.php");
                    $showuser = "SELECT `id`, `email`, `password`, `shopid` FROM  employees ";
                    $row = mysqli_query($conn, $showuser);
                    // $data = mysqli_fetch_array($row);
                    $rowcount = mysqli_num_rows($row);
                    // echo $rowcount;
                    
                    if ($rowcount !== 0) {
                        ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Employee Details</h4>

                                        <div class="table-responsive">
                                            <table class="table mt-4 mb-0 table-centered table-nowrap">
                                                <tr>
                                                    <th>Employee ID</th>
                                                    <th>Employee Name</th>
                                                    <th>Employee password</th>
                                                    <th>Employee of the shop</th>
                                                    
                                                </tr>
                                                </thead>

                                                <?php
                                                    $count = 1;
                                                    while ($data = mysqli_fetch_array($row)) {

                                                        $roleid = $data['shopid'];
                                                        $sql = "SELECT shopname FROM shop WHERE id=$roleid";
                                                        $runquery = mysqli_query($conn, $sql);
                                                        $role = mysqli_fetch_row($runquery);
                                                        $u = $role[0];

                                                        $id = $data['id'];







                                                        echo "<tr>
                                        <td>" . $data['id'] . "</td>
                                        <td>" . $data['email'] . "</td>
                                        <td>" . $data['password'] . "</td>
                                        <td>  $u </td>
                                        
                                        
                                    </tr>";
                                                        $count++;
                                                    }
                                                    ?>
                                                     <?php
                    } else {
                        echo "No Data Found";
                    }

                    ?>
                                    </div>
                                    <!-- end row -->

                                </div>
                                <!-- container-fluid -->
                            </div>
                            <!-- End Page-content -->

                        </div>
                        <!-- end main content-->

                    </div>
                    <!-- END layout-wrapper -->

                    <!-- Right Sidebar -->
                    <div class="right-bar">
                        <div data-simplebar class="h-100">
                            <div class="rightbar-title px-3 py-4">
                                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                                    <i class="mdi mdi-close noti-icon"></i>
                                </a>
                                <h5 class="m-0">Settings</h5>
                            </div>

                            <!-- Settings -->
                            <hr class="mt-0" />
                            <h6 class="text-center mb-0">Choose Demo</h6>

                            <div class="p-4">
                                <div class="mb-2">
                                    <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail"
                                        alt="">
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch"
                                        checked />
                                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                                </div>

                                <div class="mb-2">
                                    <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail"
                                        alt="">
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                                        data-bsStyle="assets/css/bootstrap-dark.min.css"
                                        data-appStyle="assets/css/app-dark.min.css" />
                                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                                </div>

                                <div class="mb-2">
                                    <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail"
                                        alt="">
                                </div>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                                        data-appStyle="assets/css/app-rtl.min.css" />
                                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                                </div>

                                <h6 class="mt-4">Select Custom Colors</h6>
                                <div class="d-flex">

                                    <ul class="list-unstyled mb-0">
                                        <li class="form-check">
                                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                                id="theme-default" value="default"
                                                onchange="document.documentElement.setAttribute('data-theme-mode', 'default')"
                                                checked>
                                            <label class="form-check-label" for="theme-default">Default</label>
                                        </li>
                                        <li class="form-check">
                                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                                id="theme-orange" value="orange"
                                                onchange="document.documentElement.setAttribute('data-theme-mode', 'orange')">
                                            <label class="form-check-label" for="theme-orange">Orange</label>
                                        </li>
                                        <li class="form-check">
                                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                                id="theme-teal" value="teal"
                                                onchange="document.documentElement.setAttribute('data-theme-mode', 'teal')">
                                            <label class="form-check-label" for="theme-teal">Teal</label>
                                        </li>
                                    </ul>

                                    <ul class="list-unstyled mb-0 ms-4">
                                        <li class="form-check">
                                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                                id="theme-purple" value="purple"
                                                onchange="document.documentElement.setAttribute('data-theme-mode', 'purple')">
                                            <label class="form-check-label" for="theme-purple">Purple</label>
                                        </li>
                                        <li class="form-check">
                                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                                id="theme-green" value="green"
                                                onchange="document.documentElement.setAttribute('data-theme-mode', 'green')">
                                            <label class="form-check-label" for="theme-green">Green</label>
                                        </li>
                                        <li class="form-check">
                                            <input class="form-check-input theme-color" type="radio" name="theme-mode"
                                                id="theme-red" value="red"
                                                onchange="document.documentElement.setAttribute('data-theme-mode', 'red')">
                                            <label class="form-check-label" for="theme-red">Red</label>
                                        </li>
                                    </ul>

                                </div>
                                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-default" value="default" onchange="document.documentElement.setAttribute('data-theme-mode', 'default')" checked>
                <label class="form-check-label" for="theme-default">Default</label>
            </div> -->

                                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-teal" value="teal" onchange="document.documentElement.setAttribute('data-theme-mode', 'teal')">
                <label class="form-check-label" for="theme-teal">Teal</label>
            </div> -->

                                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-orange" value="orange" onchange="document.documentElement.setAttribute('data-theme-mode', 'orange')">
                <label class="form-check-label" for="theme-orange">Orange</label>
            </div> -->

                                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-purple" value="purple" onchange="document.documentElement.setAttribute('data-theme-mode', 'purple')">
                <label class="form-check-label" for="theme-purple">Purple</label>
            </div> -->

                                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-green" value="green" onchange="document.documentElement.setAttribute('data-theme-mode', 'green')">
                <label class="form-check-label" for="theme-green">Green</label>
            </div> -->

                                <!-- <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode"
                    id="theme-red" value="red" onchange="document.documentElement.setAttribute('data-theme-mode', 'red')">
                <label class="form-check-label" for="theme-red">Red</label>
            </div> -->
                            </div>

                        </div>
                        <!-- end slimscroll-menu-->
                    </div>
                    <!-- /Right-bar -->

                    <!-- Right bar overlay-->
                    <div class="rightbar-overlay"></div>

                    <!-- JAVASCRIPT -->
                    <script src="assets/libs/jquery/jquery.min.js"></script>
                    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
                    <script src="assets/libs/simplebar/simplebar.min.js"></script>
                    <script src="assets/libs/node-waves/waves.min.js"></script>

                    <!--Morris Chart-->
                    <script src="assets/libs/morris.js/morris.min.js"></script>
                    <script src="assets/libs/raphael/raphael.min.js"></script>

                    <script src="assets/js/pages/dashboard.init.js"></script>

                    <script src="assets/js/app.js"></script>

</body>

</html>