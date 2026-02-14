
<?php
include "connection.php";
$productid =  $_GET['id'];
$sql = "SELECT * FROM Products WHERE id=$productid";
$runq = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_array($runq);




?>
<!DOCTYPE  html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
<title><?php echo $fetch[1]; ?> &mdash; Arts</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts/icomoon/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/jquery.fancybox.min.css">
<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/aos.css">
<link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style.css">
</head>
<style>
    .proname{
        font-size: 60px;
    font-family:Leelawadee UI Semilight;
    font-weight: bolder;
    color: black;
    margin-bottom: 5px;
   
  }
  .prodesc{
    font-size: 15px;
    font-family:Comic Sans MS;
    font-weight: bolder;
    color: black;
  }
  .prodesc1{
    text-decoration:underline; 
    font-size: 15px;
    font-family:Comic Sans MS;
    font-weight: bolder;
    color: black;
  }
    .proprice{
        font-size: 15px;
    font-family:Comic Sans MS;
    font-weight: bolder;
    color: black;
    }
    .prostock{
        font-size: 15px;
    font-family:Ink Free;
    font-weight: bolder;
    color: black;
   
    }
</style>

<?php

?>



<div class="site-section mt-5">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="owl-carousel hero-slide owl-style">
<img style="height:600px; width:1200px; " src=".//<?php echo $fetch[4]; ?>" alt=".//<?php echo $fetch[4]; ?>" class="img-fluid">
</div>
</div>
<div class="col-lg-5 ml-auto">
<h2 class='proname'><?php echo $fetch[1]; ?></h2>
<p class="proprice">Price: <?php echo $fetch[2]; ?></p>

<div class="mb-5">
<div class="input-group mb-3" style="max-width: 200px;">
<div class="input-group-prepend">
<button class="btn btn-outline-dark js-btn-minus" type="button">&minus;</button>
</div>
<input type="text" class="form-control text-center border mr-0" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
<div class="input-group-append">
<button class="btn btn-outline-dark js-btn-plus" type="button">&plus;</button>

</div>
</div>
<p><a href="placeorder.php?proid=<?php echo $productid; ?>" class="buy-now btn btn-sm height-auto px-4 py-3 btn-dark">place order</a></p>
<p  class="prodesc1" >Prouct Description:</p>
<ul class='prodesc'> <li><?php echo $fetch[3]; ?></li></ul>
</div>

<p class='prostock'>Stock: <?php echo $fetch[6]; ?></p>


</div>
</div>
</div>
</div>




<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.mb.YTPlayer.min.js"></script>
<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
 
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7c7d9f66ab144a95","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>
</html>