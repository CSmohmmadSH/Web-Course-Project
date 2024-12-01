<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "drop_shipping_db";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $conn->real_escape_string($_POST['itemName']);
    $itemPrice = $conn->real_escape_string($_POST['itemPrice']);
    $itemStock = $conn->real_escape_string($_POST['itemStock']);
    $itemImgUrl = $conn->real_escape_string($_POST['itemImgUrl']);

    $sql = "INSERT INTO products (name, price, stock, image_url)
            VALUES ('$itemName', '$itemPrice', '$itemStock', '$itemImgUrl')";

    if ($conn->query($sql) === TRUE) {
        header("Location: addItem.php?status=success");
    } else {
        header("Location: addItem.php?status=error");
    }
}

$conn->close();
?>
