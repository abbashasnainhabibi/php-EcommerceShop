<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
  <title>user Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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


  include("../connection.php");
  if (isset($_POST['submit'])) {
    $uemail = $_POST["uemail"];
        $upass = $_POST["upass"];
        $urole = $_POST['urole'];
        $uf = $_POST["uf"];
        $ul = $_POST["ul"];
        $ug = $_POST["ug"];
        $uc = $_POST["uc"];

        


    
          $query = "select id from role where RoleName='$urole' ";
          $runquery = mysqli_query($conn, $query);
          $data = mysqli_fetch_row($runquery);
          $shopid = $data[0];
          //role not added//
          $insert = "INSERT INTO `users`(`Email`, `Pass`,`RoleID`,  `FName`, `LName`, `Gender`, `Contact`) VALUES ('$uemail','$upass','$shopid','$uf','$ul','$ug','$uc')";
          $run_query = mysqli_query($conn, $insert);
          if ($run_query) {

            echo "data added";
            header("location:useradmin.php");
          }
        } 

  ?>





</head>

<body>
<div class="container">
        <h1>Add User </h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product-name">User Email:</label>
                <input value="" type="email" name="uemail" placeholder="Email" required>
            </div>

            <div class="form-group">
                <label for="product-name">User Pass :</label>
                <input value="" type="text" name="upass" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label for="category">Select role:</label>
                <select id="" name="urole">
          <?php
          include("fetchrole.php");
          foreach ($options as $option) {
            ?>
            <option value="<?php echo $option['RoleName']; ?>"><?php echo $option['RoleName']; ?> </option>

          <?php
          }
          ?>
                </select>
            </div>
          
            <div class="form-group">
                <label for="product-name">User: FName</label>
                <input value="" type="text" name="uf" placeholder="First Name" required>
            </div>
             
            <div class="form-group">
                <label for="product-name">User: LName</label>
                <input value="" type="text" name="ul" placeholder="Last Name" required>
            </div>


            <div class="form-group">
                <label for="product-name">Select Gender</label>
                <select  name="ug" >
                
                    <option>Male</option>
                    <option >Female</option>
                   

            

                </select>
            </div>



         

            <div class="form-group">
                <label for="product-name">User: Contact</label>
                <input value="" type="text" name="uc" placeholder=Contact required>
            </div>

           

            <button type="submit" name="submit">Add User</button>
        </form>
    </div>
</body>

</html>