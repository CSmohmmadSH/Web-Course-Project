<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "drop_shipping_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo "Database connection failed: " . $conn->connect_error;
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullName = trim($_POST['full-name']);
    $email = trim($_POST['email']);

    if (empty($fullName) || empty($email)) {
        http_response_code(400);
        echo "Full name and email are required.";
        exit();
    }

    $sql = "INSERT INTO user (email, username) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        http_response_code(500);
        echo "Prepare failed: " . $conn->error;
        exit();
    }

    $stmt->bind_param("ss", $email, $fullName);

    if ($stmt->execute()) {
        http_response_code(200);
        echo "Registration successful.";
    } else {
        if ($stmt->errno === 1062) {
            http_response_code(409);
            echo "Error: Email is already registered.";
        } else {
            http_response_code(500);
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>
