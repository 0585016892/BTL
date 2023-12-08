
<?php
$pageTitle = "Shopping House - Mặc Mỗi Ngày, Thoải Mái Mỗi Ngày";
    include './header.php';
    include '../../sever/modun/modelClass.php';
    
?>
<?php

$cartegory = new cartegory;
$show_slide = $cartegory ->  show_slide();
$show_banner = $cartegory ->  show_banner();
$show_sanphambanchay = $cartegory ->  show_sanphambanchay();
include '../../sever/modun/config/config2.php';

    $search = isset($_GET["spbanchay_name"]) ? $_GET["spbanchay_name"] :"";
    if($search){
        $where = "WHERE `spbanchay_name` LIKE '%".$search."%'";
    }
    if($search){
        $product = mysqli_query($conn,"SELECT * FROM `tbl_spbanchay` ".$where."") ;


    }else{
        $product = mysqli_query($conn,"SELECT * FROM `tbl_spbanchay`") ;

    }
    mysqli_close($conn);


?>
        <div class="wrap-main-index">
            <div class="main_index">
                <div class="section-page-home-desktop">
                    <div class="section-home-desktop">
                        <div class="section-home-desktop-wrap">
                        <section class=" d-none d-md-block" style="margin: 25px 1px; text-align: center;   color: #fcaf17;">
                            <h1 style=" font-size: 22px;">KẾT QUẢ TÌM KIẾM SẢN PHẨM </h1>
                            <span style="  font-size: 22px;" id="textSearch"><?=isset($_GET["spbanchay_name"]) ? $_GET["spbanchay_name"] :"" ?></span> 
                        </section>
                        <section class="signup search-main wrap_background background_white clearfix">
                            <div class="container">
                                <div class="row bg_page clearfix">
                                    <div class="search-page col-12">
                                        <div class="products-view products-view-grid ">
                                            <div class="row search-items">
                                                        <?php while($row = mysqli_fetch_array($product)){ ?>
                                                                            <div style="width:20%;" class="col-xl-2 col-lg-2 col-md-3 col-6 nextSlide">
                                                                                <div class="item_product_main item_product_main-32502418">
                                                                                    <form action="" class="variants product-action wishItem">
                                                                                        <div class="product-thumbnail">
                                                                                            <span class="new-tag d-none">MỚI</span>
                                                                                            <span class="hot-tag"></span>
                                                                                            <a href="./cartegory.php?spbanchay_id=<?=$row['spbanchay_id'] ?>" class="image_thumb" title="Áo Khoác Gió Nữ 3C Pro">
                                                                                                <img class="lazyload loaded" src="../../sever/uploading/<?=$row['spbanchay_img']; ?>" alt="">
                                                                                            </a>
                                                                                            <img class="sticker-event-gift-by-price sticker-event-gift-by-price-32502418" src="../img/logo_ye-u.webp" alt="">
                                                                                        </div>
                                                                                        <div class="product-info product-info-32502418">
                                                                                            <h3 class="product-name">
                                                                                                <a href="./cartegory.php?spbanchay_id=<?=$row['spbanchay_id'] ?>"><?=$row['spbanchay_name'] ?><</a>
                                                                                            </h3>
                                                                                        <div class="bottom-action"></div>
                                                                                            <div class="price-box">
                                                                                                <span class="price "><?=number_format($row['spbanchay_gia'] , 0,",", ".")?>.000đ</span>
                                                                                                <div class="sw-group">
                                                                                                    <div class="option-swath">
                                                                                                        <div class="swatch-color-wrapper position-relative">
                                                                                                            <div class="swatch-color  swatch clearfix" data-option-index="0" data-swatches="8">
                                                                                                                <div data-value="Xanh than" class="swatch-element color Xanh than 1 ">
                                                                                                                    <input id="swatch-0-xanh-than32502418" type="radio" name="option-0" value="Xanh than" checked>
                                                                                                                    <label title="Xanh than" class="xanh-than" for="swatch-0-xanh-than32502418" style="background-image:url(//bizweb.dktcdn.net/thumb/thumb/100/438/408/products/akn6012-xth-5.jpg?v=1697426534613);background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="499.000đ" data-compare_at_price="499.000đ" data-scolor="../img/akn6012-xth-5.webp"></label>
                                                                                                                </div>
                                                                                                                <div data-value="Xanh than" class="swatch-element color Xanh than 1 ">
                                                                                                                    <input id="swatch-0-xanh-than32502418" type="radio" name="option-0" value="Xanh than" checked>
                                                                                                                    <label title="Xanh than" class="xanh-than" for="swatch-0-xanh-than32502418" style="background-image:url(//bizweb.dktcdn.net/thumb/thumb/100/438/408/products/akn6012-xth-5.jpg?v=1697426534613);background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="499.000đ" data-compare_at_price="499.000đ" data-scolor="../img/akn6012-xth-5.webp"></label>
                                                                                                                </div>
                                                                                                                <div data-value="Xanh than" class="swatch-element color Xanh than 1 ">
                                                                                                                    <input id="swatch-0-xanh-than32502418" type="radio" name="option-0" value="Xanh than" checked>
                                                                                                                    <label title="Xanh than" class="xanh-than" for="swatch-0-xanh-than32502418" style="background-image:url(//bizweb.dktcdn.net/thumb/thumb/100/438/408/products/akn6012-xth-5.jpg?v=1697426534613);background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="499.000đ" data-compare_at_price="499.000đ" data-scolor="../img/akn6012-xth-5.webp"></label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './footer.php' ?>