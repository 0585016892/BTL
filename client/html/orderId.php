<?php
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

            if(isset($_SESSION["user_id"]) || isset($_SESSION["user_name"]) ){
                $result = mysqli_query($conn ,"SELECT tbl_orders.order_name,
                 tbl_orders.order_address,
                  tbl_orders.order_phone,
                   tbl_orders.order_note,
                    tbl_order_detail.*,
                     tbl_spbanchay.spbanchay_name as spbanchay_name FROM tbl_orders INNER JOIN tbl_order_detail ON tbl_orders.order_id = tbl_order_detail.order_id 
                INNER JOIN tbl_spbanchay 
                ON tbl_spbanchay.spbanchay_id = tbl_order_detail.spbanchay_id 
                WHERE tbl_orders.order_id =" . $_GET['user_id'] );
                $orders = mysqli_query($conn, "SELECT * FROM `tbl_orders` ORDER BY `order_id` ");
                ?>
            <section class="signup page_customer_account">
                <div class="container">
                    <div class="row">
                        <div class="col-left-ac">
                            <div class="block-account">
                                <div class="info info-1">
                                    <img src="/BTL/client/icons/account_ava.webp" alt="Toàn">
                                    <p><?=$_SESSION['user_name']?></p>
                                    <a class="click_logout" href="/BTL/index.php">Đăng xuất</a>
                                </div>
                                <ul>
                                    <li>
                                        <a disabled="disabled" class="title-info active" href="javascript:void(0);">Tài khoản của tôi</a>
                                    </li>
                                    <li>
                                        <a class="title-info" href="./orderId.php?user_name=<?=$_SESSION['user_name']?>">Đơn hàng của tôi</a>
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
                                <button class="btn-edit-addr btn btn-primarys btn-more" type="button" onclick="window.location.href='/account/addresses'">Sửa thông tin</button>
                            </h1>
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉa</th>
                                        <th>Ghi chú</th>

                                    </tr>
                                    <?php
                                    $i=1;
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?= $i?></td>
                                        <td><?=$row["order_name"] ?></td>
                                        <td><?=$row["order_phone"] ?></td>
                                        <td><?=$row["order_address"] ?></td>
                                        <td><?=$row["order_note"] ?></td>
                                    <?php $i++;  }?>
                                </thead>
                                </table>
                            
                        </div>
                    </div>
                </div>
            </section>
<?php } ?>
            <?php include './footer.php'  ?>
