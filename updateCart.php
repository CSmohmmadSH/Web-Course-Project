<?php
session_start();
include 'DataBase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = intval($_POST['product_id']);
    $newQuantity = intval($_POST['quantity']);

    if (isset($_SESSION['cart'][$productId])) {
        if ($newQuantity <= $_SESSION['cart'][$productId]['stock']) {
            // Update the quantity
            $_SESSION['cart'][$productId]['quantity'] = $newQuantity;

            // Calculate the new item total and cart total
            $itemTotal = $_SESSION['cart'][$productId]['price'] * $newQuantity;
            $cartTotal = array_reduce($_SESSION['cart'], function ($total, $item) {
                return $total + ($item['price'] * $item['quantity']);
            }, 0);
            $_SESSION['cart_total'] = $cartTotal;

            echo json_encode([
                "success" => true,
                "itemTotal" => $itemTotal,
                "cartTotal" => $cartTotal,
            ]);
        } else {
            echo json_encode(["success" => false, "message" => "Quantity exceeds stock available."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Product not found in cart."]);
    }
}
