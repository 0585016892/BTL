<?php
$pageTitleAmin = "Trang sản phẩm";
$urlSlie = "/BTL/sever/";
    include './header.php';
    include './slide.php';
    include '../modun/modelClass.php';
    include '../modun/config/config2.php'
?>
<?php
$cartegory = new cartegory;
$show_size = $cartegory ->  show_size();
$result = mysqli_query($conn ,"SELECT * FROM `tbl_spbanchay` WHERE `spbanchay_id` = ".$_GET['spbanchay_id'] );
$product=mysqli_fetch_array($result);
$imgS = mysqli_query($conn ,"SELECT * FROM `tbl_spbanchay_imgs` WHERE `spbanchay_id` = ".$_GET['spbanchay_id'] );
?>
<style>
     .info_checkout{
        padding-top: 24px;
    }
    .info_checkout li{
        gap: 8px;
        align-items: center;
        display: flex;
        padding-bottom: 16px !important;
    }
    .info_checkout p{
        color: #394960;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 22px;
        padding: 0 !important;
        margin: 0;
    }
    .info_checkout p span{
        font-weight: 700;
    }
    .table_title{
        text-align: center;
        width: 10%;
        font-weight: 500;
    }
    #product-detail-collapse{
        border-bottom: 1px solid #ddd;
        border-top: 1px solid #ddd;
    }
    .property-outstanding{
        border-top: 1px solid #ddd;

    }
    .toggle-text{
        padding: 10px 12px;
        display: flex;
        justify-content: space-between;
    }
    .manual , .up{
        display: none;
    }
    .manualPresently{
        display: block;
     animation: slideDown 0.5s forwards;
    }
    .manualBtn{
        border: none;
        background: white;
    }

    @keyframes slideDown {
    0% {
        transform: scaleY(0);
    }
    100% {
        transform: scaleY(1);
    }
    }
    .product__content-left--smallimg{
        padding: 29px 0;
        width: 45%;
    }
    .product__content-left--smallimg img{
        margin-bottom: 15px;
        width: 100%;
    }
</style>
<script>
        function manual() {
                const up =document.querySelector('.up');
                const down =document.querySelector('.down');
                document.getElementById("manual").classList.toggle("manualPresently");
                up.style.display = "block";
                down.style.display = "none";
            }
    </script>
        <!-- =------------------------------- -->

        <section id="product-main" class="product details-main" itemscope itemtype="https://schema.org/Product">
        
        <div id="container-wrapper" class="" style="margin-left: 292px;" >
                <h2 style="padding: 15px 25px;">Chi tiết sản phẩm<span style="color:red;">*</span></h2>
                <button  style="margin:10px 25px;" class="btn">
                    <a href="./spbanchay.php">Quay lại</a>
                </button>
                <div id="all-info-wrapper" class="product-grid row">
                    <div class="product-grid-item-image  col-6">
                        <div id="image-list-panel" class="image-list-panel container d-none d-lg-block">
                            <div class="row">
                                <div class="col-9 d-flex justify-content-center">
                                    <div style="max-width: 100%;" class="image-item d-flex justify-content-center">
                                        <img style="margin-bottom: 25px;width: 100%;    height: 700px;" src="../uploading/<?=$product['spbanchay_img']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-3 d-flex justify-content-center">
                                <div style="width: 65%;padding:0;" class="product__content-left--smallimg">
                                    <?php while($showImg=mysqli_fetch_array($imgS)){ ?>
                                        <img src="../uploading/<?=$showImg['spbanchay_imgs_name'] ?>" alt="">
                                    <?php } ?>
                                </div>
                                <!-- <div class="image-item d-flex justify-content-center">
                                        <img  src="/BTL/sever/uploading/<?=$product['spbanchay_img']; ?>" alt="">
                                    </div> -->
                                </div>
                                <script>
                                    const bigImg = document.querySelector(".image-item img")
                                    const smallImg = document.querySelectorAll(".product__content-left--smallimg img")
                                    smallImg.forEach(function(imgTem , X){
                                        imgTem.addEventListener("click" , function(){
                                            bigImg.src = imgTem.src
                                        })
                                    })
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="product-grid-item-info details-pro col-6">
                        <div class="px-md-2">
                            <div class="box-divider">
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                        <th>#</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Size sản phẩm</th>
                                        <th>Màu sản phẩm</th>
                                        <th>Mã sản phẩm</th>

                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td><?=$product['spbanchay_name'] ?></td>
                                        <td><?php echo $product['spbanchay_gia'] ?>.000đ</td>
                                        <td><?php echo $product['spbanchay_size'] ?></td>
                                        <td><?php echo $product['spbanchay_mau'] ?></td>
                                        <td><?php echo $product['spbanchay_msp'] ?></td>
                                        </tr>
                                </thead>
                                </table>
                                <!-- <h1 style="padding-bottom: 25px;" class="title-head mb-1"><?=$product['spbanchay_name'] ?></h1>
                                <div  class="product-top clearfix align-items-center mb-1">
                                    <div style="padding-bottom: 25px;" class="sku-product ">
                                        <span class="variant-sku" itemprop="sku" content><?=$product['spbanchay_msp'] ?></span>
                                    </div>
                                    <div class="divider"></div>   
                                </div>
                                <div style="padding-bottom: 25px;" class="group-power">
                                    <div class="price-box clearfix d-flex align-items-center">
                                        <span class="special-price">
                                            <span class="price product-price" style="font-weight: 600;font-size: 30px;font-family: 'Inter'; color: #CD151C; line-height: 38px;"><?=$product['spbanchay_gia'] ?>.000đ</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="wishItem MultiFile-intercepted">
                                    <div class="form-product">
                                        <div id="product-chonsize">
                                            <div class="select-swatch">
                                                <div class="swatch-color swatch clearfix " data-option-index="0" data-view="6">
                                                    <div class="options-title">
                                                       Màu sắc: <span class="var"><?=$product['spbanchay_mau'] ?></span>
                                                    </div>
                                                    <div data-value="<?=$product['spbanchay_mau'] ?>" data-sku="atn6034-ddo" class="swatch-element color do available">
                                                        <!-- <input id="swatch-0-do" type="radio" name="option-0" value="<?=$product['spbanchay_mau'] ?>"> -->
                                                        <!-- <label for="swatch-0-do" title="Đỏ">
                                                            <span class="hung" ></span>
                                                        </label> -->
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------ -->