<?php
$pageTitle = "Shopping House - Mặc Mỗi Ngày, Thoải Mái Mỗi Ngày";
include "./header.php";
include '../../sever/modun/modelClass.php';
include '../../sever/modun/config/config2.php'
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
        <div class="page-product_breadcrumb">
            <section class="bread-crumb d-none d-md-block">
                <div class="container">
                    <div class="row">
                        <div class="col-12 a-left">
                            <ul class="breadcrumb">
                                <li class="home">
                                    <a href="./index.php">
                                        <span>Trang chủ</span>
                                    </a>
                                    <span class="mr_lr">&#8260;</span>
                                </li>
                                <li class="home">
                                    <a href="#">
                                        <span><?=$product['spbanchay_name']; ?></span>
                                    </a>
                                    <span class="mr_lr">&#8260;</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section id="product-main" class="product details-main" itemscope itemtype="https://schema.org/Product">
    
        
        <div id="container-wrapper" class="container">
                <div id="all-info-wrapper" class="product-grid">
                    <div class="product-grid-item-image">
                        <div id="image-list-panel" class="image-list-panel container d-lg-block">
                            <div class="row">
                                <div class="col-8 d-flex justify-content-center">
                                    <div style="max-width: 100%;" class="image-item d-flex justify-content-center">
                                        <img style="margin-bottom: 25px;width: 100%;    height: 700px;" src="../../sever/uploading/<?=$product['spbanchay_img']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-4 dnone  justify-content-center">
                                <div class="product__content-left--smallimg">
                                    <?php while($showImg=mysqli_fetch_array($imgS)){ ?>
                                        <img src="../../sever/uploading/<?=$showImg['spbanchay_imgs_name'] ?>" alt="">
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
                    <div class="product-grid-item-info details-pro">
                        <div class="px-md-2">
                            <div class="box-divider">
                                <h1 class="title-head mb-1"><?=$product['spbanchay_name'] ?></h1>
                                <div class="product-top clearfix align-items-center mb-1">
                                    <div class="sku-product ">
                                        <span class="variant-sku" itemprop="sku" content><?=$product['spbanchay_msp'] ?></span>
                                    </div>
                                    <div class="divider"></div>   
                                    <div id="product-review-info" class="product-review">
                                        <div class="sapo-product-reviews-badge" data-id="32874740">
                                            <div class="sapo-product-reviews-star" data-score="0" data-number="5" style="color: #fac126" title="Not rated yet!">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="group-power">
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
                                                        <input id="swatch-0-do" type="radio" name="option-0" value="<?=$product['spbanchay_mau'] ?>">
                                                        <!-- <label for="swatch-0-do" title="Đỏ">
                                                            <span class="hung" ></span>
                                                        </label> -->
                                                    </div>
                                                    <form action="./cart.php?action=add" method="POST" style="width:100%;">
                                                        <div class=" ">
                                                            <div class="options-title">
                                                                <p id="selectedSizeLabel">Kích thước: </p>
                                                                <p id="error" style="opacity: 0.5;"  >Vui lòng nhập kích thước sản phẩm</p>
                                                            </div>
                                                            <div style="display: flow-root;">
                                                                    <?php if($show_size){
                                                                        while( $show_sizes = $show_size->fetch_assoc()){
                                                                     ?>
                                                                    <input type="radio" id="sizeXS" class="size" name="size" value="<?=$show_sizes['size_name'] ?>">
                                                                    <label for="sizeXS"><?=$show_sizes['size_name'] ?></label>
                                                                    <?php }} ?>
                                                            </div>
                                                        </div>
                                                        <div id="from-action-addcart" class="clearfix from-action-addcart">
                                                            <div class="qty-ant clearfix custom-btn-number" style="display: flex;">
                                                                <label class="" for="">Số lượng : </label>
                                                                <input style="outline: none;" type="text" value="1" name="quantity[<?=$product['spbanchay_id']?>]">
                                                            </div>
                                                            <div class="btn-mua d-lg-block">
                                                                <div id="add-to-cart-wrapper" class="add-to-cart-wrapper d-flex align-items-center">
                                                                    <button id="proceedButton" disabled class="btn btn-lg btn-gray btn_buy add_to_cart add-card-destop d-flex align-items-center btn-new-update">
                                                                        <span class="add-span-cart" style="flex: 1; ">
                                                                            <input  type="submit" value="Thêm vào giỏ hàng"  class="btn-cart btn_buy add_to_cart btn-add-to-cart buy-now-ready" style="font-size: 18px;color: white;font-weight: 700; background: transparent; border:none;">
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                                    const sizeLabels = document.querySelectorAll("input[name='size']");
                                                                    const selectedSizeLabel = document.getElementById("selectedSizeLabel");
                                                                    const proceedButton = document.getElementById("proceedButton");
                                                                    const error = document.getElementById("error");
                                                                    // Lắng nghe sự kiện khi người dùng chọn một kích thước mới.
                                                                    sizeLabels.forEach(sizeLabel => {
                                                                        sizeLabel.addEventListener("change", function() {
                                                                            // Lấy giá trị đã chọn từ radio button được chọn.
                                                                            const selectedSize = document.querySelector("input[name='size']:checked").value;
                                                                            if(selectedSize){
                                                                                proceedButton.disabled =false;
                                                                                error.style.display = "none";
                                                                            }else{
                                                                                proceedButton.disabled =true;
                                                                                error.style.display = "block";

                                                                            }
                                                                            // Cập nhật nội dung của label để hiển thị kích thước đã chọn.
                                                                            selectedSizeLabel.textContent = "Kích thước: " + selectedSize;
                                                                        });
                                                                    });
                                                                </script>
                                                    </form>
                                                    <div class="info_checkout">
                                                        <ul>
                                                            <li>
                                                                <img src="../icons/checkout1.svg" alt="">
                                                                <p>Sử dụng mã giảm giá ở bước thanh toán</p>
                                                            </li>
                                                            <li>
                                                                <img src="../icons/checkout2.svg" alt="">
                                                                <p>Thông tin bảo mật và mã̃ hóa</p>
                                                            </li>
                                                            <li>
                                                                <img src="../icons/checkout3.svg" alt="">
                                                                <p><span>Miễn phí vận chuyển</span>: đơn hàng 200k</p>
                                                            </li>
                                                            <li>
                                                                <img src="../icons/checkout4.svg" alt="">
                                                                <p><span>Giao hàng</span>: Từ 1 - 3 ngày</p>
                                                            </li>
                                                            <li>
                                                                <img src="../icons/checkout5.svg" alt="">
                                                                <p><span>Miễn phí đổi trả</span>: tại 250+ cửa hàng trong 15 ngày</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-grid-item-desc description-detail-wrapper">
                        <div class="accordion accordion-line-top" id="special-features">
                            <div>
                                <div class="property-outstanding">
                                    <h2> Đặc tính nổi bật </h2>
                                </div>
                            </div>
                            <div class="accordion-panel" style="transition-duration: 0.25s; max-height: 170px;">
                                <div class="accordion-content">
                                    <div id="product-dactinh" class="km-hot">
                                        <div class="box-km">
                                            <div class="box-promotion">
                                                <p><?=$product['characteristic']; ?></p>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           </div>
                           <div id="product-detail-collapse">
                            <div class="accordion-toggle">
                                <div class="toggle-text" style="display: flex; "> 
                                    <h2> HƯỚNG DẪN SỬ DỤNG </h2>
                                    <div class="toggle-arrow" >
                                        <button class="manualBtn" onclick=" manual() ">
                                            <ion-icon name="chevron-back-outline" class="down"></ion-icon>
                                            <ion-icon name="chevron-forward-outline" class="up"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="manual" id="manual" style="transition-duration: 0.25s; max-height: 352px;">
                                <div class="accordion-content">
                                    <div id="product-content hd-su-dung-content">
                                        <div class="product_getcontent rte">
                                            <div class="ba-text-fpt hd-su-dung">
                                                <h5 class="d-none d-lg-block"> Hướng dẫn sử dụng chung: </h5>
                                                <ul>
                                                    <li>Giặt máy chế độ nhẹ với sản phẩm cùng màu ở nhiệt độ thường</li>
                                                </ul>
                                                <h5 class="d-none d-lg-block"> Hướng dẫn sử dụng với sản phẩm phụ kiện giày, túi xách: </h5>
                                                <ul>
                                                    <li>Giặt máy chế độ nhẹ với sản phẩm cùng màu ở nhiệt độ thường</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           </div>
                        <div id="review-wrapper" class="accordion review-wrapper">
                            <div class="d-flex justify-content-between prefer-header">
                                <h2 class="title-block">GỢI Í CHO BẠN</h2>
                            </div>
                           <?php include './saleaokhoac.php' ?>
                        </div>
                    </div>

                       
                    </div>
                </div>
            </div>
        </section>
        <!-- ------------------------------------ -->
       <?php include './footer.php'  ?>
       <script>
        // Lắng nghe sự kiện khi form được gửi
        document.querySelector('form').addEventListener('submit', function(event) {
            // Kiểm tra xem ô input có được click hay không
            if (!document.getElementById('myInput').value) {
                // Ngăn chặn chuyển hướng mặc định
                event.preventDefault();
                // Hiển thị thông báo
                alert('Vui lòng nhập giá trị trước khi chuyển hướng.');
            }
        });
    </script>





