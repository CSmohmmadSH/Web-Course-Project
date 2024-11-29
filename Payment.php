<?php
session_start(); // Start the session to access session variables
include 'header.php';
include 'DataBase.php';

// Check if cart is empty
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty. <a href='home.php'>Return to Home</a></p>";
    exit;
}

// Check if cart_total is set before accessing it
if (isset($_SESSION['cart_total'])) {
    $cartTotal = $_SESSION['cart_total'];
} else {
    $cartTotal = 0; // Default value if cart_total isn't set
}

// Simulate payment process
if (isset($_POST['pay'])) {
    $success = true; // Simulate a successful payment
    
    if ($success) {
        // Deduct stock from the database
        foreach ($_SESSION['cart'] as $productId => $item) {
            $newStock = $item['stock'] - $item['quantity'];
            $query = "UPDATE products SET stock = ? WHERE product_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $newStock, $productId);
            $stmt->execute();
        }

        // Clear the cart
        $_SESSION['cart'] = [];

        // Redirect to the success page
        header("Location: success.php");
        exit;
    } else {
        echo "<p>Payment failed. Please try again.</p>";
    }
}
?>

<head>
    <title>Payment</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <div class="payment-page">
        <h2>Payment Simulation</h2>
        <p>Total Amount: $<?php echo number_format($cartTotal, 2); ?></p>

        <form method="POST" action="">
            <div class="payment-form">
                <!-- Card Number -->
                <div class="form-group">
                    <label for="card_number">Card Number:</label>
                    <input type="text" id="card_number" name="card_number" required placeholder="Enter card number" maxlength="16">
                </div>

                <!-- Cardholder Name -->
                <div class="form-group">
                    <label for="cardholder_name">Cardholder's Name:</label>
                    <input type="text" id="cardholder_name" name="cardholder_name" required placeholder="Enter cardholder's name">
                </div>

                <!-- CVV -->
                <div class="form-group">
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" required placeholder="Enter CVV" maxlength="3">
                </div>

                <!-- Expiry Date -->
                <div class="form-group">
                    <label for="expiry_date">Expiry Date:</label>
                    <input type="month" id="expiry_date" name="expiry_date" required>
                </div>

                <!-- Submit Payment Button -->
                <button type="submit" name="pay" class="pay-button">Pay Now</button>
            </div>
        </form>
    </div>

    <script src="payment.js"></script>
</body>

<?php include 'footer.php'; ?>
