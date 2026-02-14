<?php
session_start();


?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
  <title> Add Product Form</title>
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
    $shopid = $_POST['shopid'];
    $proname = $_POST["proname"];
    $proprice = $_POST["proprice"];
    $prodesc = $_POST["prodesc"];
    $procat = $_POST["procat"];
    $prostock = $_POST["prostock"];
    $imagename = $_FILES['proimage']['name'];
    $tempname = $_FILES['proimage']['tmp_name'];
    $dest = "../productimages/" . $imagename;
    $imagetype = strtolower(pathinfo($imagename, PATHINFO_EXTENSION));
    $allowtypes = array('png', 'jpeg', 'jpg');
    $size = $_FILES['proimage']['size'];



    if (in_array($imagetype, $allowtypes)) {
      if ($size <= 10000000) {
        $imgcheck = "select image from products where image='$dest' ";
        $runq = mysqli_query($conn, $imgcheck);
        if (mysqli_num_rows($runq) !== 1) {

          move_uploaded_file($tempname, $dest);
          $insert = "INSERT INTO `products`( `name`, `price`, `desc`, `image`, shopID,  `stock`,  `category`) VALUES ('$proname','$proprice','$prodesc','$dest','$shopid','$prostock','$procat')";
          $run_query = mysqli_query($conn, $insert);
          if ($run_query) {

            echo "data added";
            header("location:products.php");
          }
        } else {
          $alertType = 'danger'; // Set the type of alert (success, danger, warning, info)

          $message = 'This filename already exists in the database, please choose another file'; // Set the message for the alert

          // Generate the HTML markup for the alert
          $html = '<div class="alert alert-' . $alertType . '" role="alert">';
          $html .= $message;
          $html .= '</div>';

          // Output the alert
          echo $html;
        }
      } else {
        $alertType = 'danger'; // Set the type of alert (success, danger, warning, info)

        $message = 'image larger than 5 mb is not allowed'; // Set the message for the alert

        // Generate the HTML markup for the alert
        $html = '<div class="alert alert-' . $alertType . '" role="alert">';
        $html .= $message;
        $html .= '</div>';

        // Output the alert
        echo $html;
      }
    } else {
      $alertType = 'danger'; // Set the type of alert (success, danger, warning, info)

      $message = 'only jpg,jpeg and png image types are allowed'; // Set the message for the alert

      // Generate the HTML markup for the alert
      $html = '<div class="alert alert-' . $alertType . '" role="alert">';
      $html .= $message;
      $html .= '</div>';

      // Output the alert
      echo $html;
    }
  }


  ?>





</head>

<body>
  <div class="container">
    <h1>Product Form</h1>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="product-name">Product Name:</label>
        <input type="text" name="proname" placeholder="Enter product name" required>
      </div>

      <div class="form-group">
        <label for="file">Add Product Image:</label>
        <input type="file" id="file" name="proimage" required>
      </div>

      <div class="form-group">
        <select id="category" name="procat">
         <option>Select category</option>
      
          <?php
          include("fetchcat.php");
          foreach ($options as $option) {


          ?>
            <option value=<?php echo $option['id']; ?>><?php echo $option['catname']; ?> </option>
          <?php
          }
          ?>

        </select>
      </div>


      
<?php

$useremail = $_SESSION['email'];
$sql = "SELECT id FROM `users` WHERE `email` = '$useremail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$userid = $row['id'];

$query = "select id from shop where DealerID='$userid' ";
$runquery = mysqli_query($conn, $query);
$data = mysqli_fetch_row($runquery);
$shopid = $data[0];


?>
    <input type="hidden" name="shopid" value=<?php echo $shopid; ?>>

      <div class="form-group">
        <label for="product-description">Product Description:</label>
        <textarea name="prodesc" placeholder="Enter product description" required></textarea>
      </div>

      <div class="form-group">
        <label for="product-price">Price:</label>
        <input type="text" name="proprice" placeholder="Enter price" required>
      </div>

      <div class="form-group">
        <label for="product-quantity">Stock</label>
        <input type="number" name="prostock" required>
      </div>

      <button type="submit" name="submit">Submit</button>
    </form>
  </div>
</body>

</html>