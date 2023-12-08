<?php
$pageTitleAmin = "Trang hóa đơn";
    include './header.php';
?>
<?php
            include '../modun/config/config2.php';
            $orders = mysqli_query($conn, "SELECT tbl_orders.order_name, tbl_orders.order_address, tbl_orders.order_phone, tbl_orders.order_note,tbl_orders.order_total, tbl_order_detail.*, tbl_spbanchay.spbanchay_name as spbanchay_name FROM tbl_orders INNER JOIN tbl_order_detail ON tbl_orders.order_id = tbl_order_detail.order_id 
            INNER JOIN tbl_spbanchay 
            ON tbl_spbanchay.spbanchay_id = tbl_order_detail.spbanchay_id 
            WHERE tbl_orders.order_id = "  . $_GET['donhangId']);
            $orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        ?>  
            <button class="btn"><a href="javascript:history.back()">Quay lại</a></button>
            <div class="content-left-cartelogy_add">
               <div class="inhoadon">
               <h1>Hóa đơn chi tiết<span style="color:red;">*</span></h1>
                    <div id="order-detail-wrapper">
                    <div id="order-detail">
                        <label>Người nhận: </label><span> <?=$orders[0]['order_name'] ?></span><br/>    
                        <label>Điện thoại: </label><span><?= $orders[0]['order_phone'] ?></span><br/>
                        <label>Địa chỉ: </label><span>  <?= $orders[0]['order_address'] ?></span><br/>
                        <hr/>
                        <h3>Danh sách sản phẩm</h3>
                        <ul>
                            <?php
                            $totalQuantity = 0;
                            foreach ($orders as $row) {
                                ?>
                                <li>
                                    <span class="item-name"><?= $row['spbanchay_name'] ?></span>
                                    <span class="item-quantity"> - SL:  /*<?=$row['order_detai_quantity'] ?> */sản phẩm</span>
                                </li>
                                <?php
                                $totalQuantity += $row['order_detai_quantity'];
                            }
                            ?>
                        </ul>
                        <hr/>
                        <label>Tổng SL:</label> <?= $totalQuantity ?> - <label>Tổng tiền:</label> <?=number_format($orders[0]['order_total'] , 0 , "," , ".")?>.000đ
                        <p><label>Ghi chú: </label><?= $orders[0]['order_note'] ?></p>
                    </div>
                </div>
            </div>
    </body>
</html>