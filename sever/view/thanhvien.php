<?php
$pageTitleAmin = "Trang thành viên";
    include './header.php';
    include './slide.php';
    include '../modun/modelClass.php';
    include '../modun/config/config2.php'
?>

<?php
$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $userEmail = $_POST['user_email'];
    // check xem tài khoản đn đã dkdi chưa
    $checkUser = mysqli_query($conn,  "SELECT * FROM tbl_user WHERE user_email = '$userEmail'");
    if($checkUser->num_rows > 0){
        $error = 'Email đăng kí đã tồn tại !';
    }else{
        $insert_thanhvien = $cartegory-> insert_thanhvien($_POST , $_FILES);
    }
}
$config_name = "member";
$config_title = "thành viên";
    $where = "role = 'writer' ";
	$item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
	$current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
	$offset = ($current_page - 1) * $item_per_page;
	if(!empty($where)){
		$totalRecords = mysqli_query($conn, "SELECT * FROM `tbl_admin` where (".$where.")");
	}else{
		$totalRecords = mysqli_query($conn, "SELECT * FROM `tbl_admin`");
	}
	$totalRecords = $totalRecords->num_rows;
	$totalPages = ceil($totalRecords / $item_per_page);
	if(!empty($where)){
		$products = mysqli_query($conn, "SELECT * FROM `tbl_admin` where (".$where.") ORDER BY `admin_id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
	}else{
		$products = mysqli_query($conn, "SELECT * FROM `tbl_admin` ORDER BY `admin_id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
	}
	mysqli_close($conn);

?>
<style>
    .moveTop{
        display: block;
    }
</style>
<div class="content-left">
<div class="main">
            <div class="content-left-cartelogy_add">
                <h1>Danh sách thành viên<span style="color:red;">*</span></h1>
               <div class="slideContent">
                      <div style='display: flex;justify-content: space-between'>
                      <?php if(checkPrivilege('privilege.php?user_id=0')){ ?>
                      <button onclick="move_top()" class="btn"><a href="#">Thêm thành viên</a></button>
                      <?php } ?>
                      <?php if(isset($error))  { ?>
                            <p style="color:red;"><?=$error?></p>
                       <?php } ?> 
                      <div style="margin-right:15px;"><?php include './phantrangtv.php' ?></div>
                        </div>
                      </div>
                        <div class="content">
                            <div class="content-left-right-cartelogy_list">
                                <label style="font-weight: 500;padding: 15px 10px;">Số lượng  <strong><?=$totalRecords?></strong>  thành viên<span style="color:red;">*</span></label>
                                
                                <table class="table">
                                <thead class="table-light">
                                <tr>
                                        <th>#</th>
                                        <?php if(checkPrivilege('privilege.php?admin_id=0')){ ?>
                                        <th>Tên đăng nhập</th>
                                        <?php } ?>    
                                        <th>Họ và tên</th>
                                        <th>Ngày tạo</th>
                                        <?php if(checkPrivilege('privilege.php?user_id=0')){ ?>
                                        <th>Phân quyền</th>
                                        <?php } ?>    
                                        <?php if(checkPrivilege('thanhviendelete.php?user_id=0')){ ?>
                                        <th>Tùy chọn</th>
                                        <?php } ?>    
                                    </tr>
                                   <?php 
                                    $i=1;
                                   while ($row = mysqli_fetch_array($products)) {?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <?php if(checkPrivilege('privilege.php?admin_id=0')){ ?>
                                        <td><?=$row['admin_email']?></td>
                                        <?php } ?>    
                                        <td><?=$row['admin_name']?></td>
                                        <td><?=date('d/m/Y' ,   $row['created_time'])?></td>
                                        <td >
                                            <?php if(checkPrivilege('privilege.php?user_id=0')){ ?>
                                                <a href="./privilege.php?admin_id=<?=$row['admin_id']?>">Phân quyền</a>
                                            <?php } ?>    
                                        </td>
                                        <?php if(checkPrivilege('thanhviendelete.php?user_id=0')){ ?>
                                        <td style="color:white;"><button class="btn" style="background:red; border:none;"><a style="color:white;" href="thanhviendelete.php?admin_id=<?=$row['admin_id'] ?>">Xóa</a></td></span>
                                        <?php } ?>    
                                    </tr>
                                        <?php $i++; } ?>
                                </thead>
                                </table>
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