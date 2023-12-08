                    <div class="section-home-desktop">
                        <div class="section-home-desktop-wrap">
                            <div class="preview-danhmuc-wrap">
                            <?php $row = mysqli_fetch_array($saleaokhoac) ?>
                                <div class="header_preview">
                                    <div class="title">
                                        <a style="color: #11006F;" href="#">Áo Khoác Tiện Lợi</a>
                                    </div>
                                    <div class="more">
                                        <a class="show_more"  href="./name.php?sale_id=<?=$row['sale_id'] ?>">Xem Thêm</a>
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </div>
                                </div>
                                <div class="content_preview">
                                    <div id="prev-slide" class="swiper-button-prev swiper-buttons">
                                                <!-- <i class="fa-solid fa-chevron-right"></i> -->
                                        </div>
                                    <div class="wrap-list-product slide" style="    max-width: calc(100%);">
                                        <div class="list-product">
                                                <div class="slide-wrapper">
                                                <div class="row list-product__img slide-main">
                                                <?php while($row = mysqli_fetch_array($saleaokhoac)) { ?>
                                                    <div  class="col-xl-2 col-lg-3 col-md-3 col-6 slide-item">
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
                                                                        <a href="./cartegory.php?spbanchay_id=<?=$row['spbanchay_id'] ?>"><?=$row['spbanchay_name'] ?></a>
                                                                    </h3>
                                                                <div class="bottom-action"></div>
                                                                    <div class="price-box">
                                                                        <span class="price "><?=$row['spbanchay_gia']; ?>.000đ</span>
                                                                        <div class="sw-group">
                                                                            <div class="option-swath">
                                                                                <div class="swatch-color-wrapper position-relative">
                                                                                    <div class="swatch-color  swatch clearfix" data-option-index="0" data-swatches="8">
                                                                                        <div data-value="Xanh than" class="swatch-element color Xanh than 1 ">
                                                                                            <input id="swatch-0-xanh-than32502418" type="radio" name="option-0" value="Xanh than" checked>
                                                                                            <label title="Xanh than" class="xanh-than" for="swatch-0-xanh-than32502418" style="background-image:url(//bizweb.dktcdn.net/thumb/thumb/100/438/408/products/akn6012-xth-5.jpg?v=1697426534613);background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="499.000đ" data-compare_at_price="499.000đ" data-scolor="/BTL/client/img/akn6012-xth-5.webp"></label>
                                                                                        </div>
                                                                                        <div data-value="Xanh than" class="swatch-element color Xanh than 1 ">
                                                                                            <input id="swatch-0-xanh-than32502418" type="radio" name="option-0" value="Xanh than" checked>
                                                                                            <label title="Xanh than" class="xanh-than" for="swatch-0-xanh-than32502418" style="background-image:url(//bizweb.dktcdn.net/thumb/thumb/100/438/408/products/akn6012-xth-5.jpg?v=1697426534613);background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="499.000đ" data-compare_at_price="499.000đ" data-scolor="/BTL/client/img/akn6012-xth-5.webp"></label>
                                                                                        </div>
                                                                                        <div data-value="Xanh than" class="swatch-element color Xanh than 1 ">
                                                                                            <input id="swatch-0-xanh-than32502418" type="radio" name="option-0" value="Xanh than" checked>
                                                                                            <label title="Xanh than" class="xanh-than" for="swatch-0-xanh-than32502418" style="background-image:url(//bizweb.dktcdn.net/thumb/thumb/100/438/408/products/akn6012-xth-5.jpg?v=1697426534613);background-size:37px;background-repeat:no-repeat;background-position: center!important;" data-price="499.000đ" data-compare_at_price="499.000đ" data-scolor="/BTL/client/img/akn6012-xth-5.webp"></label>
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
                                                    <?php }?>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="next-slide" class="swiper-button-next swiper-buttons">
                                                    <i class="fa-solid fa-chevron-right"></i>
                                                </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <script>
                            //   next spbanchay
    window.addEventListener("load" , function(){
        const nextBTn = document.querySelector("#next-slide");
        const slideMain = document.querySelector(".slide-main");
        const slideItem = document.querySelectorAll(".slide-item");
        
        const imgItemWidth = slideItem[0].offsetWidth;
        const imgLength = slideItem.length;
        let postionX = 0;
        let index = 0;
        nextBTn.addEventListener("click" , function(){
            handleChange(1)
            
        })
        // prevBtn.addEventListener("click" , function(){
        //     handleChange(-1)
        // })
        function handleChange(direction){
            if(direction === 1){
                if(index > imgLength - 1){
                    index =imgLength ;
                    return ;
                }
                postionX = postionX - imgItemWidth;
                slideMain.style= ` transform:translateX(${postionX}px)`;
                index++;

            }
            else if(direction === -1){
                if(index <= 0) 
                {
                    index = 0;
                    return ;
                    
                };
                postionX = postionX + imgItemWidth;
                slideMain.style= ` transform:translateX(${postionX}px)`;
                index--;
            
            }
            }
        }
    )
                    </script>