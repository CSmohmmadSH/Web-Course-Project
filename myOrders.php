<?php
session_start();
include('header.php');
include('DataBase.php');  // Assuming you have this for database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You need to be logged in to view your orders.";
    exit();
}

$user_id = $_SESSION['user_id']; // Get the logged-in user ID

// Query to get orders for the logged-in user
$query = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Your Orders</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>";
    
    while ($order = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$order['order_id']}</td>
                <td>{$order['order_date']}</td>
                <td>{$order['status']}</td>
                <td>{$order['total_amount']}</td>
                <td><a href='orderDetails.php?order_id={$order['order_id']}'>View Details</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "You have no orders yet.";
}

$stmt->close();
$conn->close();
include('footer.php');
?>
