<?php session_start();
include 'connect.php';
?>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>



<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php $take = $connect->query("SELECT * FROM product WHERE product_id BETWEEN '20' AND  '26'"); ?>

<!-- Hero -->
<div class="hero">
    <div class="glide" id="glide_1">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <li class="glide__slide">
                    <div class="hero__center">
                        <div class="hero__left">
                            <span class="">New Inspiration 2020</span>
                            <h1 class="">PHONES MADE FOR YOU!</h1>
                            <p>Trending from mobile and collection</p>
                            <a href="buy.php?id=16"><button class="hero__btn">SHOP NOW</button></a>
                        </div>
                        <div class="hero__right">
                            <div class="hero__img-container">
                                <img class="banner_01" src="productPicture/iphone12ProMax.png" alt="banner2" />
                            </div>
                        </div>
                    </div>
                </li>
                <li class="glide__slide">
                    <div class="hero__center">
                        <div class="hero__left">
                            <span>New Inspiration 2020</span>
                            <h1>GAMING PHONE FOR YOU!</h1>
                            <p>Trending from gaming mobile collection</p>
                            <a href="buy.php?id=17"><button class="hero__btn">SHOP NOW</button></a>
                        </div>
                        <div class="hero__right">
                            <img class="banner_02" src="productPicture/asusRogPhone3.png" alt="banner2" />
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]">
            <button class="glide__bullet" data-glide-dir="=0"></button>
            <button class="glide__bullet" data-glide-dir="=1"></button>
        </div>

        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                <svg>
                    <use xlink:href="./images/sprite.svg#icon-arrow-left2"></use>
                </svg>
            </button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                <svg>
                    <use xlink:href="./images/sprite.svg#icon-arrow-right2"></use>
                </svg>
            </button>
        </div>
    </div>
</div>
</header>
<!-- End Header -->

<!-- Main -->
<main id="main">
    <div class="container">
        <!-- Collection -->
        <section id="collection" class="section collection">
            <div class="collection__container" data-aos="fade-up" data-aos-duration="1200">
                <div class="collection__box">
                    <div class="img__container">
                        <img class="collection_02" src="productPicture/iphone11ProMax.png" alt="">
                    </div>
                    <div class="collection__content">
                        <div class="collection__data">
                            <span>New Model Introduced</span>
                            <h1>Iphone 11 Pro Max</h1>
                            <a href="buy.php?id=18">SHOP NOW</a>
                        </div>
                    </div>
                </div>
                <div class="collection__box">
                    <div class="img__container">
                        <img class="collection_01" src="productPicture/oneplus8T.png" alt="">
                    </div>
                    <div class="collection__content">
                        <div class="collection__data">
                            <span>Phone Device Presets</span>
                            <h1>SMARTPHONES</h1>
                            <a href="buy.php?id=19">SHOP NOW</a>
                        </div>
                    </div>
                </div>
        </section>

        <!-- Latest Products -->
        <section class="section latest__products" id="latest">
            <div class="title__container">
                <div class="section__title active" data-id="Latest Products">
                    <span class="dot"></span>
                    <h1 class="primary__title">Latest Products</h1>
                </div>
            </div>

            <div class="container" data-aos="fade-up" data-aos-duration="1200">
                <div class="glide" id="glide_2">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides latest-center">

                            <?php while ($takeData = $take->fetch_assoc()) {

                                $allData[] = $takeData;
                            } ?>
                            <?php foreach ($allData as $td) : ?>
                                <li class="glide__slide">

                                    <div class="product">
                                        <div class="product__header">
                                            <img src="productPicture/<?= $td['product_picture']; ?>" alt="product">
                                        </div>
                                        <div class="product__footer">
                                            <h3><?= $td['product_name']; ?></h3>
                                            <div class="product__price">
                                                <h4>RM<?= number_format($td['product_price']); ?></h4>
                                            </div>
                                            <a href="buy.php?id=<?= $td['product_id']; ?>"><button type="submit" class="product__btn">Add To Cart</button></a>
                                        </div>
                                        <ul>
                                            <li>
                                                <a data-tip="Quick View" data-place="left" href="productDetail.php?id=<?= $td['product_id']; ?>" class="btn btn-default">
                                                    <svg>
                                                        <use xlink:href="./images/sprite.svg#icon-eye"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                            <svg>
                                <use xlink:href="./images/sprite.svg#icon-arrow-left2"></use>
                            </svg>
                        </button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                            <svg>
                                <use xlink:href="./images/sprite.svg#icon-arrow-right2"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="section latest__products" id="latest">
            <div class="title__container">
                <div class="section__title active" data-id="Latest Products">
                    <span class="dot"></span>
                    <h1 class="primary__title">All Products</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail">
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="keyword" id="keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" name="search" id="searchButton">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                    <img src="img/loading.gif" class="loader">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="container">
                <div class="container" data-aos="fade-up" data-aos-duration="1200">
                    <ul>
                        <?php $take = $connect->query("SELECT * FROM product "); ?>
                        <?php while ($takeAllData = $take->fetch_assoc()) {

                            $allDatas[] = $takeAllData;
                        } ?>
                        <div class="row">
                            <?php foreach ($allDatas as $td) : ?>
                                <div class="col-md-3">
                                    <li>
                                        <div class="product">
                                            <div class="product__header">
                                                <img src="productPicture/<?= $td['product_picture']; ?>" alt="product">
                                            </div>
                                            <div class="product__footer">
                                                <h3><?= $td['product_name']; ?></h3>
                                                <div class="product__price">
                                                    <h4>RM<?= number_format($td['product_price']); ?></h4>
                                                </div>
                                                <a href="buy.php?id=<?= $td['product_id']; ?>"><button type="submit" class="product__btn">Add To Cart</button></a>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a data-tip="Quick View" data-place="left" href="productDetail.php?id=<?= $td['product_id']; ?>" class="btn btn-default">
                                                        <svg>
                                                            <use xlink:href="./images/sprite.svg#icon-eye"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </li>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </ul>
                </div>
            </div>
        </section>


</main>
</body>

</html>

<!-- End Main -->
<?php include 'facility.php'; ?>

<?php include 'footer.php'; ?>

<?php include 'popup.php'; ?>

<?php include 'goto.php'; ?>

<?php include 'script.php'; ?>