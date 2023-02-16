<?php
session_start();
include 'connect.php';


// if (!isset($_SESSION["customer"])) {
//     echo "<script>alert('You must login first')</script>";
//     echo "<script>location='login.php';</script>";
//     header("location:login.php");
//     exit();
// }

if (empty($_SESSION["customer"]) or !isset($_SESSION["customer"])) {
    echo "<script>alert('Please login first!')</script>";
    echo "<script>location='login.php';</script>";
}

if (empty($_SESSION["cart"]) or !isset($_SESSION["cart"])) {
    echo "<script>alert('Please buy product first to go cart!')</script>";
    echo "<script>location='product.php';</script>";
}

?>






<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<section class="content">
    <div class="container">
        <h1>Your Cart</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody>

                <?php $no = 1; ?>
                <?php $totalPayment = 0; ?>
                <?php foreach ($_SESSION["cart"] as $product_id => $total) : ?>
                    <?php
                    $take = $connect->query("SELECT * FROM product 
                     WHERE product_id = '$product_id' ");
                    $takeData = $take->fetch_assoc();
                    $subTotal = $takeData["product_price"] * $total;
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $takeData["product_name"]; ?></td>
                        <td>RM <?= number_format($takeData["product_price"]); ?></td>
                        <td><?= $total; ?></td>
                        <td>RM <?= number_format($subTotal); ?></td>
                    </tr>
                    <?php $totalPayment += $subTotal; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Payment</th>
                    <th>RM <?= number_format($totalPayment); ?></th>
                </tr>
            </tfoot>
        </table>
        <form method="post" action="">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" readonly value="<?= $_SESSION['customer']['customer_name'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" readonly value="<?= $_SESSION['customer']['customer_phoneN'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="delivery_id">
                        <option value="">Choose delivery</option>
                        <?php
                        $take = $connect->query("SELECT * FROM delivery");
                        while ($takeDelivery = $take->fetch_assoc()) : ?>
                            <option value="<?= $takeDelivery['delivery_id']; ?>">
                                <?= $takeDelivery["delivery_city"]; ?> -
                                RM<?= number_format($takeDelivery["delivery_rate"]); ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        $quantity = $_SESSION["cart"]["$product_id"];
                        $take = $connect->query("SELECT * FROM discount");
                        $takeDiscount = $take->fetch_assoc();
                        if ($quantity >= 2) : ?>
                            <input type="text" readonly value="Discount: <?= $takeDiscount['discount'] ?>%" class="form-control">
                        <?php else : ?>
                            <input type="text" readonly value="Discount: 0%" class="form-control">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Full Delivery Address</label>
                <textarea class="form-control" name="address" placeholder="Please insert your full address for delivery(including postcode)"></textarea>
            </div>
            <button class="btn btn-primary" name="submit">Checkout</button>
        </form>

        <?php

        if (isset($_POST['submit'])) {

            $customerId = $_SESSION["customer"]["customer_id"];
            $deliveryId = $_POST["delivery_id"];
            $transactionDate = date("Y-m-d");
            $deliveryAddress = $_POST["address"];

            if ($deliveryId == 0) {

                echo "<script>alert('Please choose delivery first!')</script>";
                echo "<script>location='checkout.php';</script>";
                exit();
            }

            $take = $connect->query("SELECT * FROM delivery WHERE delivery_id='$deliveryId' ");
            $takeArrayDelivery = $take->fetch_assoc();

            $take = $connect->query("SELECT * FROM discount");
            $takeArrayDiscount = $take->fetch_assoc();

            $deliveryCity = $takeArrayDelivery['delivery_city'];
            $deliveryRate = $takeArrayDelivery['delivery_rate'];
            $allTotalPayment = $totalPayment + $deliveryRate;

            $discountt = $takeArrayDiscount['discount'];
            $allFinalTotalPayment = $allTotalPayment - ($allTotalPayment * $discountt / 100);
            var_dump($allFinalTotalPayment);

            $connect->query(
                "INSERT INTO transaction (customer_id,delivery_id,transaction_date,transaction_total,dCity,dRate,dAddress,discount)
                VALUES ('$customerId','$deliveryId','$transactionDate','$allFinalTotalPayment','$deliveryCity','$deliveryRate','$deliveryAddress','$discountt') "
            );

            $newTransactionId = $connect->insert_id;

            foreach ($_SESSION["cart"] as $product_id => $total) {

                $take = $connect->query("SELECT * FROM product WHERE product_id=$product_id");
                $takeData = $take->fetch_assoc();

                $productName = $takeData["product_name"];
                $productPrice = $takeData["product_price"];
                $productWeight = $takeData["product_weight"];

                $subWeight = $takeData["product_weight"] * $total;
                $subPrice = $takeData["product_price"] * $total;

                $connect->query("INSERT INTO product_transaction (transaction_id,product_id,pName,pPrice,pWeight,pSub_weight,pSub_price,product_total)
                    VALUES ('$newTransactionId','$product_id','$productName','$productPrice','$productWeight','$subWeight','$subPrice','$total') ");

                $connect->query("UPDATE product SET product_stock = product_stock - $total 
                    WHERE product_id='$product_id' ");
            }

            unset($_SESSION["cart"]);

            echo "<script>alert('Transaction successful!')</script>";
            echo "<script>location='paymentNote.php?id=$newTransactionId';</script>";
        }
        ?>



    </div>
</section>

<!-- <pre> <?php print_r($_SESSION["cart"]) ?> </pre> -->
</body>

</html>

<?php include 'facility.php'; ?>

<?php include 'footer.php'; ?>

<?php include 'goto.php'; ?>

<?php include 'script.php'; ?>