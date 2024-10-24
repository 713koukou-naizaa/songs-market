<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];
    $newQuantity = (int) $_POST['quantity'];

    // remove product from cart if quantity is 0 or less
    if ($newQuantity <= 0) {
        unset($_SESSION['cart'][$productId]);
    } else {
        // update quantity
        $_SESSION['cart'][$productId] = $newQuantity;
    }

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}


