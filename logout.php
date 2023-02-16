<?php
session_start();
session_destroy();
echo "<script>alert('You has been logout!')</script>";
echo "<script>location='product.php';</script>";
