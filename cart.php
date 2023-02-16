<?php

session_start();
include 'connect.php';

if (empty($_SESSION["cart"]) or !isset($_SESSION["cart"])) {
    echo "<script>alert('Please buy product first to go cart!')</script>";
    echo "<script>location='product.php';</script>";
}


?>




<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<main id="main">
    <section class="section cart__area">
        <div class="container">
            <div class="responsive__cart-area">
                <form class="cart__form">
                    <div class="cart__table table-responsive">
                        <table width="100%" class="table">
                            <thead>
                                <tr>
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th>UNIT PRICE</th>
                                    <th>TOTAL</th>
                                    <th>SUBTOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 0; ?>
                                <?php foreach ($_SESSION["cart"] as $product_id => $total) : ?>
                                    <?php
                                    $take = $connect->query("SELECT * FROM product 
                     WHERE product_id = $product_id ");
                                    $takeData = $take->fetch_assoc();
                                    $subTotal = $takeData["product_price"] * $total;
                                    ?>
                                    <tr>
                                        <td class="product__thumbnail">
                                            <a href="#">
                                                <img src="productPicture/<?= $takeData["product_picture"]; ?>" alt="">
                                            </a>
                                        </td>
                                        <td class="product__name">
                                            <a href=""><?= $takeData["product_name"]; ?></a>

                                        </td>
                                        <td class="product__price">
                                            <div class="price">
                                                <span class="new__price">RM <?= number_format($takeData["product_price"]); ?></span>
                                            </div>
                                        </td>
                                        <td class="product__quantity">
                                            <?= $total; ?>
                                        </td>
                                        <td class="product__subtotal">
                                            <div class="price">
                                                <span class="new__price">RM <?= number_format($subTotal); ?></span>
                                            </div>
                                            <a href="cartDelete.php?id=<?= $product_id ?>" onclick="return confirm('Are you sure to remove this product from cart?');" class="remove__cart-item">
                                                <svg>
                                                    <use xlink:href="./images/sprite.svg#icon-trash"></use>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php $_SESSION["countCart"] = $count; ?>
                    <div class="cart-btns">
                        <div class="continue__shopping">
                            <a href="product.php">Continue Shopping</a>
                        </div>
                        <div class="continue__shopping">
                            <a href="checkout.php">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>


</main>
</body>

</html>
<?php include 'facility.php'; ?>

<?php include 'footer.php'; ?>

<?php include 'goto.php'; ?>

<?php include 'script.php'; ?>