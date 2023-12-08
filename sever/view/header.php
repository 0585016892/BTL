<?php
session_start();
include '../modun/config/config2.php';


$nguoidung = mysqli_query($conn, "SELECT * FROM `tbl_admin` WHERE `admin_name` LIKE '".$_SESSION['admin_name']."'" );
mysqli_close($conn);
$result = mysqli_fetch_array($nguoidung);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitleAmin; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/topmenu.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/contents.css">
    <link rel="stylesheet" href="../css/repons1.css">
    <link rel="icon" href="../img/1.png">
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    .admin{
        display: flex;
        padding:  0 10px ;
    }
    .admin select{
        border: none;
        outline: none;
        padding: 0 20px;
    }
    .admin select option{
        font-size: 15px;
        padding: 15px;
    }
</style>
<body>
    <div class="container-fuile">
        <div class="header">
            <div class="logo">
                <img style="width: 150px;" src="../img/logo2.png" alt="">
            </div>
        </div>
        <div class="menu" style=>
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

               <form  method="GET" action="../view/search.php?tim_kiem=">
                <div class="search">
                        <label style="align-items: center;display: flex;">
                            <input type="text" name="tim_kiem" placeholder="Search here" value="<?=isset($_GET["tim_kiem"]) ? $_GET["tim_kiem"] :"" ?>" >
                            <button type="submit" style="border: none;"><ion-icon name="search-outline"></ion-icon></button>
                        </label>
                    </div>
               </form>

                <div class="admin">
                <div class="user">
                    <a href="./trangcanhan/tcn.php">
                         <img src="../uploading/<?php  echo $result['admin_img']; ?>" alt="">
                    </a>
                </div>
                <select >
                        <option ><?=$_SESSION['admin_name']?></option>
                    </select>
                </div>
            </div>
        </div>
</div>