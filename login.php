<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    header("Location: proadmin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login E-commerce</title>
</head>

<body>

    <?php
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include "connection.php";
        $email = $_POST['email'];
        $pass = $_POST['password'];






        
        $checkPassword = "SELECT pass, RoleID FROM users WHERE email='$email'";
        $checkPasswordResult = mysqli_query($conn, $checkPassword);
        if (mysqli_num_rows($checkPasswordResult) > 0) {
            $userpass = mysqli_fetch_row($checkPasswordResult);
            $actualpassword = $userpass[0];
            if ($actualpassword == $pass) {

                $error = "";
                // echo "logged in";
    
                


                  $_SESSION['cart'] = [];
                $_SESSION['loggedin'] = 1;
                $_SESSION['email'] = $email;
                if ($userpass[1] == "1") {
                    $_SESSION['Role'] = 'Admin';
                    header("location: admin/proadmin.php");
                } elseif ($userpass[1]=="2") {
                    $_SESSION['Role']= 'Dealer';
                    header ("location:dealer/index.php");
                }elseif ($userpass[1]=="3") {
                    $_SESSION['Role']= 'Employee';
                }else {
                    $_SESSION['Role']= 'Customer';
                    header ("location:index.php");
                } 
            } else {
                $error = "<div class='alert alert-danger text-center'>
            <b>*Email OR Password Incorrect.*</b>
           </div>";
            }


        } else {
            $error = "<div class='alert alert-danger text-center'>
                <b>*Email OR Password Incorrect.*</b>
               </div>";
        }
        //         if (mysqli_num_rows($checkUserResult) > 0) {
//             $error = "<div class='alert alert-danger text-center'>
//     <b>*Email OR Contact Already In Use.*</b>
//   </div>";
    
        //         } else {
    
        //             $query = "INSERT INTO `users`(`Email`, `Pass`, `RoleID`, `FName`, `LName`, `Gender`, `Contact`) VALUES ('$email',' $pass ',$role,'$fname',' $lname',' $gender ',' $contact ')";
//             mysqli_query($conn, $query);
    

        //         }
    





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
                        <h2 class="fw-bold mb-5">Login</h2>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!-- 2 column grid layout with text inputs for the first and last names -->

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control" name="email" required />
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="password" class="form-control" name="password" required /><i
                                    class="bi bi-eye-slash" id="togglePassword"></i>
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>
                            <!-- role -->

                    </div>




                    <!-- Submit button -->
                 
                    <button  type="submit" class="btn btn-secondary">Login </button>
                
                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not registered? <a href="customerSignup.php">Sign up as customer</a></p>
                        <p>Want to register as a dealer? <a href="dealerSignup.php">Sign up as Dealer</a></p>

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