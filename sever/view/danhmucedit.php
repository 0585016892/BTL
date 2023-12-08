<?php
$pageTitleAmin = "Trang sửa danh mục";
    include './header.php';
    include './slide.php';
    include '../modun/modelClass.php';
?>

<?php
$cartegory = new cartegory;
if(isset($_GET['danhmuc_id']) || ( $_GET['danhmuc_id'])==NULL ){
    $danhmuc_id = $_GET['danhmuc_id'];

}
$get_danhmuc = $cartegory -> get_danhmuc($danhmuc_id);
if($get_danhmuc){$result = $get_danhmuc->fetch_assoc();}
?>
<?php
$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD']==='POST'){
    $danhmuc_name = $_POST['danhmuc_name'];
    $update_sanphambanchay = $cartegory ->update_danhmuc($danhmuc_name,$danhmuc_id);
}
?>
        <div class="content-left">
            <div class="content-left-cartelogy_add">
                    <form action="" method="POST" class="postSlide" enctype="multipart/form-data">
                    <input style="margin: 15px 0; width: 50%;" required name = "danhmuc_name" type="text" value="<?php echo $result['danhmuc_name'] ?>" placeholder="Sửa tên danh mục"><br>
                        <button class="btn btnClick" type="submit">Thêm</button>
                    </form>
            </div>
        </div>
    </div>
    </section>
</body>
</html>