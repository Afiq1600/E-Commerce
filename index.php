<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="style3.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <nav class="navbar">
        <div class="content">
            <div class="logo"><a href="index.php">FORYOU</a></div>
            <ul class="menu-list">
                <div class="icon cancel-btn">
                    <i class="fas fa-times"></i>
                </div>
                <li><a href="index.php">Home</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="admin/index.php">Admin</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
            </ul>
            <div class="icon menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <div class="banner"></div>

    <div class="hero">
        <h1>QUALITY OVER QUANTITY!<br>MORE BETTER!</h1>
        <div class="btn">
            <span></span><span></span><span></span><span></span>
            <p><a href="product.php">Shop Now</a></p>
        </div>
    </div>


    <div class="about" style=" background-image: url('img/videoBackground.jpg');background-repeat: no-repeat; background-attachment: fixed;  background-size:  100%;">
        <div class="content">
            <div class="" id="video">
                <div class="" style="margin-left:auto; margin-right:auto; width: 470px; position:block; margin-top: 50px; color: white; padding-top: 20px; padding-bottom: 40px;">
                    <h2 style="font-family: Helvetica, sans-serif; font-weight: bold; letter-spacing:2px; font-size:20px; text-align: center;">Iphone 12 Pro</h2>
                    <iframe src="https://www.youtube.com/embed/cnXapYkboRQ" allowfullscreen width=" 500" height="400" style="border: 0;"></iframe>
                </div>
                <div class="" style="margin-left:auto; margin-right:auto; width: 470px; position:block; margin-top: 50px; color: white; padding-top: 20px; padding-bottom: 40px;">
                    <h2 style="font-family: Helvetica, sans-serif; font-weight: bold; letter-spacing:2px; font-size:20px; text-align: center;">Lenovo Legion Phone Duel</h2>
                    <iframe src="https://www.youtube.com/embed/NuX1dWUi_qo" allowfullscreen width=" 500" height="400" style="border: 0;"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("list");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
    <script>
        function showMenu() {
            var toggle = document.getElementById("mobileMenu");
            if (toggle.style.height == "0px") {
                toggle.style.height = "200px";
            } else {
                toggle.style.height = "0px";
            }
        }
    </script>


    <script>
        const body = document.querySelector("body");
        const navbar = document.querySelector(".navbar");
        const menu = document.querySelector(".menu-list");
        const menuBtn = document.querySelector(".menu-btn");
        const cancelBtn = document.querySelector(".cancel-btn");
        menuBtn.onclick = () => {
            menu.classList.add("active");
            menuBtn.classList.add("hide");
            cancelBtn.classList.add("show");
            body.classList.add("disabledScroll");
        }
        cancelBtn.onclick = () => {
            menu.classList.remove("active");
            menuBtn.classList.remove("hide");
            cancelBtn.classList.remove("show");
            body.classList.remove("disabledScroll");
        }

        window.onscroll = () => {
            this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        }
    </script>






</body>

</html>