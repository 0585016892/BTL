<?php
$pageTitleAmin = "Trang sản phẩm";
    include './header.php';
    include './slide.php';
    include '../modun/modelClass.php';
?>

<?php
$cartegory = new cartegory;
if(isset($_GET['spbanchay_id']) || ( $_GET['spbanchay_id'])==NULL ){
    $spbanchay_id = $_GET['spbanchay_id'];

}
$get_sanphambanchay = $cartegory -> get_sanphambanchay($spbanchay_id);
if($get_sanphambanchay){$result = $get_sanphambanchay->fetch_assoc();}
?>
<?php
$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD']==='POST'){
    $spbanchay_name = $_POST['spbanchay_name'];
    $spbanchay_msp = $_POST['spbanchay_msp'];
    $update_sanphambanchay = $cartegory ->update_sanphambanchay($spbanchay_name,$spbanchay_msp,$spbanchay_id);
}
?>
        <div class="content-left">
            <div class="content-left-cartelogy_add">
                    <form action="" method="POST" class="postSlide" enctype="multipart/form-data">
                    <input style="margin: 15px 0; width: 50%;" required name = "spbanchay_name" type="text" value="<?php echo $result['spbanchay_name'] ?>" placeholder="Nhập tên sản phẩm"><br>
                        <input style="margin: 15px 0; width: 50%;" required name = "spbanchay_msp" type="text" value="<?php echo $result['spbanchay_msp'] ?>" placeholder="Nhập mã sản phẩm"><br>
                        <label style="margin: 15px 0;" for="">Vui lòng chọn ảnh <span style="color:red;">*</span> </label><br>
                        <button class="btn btnClick" type="submit">Thêm</button>
                    </form>
            </div>
        </div>
    </div>
    </section>
</body>
</html>