<?php
session_start();
include 'connect.php';

if (empty($_SESSION["customer"]) or !isset($_SESSION["customer"])) {
    echo "<script>alert('Please login first!')</script>";
    echo "<script>location='login.php';</script>";
}

?>

<?php include 'header.php'; ?>

<?php include 'menu.php'; ?>

<!-- Content -->
<section class="content">
    <div class="container">
        <h3>Transaction History <?= $_SESSION['customer']['customer_name']; ?> </h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                $customerId = $_SESSION["customer"]["customer_id"];

                $take = $connect->query("SELECT * FROM transaction WHERE customer_id = '$customerId' ");

                while ($takeData = $take->fetch_assoc()) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $takeData["transaction_date"]; ?></td>
                        <td>
                            <?= $takeData["transaction_status"]; ?>

                            <?php
                            if (!empty($takeData["delivery_receipt"])) : ?><br>
                                Delivery Receipt Number: <?= $takeData["delivery_receipt"]; ?>
                            <?php endif; ?>



                        </td>
                        <td>RM <?= number_format($takeData["transaction_total"]); ?></td>
                        <td>
                            <a href="paymentNote.php?id=<?= $takeData['transaction_id']; ?>" class="btn btn-info">Payment Note</a>

                            <?php if ($takeData["transaction_status"] == 'pending') : ?>
                                <a href="payment.php?id=<?= $takeData['transaction_id']; ?>" class="btn btn-success">Input Payment</a>
                            <?php else : ?>
                                <a href="paymentView.php?id=<?= $takeData['transaction_id']; ?>" class="btn btn-warning">View Payment</a>
                            <?php endif; ?>

                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>


</body>

</html>

<?php include 'facility.php'; ?>

<?php include 'footer.php'; ?>

<?php include 'goto.php'; ?>

<?php include 'script.php'; ?>