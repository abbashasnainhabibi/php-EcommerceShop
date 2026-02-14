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
        $procat = $_POST["procat"];
        $prostock = $_POST["prostock"];
        $proshopname = $_POST['shopname'];
        //get old destition from database
        $sql11 = "SELECT image from products WHERE id=$update";
        $runqq = mysqli_query($conn, $sql11);
        $data2 = mysqli_fetch_all($runqq);
        $olddest = $data2[0];
        $query = "select id from shop where shopname='$proshopname' ";
        $runquery = mysqli_query($conn, $query);
        $data = mysqli_fetch_row($runquery);
        $shopid = $data[0];
        // $imagename = $_FILES['proimage']['name'];
        // $tempname = $_FILES['proimage']['tmp_name'];
        // $dest = "../productimages/" . $imagename;
        // $imagetype = strtolower(pathinfo($imagename, PATHINFO_EXTENSION));
        // $allowtypes = array('png', 'jpeg', 'jpg');
        // $size = $_FILES['proimage']['size'];

        // if (empty($imagename)) {
            $sql = "UPDATE `products` SET `id`='$update',`name`='$proname',`price`='$proprice',`desc`='$prodesc',`stock`='$prostock',`category`='$procat', shopID=$shopid where id=$update ";
            mysqli_query($conn, $sql);
            header("location:proadmin.php");
        // } else {
        //     if (in_array($imagetype, $allowtypes)) {
        //         if ($size <= 10000000) {
                    
        //             unlink($olddest[0]);
        //             $imgcheck = "select image from products where image='$dest' ";
        //             $runq = mysqli_query($conn, $imgcheck);
        //             if (mysqli_num_rows($runq) !== 1) {

        //                 unlink($dest);

        //                 move_uploaded_file($tempname, $dest);
        //                 $sql = "UPDATE `products` SET `id`='$update',`name`='$proname',`price`='$proprice',`desc`='$prodesc',`stock`='$prostock',`category`='$procat', shopID=$shopid, `image`='$dest' where id=$update ";

                        mysqli_query($conn, $sql);
                        header("location: proadmin.php");

                    }
    //             }
    //         }

    //     }

    // }


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

            <div class="form-group">
          
                <select id="category" name="procat">
                <option>choose category </option>
          <?php
          include("fetchcat.php");
          foreach ($options as $option) {


          ?>
            <option value=<?php echo $option['id']; ?>><?php echo $option['catname']; ?> </option>
          <?php
          }
          ?>
                </select>
            </div class="form-group" >
            <select name="shopname">
            <option>update shop</option>
                <?php
                include("fetch.php");
                foreach ($options as $option) {
                    ?>
                    <option value="<?php echo $option['shopname']; ?>"><?php echo $option['shopname']; ?> </option>
                    <?php
                }
                ?>
            </select>
            <br>
<br>
            <!-- <div class="form-group">
                <label for="file">Add Product Image:</label>
                <input type="file" id="file" name="proimage">
            </div> -->

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