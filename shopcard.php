<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shopcard</title>
</head>
<style>
  .product-card {
   
    border-radius: 5px;
    padding: 10px;
    width: 300px;
    display: flex;
    flex-direction: column;
    align-items: center;
    
  }

  body {
    font-size: 12px;
    font-family: "Roboto", sans-serif;
    /* font-weight: 400; */
    /* font-style: normal; */
    line-height: 1.73;
    position: relative;
    visibility: visible;
    background: #fff;
    /* color: #555463; */
  }

  .product-image {
    width: 265px;
    height: 265px;
    margin-bottom: 20px;
    border: 3px solid #00308F ;
  }

  .product-name {
    font-size: 14px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bolder;
    margin-bottom: 5px;
  }

  .product-price {
    font-size: 15px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bold;
    margin-bottom: 5px;
  }
.product-category{
  font-size: 12.8px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bold;
}
  .product-description {
    margin-bottom: 5px;
  }

  .product-stock {
    font-size: 16px;
    margin-bottom: 5px;
  }

  .product-status {
    font-size: 16px;
    font-weight: bold;
  }
  .btn{
    
   
  color: white; 
  border: 2px solid  ;
  background-color: #00308F;
  

  }
 
</style>

<body>
  <?php
  function shopcard($name, $adress, $des)
  {
    include "connection.php";
    $sql = "SELECT * from shop WHERE id=$category";
    $runq = mysqli_query($conn, $sql);
    $fetch1 = mysqli_fetch_array($runq);
   

    if ($status == 1) {

      $status = "YES";
    } else {
      $status = "NO";
    }
    echo "
  <div class='product-card'>
    <img src='.//$image' alt='$image' class='product-image'>
    <div class='product-name'>Product Name:$name</div>
    <div class='product-price'>Price:$price</div>
    <div class='product-category'>category:" . $fetch1[1] . "</div>
   
    <a href='productdetails.php?id=$id'><button class= 'btn '>Details</button></a>
  </div>  ";
  }


  ?>
</body>

</html>