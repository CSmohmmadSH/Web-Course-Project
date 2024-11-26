<?php include 'adminHeader.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Item - Admin</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="adminPage.css">
</head>
<body>
    <main>
        <section class="admin-section">
            <h2>Delete Item</h2>
            <form action="/delete-item" method="POST">
                <label for="item-id-delete">Item ID:</label>
                <input type="text" id="item-id-delete" name="itemId" required>
                
                <button type="submit">Delete Item</button>
            </form>
        </section>
    </main>
</body>

<?php include 'footer.php'; ?>
