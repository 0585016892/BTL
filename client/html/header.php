<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/main1.css">
    <link rel="stylesheet" href="../css/sanpham.css">
    <link rel="stylesheet" href="../css/reponsivephone12.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/acc.css">
    <link rel="stylesheet" href="../css/coupon2.css">
    <link rel="stylesheet" href="../css/vongquay.css">
    <link rel="icon" href="../icons/logo.jpg">
    <!-- ---------------------chatbot----------- -->
    <link rel="stylesheet" href="../css/chatbot.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
    <!-- ============thongbao============== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <?php
    include '../../sever/modun/config/config2.php';

        $search = isset($_GET["spbanchay_name"]) ? $_GET["spbanchay_name"] :"";
        if($search){
            $where = "WHERE `spbanchay_name` LIKE '%".$search."%'";
        }
        $item_per_page = !empty( $_GET['per_page']) ?  $_GET['per_page'] :3 ;
        $current_page = !empty( $_GET['page']) ?  $_GET['page'] :3 ;
        $offet = ($current_page - 1) * $item_per_page;
        if($search){
            $product = mysqli_query($conn,"SELECT * FROM `tbl_spbanchay` ".$where."") ;
            $totalRecords = mysqli_query( $conn,"SELECT * FROM tbl_spbanchay ".$where."") ;
            $danhMuc = mysqli_query( $conn,"SELECT * FROM tbl_danhmuc") ;


        }else{
            $product = mysqli_query($conn,"SELECT * FROM `tbl_spbanchay`") ;
            $totalRecords = mysqli_query( $conn,'SELECT * FROM tbl_spbanchay') ;
            $danhMuc = mysqli_query( $conn,"SELECT * FROM tbl_danhmuc ") ;
            $saleBanchay = mysqli_query($conn,"SELECT * FROM `tbl_spbanchay` WHERE `sale_id` = 1") ;
            $salepolo = mysqli_query($conn,"SELECT * FROM `tbl_spbanchay` WHERE `sale_id` = 4") ;
            $saleaokhoac = mysqli_query($conn,"SELECT * FROM `tbl_spbanchay` WHERE `sale_id` = 6") ;

        }

        $totalRecords = $totalRecords -> num_rows;
        $totalPage = ceil($totalRecords / $item_per_page);
         $timeout = 60;
        $id = $_SESSION['user_id'];
        if(isset($_SESSION['admin_id'])){
            $users = $_SESSION['admin_id'] ;
       }else{
           $users = '';
       }
       $kq = mysqli_query($conn,"SELECT * FROM tbl_user_online WHERE user_online_id = $id");
       if(mysqli_num_rows($kq) > 0){
           $sl2 =mysqli_query($conn,"UPDATE tbl_user_online SET user_online_lastvisit = unix_timestamp()  WHERE user_online_id = ".$id." ");
       }else{
           $sl2 =mysqli_query($conn,"INSERT INTO  tbl_user_online VALUE('".$id."' , unix_timestamp() , '$users')");

       }
       $sl3 =mysqli_query($conn,"DELETE FROM tbl_user_online WHERE unix_timestamp() - user_online_lastvisit >  $timeout ");

        $sl4 =mysqli_query($conn,"SELECT count(*) as tongso FROM tbl_user_online");
        $d4 = mysqli_fetch_array($sl4);
        mysqli_close($conn);

    
    ?>
    <script>
        function myFunction() {
                document.getElementById("userAccount").classList.toggle("myStyle");
            }
    </script>
<style>
    .danhmuc:hover{
        border-bottom:2px solid #CD151C ;
        animation: spin 3s ease-out;
    }
    @keyframes spin {
  0% {
    transform: translateX(0);
  }
  100% {
    transform:translateX(1);
  }
}
</style>
<div class="main">
            <div class="header" style=" background: url(../img/background-header.webp);">
                <div class="header_container container">
                    <div class="hearder-top">
                        <div class="hearder-top__left">
                        <div id="hearder-top__hidden" onclick="btnMenu()" class="hearder-top__hidden" >
                         Menu
                            
                        </div>
                            <div style="width: 110px;" class="header_logo">
                                <a style="top: -52px;" href="../html/index.php">
                                    <img src="../img/logo2.png" alt="">
                                </a>
                            </div>
                            <div class="header_search">
                                <div class="theme-searchs">
                                    <form id="productSearch" action="search.php?spbanchay_name="  method="GET">
                                        <input type="text" value="<?=isset($_GET["spbanchay_name"]) ? $_GET["spbanchay_name"] :"" ?>" placeholder="Tìm kiếm" name="spbanchay_name" class="search-auto auto-search" >
                                        <button type="submit" class=""><i class="fa-solid fa-magnifying-glass"></i></button>
                                        <a class="  btn_giohang__hidden" href="./cart.php"> <i style="color: #11006F;
                                        font-size: 24px;
                                        padding:0 5px;" class="fa-solid fa-cart-shopping"></i>
                                        </a>
                                    </form>
                                </div>
                            </div>
                           
                        </div>
                        <div class="header-top_right">
                            <div class="header_contact">
                                <a href="#">
                                    <i class="fa-solid fa-location-dot"></i>
                                   <?php echo $d4['tongso'] ?> người đang online 
                                </a>
                                <a href="#">
                                    <i class="fa-solid fa-phone"></i>
                                    <b>0585016xxx</b>
                                </a>
                                <span class="text_free">FREE</span>
                                <span style="margin: 0 8px;">-</span>
                                <span class="text_order">Đặt hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom container content" >
                    <a href="./coupon.php" class="danhmuc" style="color:#CD151C; border-bottom:4px solid #FCAF17;font-size: 18px;">COUPON</a>
                   <div style=" width: 85%;">
                        <ul style=" ">
                            <form action="" method="GET">
                            <?php while($row = mysqli_fetch_array($danhMuc)) { ?>
                                <li class="danh-muc"><a style=" text-transform: uppercase;" class="danhmuc" href="../html/name.php?danhmuc_id=<?=$row['danhmuc_id'] ?>"><?=$row['danhmuc_name'] ?></a></li>
                            <?php } ?>
                            </form>
                        </ul>
                   </div>

                <div style="display: flex;width: 25%;" >
                <button  onclick="clickGio()"  class="btn_giohang hover-link">
                    <i style="color: #11006F;
                        font-size: 24px;
                        padding:0 5px;" class="fa-solid fa-cart-shopping"></i>
                            <a class=" hover-link"href="#">GIỎ HÀNG</a>
                    </button>
                    <script>
                        function clickGio(){
                            document.getElementById("giohangnhoId").classList.toggle("hiddenGiohang");
                        }
                    </script>
                 
                <?php 
                    if(isset($_SESSION["cart"]) && $_SESSION["cart"] !=0 ){
                    $cartItemCount = count( $_SESSION["cart"]) - 1;
                ?>
                    <div style=" padding: 0px 6px;
                        position: absolute;
                        width: 20px;
                        height: 20px;
                        background: orange;
                        border-radius: 50%;
                        top: 54px;
                        color: #363232;
                        right: 28.95%;
                        font-size: 15px;
                        font-weight: 700;" class="hidden-div" id="hidden-div"><?php echo $cartItemCount   ?></div>
                    <?php include './giohangnho.php' ?>
                    <?php }?>
                <i style="color: #11006F;
                    font-size: 24px;
                    padding:0 5px;" class="fa-regular fa-user"></i>
                <button style="outline: none;
                        color: #11006F;
                        font-size: 16px;
                        font-weight: 600;
                        padding: 0 5px;
                        background: transparent;
                        border: none;
                "
                onclick="myFunction()">CÁ NHÂN</button>
            </div>
            <?php
            if(isset($_SESSION["user_name"]) || isset($_SESSION["user_id"])){
                ?>
            <div class="userAccount" id="userAccount">
                <ul style="margin-top:10px; padding:0;">
                    <li>
                        <a href="#" style="border-bottom: 1px #dde1ef solid;color:#fcaf17">
                        <b><?=$_SESSION['user_name']?></b>
                        </a>
                    </li>
                    <li>
                        <a href="./account.php?user_id=<?=$_SESSION["user_id"] ?>">Tài khoản của tôi</a>
                    </li>
                    <li>
                        <a href="./changepassword.php?user_id=<?=$_SESSION["user_id"]?>">Đổi mật khẩu</a>
                    </li>
                    <li>
                        <a href="#">Sổ địa chỉ</a>
                    </li>
                    <li class="logout">
                        <a href="../../checkuser/logout.php">Đăng xuất</a>
                    </li>
                </ul>
            </div>
            <?php } ?>
            </div>
                </div>

   
