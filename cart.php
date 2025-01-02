<?php
session_start();

// Database connection

// Add product to cart
if (isset($_POST['add_to_cart'])) {
    $product_id =$_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        $_SESSION['cart'][$product_id] = array(
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => 1
        );
    }
    header('Location: cart.php');
    exit();
}
// Remove product from cart
if (isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove'];

    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }

    header('Location: cart.php');
    exit();
}
?>