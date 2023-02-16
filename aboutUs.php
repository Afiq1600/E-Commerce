<?php

session_start();
include 'connect.php';

// if (empty($_SESSION["cart"]) or !isset($_SESSION["cart"])) {
//     echo "<script>alert('Please buy product first to go cart!')</script>";
//     echo "<script>location='product.php';</script>";
// }
?>




<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<main id="main">
    <section class="section cart__area">
        <div class="container">
            <div class="responsive__cart-area">
                <form class="cart__form">
                    <div class="cart__table table-responsive">
                        <table width="180%" class="table">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>PICTURE</th>
                                    <th>PROGRAM CODE</th>
                                    <th>STUDENT NUMBER</th>
                                    <th>IC NUMBER</th>
                                    <th>GROUP CLASS</th>
                                    <th>EMAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product__name">
                                        <strong> MOHAMAD AFIQ BIN MOHAMAD BASID</strong>
                                    </td>
                                    <td class="product__thumbnail">

                                        <img src="img/admin/afiq.png" alt="">

                                    </td>
                                    <td class="product__price">
                                        <div class="price">
                                            <span class="new__price">CS110</span>
                                        </div>
                                    </td>
                                    <td class="product__price">
                                        <div class="price">
                                            <span class="new__price">2018274198</span>
                                        </div>
                                    </td>
                                    <td class="product__price">
                                        <div class="price">
                                            <span class="new__price">000-916-05-0025</span>
                                        </div>
                                    </td>
                                    <td class="product__name">
                                        <a href="">JCS1105A</a>
                                    </td>
                                    <td class="product__name">
                                        <a href="">mohamadafiq169@gmail.com</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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