<?php
    session_start();
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
            $query = "SELECT product_id, name, price, stock, image_url FROM products";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $outOfStock = $row['stock'] == 0;
                $imageClass = $outOfStock ? "grayscale" : "";

                echo "
                    <div class='product-card'>
                        <div class='product-image'>
                            <img src='{$row['image_url']}' alt='{$row['name']}' class='" . ($outOfStock ? "grayscale" : "") . "'>
                                " . ($outOfStock ? "<p class='sad-text'>(out of stock)</p>" : "") . "
                        </div>
                        <h3>{$row['name']}</h3>
                        <p>Price: \${$row['price']}</p>
                            " . (!$outOfStock ? "<p class='stock'>Stock: {$row['stock']} pieces</p>" : "") . "
                        <form method='POST' action='cart.php'>
                            <input type='hidden' name='product_id' value='{$row['product_id']}'>
                            <input type='number' name='quantity' value='" . ($outOfStock ? "0" : "1") . "' min='1' max='{$row['stock']}' " . ($outOfStock ? "readonly" : "") . ">
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
