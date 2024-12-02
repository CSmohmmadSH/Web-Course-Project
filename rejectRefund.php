<?php
session_start();
include('DataBase.php');

// Only admin can reject
if ($_SESSION['role'] != 'admin') {
    header('Location: home.php');
    exit();
}

$refund_id = $_GET['refund_id'];

// Update refund status to "Rejected"
$query = "UPDATE refunds SET status = 'Rejected' WHERE refund_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $refund_id);
$stmt->execute();

echo "Refund has been rejected.";
$stmt->close();
$conn->close();
?>
