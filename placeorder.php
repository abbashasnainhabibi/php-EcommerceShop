<?php
include "connection.php";

$productid = $_GET['proid'];
$sql = "SELECT * FROM Products WHERE id=$productid";
$runq = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_array($runq);



?>

<?php
include "connection.php";
$price = null;
$q = null;
$totalprice = null;

if (isset($_POST['submit'])) {
  $price = (int)$_POST['price'];
  $q = (int)$_POST['quantity'];
  $totalprice = $q * $price;

  $c = $_POST['cname'];
  $p = $_POST['pname'];
  $con = $_POST['contact'];
  $add = $_POST['address'];
  $pay = $_POST['payment'];


  $orderno = mysqli_real_escape_string($conn, $fetch[1]);
  $sql22 = "SELECT `orderno` FROM `order` WHERE product='$orderno'";
  $runq22 = mysqli_query($conn, $sql22);
  $fetch3 = mysqli_fetch_array($runq22);





  $productName = mysqli_real_escape_string($conn, $fetch[1]);
  $sql2 = "SELECT `stock` FROM `products` WHERE name='$productName'";
  $runq2 = mysqli_query($conn, $sql2);
  $fetch2 = mysqli_fetch_array($runq2);
  if ($q > $fetch2[0]) {
    $alertType = 'danger'; // Set the type of alert (success, danger, warning, info)
    $message = 'Selected quantity is not available in stock'; // Set the message for the alert

    // Generate the HTML markup for the alert
    $html = '<div class="alert alert-' . $alertType . '" role="alert">';
    $html .= $message;
    $html .= '</div>';

    // Output the alert
    echo $html;
  } else {
    $sql3 = "INSERT INTO `order` (`customername`, `product`, `totalprice`, `customernumber`, `addressDetail`, `quantity`, `billing method`) VALUES ('$c', '$p', '$totalprice', '$con', '$add', '$q', '$pay')";
    $runq3 = mysqli_query($conn, $sql3);
  
    // Get the last inserted order ID
    $lastOrderId = mysqli_insert_id($conn);
  
    // Redirect to checkout.php with the order number as a parameter
    header("location:checkout.php?orderno=$lastOrderId");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Place Order</title>
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
</head>
<body>
  <div class="container">
    <h1>Add Order</h1>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="product-name">Enter your name</label>
        <input value="" type="text" name="cname" placeholder="name" required>
      </div>

      <div class="form-group">
        <label for="category">Chosen product</label>
        <input type="text" name="pname" value="<?php echo $fetch[1]; ?>" readonly>
      </div>

      <div class="form-group">
        <label for="category">Price of chosen product</label>
        <input type="text" name="price" value="<?php echo $fetch[2]; ?>" readonly>
      </div>

      <div class="form-group">
        <label for="product-name">Enter your contact number</label>
        <input value="" type="number" name="contact" placeholder="contact number" required>
      </div>

      <div class="form-group">
        <label for="product-name">Enter your receiving address</label>
        <input value="" type="text" name="address" placeholder="address" required>
      </div>

      <div class="form-group">
        <label for="product-name">Select Payment method</label>
        <select name="payment">
          <option>cheque</option>
          <option>credit card</option>
          <option>Debit card</option>
          <option>cash on delivery</option>
        </select>
      </div>

      <div class="form-group">
        <label for="product-quantity">Select quantity</label>
        <input type="number" name="quantity" required>
      </div>

      <button name="submit" href="checkout.php" class="btn btn-success">Place Order</button>
    </form>
  </div>
</body>
</html>
