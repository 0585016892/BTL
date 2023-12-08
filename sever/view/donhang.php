<?php
$pageTitleAmin = "Trang đơn hàng";
    include './header.php';
    include './slide.php';
    include '../modun/modelClass.php';
    include '../modun/config/config2.php'
?>

<?php
$where ="";
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if(!empty($where)){
        $totalRecords = mysqli_query($conn, "SELECT * FROM `tbl_orders` where (".$where.")");
    }else{
        $totalRecords = mysqli_query($conn, "SELECT * FROM `tbl_orders`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if(!empty($where)){
        $orders = mysqli_query($conn, "SELECT * FROM `tbl_orders` where (".$where.") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else{
        $orders = mysqli_query($conn, "SELECT * FROM `tbl_orders` ORDER BY `order_id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    mysqli_close($conn);
    ?>

<div class="content-left">
<div class="main">
            <div class="content-left-cartelogy_add">
               <div class="slideContent">
               <h1>Danh sách hóa đơn<span style="color:red;">*</span></h1>
                        <div class="content">
                            <div class="content-left-right-cartelogy_list">
                            <label style="font-weight: 500;padding: 15px 10px;">Số lượng <strong><?=$totalRecords?></strong> hóa đơn <span style="color:red;">*</span></label>
                                <table class="table">
                                <thead class="table-light">
                                <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉa</th>
                                        <th>Ghi chú</th>
                                        <th>In đơn</th>

                                    </tr>
                                      <?php
                                    $i=1;
                                    while ($row = mysqli_fetch_array($orders)) { ?>
                                    <tr>
                                        <td><?= $i?></td>
                                        <td><?=$row["order_name"] ?></td>
                                        <td><?=$row["order_phone"] ?></td>
                                        <td><?=$row["order_address"] ?></td>
                                        <td><?=$row["order_note"] ?></td>
                                        <td>
                                            <a href="./printingDonhang.php?donhangId=<?=$row["order_id"] ?>">Inđơn</a>
                                        </td>
                                    <?php $i++;  }?>
                                </thead>
                                </table>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
    </section>
</body>
</html>