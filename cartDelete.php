<?php

session_start();
$product_id = $_GET["id"];
unset($_SESSION["cart"][$product_id]);

echo "<script>alert('Product has been remove from cart')</script>";
echo "<script>location='cart.php';</script>";

?>