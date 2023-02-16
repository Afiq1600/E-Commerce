<?php
session_start();
include 'connect.php';
?>


<?php include 'header.php'; ?>

<?php include 'menu.php'; ?>

<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Register Customer</h3>
                </div>
                <div class="panel-body">
                    <form method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-7">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-7">
                                <textarea class="form-control" name="address" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Phone Number</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="phoneN" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button class="btn btn-primary" name="submit">Register</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <a href="login.php" class="btn btn-success" name="submit">Already Have an account? Login now!</a>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST["submit"])) {
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $address = $_POST["address"];
                        $phoneN = $_POST["phoneN"];

                        $take = $connect->query("SELECT * FROM customer WHERE customer_email='$email'");
                        $takeSuitable = $take->num_rows;
                        if ($takeSuitable == 1) {
                            echo "<script>alert('Register is fail! Email already registered!')</script>";
                            echo "<script>location='register.php';</script>";
                        } else {
                            $take = $connect->query("INSERT INTO customer (customer_email,customer_password,customer_name,customer_phoneN,customer_address) 
                                VALUES ('$email','$password','$name','$phoneN','$address') ");

                            echo "<script>alert('Register successful! Please login')</script>";
                            echo "<script>location='login.php';</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>



</body>

</html>

<?php include 'facility.php'; ?>

<?php include 'footer.php'; ?>

<?php include 'goto.php'; ?>

<?php include 'script.php'; ?>