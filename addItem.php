<?php include 'adminHeader.php'; ?>

<head>
    <title>Add New Item - Admin</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="adminPage.css">
</head>
<body>
    <main>
        <section class="admin-section">
            <h2>Add New Item</h2>
            <form action="/add-item" method="POST">
                <label for="item-name">Item Name:</label>
                <input type="text" id="item-name" name="itemName" required>

                <label for="item-description">Description:</label>
                <textarea id="item-description" name="itemDescription" required></textarea>

                <label for="item-price">Price:</label>
                <input type="number" id="item-price" name="itemPrice" required>

                <button type="submit">Add Item</button>
            </form>
        </section>
    </main>
</body>

<?php include 'footer.php'; ?>
