<?php
session_start();
include('DataBase.php');

// Only admin can approve
if ($_SESSION['role'] != 'admin') {
    header('Location: home.php');
    exit();
}

$refund_id = $_GET['refund_id'];

// Update refund status to "Approved"
$query = "UPDATE refunds SET status = 'Approved' WHERE refund_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $refund_id);
$stmt->execute();

// Optionally, initiate the refund with a payment gateway (e.g., PayPal, Stripe)

echo "Refund has been approved.";
$stmt->close();
$conn->close();
?>
