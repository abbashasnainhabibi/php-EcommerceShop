<!DOCTYPE html>
<html>
<head>
  <title>Order Placed</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    
    .message {
      font-size: 30px;
      font-weight: bold;
      margin-top: 100px;
      color:black;
      font-style: italic;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    
    .message1 {
      font-size: 13px;
      font-family: Arial, sans-serif;
      text-transform: uppercase;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
         
          <a class="nav-link active" aria-current="page" href="index.php">back to home</a>
          
        </li>
        
        
      </ul>
      
    </div>
  </div>
</nav>



  <div class="message">
    <p>Your order has been placed successfully!</p>
    <p class="message1">We will contact you through your email or contact number!</p>
  </div>
  <label for=""></label>
  <?php  
  include "connection.php";
  
  $orderid = $_GET['orderno']; // Assuming the parameter name is 'orderno'
  $sql = "SELECT * FROM `order` WHERE orderno = $orderid";
  $runq = mysqli_query($conn, $sql);
  $fetch = mysqli_fetch_array($runq);
  
 
    if ($fetch) {
      echo '<div class="container">';
echo"<label  >order No </label>";
      echo '<input type="text" value="' . $fetch['orderno'] . '" readonly>';
echo"<br>";
echo"<label  >Customer Number </label>";
      echo '<input type="text" value="' . $fetch['customername'] . '"readonly>';
      echo"<br>";
      echo"<label  >Product Name </label>";
      echo '<input type="text" value="' . $fetch['product'] . '"readonly>';
      echo"<br>";
      echo"<label  >Total amount </label>";
      echo '<input type="text" value="' . $fetch['totalprice'] . '"readonly>';
     
      echo"<br>";
      echo"<label  >Address details </label>";
      echo '<input type="text" value="' . $fetch['addressDetail'] . '"readonly>';
      echo"<br>";
      echo"<label  >Total Quantity </label>";
      echo '<input type="text" value="' . $fetch['quantity'] . '"readonly>';
      echo"<br>";
      echo"<label  >Choosen payment method </label>";
      echo '<input type="text" value="' . $fetch['billing method'] . '"readonly>';
      echo"<br>";

      echo '</div>';

    } else {
      echo "No order found.";
    }
 
  ?>
</body>
</html>
