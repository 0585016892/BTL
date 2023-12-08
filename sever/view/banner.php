<?php
$pageTitleAmin = "Trang quảng cáo";
$urlSlie = "/BTL/sever/";
    include './header.php';
    include './slide.php';
    include '../modun/modelClass.php';
?>

<?php
$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $banner_img = $_FILES['banner_img']['name'];
    $banner_img_tmp = $_FILES['banner_img']['tmp_name'];
    $banner_img = time().'_'.$banner_img;
    move_uploaded_file($banner_img_tmp,'../uploading/'.$banner_img);
    $insert_img = $cartegory -> insert_img($banner_img);
}

?>

<?php

$cartegory = new cartegory;
$show_banner = $cartegory ->  show_banner();
?>
<style>
    .fix_banner{
        width: calc(70% - 320px);
        position: absolute;
        z-index: 555;
        animation: move_right 0.3s ease-in-out;
        display: none;
        top: 0%;
        left: 26%;
    }
    .banner_add{
        position: absolute;
        width: 95%;
        background: white;
        z-index: 9999;
        top: 20%;
        left: .75%;
        margin: 0 20px;
    }
    .fix_bannerTOp{
        display: block;
    }
</style>
<div class="content-left">
            <div class="content-left-cartelogy_add">
            <div class="slide_tab">
                    <p>Quảng Cáo</p>
                    <span>></span>
                    <p><a style="color: #000; font-size :35px;padding:0 15px;" href="./slider.php">Slide</a></p>
                    <span>></span>
                    <p><a style="color: red; font-size :35px;padding:0 15px;" href="#">Banner</a></p>
                </div>
               <div class="slideContent">
                    <div class="main">
                        <button onclick="move_top()" class="btn"><a href="#">Thêm banner</a></button>
                        <div class="content">
                            <div class="content-left-right-cartelogy_list">
                                <label style="font-weight: 500;padding: 15px 10px;">Danh sách banner  <span style="color:red;">*</span></label>
                                <table class="table">
                                <thead class="table-light">
                                <tr>
                                        <th>#</th>
                                        <th>Tên banner</th>
                                        <th>Chức năng</th>
                                        <th>Tùy chọn</th>

                                    </tr>
                                    <?php
                                    if($show_banner){$i=0;
                                        while($result = $show_banner->fetch_assoc()){$i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><img style="width:30%; height: 200px;" src="../uploading/<?php  echo $result['banner_img']; ?>"></td>
                                        <td style="color:white;">
                                            <p style="font-size: 25px;color: #000;"><?php echo $result['banner_display'] ?></p>
                                            <div>
                                                    <button  class="btn"><a style="color:white;" href="./anbanner.php?banner_id=<?php echo $result['banner_id'] ?>">Không áp dụng</a></button>
                                                    <button  class="btn"><a style="color:white;" href="./hienbanner.php?banner_id=<?php echo $result['banner_id'] ?>">Áp dụng</a></button>
                                                </div>
                                        </td>
                                        <td style="color:white;">
                                            <button class="btn" style="background:red; border:none;">
                                            <a style="color:white;" href="bannerdelete.php?banner_id=<?php echo $result['banner_id'] ?>">Xóa</a>
                                            </button>
                                        </td></span>
                                        </tr>
                                    <?php }} ?>
                                </thead>
                                </table>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="addSlide" id="addSlide">
                    <button style="z-index: 55555;" onclick="remove_top()" class="closeBtn btn">X</button>
                    <div class="slideAdd">
                    <form action="" method="POST" class="postSlide" enctype="multipart/form-data">
                        <label style="margin: 15px 0;" for="">Vui lòng chọn ảnh <span style="color:red;">*</span> </label><br>
                        <input style="margin: 15px 0;" required name = "banner_img" type="file"><br>
                        <button class="btn btnClick" type="submit">Thêm</button>
                    </form>
                    </div>
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
      function fix_banner() {
        document.getElementById("fix_banner").classList.add("fix_bannerTOp");
      }
      function remove_fix_banner() {
        document.getElementById("fix_banner").classList.remove("fix_bannerTOp");
      }
</script>
</html>