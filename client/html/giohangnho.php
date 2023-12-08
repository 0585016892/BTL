
<?php
include '../../sever/modun/config/config2.php'
?>
<?php 

    if(empty($_SESSION["cart"])){
        $_SESSION["cart"] = array("");

    }
    if (isset($_GET['action']) && isset($_SESSION['cart'])) {
        function update_cart($add = false) {
            foreach ($_POST['quantity'] as $spbanchay_id => $quantity) {
                if($quantity == 0){
                    unset($_SESSION["cart"][$spbanchay_id]);
                }else{
                    if ($add) {
                        $_SESSION["cart"][$spbanchay_id] += $quantity;
                    }else{
                        $_SESSION["cart"][$spbanchay_id] = $quantity;
                    }
                }
                
               
            }
           
        }
        
        switch ($_GET['action']) {
            case 'add':
                update_cart(true);
                echo '<script>
                        // Mã JavaScript ở đây
                       
                        window.location.href = "./cart.php"; // Ví dụ về chuyển hướng trang bằng JavaScript
                    </script>';
                break;
            case 'delete':
                if (isset($_GET['spbanchay_id'])) {   
                    unset($_SESSION['cart'][$_GET['spbanchay_id']]);
                }
                echo '<script>
                        // Mã JavaScript ở đây
                        window.location.href = "./cart.php"; // Ví dụ về chuyển hướng trang bằng JavaScript
                    </script>';
                break;
            case 'submit':
                if (isset($_POST['update_subimit'])) {
                    update_cart();
                    echo '<script>
                        // Mã JavaScript ở đây
                        window.location.href = "./cart.php"; // Ví dụ về chuyển hướng trang bằng JavaScript
                    </script>';
                }elseif ($_POST['order_submit']) {
                    if(empty($_POST['quantity'])) {
                        $error = 'Giỏ hàng trống';
                    }
                    if($error == false && !empty($_POST['quantity'])) {
                        echo '<script>
                        // Mã JavaScript ở đây
                        window.location.href = "./checkout.php"; // Ví dụ về chuyển hướng trang bằng JavaScript
                    </script>';
                    }
                }
                break;
            default:
                // Xử lý mặc định (nếu cần)
                break;
        }


    }
    if(!empty($_SESSION["cart"])){
        $product = mysqli_query($conn , "SELECT * FROM `tbl_spbanchay` WHERE `spbanchay_id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
        $cartItemCount = count( $_SESSION["cart"]) - 1;
    }else {
        // Nếu không có giỏ hàng, số lượng mục là 0
        $cartItemCount = 0;
    }
    $magiamgia = mysqli_query($conn , "SELECT * FROM `tbl_discount` WHERE `discount_sotien` LIKE '30'");
    $giamgia = mysqli_fetch_array($magiamgia);
    
?>



<div id="giohangnhoId" class="top-cart-content">
                    <div class="CartHeaderContainer">
                        <form action="./cart.php" method="post" novalidate class="cart ajaxcart cartheader MultiFile-intercepted">
                        <?php
                                                    if(!empty($product)){
                                                         $total = 0;
                                                        while($row= mysqli_fetch_array($product)){
                                                        ?>
                            <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">
                                <div class="ajaxcart__row " data-id="23371857">
                                    <div class="ajaxcart__product cart_product" data-line="1">
                                        <a href="#" class="ajaxcart__product-image cart_image" >
                                            <img width="83" height="111" src="../../sever/uploading/<?=$row['spbanchay_img']?>" >
                                        </a>
                                        <div class="grid__item cart_info" ins-init-condition="#LnNoaXAtY2FydCwgLmNhcnRfaW5mbw==">
                                            <div class="ajaxcart__product-name-wrapper cart_name">
                                                <a style="color: #000;" href="./cartegory.php?spbanchay_id=<?=$row['spbanchay_id']?>" class="ajaxcart__product-name" ><?=$row['spbanchay_name']?></a>
                                                <span class="cart-price"><?=number_format($row['spbanchay_gia'] , 0,",", ".")?>.000đ</span>
                                                <div class="giohangnhodelete">
                                                    <span class="ajaxcart__product-meta variant-title"><?=$row['spbanchay_mau']?></span>
                                                    <span class="deletePro">
                                                            <a href="cart.php?action=delete&spbanchay_id=<?=$row['spbanchay_id']?>">
                                                                <ion-icon name="trash-outline"></ion-icon>
                                                            </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php
                                                        $total = $row['spbanchay_gia'] * $_SESSION["cart"][$row["spbanchay_id"]];
                                                   ?>
                                            <div class="grid grid-gift">
                                                <div class="grid__item one-half cart_select">
                                                            <div style="padding-right: 40px;" class="ajaxcart__qty input-group-btn" style="display: flex;">
                                                                    Số lượng : 
                                                                    <input style="width:25px;outline:none;border:none;" type="text" value="<?=$_SESSION["cart"][$row["spbanchay_id"]] ?>" name="quantity[<?=$row['spbanchay_id']?>]">
                                                                </div>
                                                            </div>
                                                <div class="grid__item one-half text-right cart_prices">
                                                    Tổng cộng : <span class="cart-price"><?=number_format($total , 0 , "," , ".")?>.000đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">
                                <div class="cart__btn-proceed-checkout-dt">
                                    <button onclick="location.href='./cart.php'" type="button" class="button btn btn-default cart__btn-proceed-checkout" id="btn-proceed-checkout" title="Xem giỏ hàng">Xem giỏ hàng</button>
                                </div>
                        
                        </div>
                        <?php }?>
                            </form>
                    </div>
                </div>
<style>
    .cartheader .cart_body .grid .cart_prices .cart-price {
    font-size: 16px;
    color: red;
    font-weight: 500;
}
    .cartheader .cart_body .cart_info .cart_name .remove-item-cart {
    background: url(remove_cart_nor.svg) center center no-repeat;
    position: absolute;
    right: 0;
    top: 0;
    width: 18px;
    height: 18px;
}
    .cartheader .cart_body .cart_info .variant-title {
    font-size: 14px;
    display: inline-block;
    vertical-align: top;
    line-height: 26px;
    color: #363636;
    background: #F8F8F8;
    border-radius: 13px;
    padding: 0 12px;
}
    .cartheader .cart_body .cart_info .cart_name .cart-price {
    font-size: 16px;
    color: #fcaf17;
    font-weight: 500;
    display: block;
    margin-bottom: 5px;
}
    .cartheader .cart_body .cart_info .cart_name a {
    margin-bottom: 4px;
    display: block;
}
    .cartheader .ajaxcart__footer .cart__btn-proceed-checkout-dt button {
    width: 100%;
    box-shadow: 0px 3px 0px 0px #CA8C12;
    background-color: #fcaf17;
    color: #fff;
    text-align: center;
    line-height: 46px;
    padding: 0;
    font-size: 18px;
}
    .cartheader .ajaxcart__footer .cart__btn-proceed-checkout-dt {
    display: block;
    position: relative;
}
    .cartheader .ajaxcart__footer {
    padding: 10px;
}
     .cartheader .cart_body .grid ,.giohangnhodelete{
        justify-content: space-between;
                        display: flex;
                    }
                    .cartheader .cart_body .cart_info .cart_name {
                        margin-bottom: 9px;
                        position: relative;
                        padding-right: 20px;
                    }
                    .cartheader .cart_body .cart_info {
                        padding-left: 15px;
                        vertical-align: top;
                    }
                    .container .topbar-wrap .topbar-bottom .topbar-bottom__right .cart-drop img {
                            margin-right: 10px;
                        }
                    .cartheader .cart_body .cart_image {
                        display: table-cell;
                        width: 83px;
                        vertical-align: top;
                        position: relative;
                    }
                    .cartheader .cart_body .cart_product {
                        margin-bottom: 15px;
                        display: table;
                        width: 100%;
                    }
                    .top-cart-content .ajaxcart__row:last-child {
                                border-bottom: 1px solid #D9D9D9;
                            }
                    .cartheader .cart_body {
                        padding: 15px 15px 0;
                        max-height: 360px;
                        overflow-y: auto;
                    }
                    .CartHeaderContainer {
                        width: 477px;
                        background-color: #fff;
                    }
                    .top-cart-content {
                        right: 16%;
                        top: calc(100% + -3px);
                        position: absolute;
                        background: #fff;
                        padding: 0;
                        line-height: normal;
                        text-align: left;
                        box-shadow: 0px 3px 25px 0px rgba(31,38,67,0.1);
                        -o-box-shadow: 0px 3px 25px 0px rgba(31,38,67,0.1);
                        -moz-box-shadow: 0px 3px 25px 0px rgba(31,38,67,0.1);
                        -webkit-box-shadow: 0px 3px 25px 0px rgba(31,38,67,0.1);
                        z-index: 10000;
                        transition-duration: 0s;
                        transition-delay: .1s;
                        display: none;
                    }
                    .hiddenGiohang{
                            display: block;
                            }
</style>
