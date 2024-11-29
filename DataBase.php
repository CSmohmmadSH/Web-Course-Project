<?php

$host = "localhost";       
$username = "root";        
$password = "";            
$database = "drop_shipping_db"; 

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Uncomment this line for debugging if needed
    // echo "Database connected successfully!";
}

/**
 * Update the stock for a given product.
 *
 * @param mysqli $conn The database connection.
 * @param int $productId The ID of the product to update.
 * @param int $quantity The quantity to reduce from the stock.
 * @return bool True if the stock was successfully updated; false otherwise.
 */
function updateStock($conn, $productId, $quantity) {
    // Query to update stock only if the requested quantity is available
    $query = "UPDATE products SET stock = stock - ? WHERE product_id = ? AND stock >= ?";
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bind_param("iii", $quantity, $productId, $quantity);

    // Execute the query
    $stmt->execute();

    // Return true if rows were affected (stock updated successfully)
    return $stmt->affected_rows > 0;
}

// Example usage
// Uncomment to test the function
/*
$productId = 1; // Replace with actual product ID
$quantity = 2;  // Replace with the quantity to deduct
if (updateStock($conn, $productId, $quantity)) {
    echo "Stock updated successfully!";
} else {
    echo "Failed to update stock. Ensure sufficient quantity is available.";
}
*/

?>
