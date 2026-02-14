<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
    <title> update Product Form</title>
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
    $sql = "select * from products where id=$update";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $price = $row['price'];
    $category = $row['category'];
    $stock = $row['stock'];
    $desc = $row['desc'];




    if (isset($_POST['submit'])) {
        $proname = $_POST["proname"];
        $proprice = $_POST["proprice"];
        $prodesc = $_POST["prodesc"];
        
        $prostock = $_POST["prostock"];
        
        
        
            $sql = "UPDATE `products` SET `id`='$update',`name`='$proname',`price`='$proprice',`desc`='$prodesc',`stock`='$prostock' where id=$update ";
            mysqli_query($conn, $sql);
            header("location:products.php");
      
                        header("location: products.php");

                    }
                

      
    


    ?>

</head>

<body>
    <div class="container">
        <h1>Update Product</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product-name">Product Name:</label>
                <input value=<?php echo $name; ?> type="text" name="proname" placeholder="Enter product name" required>
            </div>
            <!-- 
            <div class="form-group">
                <label for="file">Add Product Image:</label>
                <input type="file" id="file" name="proimage">
                
            </div> -->

            <!-- <div class="form-group">
          
                <select id="category" name="procat">
                <option>choose category </option> -->
          <?php
        //   include("fetchcat.php");
        //   foreach ($options as $option) {


          ?>
            <!-- <option value=<?php echo $option['id']; ?>><?php echo $option['catname']; ?> </option> -->
          <?php
        //   }
          ?>
                </select>
            
            <br>
<br>
           

            <div class="form-group">
                <label for="product-description">Product Description:</label>
                <textarea name="prodesc" placeholder="" required><?php echo $desc; ?></textarea>
                <!-- <?php
                // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $message = $_row['prodesc'];
//     echo $desc;
// }
                ?> -->

            </div>

            <div class="form-group">
                <label for="product-price">Price:</label>
                <input value=<?php echo $price; ?> type="text" name="proprice" placeholder="Enter price" required>
            </div>

            <div class="form-group">
                <label for="product-quantity">Stock</label>
                <input value=<?php echo $stock; ?> type="number" name="prostock" required>
            </div>

            <button type="submit" name="submit">update product details</button>
        </form>
    </div>
</body>

</html>