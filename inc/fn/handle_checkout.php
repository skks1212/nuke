<?php
if (isset($_POST['payment'])) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login");
    }
    $address = $_POST['address'];
    $payment = $_POST['payment'];
    $cart = $_SESSION['cart'];
    $user_id = $_SESSION['user_id'];
    $products = mysqli_safe_query("SELECT * FROM products WHERE id IN (" . implode(",", $cart) . ")");
    while ($product = mysqli_fetch_assoc($products)) {
        $product = (object)$product;
        $total += $product->price * (1 - $product->discount / 100);
        mysqli_safe_query("INSERT INTO orders (user, product, address, payment_mode, payment, time) VALUES (%d, %d, %s, %s, %d, %d)", $user_id, $product->id, $address, $payment, $product->price * (1 - $product->discount / 100), time());
        $_SESSION["cart"] = [];
        header("Location: profile?placed=true");
    }
}
