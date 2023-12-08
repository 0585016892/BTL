
<?php
$pageTitle = "Giỏ hàng";
include "./header.php";
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
                    if( empty($_POST['quantity'])) {
                        $error="Giỏ hàng trống !";
                       header('location:./cart.php');
                    }elseif($error == false && !empty($_POST['quantity'])) {
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
    $magiamgia = mysqli_query($conn , "SELECT * FROM `tbl_discount` WHERE `discount_display` = 'áp dụng'");
    $giamgia = mysqli_fetch_array($magiamgia);

?>

<style>
    .msg_erro{
        font-size: 20px;
        color: red;
        font-weight: 600;
        padding: 15px 20px;
    }
    .resend{
        padding: 0 10px;
    }
    .resend:hover{
        color: red;
    }
    .img{
        width: 90px;
        height: 120px;
    }
    .nameProduct{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding-left: 15px;
    }
    .nameProduct p{
        width: 320px;
        font-size: 14px;
        color: #000;
        font-weight: initial;
        text-align: left;
    }
    .header_table{
        font-size: 14px;
        color: #000;
    }
    .nameProductS{
        padding-bottom: 65px;
    }
    .deletePro a{
        font-size: 20px;
        opacity: 0.6;
    }
    .deletePro a:hover{
        color: #000;

    }
    .btn_capnhat{
        background-color: #fcaf17;
        box-shadow: 0px 2px 0px 0px #CA8C12;
        font-size: 16px;
        color: white; 
        font-weight: 600; 
    }
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
    .magiamgia{
        width: 100%;
        height: 92px;
        background: #EAEAF4;
    }
    .title_magiamgia{
        width: 100%;
        height: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .title_magiamgia h5{
        padding: 0px !important;
        font-weight: 700 !important;
        color: rgb(0, 0, 0) !important;
        font-size: 16px !important;
    }
    .content_magiamgia input{
        width: 100px;
        text-align: center;
        outline: none;
        font-weight: 700 !important;
        border: none;
        color: rgb(135, 134, 131) !important;
        border-radius: 5px;
        background: #F9F9F9;
    }
    .btn_giamgia{
        background: #11006F;
    border-radius: 4px !important;
    text-align: center;
    display: flex;
    width: 95px;
    height: 26px;
    justify-content: center;
    margin-left: 10px;
    align-items: center;
    color: #ffffff;
    font-size: 13px;
    font-weight: bold;
    border: 0 solid #2d7eef;
    padding: 2px 13px;
    }
    .ins-bar, .ins-bar2{
        margin: 40px 0;
        padding: 0 45px;
        width: 100%;
    }
    .ins-bar p , .ins-bar2 p{
        color: #25A35C;
        padding: 19px 0px;
        margin: 0;
        font-weight: bold;
        font-size: 13px;
        letter-spacing: 0.05em !important;
        text-transform: uppercase;
        margin-top: 20px;
        text-align: center !important;
    }
    .ins-bar2 span{
        display: flex;
        justify-content: center;
        font-size: 14px;
        font-weight: bold;
    }
    .ins-bar-holder{
        position: relative;
        height: 9px;
        background: #ddd;
        border-radius: 5px !important;
        transition: all 1s ease-out;
      width: 100%;
    }
    .ins-bar3::before{
        content: '';
        transition: all 1s ease-out;
        border-radius: 5px !important;
        position: absolute;
        width: 80%;
        height: 9px;
        background:  #FCAF17;
        animation: chay 1.5s ease-out;

    }
    @keyframes chay {
        0%{
            width: 0;
        }
        100%{
            width: 70%;
        }
    }
    .ins-bar1::before{
        content: '';
        transition: all 1s ease-out;
        border-radius: 5px !important;
        position: absolute;
        width: 100%;
        height: 9px;
        background:  #25A35C;
        animation: chay2 1.5s ease-out;

    }
    @keyframes chay2 {
        0%{
            width: 0;
        }
        100%{
            width: 100%;
        }
    }
</style>

<section  class="main-cart-page main-container col1-layout 11">
            <div class="main container cartpcstyle">
                <div class="wrap_background_aside margin-bottom-40">
                    <div class="cart-page">
                        <div class="drawer__inner">
                            <div class="CartPageContainer">
                                    <div class="row">
                                        <div class="col-12 col-xl-8 order-1 order-xl-1">
                                            <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">
                                                <p class="title">
                                                    <span class="text-uppercase">Giỏ hàng</span>
                                                    <?php if(isset($error)){ ?>
                                                    <span class="text-uppercase"><?php echo $error ?></span>
                                                    <?php  } ?>
                                                    <span class="total-cart">( <span class="count_item_pr"><?php echo $cartItemCount ?></span> ) Sản phẩm</span>
                                                </p>
                                                    <form action="cart.php?action=submit" style="background: white;"  method="post"  novalidate class="cart ajaxcart cartpage container">
                                                        <table class="table cart-header-info d-md-flex" style="background: white;"> 
                                                    <tbody  style="width:100%;background: white;">
                                                    <tr >
                                                        <th class="header_table table_title" style="text-align:left; width:60%;">sản phẩm</th>
                                                        <!-- <th class="header_table" style="text-align:center; width:20%;">Size</th> -->
                                                        <th class="header_table table_title dnone ">Đơn giá</th>
                                                        <th class="header_table table_title dnone ">Số lượng</th>
                                                        <th class="header_table table_title dnone ">Tổng tiền</th>
                                                    </tr>
                                                    <?php
                                                    if(!empty($product)){
                                                         $total = 0;
                                                        while($row= mysqli_fetch_array($product)){
                                                        ?>
                                                    <tr>
                                                        <td style="display:flex;width:60%;">
                                                                <img class="img" src="../../sever/uploading/<?=$row['spbanchay_img']?>" alt="">
                                                                <div class="nameProduct">
                                                                    <p><?=$row['spbanchay_name']?></p>
                                                                    <p style="display:flex;">
                                                                         <?=$row['spbanchay_mau']?> / <?=$row['spbanchay_size']?>
                                                                    </p>
                                                                </div>
                                                        </td>
                                                        <!-- <td style="text-align:center;">
                                                            <input type="text" value="<?=$_SESSION["cart"][$row["spbanchay_id"]] ?>" name="size[<?=$row['spbanchay_id']?>]">
                                                        </td> -->
                                                        
                                                        <td class="table_title dnone "><?=number_format($row['spbanchay_gia'] , 0,",", ".")?>.000đ</td>
                                                        <td class="table_title dnone ">
                                                            <div class="grid__item one-half cart_select">
                                                                <div style="padding-right: 40px;" class="ajaxcart__qty input-group-btn" style="display: flex;">
                                                                    <input type="text" value="<?=$_SESSION["cart"][$row["spbanchay_id"]] ?>" name="quantity[<?=$row['spbanchay_id']?>]">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="table_title dnone ">
                                                           <div class="nameProductS"> <?=number_format($row['spbanchay_gia'] * $_SESSION["cart"][$row["spbanchay_id"]] , 0 , "," , "." )?>.000đ</div>
                                                            <span class="deletePro">
                                                                <a href="cart.php?action=delete&spbanchay_id=<?=$row['spbanchay_id']?>">
                                                                    <ion-icon name="trash-outline"></ion-icon>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $freeShip = 0;
                                                        $total += $row['spbanchay_gia'] * $_SESSION["cart"][$row["spbanchay_id"]];
                                                        $freeShip = 200 - $total;
                                                    }
                                                   ?>
                                                </table>
                                                <?php if($total > 200) { ?>
                                                <div class="ins-bar">
                                                    <div class="ins-bar-holder ins-bar1"></div>
                                                    <p> CHÚC MỪNG BẠN ĐÃ ĐƯỢC FREESHIP CHO ĐƠN HÀNG NÀY</p>
                                                </div>
                                                <?php } else { ?>
                                                    <div class="ins-bar2">
                                                        <div class="ins-bar-holder ins-bar3"></div>
                                                        <p>MIỄN PHÍ VẬN CHUYỂN VỚI ĐƠN HÀNG TỪ 200K</p>
                                                        <?php $freeShip = 200 - $total;
                                                            if($freeShip) { ?>
                                                            <span>Chỉ cần mua thêm  <span style="color: #25A35C; padding:0 3px;"><?=$freeShip?>.000đ</span> để được Miễn phí vận chuyển</span>
                                                        <?php } else { ?>
                                                            <span>Chỉ cần mua thêm  <span style="color: #25A35C; padding:0 3px;">200.000đ</span> để được Miễn phí vận chuyển</span>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                                </div>
                                                <div class="items-md" style="padding:4px 0">
                                                        <input class="btn btn_capnhat " type="submit" name="update_subimit" value="Cập nhật" id="">
                                                </div>
                                        <?php } ?>
                                        </div>
                                            <div class="col-12 col-xl-4 order-3 order-xl-2 ajaxcart__wrap-footer">
                                                <?php if($total > 399) : ?>
                                                <div class="magiamgia">
                                                    <div class="title_magiamgia">
                                                        <h5>Giảm ngay <?=$giamgia['discount_sotien']?>% cho đơn hàng nguyên giá từ 399k </h5>
                                                    </div>
                                                <div class="content_magiamgia title_magiamgia">
                                                    <input type="text" name="" id="textToCopy" value="<?=$giamgia['discount_code']?>" readonly>
                                                    <div style="cursor:pointer;" onclick="copyToClipboard()" class="btn_giamgia">COPPY MÃ </div>
                                                </div>
                                               
                                                <script>
                                                    function copyToClipboard() {
                                                    var textToCopy = document.getElementById("textToCopy");
                                                    textToCopy.select();
                                                    document.execCommand("copy");
                                                    Swal.fire('Đã sao chép mã',textToCopy.value, 'success');
                                                    }
                                                   
                                                </script>
                                            </div>
                                            <?php endif ; ?>
                                                <div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">
                                                    <div class="update-checkout">
                                                        <div class="ajaxcart__subtotal pb-2">
                                                            <div class="cart__subtotal" style="gap: 4px; display:flex;justify-content: space-between;">
                                                                <div class="cart__col-6">Tổng đơn hàng (tạm tính):</div>
                                                                <div class="text-right cart__totle">
                                                                    <span style="font-weight:600;" class="total-price"><?=number_format($total , 0 , "," , ".")?>.000đ</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="cart__btn-proceed-checkout-dt">
                                                            <input style="background-color: #fcaf17;width:100%;box-shadow: 0px 2px 0px 0px #CA8C12;font-size: 16px;color: white; font-weight: 600; " class="btn" type="submit"                                                                              name="order_submit" value="Mua ngay" id="">
                                                        </div>
                                                    </div>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php include "./salepolo.php" ?>
<?php include './footer.php'; ?>