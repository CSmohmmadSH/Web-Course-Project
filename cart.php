<?php
// Start the session to track cart items
session_start();
include 'header.php';
include 'DataBase.php';

// Initialize cart in session if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle the "Add to Cart" form submission
if (isset($_POST['add_to_cart'])) {
    $productId = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        $query = "SELECT name, price, stock FROM products WHERE product_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        if ($product) {
            $_SESSION['cart'][$productId] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'stock' => $product['stock']
            ];
        } else {
            echo "<p style='color: red;'>Error: Product not found.</p>";
        }
    }
    echo "<p style='color: green;'>Item added to cart successfully!</p>";
}

// Handle the "Remove from Cart" form submission
if (isset($_POST['remove_from_cart'])) {
    $productId = intval($_POST['product_id']);
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]); // Remove the item from the cart
        echo "<p style='color: green;'>Item removed from cart successfully!</p>";
    }
}

// Handle the "Update Quantity" form submission
if (isset($_POST['update_quantity'])) {
    $productId = intval($_POST['product_id']);
    $newQuantity = intval($_POST['quantity']);

    if (isset($_SESSION['cart'][$productId])) {
        // Update quantity, ensuring it doesn't exceed stock
        if ($newQuantity <= $_SESSION['cart'][$productId]['stock']) {
            $_SESSION['cart'][$productId]['quantity'] = $newQuantity;
        } else {
            echo "<p style='color: red;'>Error: Quantity exceeds stock available.</p>";
        }
    }
}

// Calculate the total price
$totalPrice = 0;
foreach ($_SESSION['cart'] as $productId => $item) {
    $itemTotal = $item['price'] * $item['quantity'];
    $totalPrice += $itemTotal;
}

// Store the total price in session
$_SESSION['cart_total'] = $totalPrice;

// Display cart contents
?>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <div class="cart-page">
        <h2>Your Cart</h2>
        <div class="cart-items">
            <?php
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $productId => $item) {
                    $itemTotal = $item['price'] * $item['quantity'];
                    echo "
                        <div class='cart-item'>
                            <img src='photos/{$item['name']}.webp' alt='{$item['name']}'>
                            <div class='cart-details'>
                                <p><strong>{$item['name']}</strong></p>
                                <p class='cart-price'>\${$itemTotal} <span>for ({$item['quantity']}) items</span></p>
                                <form method='POST' action=''>
                                    <input type='hidden' name='product_id' value='{$productId}'>
                                    <label for='quantity_{$productId}'>Quantity:</label>
                                    <input type='number' name='quantity' id='quantity_{$productId}' value='{$item['quantity']}' min='1' max='{$item['stock']}'>
                                    <button type='submit' name='update_quantity' class='update-button'>Update</button>
                                </form>
                                <form method='POST' action=''>
                                    <input type='hidden' name='product_id' value='{$productId}'>
                                    <button type='submit' name='remove_from_cart' class='remove-button'>Remove</button>
                                </form>
                            </div>
                        </div>
                    ";
                }
            } else {
                echo "<p>Your cart is empty.</p>";
            }
            ?>
        </div>
        <div id="cartTotal" class="total">
            Total: $<?php echo number_format($_SESSION['cart_total'], 2); ?>
        </div>

        <!-- Order Button -->
        <?php if (!empty($_SESSION['cart'])): ?>
            <form method="POST" action="payment.php">
                <button type="submit" class="order-button">Proceed to Payment</button>
            </form>
        <?php endif; ?>
    </div>
    <script src="cartJS.js"></script>
</body>

<?php include 'footer.php'; ?>
