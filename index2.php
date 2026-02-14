
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
  <title>Navbar Example</title>
  <style>
    /* CSS for navbar */
    .navbar {
      background-color: #333;
      overflow: hidden;
    }

    .navbar a {
      float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    .dropdown {
      float: left;
      overflow: hidden;
    }

    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .navbar a:hover, .dropdown:hover .dropbtn {
      background-color: #111;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }
    .dropdown {
    padding-right: 25px;
}
    .dropdown:hover .dropdown-content {
      display: block;
    }

    /* CSS for other navbar elements */
    .navbar .home-button {
      background-color: #333;
      float: left;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    .navbar .search-bar {
      
    float: revert;
    padding: 15px 350px;
}
    

    .navbar .cart-logo {
      float: right;
      padding: 14px 16px;
      color: white;
    }

    .navbar .logout-option {
      float: right;
      padding: 14px 16px;
      color: white;
    }


    .product-card {
      width: 300px;
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 20px;
      cursor: pointer;
    }

    .product-card:hover {
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .product-card img {
      width: 100%;
      height: auto;
    }

    .product-card .details {
      margin-top: 10px;
    }
    .new-products-heading {
      text-align: center;
      font-size: 50px;
      color: #333;
      margin-top: 40px;
      margin-bottom: 20px;
      
    }
  </style>
</head>
<body>

<div class="navbar">
    <a class="home-button" href="#">Home</a>
    <div class="dropdown">
      <button class="dropbtn">Dropdown 1</button>
      <div class="dropdown-content">
        <a href="#">Option 1</a>
        <a href="#">Option 2</a>
        <a href="#">Option 3</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Dropdown 2</button>
      <div class="dropdown-content">
        <a href="#">Option A</a>
        <a href="#">Option B</a>
        <a href="#">Option C</a>
      </div>
    </div>
    <input class="search-bar" type="text" placeholder="Search Products">

    <a class="cart-logo" href="">Cart</a>

    <a class="logout-option" href="destroysesh.php">Logout</a>

   
  </div>
  <br>
  <h2 class="new-products-heading">New Products</h2>
  <p style="background-image: url('https://cdn.pixabay.com/photo/2017/08/30/01/05/milky-way-2695569_1280.jpg');">
     You can specify background images<br>
for any visible HTML element.<br>
In this example, the background image<br>
is specified for a p element.<br>
By default, the background-image<br>
will repeat itself in the direction(s)<br>
where it is smaller than the element<br>
where it is specified. Try resizing the<br>
browser window to see how the<br>
background image behaves.
</p>

  <div class="product-card" onclick="showDetails('Product 1')">
  
    <img src="productimages/11.jpg" alt="Product 1">
    <a href="contact.php"><h4>view product details<h4></a>
    <div class="details">
      <h3></h3>
      <p>Price: $19.99</p>
    </div>
  </div>


  
  <div class="product-card" onclick="showDetails('Product 2')">
    <img src="productimages/.ii.jpg" alt="Product 2">
    <div class="details">
      <h3>Product 2</h3>
      <p>Price: $24.99</p>
    </div>
  </div>

  <div class="product-card" onclick="showDetails('Product 3')">
    <img src="productimages/asus wall.jpg" alt="Product 3">
    <div class="details">
      <h3>Product 3</h3>
      <p>Price: $29.99</p>
    </div>
  </div>

  <div id="details-modal" style="display: none;">
    <h2 id="details-title"></h2>
    <p id="details-content"></p>
  </div>






  




</body>
<!-- <script>
    function showDetails(productName) {
      var modal = document.getElementById('details-modal');
      var title = document.getElementById('details-title');
      var content = document.getElementById('details-content');

      title.textContent = productName;
      content.textContent = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';

      modal.style.display = 'block';
    }
  </script> -->
</html>























<!-- <li><a class="dropdown-item" href="#">arts</a></li>
            <li><a class="dropdown-item" href="#">gift articles</a></li>
            <li><a class="dropdown-item" href="#">greeting cards</a></li>
            <li><a class="dropdown-item" href="#">dolls</a></li>
            <li><a class="dropdown-item" href="#">files</a></li>
            <li><a class="dropdown-item" href="#">handbags</a></li>
            <li><a class="dropdown-item" href="#">allet action</a></li>
            <li><a class="dropdown-item" href="#">beauty products </a></li> -->