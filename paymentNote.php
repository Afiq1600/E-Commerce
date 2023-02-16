<?php
session_start();
include 'connect.php';
?>

<?php include 'header.php'; ?>

<?php include 'menu.php'; ?>

<!-- Content -->
<section class="content">
    <div class="container">
        <h2>Transaction Detail</h2>
        <?php
        $take = $connect->query("SELECT * FROM transaction JOIN customer 
ON transaction.customer_id = customer.customer_id 
WHERE transaction.transaction_id=$_GET[id] ");
        $detail = $take->fetch_assoc();
        ?>

        <?php
        $customerAsBuyerId = $detail["customer_id"];
        $customerAsLoginId = $_SESSION["customer"]["customer_id"];

        if ($customerAsBuyerId != $customerAsLoginId) {
            echo "<script>alert('You not allow to this action!')</script>";
            echo "<script>location='transactionHistory.php';</script>";
            exit();
        }
        ?>



        <div class="row">
            <div class="col-md-4">
                <h3>Transaction</h3>
                <strong>Transaction Id: <?= $detail["transaction_id"]; ?></strong><br>
                Date: <?= $detail['transaction_date']; ?>
                <br>
                Total: RM <?= number_format($detail['transaction_total']); ?><br>
                Discount: <?= $detail['discount']; ?>%
            </div>
            <div class="col-md-4">
                <h3>Customer</h3>
                <strong><?= $detail["customer_name"]; ?></strong><br>
                <p>
                    <?= $detail['customer_phoneN']; ?>
                    <br>
                    <?= $detail['customer_email']; ?>
                </p>
            </div>
            <div class="col-md-4">
                <h3>Delivery</h3>
                <strong><?= $detail["dCity"]; ?></strong><br>
                Delivery post cost: RM <?= number_format($detail["dRate"]); ?><br>
                Address: <?= $detail["dAddress"]; ?>
            </div>
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Weigh(g)</th>
                    <th>Total</th>
                    <th>subWeight</th>
                    <th>subTotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php $take = $connect->query("SELECT * FROM product_transaction WHERE transaction_id='$_GET[id]' "); ?>
                <?php while ($takeData = $take->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $takeData["pName"]; ?></td>
                        <td>RM <?= number_format($takeData["pPrice"]); ?></td>
                        <td><?= $takeData["pWeight"]; ?></td>
                        <td><?= $takeData["product_total"]; ?></td>
                        <td><?= $takeData["pSub_weight"]; ?></td>
                        <td>
                            RM <?= number_format($takeData["pSub_price"]); ?>
                        </td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-7">
                <div class="alert alert-info">
                    <p>
                        Please do payment RM <?= number_format($detail['transaction_total']); ?> at 056070-4545-9676-4327 <br>
                        <strong>My bank Account</strong>

                    </p>
                </div>

            </div>
            <div class="col-md-3">
                <a href="transactionHistory.php" class="btn btn-success">Transaction History</a>
            </div>
        </div>
    </div>
</section>


</body>

</html>

<?php include 'facility.php'; ?>

<?php include 'footer.php'; ?>

<?php include 'goto.php'; ?>

<?php include 'script.php'; ?>