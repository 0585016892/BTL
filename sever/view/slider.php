<?php
$pageTitleAmin = "Trang quảng cáo";
    include './header.php';
    include './slide.php';
    include '../modun/modelClass.php';
?>

<?php
$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $slide_img = $_FILES['slide_img']['name'];
    $slide_img_tmp = $_FILES['slide_img']['tmp_name'];
    $slide_img = time().'_'.$slide_img;
    move_uploaded_file($slide_img_tmp,'../uploading/'.$slide_img);
    $insert_img = $cartegory -> insert_banner($slide_img);
}

?>

<?php

$cartegory = new cartegory;
$show_slide = $cartegory ->  show_slide();

?>
<style>
    .slide_tab{
        margin: 15px 0 0 25px;
    }
   
</style>
<div class="content-left">
<div class="main">
            <div class="content-left-cartelogy_add">
                <div class="slide_tab">
                    <p>Quảng Cáo</p>
                    <span>></span>
                    <p><a style="color: red; font-size :35px;padding:0 15px;" href="#">Slide</a></p>
                    <span>></span>
                    <p><a style="color: #000; font-size :35px;padding:0 15px;" href="./banner.php">Banner</a></p>
                </div>
               <div class="slideContent">
                        <button onclick="move_top()" class="btn"><a href="#">Thêm slide</a></button>
                        <div class="content">
                            <div class="content-left-right-cartelogy_list">
                                <label style="font-weight: 500;padding: 15px 10px;">Danh sách slide  <span style="color:red;">*</span></label>
                                <table class="table">
                                <thead class="table-light">
                                <tr>
                                        <th>#</th>
                                        <th>Tên slide</th>
                                        <th>Chức năng</th>
                                        <th>Tùy chọn</th>

                                    </tr>
                                    <?php
                                    if($show_slide){$i=0;
                                        while($result = $show_slide->fetch_assoc()){$i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><img class="slideImg" src="../uploading/<?php  echo $result['slide_img']; ?>"></td>
                                        <td>
                                            <p style="font-size: 20px;color: #000;"><?php echo $result['slider_display'] ?></p>
                                            <div>
                                                <button  class="btn"><a style="color:white;" href="./anslide.php?slide_id=<?php echo $result['slide_id'] ?>">Không áp dụng</a></button>
                                                <button  class="btn"><a style="color:white;" href="./hienslide.php?slide_id=<?php echo $result['slide_id'] ?>">Áp dụng</a></button>
                                            </div>
                                        </td>
                                        <td style="color:white;"><button class="btn" style="background:red; border:none;"><a style="color:white;" href="slidedelete.php?slide_id=<?php echo $result['slide_id'] ?>">Xóa</a></td></span>
                                        </tr>
                                    <?php }} ?>
                                </thead>
                                </table>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="addSlide" id="addSlide">
                    <button onclick="remove_top()" class="closeBtn btn">X</button>
                    <div class="slideAdd">
                    <form  method="POST" class="postSlide" enctype="multipart/form-data">
                        <label style="margin: 15px 0;" for="">Vui lòng chọn ảnh <span style="color:red;">*</span> </label><br>
                        <input style="margin: 15px 0;" required name = "slide_img" type="file"><br>
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