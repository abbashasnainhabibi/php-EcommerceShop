<?php


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

                        <li><a href="index.php">Home</a></li>
                    


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