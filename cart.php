<?php
include "connection.php";
session_start();
if ($_SESSION["loggedin"] == 0) {
	header("Location: login.php");
}
if (isset($_GET['proid'])) {
	$addpro = $_GET['proid'];
	array_push($_SESSION['cart'], $addpro);
	header("Location: cart.php");
}
$sessioncart = $_SESSION['cart'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<h1>Shopping Cart</h1>
		<div class="row">
			<div class="col-md-8">
				<table class="table">
					<thead>
						<tr>
							<th>Product</th>
							<th>Price</th>
							
							<th></th>
						</tr>
					</thead>
					<tbody id="cart-items">
						<?php
						foreach ($sessioncart as $item) {
							$sql = "SELECT * FROM Products WHERE id=$item";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
							echo "<tr><td>" . $row['name'] . "</td>";
							echo "<td>" . $row['price'] . "</td></tr>";

						}
						?>
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				
				<a class="btn btn-primary" href="checkout.html" role="button">Checkout</a>
				
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>