<?php include 'adminHeader.php'; ?>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="adminPage.css">
    <script>
        // Function to display the selected section
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => section.style.display = 'none');
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="admin-header">
                <img src="photos/profile-picture.jpg" alt="Profile" class="profile-picture">
                <h3>Admin Dashboard</h3>
            </div>
            <nav class="sidebar-nav">
                <button onclick="showSection('addItem')">Add New Item</button>
                <button onclick="showSection('updateItem')">Update Item Info</button>
                <button onclick="showSection('deleteItem')">Delete Item</button>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Add Item Section -->
            <section id="addItem" class="content-section" style="display: block;">
    <h2>Add New Item</h2>
    <form action="addItemHandling.php" method="POST" class="admin-form">
        <div class="form-group">
            <label for="item-name">Item Name:</label>
            <input type="text" id="item-name" name="itemName" required>
        </div>
        <div class="form-group">
            <label for="item-price">Price:</label>
            <input type="text" id="item-price" name="itemPrice" required>
        </div>
        <div class="form-group">
            <label for="item-stock">Stock:</label>
            <input type="text" id="item-stock" name="itemStock" required>
        </div>
        <div class="form-group">
            <label for="item-img-url">Image URL:</label>
            <input type="text" id="item-img-url" name="itemImgUrl" required>
        </div>
        <div class="form-group">
            <button type="submit">Add Item</button>
        </div>
    </form>
</section>

            <!-- Update Item Section -->
            <section id="updateItem" class="content-section" style="display: none;">
                <h2>Update Item Info</h2>
                <p>Update item form will go here.</p>
            </section>

            <!-- Delete Item Section -->
            <section id="deleteItem" class="content-section" style="display: none;">
                <h2>Delete Item</h2>
                <p>Delete item form will go here.</p>
            </section>
        </main>
    </div>
</body>

<?php include 'footer.php'; ?>
