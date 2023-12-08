<?php
include '../modun/config/config2.php';
include "./xuly.php";
?>
<?php

		$products = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE `role` = 'admin' OR `role` = 'writer' ");
        $row=mysqli_fetch_array($products);
	    mysqli_close($conn);
        $regexResult = checkPrivilege();




?>

<div class="container-fluid" style="padding:0;">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Trang quản trị</span>
                    </a>
                </li>
                <?php if(checkPrivilege('dashboard/dashboard.php')){ ?>
                <li>
                    <a href="./dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(checkPrivilege('danhmuc/danhmuc.php')){ ?>
                <li>
                    <a href="./danhmuc.php">
                        <span class="icon">
                            <ion-icon name="apps-outline"></ion-icon>
                        </span>
                        <span class="title">Danh mục</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(checkPrivilege('donhang/donhang.php')){ ?>
                <li>
                    <a href="./donhang.php">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Danh sách đơn hàng</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(checkPrivilege('slide/slide.php')){ ?>
                <li>
                    <a href="./slider.php">
                        <span class="icon">
                            <ion-icon name="albums-outline"></ion-icon>
                        </span>
                        <span class="title">Quảng cáo</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(checkPrivilege('sanpham/spbanchay.php')){ ?>
                <li>
                    <a href="./spbanchay.php">
                        <span class="icon">
                            <ion-icon name="code-outline"></ion-icon>
                        </span>
                        <span class="title">Quản lí sản phẩm</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(checkPrivilege('thanhvien/thanhvien.php')){ ?>
                <li>
                    <a href="./thanhvien.php">
                        <span class="icon">
                             <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Danh sách thành viên</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(checkPrivilege('cauhinh/cauhinh.php')){ ?>
                <li>
                    <a href="./modun/cauhinh/cauhinh.php">
                        <span class="icon">
                            <ion-icon name="cog-outline"></ion-icon>
                        </span>
                        <span class="title">Cấu hình</span>
                    </a>
                </li>
                <?php } ?>
                <li>
                    <a href="./logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <script>
            let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));
// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");

toggle.onclick = function () {
  navigation.classList.toggle("active");
};


        </script>