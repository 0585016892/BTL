<?php
$pageTitleAmin = "Trang mã giảm giá";
    include './header.php';
    include './slide.php';
    include '../modun/modelClass.php';
?>

<?php
$title_name = 'mã giảm giá';
$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // $discount_code = $_POST['discount_code'];
    // $discount_sotien = $_POST['discount_sotien'];
    // $discount_chedo = $_POST['discount_chedo'];
    $insert_magiamgia = $cartegory ->insert_magiamgia($_POST);
}
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
$length = 5; // Độ dài của chuỗi ngẫu nhiên (tùy chỉnh theo nhu cầu của bạn)

for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}
?>

<?php

$cartegory = new cartegory;
$show_magiamgia = $cartegory ->  show_magiamgia();

?>
<div class="content-left">
<div class="main">
            <div class="content-left-cartelogy_add">
            <h1>Mã giảm giá<span style="color:red;">*</span></h1>
               <div class="slideContent">
               <?php if(checkPrivilege('edit.php?discount_id=0')){ ?>
                        <button onclick="move_top()"  style="color:white;" class="btn"><a href="#"></a>Thêm <?=$title_name?></a></button>
                    <?php } ?>
                        <div class="content">
                            <div class="content-left-right-cartelogy_list">
                                <label style="font-weight: 500;padding: 15px 10px;">Danh sách <?=$title_name?><span style="color:red;">*</span></label>
                                <table class="table">
                                <thead class="table-light">
                                <tr>
                                        <th>#</th>
                                        <th>Mã</th>
                                        <th>Giảm %</th>
                                       <?php if(checkPrivilege('edit.php?discount_id=0')){ ?>
                                        <th>Chế độ</th>
                                        <th>Tùy chọn</th>
                                        <?php } ?>

                                    </tr>
                                    <?php
                                    if($show_magiamgia){$i=0;
                                        while($result = $show_magiamgia->fetch_assoc()){$i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $result['discount_code'] ?></td>
                                        <td><?php echo $result['discount_sotien'] ?>%</td>
                                       <?php if(checkPrivilege('edit.php?discount_id=0')){ ?>

                                        <td>
                                            <button class="btn" style=" border:none; padding-right:10px;"><a style="color:white;" href="./mggedit.php?discount_id=<?php echo $result['discount_id'] ?>">Không áp dụng</a></button>
                                            <?php echo $result['discount_display'] ?>
                                        </td>
                                        <td style="color:white;">
                                            <button class="btn" style="background:red; border:none;"><a style="color:white;" href="./mggdelete.php?discount_id=<?php echo $result['discount_id'] ?>">Xóa</a>
                                        </td>
                                        <?php } ?>
                                        </tr>
                                    <?php }} ?>
                                </thead>
                                </table>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="addSlide" id="addSlide">
                    <div class="slideAdd">
                    <button onclick="remove_top()" class="closeBtn btn">X</button>
                    <form action="" method="POST" class="postSlide" enctype="multipart/form-data">
                        <input style="margin: 15px 0; width: 50%;" required name = "discount_code" type="text" value="<?php echo $randomString; ?>" placeholder="Nhập tên danh mục"><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "discount_sotien" type="text" placeholder="Giảm phần trăm" " ><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "discount_chedo" type="text" placeholder="Áp dụng / không áp dụng" " ><br>
                        <button class="btn btnClick" type="submit">Thêm</button>
                    </form>
                    </div>
               </div>
            </div>
        </div>
    </div>
    </section>
</body>
<script>
        function move_top() {
        document.getElementById("addSlide").classList.add("moveTop");
      }
      function remove_top() {
        document.getElementById("addSlide").classList.remove("moveTop");
      }
</script>
</html>