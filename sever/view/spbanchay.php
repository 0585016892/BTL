<?php
$pageTitleAmin = "Trang sản phẩm";
    include './header.php';
    include './slide.php';
    include '../modun/modelClass.php';
    include '../modun/config/config2.php'
?>

<?php
$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // $spbanchay_name = $_POST['spbanchay_name'];
    // $spbanchay_size = $_POST['spbanchay_size'];
    // $characteristic = $_POST['characteristic'];
    // $sale_id = $_POST['sale_id'];
    // $spbanchay_mau = $_POST['spbanchay_mau'];
    // $spbanchay_msp = $_POST['spbanchay_msp'];
    // $danhmuc_id = $_POST['danhmuc_id'];
    // $spbanchay_img = $_FILES['spbanchay_img']['name'];
    // $spbanchay_img_tmp = $_FILES['spbanchay_img']['tmp_name'];
    // $spbanchay_img = time().'_'.$spbanchay_img;
    // move_uploaded_file($spbanchay_img_tmp,"../../uploading/".$spbanchay_img);
    $insert_sanphambanchay = $cartegory -> insert_sanphambanchay($_POST , $_FILES);
}

?>

<?php
$cartegory = new cartegory;
$item_per_page = !empty( $_GET['per_page']) ?  $_GET['per_page'] :3 ;
$current_page = !empty( $_GET['page']) ?  $_GET['page'] :1 ;
$offet = ($current_page - 1) * $item_per_page;
 $products = mysqli_query($conn,"SELECT tbl_spbanchay.*,tbl_danhmuc.danhmuc_name
FROM tbl_spbanchay INNER JOIN tbl_danhmuc ON
tbl_spbanchay.danhmuc_id = tbl_danhmuc.danhmuc_id
ORDER BY tbl_spbanchay.spbanchay_id ASC LIMIT ".$item_per_page." OFFSET  ".$offet."") ;
$totalRecords = mysqli_query( $conn,'SELECT * FROM tbl_spbanchay') ;
$totalRecords = $totalRecords -> num_rows;
$totalPage = ceil($totalRecords / $item_per_page);
mysqli_close($conn);

?>

<div class="content-left">
<div class="main">
            <div class="content-left-cartelogy_add">
                <h1 style="padding-left:20px;">Sản phẩm <span style="color:red;">*</span></h1>
               <div class="slideContent">
                      <div style='display: flex;justify-content: space-between'>
                      <?php if(checkPrivilege('sanpham/spbanchayedit.php?spbanchay_id=0')){ ?>
                      <button onclick="move_top()" class="btn"><a href="#">Thêm sản phẩm</a></button>
                    <?php } ?>
                      <div> <?php include './phantrangsp.php' ?></div>
                        </div>
                      </div>
                        <div class="content">
                            <div class="content-left-right-cartelogy_list">
                                <label style="font-weight: 500;padding: 15px 10px;">Số lượng <strong><?=$totalRecords?></strong> sản phẩm <span style="color:red;">*</span></label>
                                <table class="table">
                                <thead class="table-light">
                                <tr>
                                        <th>#</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Size sản phẩm</th>
                                        <th>Màu sản phẩm</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Danh mục</th>
                                        <?php if(checkPrivilege('sanpham/spbanchayedit.php?spbanchay_id=0') &&checkPrivilege('sanpham/spbanchaydelete.php?spbanchay_id=0')){ ?>
                                        <th>Tùy chọn</th>
                                        <?php } ?>
                                    </tr>
                                    <?php
                                    if($products){$i=0;
                                        while($result = mysqli_fetch_array($products)){$i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><a href="./chitietsp.php?spbanchay_id=<?php echo $result['spbanchay_id'] ?>" style="color:#000; cursor:pointer;" ><?php echo $result['spbanchay_name'] ?></a></td>
                                        <td><img style="width:75%; height: 200px;" src="../uploading/<?php  echo $result['spbanchay_img']; ?>"></td>
                                        <td><?php echo $result['spbanchay_gia'] ?>.000đ</td>
                                        <td><?php echo $result['spbanchay_size'] ?></td>
                                        <td><?php echo $result['spbanchay_mau'] ?></td>
                                        <td><?php echo $result['spbanchay_msp'] ?></td>
                                        <td><?php echo $result['danhmuc_name'] ?></td>
                                        <td style="color:white;">
                                        <?php if(checkPrivilege('sanpham/spbanchayedit.php?spbanchay_id=0')){ ?>
                                            <button  class="btn"><a style="color:white;" href="spbanchayedit.php?spbanchay_id=<?php echo $result['spbanchay_id'] ?>">Sửa</a></button>
                                        <?php }?>
                                        <?php if(checkPrivilege('sanpham/spbanchaydelete.php?spbanchay_id=0')){ ?>
                                            |<button class="btn" style="background:red; border:none;"><a style="color:white;" href="spbanchaydelete.php?spbanchay_id=<?php echo $result['spbanchay_id'] ?>">Xóa</a></button>
                                        <?php } ?>
                                        </td>
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
                        <input style="margin: 15px 0; width: 50%;" required name = "spbanchay_name" type="text" placeholder="Nhập tên sản phẩm"><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "spbanchay_size" type="text" placeholder="Nhập size sản phẩm"><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "spbanchay_mau" type="text" placeholder="Nhập màu sản phẩm"><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "spbanchay_msp" type="text" placeholder="Nhập mã sản phẩm"><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "spbanchay_giatien" type="text" placeholder="Nhập giá tiền sản phẩm"><br>
                        
                        <select style="margin: 15px 0; width:50%;"  name="sale_id" id="">
                            <option value="">--Chọn danh sách sản phẩm sale--</option>
                            <?php
                                $show_sale = $cartegory ->show_sale();
                                if($show_sale){
                                    while($result = $show_sale ->fetch_assoc()){

                                    
                                ?>
                                <option value="<?php echo $result['sale_id'] ?>"> <?php echo $result['sale_name'] ?></option>
                                <?php 
                                }
                            }
                            ?>
                            
                        </select><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "characteristic" type="text" placeholder="Nhập đặc điểm sản phẩm"><br>
                        <select style="margin: 15px 0; width:50%;"  name="danhmuc_id" id="">
                        <option value="">--Chọn danh mục--</option>
                        <?php
                        $show_danhmuc = $cartegory ->show_danhmuc();
                        if($show_danhmuc){
                            while($result = $show_danhmuc ->fetch_assoc()){

                            
                        ?>
                        <option value="<?php echo $result['danhmuc_id'] ?>"> <?php echo $result['danhmuc_name'] ?></option>
                        <?php 
                        }
                    }
                    ?>
                        
                    </select><br>
                        <label style="margin: 15px 0;" for="">Vui lòng chọn ảnh <span style="color:red;">*</span> </label><br>
                        <input style="margin: 15px 0;" required name = "spbanchay_img" type="file"><br>
                        <label style="margin: 15px 0;" for="">Vui lòng chọn ảnh <span style="color:red;">*</span> </label><br>
                        <input style="margin: 15px 0;" required name = "spbanchay_imgs[]" type="file" multiple><br>
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