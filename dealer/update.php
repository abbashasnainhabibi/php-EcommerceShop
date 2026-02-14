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
    $sql = "SELECT * FROM `employees` WHERE id=$update";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $ename = $row['email'];
    $epass = $row['password'];

  

    if (isset($_POST['submit'])) {
        $ename = $_POST["en"];
        $epass = $_POST["ep"];
     


       
        $sql = " update `employees` SET `email`='$ename',`password`='$epass' where id=$update ";
        mysqli_query($conn, $sql);
        header("location:index.php");
    }


    ?>

</head>

<body>
    <div class="container">
        <h1>Update Employee</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product-name">Employee Username</label>
                <input value=<?php echo $ename; ?> type="text" name="en" placeholder="Username" required>
            </div>

            <div class="form-group">
                <label for="product-name">Employee Pass </label>
                <input value=<?php echo $epass; ?> type="text" name="ep" placeholder="Passwword" required>
            </div>


            

            <button type="submit" name="submit">update Employee details</button>
        </form>
    </div>
</body>

</html>