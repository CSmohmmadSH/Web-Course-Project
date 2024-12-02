<!-- refund.php -->
<?php
session_start();
include('header.php');
?>

<h2>Request a Refund</h2>

<form action="processRefund.php" method="POST">
    <label for="order_id">Order ID:</label>
    <input type="text" id="order_id" name="order_id" required><br><br>
    
    <label for="reason">Reason for Refund:</label>
    <textarea id="reason" name="reason" required></textarea><br><br>

    <input type="submit" value="Submit Refund Request">
</form>

<?php
include('footer.php');
?>
