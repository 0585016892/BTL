<?php
$pageTitleAmin = "Trang quản trị";
include './header.php';
include './slide.php';
include '../modun/modelClass.php';
include '../modun/config/config2.php';
?>

<?php

$cartegory = new cartegory;
$totalRecords = mysqli_query( $conn,'SELECT * FROM tbl_spbanchay') ;
$totalRecords = $totalRecords -> num_rows;
$totaProduct = mysqli_query( $conn,'SELECT SUM(order_total) AS total_sum
FROM tbl_orders') ;
$row = mysqli_fetch_array($totaProduct);
$user = mysqli_query($conn, "SELECT * FROM `tbl_admin` WHERE `role` LIKE 'writer'" );
$nguoidung = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE `role` LIKE 'user'" );
$thanhvienonline =mysqli_query($conn,"SELECT count(*) as sounser FROM tbl_user_online");
$tvonline = mysqli_fetch_array($thanhvienonline);
mysqli_close($conn);

?>
<div class="content-left menuclick">
<div class="main">
            <div class="cardBox">
            <?php if(checkPrivilege('magiamgia/magiamgia.php')){ ?>
                <a href="./magiamgia.php" class="card">
                    <div > 
                        <?php
                         $sum_magiamgia = $cartegory -> sum_magiamgia();
                         if($sum_magiamgia){
                        $result = $sum_magiamgia->fetch_assoc(); 
                        ?>
                        <div class="numbers"><?php echo $result['discount_sum'] ?></div>
                        <?php } ?>
                        <div class="cardName">Mã giảm giá</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </a>
                <?php } ?>
                <?php if(checkPrivilege('sanpham/spbanchay.php')){ ?>
                <a href="./spbanchay.php">
                    <div class="card">
                        <div>
                            <div class="numbers"><?=$totalRecords?></div>
                            <div class="cardName">Sản phẩm</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                    </div>
                </a>
                    <?php } ?>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $tvonline['sounser'] ?></div>
                        <div class="cardName">Online</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?= number_format($row['total_sum'], 0, ",", ".") ?>.000</div>
                        <div class="cardName">Doanh thu</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="details">
                <div class="recentOrders" style="display: table;min-height: 619px;">
                    <div class="cardHeader">
                        <h2>Người dùng</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Tên người dùng</td>
                                <td>Email</td>
                                <td>Số điện thoại</td>
                                <td>Ngày tạo</td>
                            </tr>
                        </thead>

                        <tbody>
                        <?php  $i=1;
                           while ($result = mysqli_fetch_array($nguoidung)) {?>
                            <tr>
                                <td><?php echo $result['user_name'] ?></td>
                                <td><?php echo $result['user_email'] ?></td>
                                <td><?php echo $result['user_phone'] ?></td>
                                <td><span class="status delivered"><?=date('d/m/Y' ,   $result['created_time'])?></span></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers" style="display: table;">
                <?php if(checkPrivilege('thanhvien/thanhvien.php')){ ?>
                    <div class="cardHeader">
                        <h2>Thành viên</h2>
                    </div>

                    <table>
                                <?php 
                                    $i=1;
                                   while ($row = mysqli_fetch_array($user)) {?>
                        <tr>
                            <td width="60px">
                                <div class="imgBx" style="height: 50px;width: 50px;">
                               <img style="    position: absolute;
                                                top: 0;
                                                left: 0;
                                                width: 100%;
                                                height: 100%;
                                                object-fit: cover;" src="/sever/uploading/<?php  echo $row['admin_img']; ?>">
                                </div>
                            </td>
                            <td>
                                <h4><?=$row['admin_name']?> <br> <span><?=date('d/m/Y' ,   $row['created_time'])?></span></h4>
                            </td>
                        </tr>
                        <?php $i++; } ?>
                    </table>
                    <?php } ?>
                </div>
            </div>
</div>
</div>
    </section>
</body>
</html>