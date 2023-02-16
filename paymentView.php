<?php
session_start();
include 'connect.php';

$transactionId = $_GET['id'];

$take = $connect->query("SELECT * FROM payment LEFT JOIN transaction ON payment.transaction_id=transaction.transaction_id 
WHERE transaction.transaction_id='$transactionId' ");
$takeData = $take->fetch_assoc();

if (empty($takeData)) {
    echo "<script>alert('You not have transaction data yet!')</script>";
    echo "<script>location='transactionHistory.php';</script>";
    exit();
}

$customerAsBuyerId = $takeData["customer_id"];
$customerAsLoginId = $_SESSION["customer"]["customer_id"];

if ($customerAsBuyerId != $customerAsLoginId) {
    echo "<script>alert('You not allow to this action!')</script>";
    echo "<script>location='transactionHistory.php';</script>";
    exit();
}

?>


<?php include 'header.php'; ?>

<?php include 'menu.php'; ?>


<div class="container">
    <h1> New Product </h1>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><?= $takeData["customer_name"]; ?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?= $takeData["bank"]; ?></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><?= $takeData["payment_date"]; ?></td>
                </tr>
                <tr>
                    <th>Total Payment</th>
                    <td>RM
                        <?= number_format($takeData["payment_total"]); ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <img src="proofPayment/<?= $takeData['payment_proof']; ?>" class="img-responsive">
        </div>
    </div>
</div>



</body>

</html>

<?php include 'facility.php'; ?>

<?php include 'footer.php'; ?>

<?php include 'goto.php'; ?>

<?php include 'script.php'; ?>