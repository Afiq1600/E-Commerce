<html>

<head>
    <style>
        .btn {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button {
            background-color: white;
            color: black;
            border: 2px solid #555555;
        }

        .button:hover {
            background-color: #555555;
            color: white;
        }
    </style>
</head>



<!-- Navbar -->
<!-- <nav class="navbar navbar-default">
     <div class="container">
         <ul class="nav navbar-nav">
             <li><a href="index.php">Home</a></li>
             <li><a href="product.php">Product</a></li>
             <li><a href="cart.php">Cart</a></li>
             <?php if (isset($_SESSION["customer"])) : ?>
                 <li><a href="transactionHistory.php">Transaction History</a></li>
                 <li><a href="logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a></li>
             <?php else : ?>
                 <li><a href="login.php">Login</a></li>
                 <li><a href="register.php">Register</a></li>
             <?php endif ?>
             <li><a href="checkout.php">Checkout</a></li>
         </ul>
     </div>
 </nav> -->




<body>

    <!-- Header -->
    <header id="header" class="header">
        <div class="navigation">
            <div class="container">
                <nav class="nav">
                    <div class="nav__hamburger">
                        <svg>
                            <use xlink:href="./images/sprite.svg#icon-menu"></use>
                        </svg>
                    </div>

                    <div class="nav__logo">
                        <a href="/" class="scroll-link">
                            FORYOU
                        </a>
                    </div>

                    <div class="nav__menu">
                        <div class="menu__top">
                            <span class="nav__category">FORYOU</span>
                            <a href="#" class="close__toggle">
                                <svg>
                                    <use xlink:href="./images/sprite.svg#icon-cross"></use>
                                </svg>
                            </a>
                        </div>
                        <ul class="nav__list">
                            <li class="nav__item">
                                <a href="index.php" class="btn button">Home</a>
                            </li>
                            <li class="nav__item">
                                <a href="product.php" class="btn button">Product</a>
                            </li>
                            <?php if (isset($_SESSION["customer"])) : ?>
                                <li class="nav__item">
                                    <a href="transactionHistory.php" class="btn button">History</a>
                                </li>
                                <li class="nav__item">
                                    <a href="logout.php" class="btn button">logout</a>
                                </li>
                            <?php else : ?>
                                <li class="nav__item">
                                    <a href="login.php" class="btn button">Login</a>
                                </li>
                                <li class="nav__item">
                                    <a href="register.php" class="btn button">Register</a>
                                </li>
                            <?php endif ?>
                            <li class="nav__item">
                                <a href="checkout.php" class="btn button">Checkout</a>
                            </li>
                            <li class="nav__item">
                                <a href="admin/login.php" class="btn button">Admin</a>
                            </li>
                        </ul>
                    </div>

                    <div class="nav__icons">
                        <a href="cart.php" class="icon__item">
                            <svg class="icon__cart">
                                <use xlink:href="./images/sprite.svg#icon-shopping-basket"></use>
                            </svg>
                        </a>
                    </div>
                </nav>
            </div>
        </div>