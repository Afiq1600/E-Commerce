<?php

session_start();
$product_id = $_GET['id'];

if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] += 1;
} else {
    $_SESSION['cart'][$product_id] = 1;
}

echo "<script>alert('Product has been add to cart!')</script>";
echo "<script>location='cart.php';</script>";
