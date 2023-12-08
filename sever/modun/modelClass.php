
<?php
ob_start(); 

include 'database.php';

?>
<?php
class cartegory{
    private $db;

    public function __construct(){
        $this -> db = new Database();
    }
    public function insert_img($banner_img){
        $query = "INSERT INTO tbl_banner(banner_img , banner_display) VALUES('$banner_img', 'áp dụng')";
        $result = $this ->db-> insert($query);
        
        return $result;
    }
    public function show_banner(){
        $query = "SELECT * FROM tbl_banner ORDER BY banner_id  DESC";
        $result = $this ->db-> select($query);
        return $result;

    }
    public function show_banner__client(){
        $query = "SELECT * FROM `tbl_banner` WHERE `banner_display` = 'áp dụng'";
        $result = $this ->db-> select($query);
        return $result;

    }
    public function delete_bannerr($banner_id ){
        $query = "DELETE FROM tbl_banner WHERE banner_id  = '$banner_id '";
        $result = $this->db->delete($query);
        header("Location:banner.php");
        return $result;
    }
    public function get_bannerr($banner_id ){
        $query = "SELECT * FROM tbl_banner WHERE banner_id  = '$banner_id ' ";
        $result = $this ->db-> select($query);
        return $result;
    }
    public function update_banner_an($banner_id){
        $query = "UPDATE tbl_banner SET  banner_display = 'không áp dụng'  where banner_id = '$banner_id'";
        $result  = $this -> db -> update($query);
        header("Location:banner.php");
        return $result;
    }
    public function update_banner_hien($banner_id){
        $query = "UPDATE tbl_banner SET  banner_display = 'áp dụng'  where banner_id = '$banner_id'";
        $result  = $this -> db -> update($query);
        header("Location:banner.php");
        return $result;
    }
    // --------------------banner---------------------
    public function insert_banner($slide_img){
        $query = "INSERT INTO tbl_slider(slide_img , slider_display) VALUES('$slide_img', 'áp dụng')";
        $result = $this ->db-> insert($query);
        echo '<script>
                        window.location.href = "../view/slider.php"; 
                    </script>';
        return $result;
    }
    public function show_slide(){
        $query = "SELECT * FROM tbl_slider ORDER BY slide_id DESC";
        $result = $this ->db-> select($query);
        return $result;

    }
    public function show_slide__client(){
        $query = "SELECT * FROM `tbl_slider` WHERE `slider_display` = 'áp dụng'";
        $result = $this ->db-> select($query);
        return $result;

    }
    public function delete_slider($slide_id){
        $query = "DELETE FROM tbl_slider WHERE slide_id = '$slide_id'";
        $result = $this->db->delete($query);
        header("Location:slider.php");
        return $result;
    }
    public function get_slider($slide_id){
        $query = "SELECT * FROM tbl_slider WHERE slide_id = '$slide_id' ";
        $result = $this ->db-> select($query);
        return $result;
    }
    public function update_slider_an($slide_id){
        $query = "UPDATE tbl_slider SET  slider_display = 'không áp dụng'  where slide_id = '$slide_id'";
        $result  = $this -> db -> update($query);
        header("Location:slider.php");
        return $result;
    }
    public function update_slider_hien($slide_id){
        $query = "UPDATE tbl_slider SET  slider_display = 'áp dụng'  where slide_id = '$slide_id'";
        $result  = $this -> db -> update($query);
        header("Location:slider.php");
        return $result;
    }
    // // -----------------insert_sanphambanchay-----------------------
    public function  insert_sanphambanchay(){
        $spbanchay_name = $_POST['spbanchay_name'];
        $spbanchay_size = $_POST['spbanchay_size'];
        $characteristic = $_POST['characteristic'];
        $sale_id = $_POST['sale_id'];
        $spbanchay_mau = $_POST['spbanchay_mau'];
        $spbanchay_msp = $_POST['spbanchay_msp'];
        $spbanchay_giatien = $_POST['spbanchay_giatien'];
        $danhmuc_id = $_POST['danhmuc_id'];
        $spbanchay_img = $_FILES['spbanchay_img']['name'];
        $spbanchay_img_tmp = $_FILES['spbanchay_img']['tmp_name'];
        $spbanchay_img = time().'_'.$spbanchay_img;
        move_uploaded_file($spbanchay_img_tmp,"../uploading/".$spbanchay_img);
        $query = "INSERT INTO tbl_spbanchay
         (spbanchay_name,
         spbanchay_img,
         spbanchay_size,
         characteristic,
         sale_id,
         spbanchay_mau,
         spbanchay_msp,
         spbanchay_gia,
         danhmuc_id ) VALUES(
        '$spbanchay_name' ,
         '$spbanchay_img',
         '$spbanchay_size',
         '$characteristic',
         '$sale_id',
         '$spbanchay_mau',
         '$spbanchay_msp',
         '$spbanchay_giatien',
         '$danhmuc_id')";
        $result = $this ->db-> insert($query);
        if($result){
            $query = "SELECT * FROM tbl_spbanchay ORDER BY spbanchay_id DESC LIMIT 1";
            $result = $this ->db-> select($query)->fetch_assoc();
            $spbanchay_id = $result["spbanchay_id"];
            $fileImg = $_FILES["spbanchay_imgs"]["name"];
            $filettmp = $_FILES["spbanchay_imgs"]["tmp_name"];


            foreach($fileImg as $key => $value){
                move_uploaded_file($filettmp[$key],"../uploading/".$value);
                $query = "INSERT INTO tbl_spbanchay_imgs (spbanchay_id ,spbanchay_imgs_name	) VALUES ('$spbanchay_id' , '$value')";
                $result = $this ->db-> insert($query);

            }

        }
        // header("Location:spbanchay.php");
        return $result;
    }
    public function show_sanphambanchay(){
        $query = "SELECT tbl_spbanchay.*,tbl_danhmuc.danhmuc_name
        FROM tbl_spbanchay INNER JOIN tbl_danhmuc ON
        tbl_spbanchay.danhmuc_id = tbl_danhmuc.danhmuc_id
        ORDER BY tbl_spbanchay.spbanchay_id  ";
        $result = $this ->db-> select($query);
        return $result;

    }
    public function show_sale(){
        $query = "SELECT * FROM tbl_sale ORDER BY sale_id DESC ";
        $result = $this ->db-> select($query);
        return $result;

    }
    public function delete_sanphambanchay($spbanchay_id){
        $query = "DELETE FROM tbl_spbanchay WHERE spbanchay_id = '$spbanchay_id'";
        $result = $this->db->delete($query);
        header("Location:spbanchay.php");
        return $result;
    }
    public function get_sanphambanchay($spbanchay_id){
        $query = "SELECT * FROM tbl_spbanchay WHERE spbanchay_id = '$spbanchay_id' ";
        $result = $this ->db-> select($query);
        return $result;
    }
    public function update_sanphambanchay($spbanchay_name,$spbanchay_msp,$spbanchay_id){
        $query = "UPDATE tbl_spbanchay SET
         spbanchay_name = '$spbanchay_name',
         spbanchay_msp = '$spbanchay_msp',  
         where spbanchay_id = '$spbanchay_id'";
        $result  = $this -> db -> update($query);
        header("Location:spbanchay.php");

        return $result;
    }
    // -----------------------danhmuc-----------------------
    public function  insert_danhmuc($danhmuc_name){
        $query = "INSERT INTO tbl_danhmuc (danhmuc_name) VALUES
        ('$danhmuc_name' )";
        $result = $this ->db-> insert($query);
        echo '<script>
                        window.location.href = "../view/danhmuc.php"; 
                    </script>';
        return $result;
    }
    public function show_danhmuc(){
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id DESC";
        $result = $this ->db-> select($query);
        return $result;

    }
    public function delete_danhmuc($danhmuc_id){
        $query = "DELETE FROM tbl_danhmuc WHERE danhmuc_id = '$danhmuc_id'";
        $result = $this->db->delete($query);
        header("Location:danhmuc.php");
        return $result;
    }
    public function get_danhmuc($danhmuc_id){
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id = '$danhmuc_id' ";
        $result = $this ->db-> select($query);
        return $result;
    }
    public function update_danhmuc($danhmuc_name,$danhmuc_id){
        $query = "UPDATE tbl_danhmuc SET
         danhmuc_name = '$danhmuc_name'
         where danhmuc_id = '$danhmuc_id'";
        $result  = $this -> db -> update($query);
        echo '<script>
                        // Mã JavaScript ở đây
                        window.location.href = "danhmuc.php"; // Ví dụ về chuyển hướng trang bằng JavaScript
                    </script>';

        return $result;
    }
    // -------------------thanhvien---------------
    public function delete_thanhvien($admin_id){
        $query = "DELETE FROM tbl_admin WHERE admin_id = '$admin_id'";
        $result = $this->db->delete($query);
        header("Location:thanhvien.php");
        return $result;
    }
    // // ----------------user--------------------
    public function get_UserEmail($useremail){
        $query = "SELECT * FROM tbl_user WHERE user_email = '$useremail' ";
        $result = $this ->db-> select($query);
        if($result){
            return $result;
        }else{
            echo "<h4 style='color:red;'>Email không tồn tại</h4>";
        }
    }
    public function forgetPass($password,$useremail){
        $query = "UPDATE tbl_user SET user_pass='$password' WHERE user_email = '$useremail' ";
        $result = $this ->db-> update($query);
        return $result;

    }
    public function update_cartegory($password,$username){
        $query = "UPDATE tbl_user SET user_pass='$password' WHERE user_name = '$username' ";
        $result = $this ->db-> update($query);
        return $result;

    }
    // ==========================ma giam gia=======================
    public function  insert_magiamgia(){
        $discount_code = $_POST['discount_code'];
        $discount_sotien = $_POST['discount_sotien'];
        $discount_chedo = $_POST['discount_chedo'];
        $query = "INSERT INTO tbl_discount (discount_code , discount_sotien ,discount_display) VALUES
        ('$discount_code' , '$discount_sotien', '$discount_chedo')";
        $result = $this ->db-> insert($query);
        header("Location:magiamgia.php");
        return $result;
    }
    public function update_magiamgia($discount_id){
        $query = "UPDATE tbl_discount SET discount_display='không áp dụng' WHERE discount_id = '$discount_id' ";
        $result = $this ->db-> update($query);
        header("Location:magiamgia.php");
        return $result;

    }
    public function show_magiamgia(){
        $query = "SELECT * FROM tbl_discount ORDER BY discount_id DESC";
        $result = $this ->db-> select($query);
        return $result;

    }
    public function sum_magiamgia(){
        $query = "SELECT COUNT(discount_id) AS discount_sum FROM tbl_discount";
        $result = $this->db-> count($query);
        return $result;
    }
    public function  delete_discount($discount_id){
        $query = "DELETE FROM tbl_discount WHERE discount_id = '$discount_id'";
        $result = $this->db->delete($query);
        header("Location:magiamgia.php");
        return $result;
    }
    // =====================size======================
    public function show_size(){
        $query = "SELECT * FROM tbl_size ORDER BY size_id DESC";
        $result = $this ->db-> select($query);
        return $result;

    }
    // ------------------------thanhvien==============
    public function  insert_thanhvien(){
        $admin_name = $_POST['user_name'];
        $admin_email = $_POST['user_email'];
        $admin_phone = $_POST['user_phone'];
        $role = $_POST['role'];
        $admin_pass = $_POST['user_pass'];
        $admin_img = $_FILES['user_img']['name'];
        $admin_img_tmp = $_FILES['user_img']['tmp_name'];
        $admin_img = time().'_'.$admin_img;
        move_uploaded_file($admin_img_tmp,"../uploading/".$admin_img);
        $query = "INSERT INTO `tbl_admin`
         (`admin_name`,
           `admin_email`,
            `admin_pass`,
              `role`, 
              `admin_phone`, 
              `admin_img`, 
              `created_time`) VALUES ( 
                '$admin_name',
                 '$admin_email',
                   '$admin_pass', 
                    '$role',
                      '$admin_phone',
                      '$admin_img',
                       ".time().")";
        $result = $this ->db-> insert($query);
        return $result;
    }
   
}
ob_end_flush();
?>