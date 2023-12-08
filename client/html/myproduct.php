<?php
$pageTitle = "Đơn hàng";
include "./header.php";
include '/xampp/htdocs/BTL/sever/modun/modelClass.php';
include '/xampp/htdocs/BTL/sever/modun/config/config2.php';
?>
<section class="bread-crumb d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-12 a-left">
                <p class="last">
                    <strong>
                        <span>Tài khoản</span>
                    </strong>
                </p>
            </div>
        </div>
    </div>


</section>
<?php

            if(isset($_SESSION["user_name"]) ){
                $result = mysqli_query($conn ,"SELECT * FROM `tbl_user` WHERE `user_id` = " .$_GET['user_id']);
                $row = mysqli_fetch_array($result);
                $order = mysqli_query($conn ,"SELECT tbl_orders.order_name,
                 tbl_orders.order_address,
                  tbl_orders.order_phone,
                   tbl_orders.order_note,
                   tbl_orders.order_total,
                    tbl_order_detail.*,
                     tbl_spbanchay.spbanchay_name as spbanchay_name FROM tbl_orders INNER JOIN tbl_order_detail ON tbl_orders.order_id = tbl_order_detail.order_id 
                INNER JOIN tbl_spbanchay 
                ON tbl_spbanchay.spbanchay_id = tbl_order_detail.spbanchay_id 
                WHERE tbl_orders.order_id = "  . $_GET['order_id']);
                $orders = mysqli_fetch_all($order, MYSQLI_ASSOC);
                
                ?>
            <section class="signup page_customer_account">
                <div class="container">
                    <div class="row">
                        <div class="col-left-ac">
                            <div class="block-account">
                                <div class="info info-1">
                                    <img src="/BTL/client/icons/account_ava.webp" alt="Toàn">
                                    <p><?=$_SESSION["user_name"]?></p>
                                    <a class="click_logout" href="../../checkuser/logout.php">Đăng xuất</a>
                                </div>
                                <ul>
                                    <li>
                                        <a disabled="disabled" class="title-info active" href="javascript:void(0);">Tài khoản của tôi</a>
                                    </li>
                                    <li>
                                        <a class="title-info" href="./changepassword.php">Đổi mật khẩu</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-right-ac">
                            <h1 class="title-head margin-top-0">
                                Thông tin cá nhân
                            </h1>
                            <table class="table">
                                <thead class="table-warning">
                                <tr>
                                        <th>#</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá tiền</th>
                                        <?php
                                            $total = 0;
                                            foreach ($orders as $value) {
                                                $total = $value['order_detai_quantity'] * $value['order_detai_price'];

                                                ?>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        
                                        <td>
                                                <span class="item-name"><?= $value['spbanchay_name'] ?></span>
                                            </td>
                                            <td>
                                                <span class="item-quantity"><?=$value['order_detai_quantity'] ?> sản phẩm</span>
                                            </td>
                                            <td><?=number_format($total , 0 , "," , ".")?>.000đ</td>

                                            
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td style="font-weight: 700;">Tổng</td>
                                        <td></td>
                                        <td><?=number_format($value['order_total'] , 0 , "," , ".")?>.000đ</td>
                                    </tr>
                                    <?php
                                        }
                                        ?>
                                </thead>
                                </table>
                            
                        </div>
                    </div>
                </div>
            </section>
<?php } ?>
            <?php include './footer.php'  ?>
