<?php
session_start();
include 'connect.php';

if (empty($_SESSION["customer"]) or !isset($_SESSION["customer"])) {
    echo "<script>alert('Please login first!')</script>";
    echo "<script>location='login.php';</script>";
}

$transactionId = $_GET["id"];

$take = $connect->query("SELECT * FROM transaction WHERE transaction_id='$transactionId' ");
$takeData = $take->fetch_assoc();

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
    <h2> Payment Confirmation </h2>
    <p> Send your proof of payment here! </p>
    <div class="alert alert-info">Total that you need to pay is <strong>RM <?= number_format($takeData["transaction_total"]); ?> </strong> </div>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Buyer Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Bank</label>
            <input type="text" class="form-control" name="bank">
        </div>
        <div class="form-group">
            <label>Total</label>
            <input type="text" class="form-control" name="paymentTotal" min="1">
        </div>
        <div class="form-group">
            <label>Proof Of Payment Picture</label>
            <input type="file" class="form-control" name="paymentProof">
            <p class="text-danger">Proof of payment picture must in jpg,png,jpeg and max sie only 2MB</p>
        </div>
        <button class="btn btn-primary" name="submit">Send</button>
    </form>
</div>
<?php

if (isset($_POST["submit"])) {

    $proofName = $_FILES["paymentProof"]["name"];
    $proofLocation = $_FILES["paymentProof"]["tmp_name"];
    $uniqueName = date("YmdHis") . $proofName;
    move_uploaded_file($proofLocation, "proofPayment/$uniqueName");

    $customerName = $_POST["name"];
    $bank = $_POST["bank"];
    $paymentTotal = $_POST["paymentTotal"];
    $date = date("Y-m-d");

    $connect->query("INSERT INTO payment (transaction_id,customer_name,bank,payment_total,payment_date,payment_proof) 
        VALUES ('$transactionId','$customerName','$bank','$paymentTotal','$date','$uniqueName') ");

    $connect->query("UPDATE transaction SET transaction_status='paid' WHERE transaction_id='$transactionId' ");

    echo "<script>alert('Thank you because sent your proof of payment!')</script>";
    echo "<script>location='transactionHistory.php';</script>";
}
?>

</body>

</html>


<?php include 'facility.php'; ?>

<?php include 'footer.php'; ?>

<?php include 'goto.php'; ?>

<?php include 'script.php'; ?>