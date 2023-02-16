<?php
session_start();
include 'connect.php';

$productId = $_GET['id'];

$take = $connect->query("SELECT * FROM product WHERE product_id=$productId");
$detail = $take->fetch_assoc();

?>




<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<main id="main">
    <div class="container">
        <!-- Products Details -->
        <section class="section product-details__section">
            <div class="product-detail__container">
                <div class="product-detail__left">
                    <div class="details__container--left">
                        <div class="product__picture" id="product__picture">
                            <!-- <div class="rect" id="rect"></div> -->
                            <div class="picture__container">
                                <img src="productPicture/<?= $detail["product_picture"]; ?>" id="pic" />
                            </div>
                        </div>
                        <div class="zoom" id="zoom"></div>
                    </div>
                </div>

                <div class="product-detail__right">
                    <div class="product-detail__content">
                        <h3><?= $detail["product_name"]; ?></h3>
                        <div class="price">
                            <span class="new__price">RM <?= number_format($detail["product_price"]); ?></span>
                        </div>
                        <div class="price">
                            <span class="new__price">Product Stock: <?= $detail['product_stock']; ?></span>
                        </div>
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <?php if ($detail['product_stock'] < 0) : ?>
                                        <input type="number" min="0" max="0">
                                    <?php else : ?>
                                        <input type="number" min="1" max="<?= $detail['product_stock']; ?>" class="form-control" name="total">
                                    <?php endif; ?>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" name="submit">Buy</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST["submit"])) {
                            $total = $_POST["total"];
                            if ($total == 0) {
                                echo "<script>alert('Please insert quantity first!')</script>";
                                echo "<script>location='productDetail.php?id=$productId';</script>";
                                exit();
                            }
                            $_SESSION['cart'][$productId] = $total;
                            echo "<script>alert('Product has been add to cart!')</script>";
                            echo "<script>location='cart.php';</script>";
                        }
                        ?>

                        <p>
                            <?= $detail["product_description"]; ?>
                        </p>
                    </div>
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