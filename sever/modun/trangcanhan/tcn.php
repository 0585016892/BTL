<?php
$pageTitleAmin = "Trang thành viên";
    include '../../view/header.php';
    include '../../view/slide.php';
    include '../modelClass.php';
    include '../config/config2.php'
?>

<style>
    .moveTop{
        display: block;
    }
</style>
<div class="content-left">
<div class="main">
            <div class="content-left-cartelogy_add">
                        <div class="content">
                            <div class="content-left-right-cartelogy_list" style="background:red;">
                                hưng
                            </div>
                        </div>
                    </div>
               </div>
               <div class="addSlide" id="addSlide">
                <?php 
                    $randomNumber = random_int(11111111, 99999999);
                ?>
                    <button onclick="remove_top()" class="closeBtn btn">X</button>
                    <div class="slideAdd">
                    <form action="" method="POST" class="postSlide" enctype="multipart/form-data">
                        <input style="margin: 15px 0; width: 50%;" required name = "user_name" type="text" placeholder="Nhập tên thành viên"><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "user_email" type="text" placeholder="Nhập email thành viên"><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "user_phone" type="text" placeholder="Nhập số điện thoại thành viên"><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "role" value="writer" type="text" placeholder="Nhập email thành viên"><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "user_pass" type="text" value="<?php echo $randomNumber ?>" placeholder="Nhập password "><br>
                        <label style="margin: 15px 0;" for="">Vui lòng chọn ảnh <span style="color:red;">*</span> </label><br>
                        <input style="margin: 15px 0;" required name = "user_img" type="file"><br>
                        <button class="btn btnClick" type="submit">Thêm</button>
                    </form>
                    </div>
               </div>
            </div>
        </div>
    </div>
    <style>
        .moveTop{
            display: block;
        }
    </style>
    </section>
    <script>
        function move_top() {
        document.getElementById("addSlide").classList.add("moveTop");
      }
      function remove_top() {
        document.getElementById("addSlide").classList.remove("moveTop");
      }
</script>
</body>

</html>