<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
    <title> update user Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .form-group button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <?php
    include '../connection.php';
    $update = $_GET['id'];
    $sql = "select * from users where id=$update";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $email = $row['Email'];
    $pass = $row['Pass'];

    $fname = $row['FName'];
    $lname = $row['LName'];
    $gender = $row['Gender'];
    $contact = $row['Contact'];
  

    if (isset($_POST['submit'])) {
        $uemail = $_POST["uemail"];
        $upass = $_POST["upass"];
        $urole = $_POST['RoleName'];
        $uf = $_POST["uf"];
        $ul = $_POST["ul"];
        $ug = $_POST["ug"];
        $uc = $_POST["uc"];
      


       
        $sql = "UPDATE `users` SET `id`='$update',`email`='$uemail',`Pass`='$upass',`FName`='$uf',`LName`='$ul',`Gender`='$ug',`Contact`='$uc', RoleID = $urole where id=$update ";
        mysqli_query($conn, $sql);
        header("location:useradmin.php");
    }


    ?>

</head>

<body>
    <div class="container">
        <h1>Update Product</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product-name">User Email:</label>
                <input value=<?php echo $email; ?> type="text" name="uemail" placeholder="Enter product name" required>
            </div>

            <div class="form-group">
                <label for="product-name">User Pass :</label>
                <input value=<?php echo $pass; ?> type="text" name="upass" placeholder="Enter product name" required>
            </div>


            <div class="form-group">
                <label for="product-name">User: Role</label>
                <select id="category" name="RoleName" >
                <option>update role </option>
                    <option value=1>Admin</option>
                    <option value=2>Dealer</option>
                    <option value=3>Employee</option>
                    <option value=4>Customer</option>

            

                </select>
            </div>

            <div class="form-group">
                <label for="product-name">User: F.Name</label>
                <input value=<?php echo $fname; ?> type="text" name="uf" placeholder="Enter product name" required>
            </div>

            <div class="form-group">
                <label for="product-name">User: L.Name</label>
                <input value=<?php echo $lname; ?> type="text" name="ul" placeholder="Enter product name" required>
            </div>

            <div class="form-group">
                <label for="product-price">User: Gender</label>
                <input value=<?php echo $gender; ?> type="text" name="ug" placeholder="Enter price" required>
            </div>

            <div class="form-group">
                <label for="product-name">User: Contact</label>
                <input value=<?php echo $contact; ?> type="text" name="uc" placeholder="Enter product name" required>
            </div>



            <button type="submit" name="submit">update User details</button>
        </form>
    </div>
</body>

</html>