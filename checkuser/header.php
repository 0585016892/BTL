<?php
$pageTitle = "Shopping House - Mặc Mỗi Ngày, Thoải Mái Mỗi Ngày";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="icon" href="./client/icons/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./client/css/main1.css">
    <link rel="stylesheet" href="./client/css/reponsiveindex12.css">
</head>
<body>
        <div class="main">
            <div class="header" style=" background: url(./client/img/background-header.webp);">
                <div class="header_container container">
                    <div class="hearder-top">
                        <div class="hearder-top__left">
                            <div style="width:110px" class="header_logo">
                                <a style="top:-52px" href="../index.php">
                                    <img src="./client/img/logo2.png" alt="">
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
                " href="./checkuser/login.php">Đăng nhập</a>
                /
                <a style="color: #11006F;
                    font-size: 14px;
                    font-weight: 600;
                    padding:0 5px;
                " href="./checkuser/register.php">Đăng kí</a>
            </div>
            </div>