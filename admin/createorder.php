<!DOCTYPE html>
<html>

<head>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Order Form</title>
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

  // Fetch product options from the database
  $query = "SELECT * FROM products";
  $result = mysqli_query($conn, $query);
  $options = mysqli_fetch_all($result, MYSQLI_ASSOC);



  if (isset($_POST['submit'])) {
    $name = $_POST["cname"];
    $con = $_POST["contact"];
    $add = $_POST["address"];
    $pay = $_POST["payment"];
    $pro = $_POST["name"];


    $price = (int)$_POST['price']; 
    $q = (int)$_POST['quantity'];
    $totalprice = $q * $price;
  

    // Fetch selected product's price
    $query = "SELECT price FROM products WHERE name='$pro'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $price = $row['price'];

    $insert = "INSERT INTO `order`(`customername`, `product`,`totalprice`, `customernumber`, `addressDetail`, `quantity`, `billing method`) 
          VALUES ('$name', '$pro','$totalprice', '$con', '$add', '$q', '$pay')";
    $run_query = mysqli_query($conn, $insert);

    if ($run_query) {
      header("location:adminorder.php");
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }
  ?>
</head>

<body>
  <div class="container">
    <h1>Add Order</h1>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="product-name">Enter your name</label>
        <input value="" type="text" name="cname" placeholder="Name" required>
      </div>

      <div class="form-group">
        <label for="category">Select product</label>
        <select id="" name="name">
          <?php foreach ($options as $option) { ?>
            <option value="<?php echo $option['name']; ?>" data-price="<?php echo $option['price']; ?>"><?php echo $option['name']; ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label for="category">Selected product price</label>
        <input type="number" name="price" value="" disabled>
      </div>

      <div class="form-group">
        <label for="product-name">Enter your contact number</label>
        <input value="" type="number" name="contact" placeholder="Contact number" required>
      </div>

      <div class="form-group">
        <label for="product-name">Enter your receiving address</label>
        <input value="" type="text" name="address" placeholder="Address" required>
      </div>

      <div class="form-group">
        <label for="product-name">Select payment method</label>
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

      <button type="submit" name="submit">Add Order</button>
    </form>
  </div>
  <script>
    // Retrieve the selected product's price and update the input field
    var selectProduct = document.querySelector('select[name="name"]');
    var priceInput = document.querySelector('input[name="price"]');

    selectProduct.addEventListener('change', function() {
      var selectedOption = this.options[this.selectedIndex];
      priceInput.value = selectedOption.dataset.price;
    });
  </script>
</body>

</html>
