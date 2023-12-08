<?php
ob_start();
$pageTitle = "Trang khách hàng";
include "./header.php";
include '../../sever/modun/modelClass.php';
include '../../sever/modun/config/config2.php';
?>
<?php
 if(isset($_POST['submit'])){
    $error = array();
    if($_POST['repass'] != $_POST['newpass']){
        $error["fail"] = 'Nhập lại mật khẩu không chính xác !';
    }elseif($_POST['repass'] = $_POST['newpass']){
          $cartegory = new cartegory;
        $error['success'] = 'Đổi mật khẩu thành công !';
        if($_SERVER['REQUEST_METHOD']==='POST'){

            $newpass = $_POST['newpass'];
            $update_cartegory = $cartegory ->update_cartegory($_POST['newpass'],$_SESSION['user_name']);
        }
    }
} ?>
<section class="bread-crumb d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-12 a-left">
                <p class="last">
                    <strong>
                        <span>Tài khoản</span>
                    </strong>
                </p>
            </div>
        </div>
    </div>


</section>
<?php
           if(isset($_SESSION["user_name"]) ){
            ?>
            <section class="signup page_customer_account">
                <div class="container">
                    <div class="row">
                        <div class="col-left-ac">
                            <div class="block-account">
                                <div class="info info-1">
                                    <img src="../icons/account_ava.webp" alt="Toàn">
                                    <p><?=$_SESSION['user_name']?></p>
                                    <a class="click_logout" href="../../checkuser/logout.php">Đăng xuất</a>
                                </div>
                                <ul>
                                    <li>
                                        <a disabled="disabled" class="title-info active" href="./account.php?user_id=<?=$_SESSION["user_id"] ?>">Tài khoản của tôi</a>
                                    </li>
                                    <li>
                                        <a class="title-info" href="./changepassword.php">Đổi mật khẩu</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-right-ac">
                            <h1 class="title-head margin-top-0">
                                Đổi mật khẩu <span style="font-size: 14px;color: #7A7A9D;">(Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác)</span>
                            </h1>
                    <div class="grid">
                        <div class="row">
                            <section>
                                <div class="checkUsers">
                                    <div class="checkUser">
                                    <form method="POST" class="postLogin">
                                    <?php if(isset($error['fail'])) : ?>
                                                <span style="color:red;"><?=$error['fail']?></span>
                                            <?php elseif(isset($error['success'])): ?>
                                                <span style="color:black;"><?=$error['success']?></span>
                                            <?php else :?>
                                               
                                            <?php endif; ?>
                                        <div class="form-outline mb-4">
                                            <input name="pass_cu" placeholder="Nhập lại"  type="password" id="text" class="form-control form-control-lg" /><br>
                                            <input name="newpass" placeholder="Nhập mật khẩu mới"  type="password" id="text" class="form-control form-control-lg" /><br>
                                            <input name="repass" placeholder="Nhập lại khẩu mới" type="password" id="text" class="form-control form-control-lg" /><br>
                                        </div>
                                        <!-- Submit button -->
                                        <div style="display:flex; " class="">
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
                        </div>
                    </div>
                </div>
            </section>
<?php } ?>
            <?php include './footer.php'  ?>
