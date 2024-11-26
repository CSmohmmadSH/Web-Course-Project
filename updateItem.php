<?php include 'adminHeader.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item - Admin</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="adminPage.css">
</head>
<body>
    <main>
        <section class="admin-section">
            <h2>Update Item Info</h2>
            <form action="/update-item" method="POST">
                <label for="item-id">Item ID:</label>
                <input type="text" id="item-id" name="itemId" required>

                <label for="new-item-name">New Item Name:</label>
                <input type="text" id="new-item-name" name="newItemName">

                <label for="new-item-description">New Description:</label>
                <textarea id="new-item-description" name="newItemDescription"></textarea>

                <label for="new-item-price">New Price:</label>
                <input type="number" id="new-item-price" name="newItemPrice">

                <button type="submit">Update Item</button>
            </form>
        </section>
    </main>
</body>

<?php include 'footer.php'; ?>

