<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Signup E-commerce</title>
</head>

<body>

    <?php
    $error = "";
    include "connection.php";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];
        $role = $_POST['role'];

        $sname = $_POST['sname'];
        $saddress = $_POST['saddress'];
        $sdesc = $_POST['shopdesc'];

        $checkUser = "SELECT * FROM users WHERE email='$email' OR contact=$contact";
        $checkUserResult = mysqli_query($conn, $checkUser);
        if (mysqli_num_rows($checkUserResult) > 0) {
            $error = "<div class='alert alert-danger text-center'>
    <b>*Email OR Contact Already In Use.*</b>
  </div>";
        } else {

            $query = "INSERT INTO `users`(`Email`, `Pass`, `RoleID`, `FName`, `LName`, `Gender`, `Contact`) VALUES ('$email',' $pass ',$role,'$fname',' $lname',' $gender ',' $contact ')";
            mysqli_query($conn, $query);
            $sql = " SELECT id FROM users WHERE Email='$email'";

            $save = mysqli_query($conn, $sql);
            $data = mysqli_fetch_row($save);
            $actualid = $data[0];

            $query = "INSERT INTO `shop`( `shopname`, `shopaddress`, `dealerID`, `shopdesc`) VALUES ('$sname','$saddress',$actualid,'$sdesc')";
            mysqli_query($conn, $query);
            header("location:login.php");
        }
    }

    ?>



    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <?php echo $error; ?>
                        <h2 class="fw-bold mb-5">Sign up now</h2>
                        <form method="POST" action="<?php echo  htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example1" class="form-control" name="fname" required />
                                        <label class="form-label" for="form3Example1">First name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example2" class="form-control" name="lname" required />
                                        <label class="form-label" for="form3Example2">Last name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control" name="email" required />
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="password" class="form-control" name="password" required /><i class="bi bi-eye-slash" id="togglePassword"></i>
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="form3Example1" class="form-control" name="contact" required />
                                        <label class="form-label" for="form3Example1">Contact</label>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-1">
                                    <select class="form-select" name="gender" required>
                                        <option value="M" selected>Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                    <label class="form-label" for="form3Example4">Gender</label>
                                </div>


                                <div class="col-md-4 mb-2">
                                    <select class="form-select" name="role" required>
                                        <option value=2 selected>Dealer</option>
                                       
                                    </select>
                                    <label class="form-label" for="form3Example4">Role</label>
                                </div>
                            </div>



                            <h2 class="fw-bold mb-5">Shop Details</h2>

                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" name="sname" required />
                                <label class="form-label" for="form3Example4"> Shop Name</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" name="saddress" required />
                                <label class="form-label" for="form3Example4">Shop Address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <textarea class="form-control" name="shopdesc" rows="4" cols="50" required></textarea>
                                <label class="form-label" for="form3Example4">Shop Description</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-secondary btn-block mb-4">
                                Sign up
                            </button>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Already registered? <a href="login.php">Login.</a></p>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

    <script>
        const togglePassword = document
            .querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye and bi-eye icon
            this.classList.toggle('bi-eye');
        });
    </script>
</body>

</html>