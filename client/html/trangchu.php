<?php
$pageTitle = "Shopping House - Mặc Mỗi Ngày, Thoải Mái Mỗi Ngày";
$cartegory = new cartegory;
$show_slide__client = $cartegory ->  show_slide__client();
$show_banner__client = $cartegory ->  show_banner__client();
$show_sanphambanchay = $cartegory ->  show_sanphambanchay();
$show_sale = $cartegory ->  show_sale();

?>

        <div class="wrap-main-index">
            <div class="main_index">
                <?php include './silde.php' ?>
                <div class="section-page-home-desktop">
                    <div class="section-home-desktop _dacbiet">
                        <div class="section-home-desktop-wrap">
                            <div class="section-promotion-desktop-content" style=" background: url(../img/banner-home-khuyen-mai.webp);background-size: contain;background-repeat: no-repeat;">
                                <div class="text-promotion">ĐẶC BIỆT</div>
                                <div style="left: 670px;" class="item-promotion item-2">
                                    <div class="wrap-content">
                                        <a href="#">
                                            <div class="image">
                                                <img src="../img/home_khuyenmai_2_image.webp" alt="">
                                            </div>
                                            <div class="title">Freeship cho đơn hàng từ 200k</div>
                                        </a>
                                    </div>
                                    
                                </div>
                                <div style="left: 530px;" class="item-promotion item-2">
                                    <div class="wrap-content">
                                        <a href="#">
                                            <div class="image">
                                                <img src="../img/home_khuyenmai_1_image.webp" alt="">
                                            </div>
                                            <div class="title">Khuyến mãi</div>
                                        </a>
                                    </div>
                                </div>
                                <div style="left: 805px;" class="item-promotion item-2">
                                    <div class="wrap-content">
                                        <a href="#">
                                            <div class="image">
                                                <img src="../img/home_khuyenmai_4_image.webp" alt="">
                                            </div>
                                            <div class="title">Phiên chợ cuối tuần</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include './dateTime.php' ?>
                    <?php include './callme.php' ?>
                    <?php include './section.php' ?>
                    <?php include './salepolo.php' ?>
                    <?php include './saleaokhoac.php' ?>
                </div>
                </div>
            </div>
        </div>
    <?php include './footer.php' ?>
</body>
                                    
</html>