<?php
$pageTitleAmin = "Trang danh mục";
    include './header.php';
    include './slide.php';
    include '../modun/modelClass.php';
?>
<div class="content-left">
<div class="main">
            <div class="content-left-cartelogy_add">
            <h1>Danh mục<span style="color:red;">*</span></h1>
               <div class="slideContent">
               <?php if(checkPrivilege('danhmuc/danhmucedit.php?danhmuc_id=0')){ ?>
                        <button onclick="move_top()" class="btn"><a href="#">Thêm danh mục</a></button>
                        <?php } ?>
                        <div class="content">
                            <div class="content-left-right-cartelogy_list">
                                <label style="font-weight: 500;padding: 15px 10px;">Danh sách danh mục<span style="color:red;">*</span></label>
                                <table class="table">
                                <thead class="table-light">
                                <tr>
                                        <th>#</th>
                                        <th>Tên danh mục</th>
                                        <?php if(checkPrivilege('danhmuc/danhmucedit.php?danhmuc_id=0') && checkPrivilege('danhmuc/danhmucdelete.php?danhmuc_id=0')){ ?>
                                        <th>Tùy chọn</th>
                                         <?php }?>   
                                    </tr>
                                    <?php
                                    $cartegory = new cartegory;
                                        $show_danhmuc = $cartegory ->  show_danhmuc();
                                    if($show_danhmuc){$i=0;
                                        while($result = $show_danhmuc->fetch_assoc()){$i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $result['danhmuc_name'] ?></td>
                                        <td style="color:white;">
                                        <?php if(checkPrivilege('danhmuc/danhmucedit.php?danhmuc_id=0')){ ?>
                                        <button  class="btn"><a style="color:white;" href="danhmucedit.php?danhmuc_id=<?php echo $result['danhmuc_id'] ?>">Sửa</a></button>
                                            <?php }?>
                                        <?php if(checkPrivilege('danhmuc/danhmucdelete.php?danhmuc_id=0')){ ?>
                                        |<button class="btn" style="background:red; border:none;"><a style="color:white;" href="danhmucdelete.php?danhmuc_id=<?php echo $result['danhmuc_id'] ?>">Xóa</a></td></span>
                                        <?php }?>
                                    </tr>
                                    <?php }} ?>
                                </thead>
                                </table>
                            </div>
                        </div>
                    </div>
               </div>
               <?php
                        $cartegory = new cartegory;
               if($_SERVER['REQUEST_METHOD'] === 'POST'){
                        $danhmuc_name = $_POST['danhmuc_name'];
                        $insert_danhmuc = $cartegory -> insert_danhmuc($danhmuc_name);
                    }
                ?>
               <div class="addSlide" id="addSlide">
                    <div class="slideAdd">
                    <button onclick="remove_top()" class="closeBtn btn">X</button>
                    <form action="" method="POST" class="postSlide" enctype="multipart/form-data">
                        <input style="margin: 15px 0; width: 50%;" required name = "danhmuc_name" type="text" placeholder="Nhập tên danh mục"><br>
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