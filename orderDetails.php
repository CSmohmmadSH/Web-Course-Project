<?php
session_start();
include('header.php');
include('DataBase.php');  // Assuming you have this for database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You need to be logged in to view order details.";
    exit();
}

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Query to get the order details
    $query = "SELECT * FROM orders WHERE order_id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $order_id, $_SESSION['user_id']);
    $stmt->execute();
    $order_result = $stmt->get_result();

    if ($order_result->num_rows > 0) {
        $order = $order_result->fetch_assoc();
        echo "<h2>Order Details</h2>";
        echo "<p><strong>Order ID:</strong> {$order['order_id']}</p>";
        echo "<p><strong>Order Date:</strong> {$order['order_date']}</p>";
        echo "<p><strong>Status:</strong> {$order['status']}</p>";
        echo "<p><strong>Total Amount:</strong> {$order['total_amount']}</p>";

        // Now fetch the items associated with this order (assuming order_items table exists)
        $item_query = "SELECT * FROM order_items WHERE order_id = ?";
        $item_stmt = $conn->prepare($item_query);
        $item_stmt->bind_param("i", $order_id);
        $item_stmt->execute();
        $item_result = $item_stmt->get_result();

        echo "<h3>Ordered Items</h3>";
        echo "<table border='1'>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>";

        while ($item = $item_result->fetch_assoc()) {
            echo "<tr>
                    <td>{$item['product_name']}</td>
                    <td>{$item['quantity']}</td>
                    <td>{$item['price']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Order not found.";
    }
    $stmt->close();
} else {
    echo "Invalid order ID.";
}

$conn->close();
include('footer.php');
?>
