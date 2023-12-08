<?php
$pageTitle = "Trang khách hàng";
include "./header.php";
include '../../sever/modun/modelClass.php';
include '../../sever/modun/config/config2.php';
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
                $result = mysqli_query($conn ,"SELECT * FROM `tbl_user` WHERE `user_id` = " .$_GET['user_id']);
                $row = mysqli_fetch_array($result);
                $donhang = mysqli_query($conn ,"SELECT order_id FROM tbl_orders WHERE order_name = '".$_SESSION["user_name"]."'");
                
                ?>
            <section class="signup page_customer_account">
                <div class="container">
                    <div class="row">
                        <div class="col-left-ac">
                            <div class="block-account">
                                <div class="info info-1">
                                    <img src="../icons/account_ava.webp" alt="Toàn">
                                    <p><?=$row['user_name']?></p>
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
                                        <th>Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>email</th>
                                        <th>Đơn hàng</th>

                                    </tr>
                                        <td>#</td>
                                        <td><?=$row["user_name"] ?></td>
                                        <td><?=$row["user_phone"] ?></td>
                                        <td><?=$row["user_email"] ?></td>
                                        <?php 
                                            if($row = mysqli_fetch_array($donhang)){
                                        ?>
                                            <td><a class="title-info" onclick="tinhnang()" href="#">Xem đơn</a></td>
                                                <?php } else { ?>
                                            <td><a class="title-info">Không có đơn hàng</a></td>
                                                    <?php } ?>
                                        </thead>
                                </table>
                                <script>
                                    function tinhnang(){
                                        Swal.fire('Tính năng đang phát triển', 'Xin cảm ơn', 'success');
                                    }
                                </script>
                        </div>
                    </div>
                </div>
            </section>
<?php } ?>
            <?php include './footer.php'  ?>
