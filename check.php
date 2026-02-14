<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .order-details {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .order-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .item-name {
            flex: 1;
        }
        .item-price {
            flex-basis: 100px;
            text-align: right;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order Details</h1>
        <div class="order-details">
            <div class="order-item">
                <div class="item-name">Product 1</div>
                <div class="item-price">$20.00</div>
            </div>
            <div class="order-item">
                <div class="item-name">Product 2</div>
                <div class="item-price">$15.00</div>
            </div>
            <div class="order-item">
                <div class="item-name">Product 3</div>
                <div class="item-price">$30.00</div>
            </div>
            <div class="total">
                Total: $65.00
            </div>
        </div>
    </div>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

.container {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.order-total {
    font-weight: bold;
}

h1, h2 {
    color: #333;
}

.billing-method, .user-details, .item-details {
    margin-bottom: 30px;
}

.item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
}

.item-name, .item-price {
    flex: 1;
}

.item-price {
    text-align: right;
    color: #007bff;
}

/* Add more styling as needed for a modern design */

</style>
<body>
    <div class="container">
        <div class="order-header">
            <h1>Order Details</h1>
            <p class="order-total">Total Amount: $65.00</p>
        </div>
        <div class="billing-method">
            <h2>Billing Method</h2>
            <p>Credit Card</p>
        </div>
        <div class="user-details">
            <h2>User Details</h2>
            <p>Name: John Doe</p>
            <p>Email: johndoe@example.com</p>
            <p>Address: 123 Main St, City</p>
        </div>
        <div class="item-details">
            <h2>Item Details</h2>
            <div class="item">
                <p class="item-name">Product 1</p>
                <p class="item-price">$20.00</p>
            </div>
            <div class="item">
                <p class="item-name">Product 2</p>
                <p class="item-price">$15.00</p>
            </div>
            <div class="item">
                <p class="item-name">Product 3</p>
                <p class="item-price">$30.00</p>
            </div>
        </div>
    </div>
</body>
</html>
