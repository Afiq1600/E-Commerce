<?php
session_start();
include 'connect.php';

if (!empty($_SESSION["customer"]) or isset($_SESSION["customer"])) {

    echo "<script>location='cart.php';</script>";
}

?>





<?php include 'header.php' ?>
<?php include 'menu.php'; ?>
<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Customer Login</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button class="btn btn-primary" name="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST["submit"])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $take = $connect->query("SELECT * FROM customer WHERE customer_email='$email' AND customer_password='$password' ");

    $takeSuitable = $take->num_rows;

    if ($takeSuitable == 1) {
        $_SESSION["customer"] = $take->fetch_assoc();
        echo "<script>alert('Login successful!')</script>";

        if (isset($_SESSION["cart"]) or !empty($_SESSION["cart"])) {
            echo "<script>location='checkout.php';</script>";
        } else {
            echo "<script>location='transactionHistory.php';</script>";
        }
    } else {
        echo "<script>alert('Login is not success!')</script>";
        echo "<script>location='login.php';</script>";
    }
}
?>

</body>

</html>
<?php include 'facility.php'; ?>

<?php include 'footer.php'; ?>

<?php include 'goto.php'; ?>

<?php include 'script.php'; ?>