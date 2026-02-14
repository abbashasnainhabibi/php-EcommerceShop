<?php
// Your PHP code here
?>

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
                        <!-- Navigation links here... -->
                    </ul>
                    <!-- End Header Menu -->

                    <?php
                    if (isset($_SESSION['loggedin'])) {
                        echo "<div class='header-btn-link text-end'>
                            <a href='destroysesh.php' class='btn btn-lg btn-default-outline-alt btn-animate'><span>Logout</span></a>
                        </div>";
                    } else {
                        echo "<div class='header-btn-link text-end'>
                            <a href='login.php' class='btn btn-lg btn-default-outline-alt btn-animate'><span>Login</span></a>
                        </div>";
                    }
                    ?>

                    <!-- Logo Image -->
                    <img src="cart.jpg" alt="Your Logo" class="ml-auto" style="height: 40px; /* Adjust the height as needed */">
                </div>
            </div>
        </div>
    </div>
</header>
