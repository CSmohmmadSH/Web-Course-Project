<?php include 'header.php'; ?>

<head>
    <title>Wishlist</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="wishlist.css">
</head>
<body>
    <div class="wishlist-container">
        <div class="wishlist-header">
            <h1>Wishlist</h1>
            <button class="create-wishlist-btn">CREATE NEW WISHLIST</button>
        </div>
        <div class="wishlist-content">
            <div class="wishlist-list">
                <div class="wishlist-item">
                    <span class="wishlist-name">default</span>
                    <span class="wishlist-default">Default</span>
                    <p>No items <span class="wishlist-lock">🔒</span></p>
                </div>
            </div>
            <div class="wishlist-empty">
                <img src="photos/wishlistempty.png" class="wishlist-placeholder">
                <h2>Ready to make a wish?</h2>
                <p>Start adding items you love to your wishlist by tapping on the heart icon</p>
            </div>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>
