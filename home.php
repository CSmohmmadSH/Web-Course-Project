<?php 
include 'header.php'; 
include 'DataBase.php'; 
?>

<head>
    <title>Drop Shipping Website</title>
    <link rel="stylesheet" href="home.css">
</head>

<main>
    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <?php
            // Fetch product data
            $query = "SELECT product_id, name, price, stock, image_url FROM products";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                // Determine stock status class
                $stockClass = ($row['stock'] < 5) ? "low-stock" : "stock";
                $outOfStock = $row['stock'] == 0; // Check if stock is 0

                // Display product details
                echo "
                    <div class='product-card'>
                        <div class='product-image'>
                            ";
                
                // Display product image if not out of stock
                if ($outOfStock) {
                    echo "<p class='out-of-stock'>Out of Stock</p>";
                } else {
                    // Fetch the image URL from the database and display it
                    $imageUrl = $row['image_url']; // This assumes the URL is correct
                    echo "<img src='{$imageUrl}' alt='{$row['name']}'>";
                }

                echo "
                        </div>
                        <h3>{$row['name']}</h3>
                        <p>Price: \${$row['price']}</p>
                        <p class='{$stockClass}'>Stock: {$row['stock']} pieces</p>
                        <form method='POST' action='cart.php'>
                            <input type='hidden' name='product_id' value='{$row['product_id']}'>
                            <input type='number' name='quantity' value='1' min='1' max='{$row['stock']}' " . ($outOfStock ? "readonly" : "") . ">
                            <button type='submit' name='add_to_cart' " . ($outOfStock ? "disabled" : "") . ">Add to Cart</button>
                        </form>
                    </div>
                ";
            }
            ?>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
