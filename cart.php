<?php include 'header.php'; ?>

<head>
    <title>Your cart</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="cart-page">
        <h2>Your Cart</h2>
        <div class="cart-item">
            <img src="photos/iphone-15-pro-max-silicone-case-with-magsafe-winter-blue_MT1Y3.webp" alt="Item 1">
            <div class="cart-details">
                <p style="font-weight: bold;">IPhone 15 pro case</p>
                <p class="cart-price">$19.99 <span>for (1) items</span></p>
            </div>
            <input  type="number" value="1" min="1" class="quantity" >
        </div>
        <div class="cart-item">
            <img src="photos/IPhone Cable.jpg" alt="Item 2">
            <div class="cart-details">
                <p style="font-weight: bold;">IPhone Charger</p>
                <p class="cart-price">$29.99 <span>for (1) items</span></p>
            </div>
            <input type="number" value="1" min="1" class="quantity" >
        </div>
        <div id="cartTotal" class="total">
            Total: $49.98
        </div>
    </div>
    <script src="cartJS.js"></script>
</body>

<?php include 'footer.php'; ?>
