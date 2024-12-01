<?php include 'adminHeader.php'; ?>

<head>
    <title>Add New Item - Admin</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="adminPage.css">
    <script>
        function showAlert(message, redirectUrl) {
            alert(message);
            if (redirectUrl) {
                window.location.href = redirectUrl;
            }
        }
    </script>
</head>
<body>
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<script>showAlert('New item added successfully!', 'adminPage.php');</script>";
        } elseif ($_GET['status'] == 'error') {
            echo "<script>showAlert('Error: Unable to add the item.', null);</script>";
        }
    }
    ?>
    <main>
        <section class="admin-section">
            <h2>Add New Item</h2>
            <form action="addItemHandling.php" method="POST">
                <label for="item-name">Item Name:</label>
                <input type="text" id="item-name" name="itemName" required>

                <label for="item-price">Price:</label>
                <input type="number" id="item-price" name="itemPrice" required>

                <label for="item-stock">Stock:</label>
                <input type="number" id="item-stock" name="itemStock" required>

                <label for="item-img-url">Image URL:</label>
                <input type="text" id="item-img-url" name="itemImgUrl" required>

                <button type="submit">Add Item</button>
            </form>
        </section>
    </main>
</body>

<?php include 'footer.php'; ?>
