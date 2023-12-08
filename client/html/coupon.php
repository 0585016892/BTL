<?php 
$pageTitle = 'Coupon cùng Shopping House';
include './header.php'


?>
<section class="page_qua_tang">
    <div class="container">
        <div class="banner_1">
            <img class="d-none d-lg-block imgBanner" src="../icons/banner1.png" alt="loading">
        </div>
        <?php include './vongquay.php' ?>
        <div class="list-coupon"> </div>
        <div class="ban-chay">
            <div class="banner-ban-chay">
                <img class="d-none d-lg-block imgBanner" src="../icons/bannermiddle.webp" alt="loading">
                <p> Bán chạy tuần qua </p>
            </div>
            <div class="frame-list-product">
                <div class=" list-product list-product-1">
                    <?php include './salepolo.php' ?>
                </div>
            </div>
        </div>
        <div class="ban-chay">
            <div class="banner-ban-chay">
                <img class="d-none d-lg-block imgBanner" src="../icons/bannermiddle.webp" alt="loading">
                <p> Áo khoác </p>
            </div>
            <div class="frame-list-product">
                <div class=" list-product list-product-1">
                    <?php include './saleaokhoac.php' ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include './footer.php' ?>