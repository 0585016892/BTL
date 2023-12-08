<?php
session_start();
ob_start();
include '../sever/modun/modelClass.php';
include_once '../client/mail/index.php';

?>


<?php
$pageTitle = "Shopping House - Mặc Mỗi Ngày, Thoải Mái Mỗi Ngày";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="icon" href="./client/icons/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../client/css/main1.css">
    <link rel="stylesheet" href="../client/css/reponsiveindex12.css">
    <link rel="icon" href="../client/icons/logo.jpg">
</head>
<body>
        <div class="main">
            <div class="header" style=" background: url(../client/img/background-header.webp);">
                <div class="header_container container">
                    <div class="hearder-top">
                        <div class="hearder-top__left">
                            <div style="width:110px" class="header_logo">
                                <a style="top:-52px" href="../index.php">
                                    <img src="../client/img/logo2.png" alt="">
                                </a>
                            </div>
                            <div class="header_search">
                                <div class="theme-searchs">
                                    <form action="">
                                        <input type="text" placeholder="Tìm kiếm" class="search-auto auto-search" >
                                        <input type="hidden" name="" id="">
                                        <button type="submit" class=""><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="header-top_right">
                            <div class="header_contact">
                                <a href="#">
                                    <i class="fa-solid fa-location-dot"></i>
                                    Tìm cửa hàng
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
                <div class="header-bottom"></div>
                <div class="content container" style="display:flex;
                padding-right: 40px;
                justify-content:end;
                ">
                <i style="color: #11006F;
                    font-size: 24px;
                    padding:0 5px;" class="fa-regular fa-user"></i>
                <a style="color: #11006F;
                    font-size: 14px;
                    font-weight: 600;
                    padding:0 5px;
                " href="./login.php">Đăng nhập</a>
                /
                <a style="color: #11006F;
                    font-size: 14px;
                    font-weight: 600;
                    padding:0 5px;
                " href="./register.php">Đăng kí</a>
            </div>
            </div>
            <div class="page_content_account" style="background: url(../client/img/bg_login.webp) bottom center no-repeat;">
            <div class="container account">
                    <div class="grid">
                        <div class="row">
                            <section>
                                <div class="checkUsers">
                                <div class="checkUser">
                                    <h1 style="font-size: 26px; margin: 0;padding: 0;font-weight: bold;text-transform: unset;text-align: center;color: #fcaf17;line-height: 1;margin-bottom: 30px; ">QUÊN MẬT KHẨU</h1>
                                    <p style=" width: 385px;margin: 0 auto 10px;padding: 0;display: block; text-align: center; max-width: 100%;line-height: 15px;font-size: 14px;color: #000;">Nếu bạn quên mật khẩu, vui lòng nhập địa chỉ email đã đăng ký của bạn. Chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu.</p>
                                    <form method="POST" class="postLogin">

                                        <?php 
                                        if(isset($_POST["submit"])) {
                                            $error = array();
                                            $useremail = $_POST["email"];
                                            if($useremail == '') {
                                                $error["email"] = "Không được bỏ trống";
                                            }
                                            if(empty($error)) {
                                                $mail = new Mailer;
                                                $user = new cartegory;
                                                $result = $user -> get_UserEmail($useremail);
                                                $code = substr(rand(0,999999),0,6);
                                                $title = "Quên mật khẩu";
                                                $content = "Mã xác nhận của bạn là : <span style='color:green'>".$code."</span>";
                                                $mail->sendMail($title , $content , $useremail);
                                                
                                                $_SESSION["email"] = $useremail;
                                                $_SESSION["code"] = $code;
                                                header('Location:verification.php');
                                            }
                                        }
                                        ?>

                                        <div class="form-outline mb-4">
                                        <span style="color:red;"><?php
                                             if(isset($error["email"])){
                                                echo $error["email"];
                                             }
                                             ?></span>
                                            <input name="email" placeholder="Nhập email" type="email" id="email" class="form-control form-control-lg" /><br>
                                        </div>
                                        <!-- Submit button -->
                                        <div style="display:flex; " class="">
                                            <button style="margin-right:10px; width:100%; background: #FEEEEA; border:none;" class="btn btn-primary btn-lg btn-block">
                                                <a style="color:#fcaf17;font-size: 18px;font-weight: bold;" href="../index.php">HỦY</a>
                                            </button>
                                            <button style="margin-right:10px; width:100%; background: #fcaf17; border:none;" type="submit" name="submit"  class="btn btn-primary btn-lg btn-block">TIẾP TỤC</button>
                                        </div>
                                    </form>
                                </div>
                                </div>

                                
                            </section>
                        </div>
                    </div>
</div>
</div>

<div class="footer">
            <div class="container">
                <div class="row footer-top">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-12 col-foo-1">
                        <p class="sum">“Đặt sự hài lòng của khách hàng là ưu tiên số 1 trong mọi suy nghĩ hành động của mình” là sứ mệnh, là triết lý, chiến lược.. </p>
                        <div class="social">
                            <a href="https://facebook.com/yody.vn" class="social-button" title target="_blank" rel="nofollow">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-12 col-foo col-foo-2">
                        <h4 class="title-menu">Về Chúng tôi</h4>
                        <ul class="list-menu">
                            <li class="li_menu">
                                <a href="#" title="Giới thiệu">Giới thiệu</a>
                            </li>
                            <li class="li_menu">
                                <a href="#" title="Liên hệ">Liên hệ</a>
                            </li>
                            <li class="li_menu">
                                <a href="#" title="Tuyển dụng">Tuyển dụng</a>
                            </li>
                            <li class="li_menu">
                                <a href="#" title="Tin tức">Tin tức</a>
                            </li>
                            <li class="li_menu">
                                <a href="#" title="Hệ thống cửa hàng">Hệ thống cửa hàng</a>
                            </li>
                            <li class="li_menu">
                                <a href="#" title="Hàng mới về">Hàng mới về</a>
                            </li></ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12 col-foo col-foo-2">
                        <h4 class="title-menu">Hỗ trợ khách hàng</h4>
                        <ul class="list-menu">
                            <li class="li_menu">
                                <a href="#" title="Hướng dẫn Chọn size">Hướng dẫn Chọn size</a>
                            </li>
                            <li class="li_menu">
                                <a href="#" title="Chính sách Khách hàng thân thiết">Chính sách Khách hàng thân thiết</a>
                            </li>
                            <li class="li_menu">
                                <a href="#" title="Chính sách Bảo hành, đổi/trả">Chính sách Bảo hành, đổi/trả</a>
                            </li>
                            <li class="li_menu">
                                <a href="#" title="Chính sách Thanh toán, giao nhận">Chính sách Thanh toán, giao nhận</a>
                            </li>
                            <li class="li_menu">
                                <a href="#" title="Chính sách Đồng phục">Chính sách Đồng phục</a>
                            </li>
                            <li class="li_menu">
                                <a href="#" title="Chính sách Bảo mật thông tin khách hàng">Chính sách Bảo mật thông tin khách hàng</a>
                            </li></ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 col-foo-2 col-foo-contact">
                        <h4 class="title-menu">CÔNG TY CP THỜI TRANG </h4>
                        <ul class="list-menu">
                            <li class="fone">
                                <img src="../client/icons/map.svg" alt="">
                                    Công ty cổ phần Thời trang Shopping House<br>
                                    Mã số thuế: 0801206940<br>
                                    Địa chỉ: Trường Đại học Mỏ - Địa chất - Bắc Từ Liêm - Hà Nội
                            </li>
                            <li class="fone">
                                <img src="../client/icons/icon_address.webp" alt="">
                                <a href="#">Tìm cửa hàng gần bạn nhất</a>
                            </li>
                            <li class="fone">
                                <img src="../client/icons/phone.svg" alt="">
                                <a href="#">Liên hệ đặt hàng: 024 999 86 999.</a>
                            </li>
                            <li>
                                <img src="../client/icons/email.svg" alt="">
                                <a href="#">
                                    Email : tranhung6829@gmail.com
                                </a>
                            </li>
                        </ul>
                        <a href="http://online.gov.vn/Home/WebDetails/44085?AspxAutoDetectCookieSupport=1">
                            <img src="../client/icons/logo_bct.webp" alt="">
                        </a>
                        <a href="#">
                            <img src="../client/icons" alt="">
                        </a>
                    </div>
                </div>
                <div class="copyright">
                    <hr>
                    © Shopping House - Bản quyền thuộc về Công ty cổ phần thời trang Shopping House
                </div>
            </div>
        </div>
</body>
</html>
