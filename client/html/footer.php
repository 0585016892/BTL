<div class="footer">
            <div class="container">
                <div class="row footer-top">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-12 col-foo-1">
                        <p class="sum">“Đặt sự hài lòng của khách hàng là ưu tiên số 1 trong mọi suy nghĩ hành động của mình” là sứ mệnh, là triết lý, chiến lược.. </p>
                        <div class="social">
                            <a href="https://facebook.com/Shopping House.vn" class="social-button" title target="_blank" rel="nofollow">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-12 col-foo col-foo-2">
                        <h4 class="title-menu">Về Chúng tôi</h4>
                        <ul class="list-menu hidden_list__menu">
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
                        <ul class="list-menu hidden_list__menu">
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
                                <img src="../icons/map.svg" alt="">
                                    Công ty cổ phần Thời trang Shopping House<br>
                                    Mã số thuế: 0801206940<br>
                                    Địa chỉ: Trường Đại học Mỏ - Địa chất - Bắc Từ Liêm - Hà Nội
                            </li>
                            <li class="fone">
                                <img src="../icons/icon_address.webp" alt="">
                                <a href="#">Tìm cửa hàng gần bạn nhất</a>
                            </li>
                            <li class="fone">
                                <img src="../icons/phone.svg" alt="">
                                <a href="#">Liên hệ đặt hàng: 024 999 86 999.</a>
                            </li>
                            <li>
                                <img src="../icons/email.svg" alt="">
                                <a href="#">
                                    Email : tranhung6829@gmail.com
                                </a>
                            </li>
                        </ul>
                        <a href="http://online.gov.vn/Home/WebDetails/44085?AspxAutoDetectCookieSupport=1">
                            <img src="../icons/logo_bct.webp" alt="">
                        </a>
                        <a href="#">
                            <img src="../icons/_dmca_premi_badge_5.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="copyright">
                    <hr>
                    ©Shopping House - Bản quyền thuộc về nhóm 2 Lớp 7080116 - 24
               </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function() {
            // Lấy số lượng ban đầu
            var quantity = 1;
          
            // Hiển thị số lượng ban đầu trong ô input
            $("#quantity").val(quantity);
          
            // Xử lý nút tăng
            $(".increase").click(function() {
              quantity++;
              $("#quantity").val(quantity);
            });
          
            // Xử lý nút giảm
            $(".decrease").click(function() {
              if (quantity > 1 && quantity != 0) {
                quantity--;
                $("#quantity").val(quantity);
              }
            });
          });
          
		jQuery('.swatch[data-option-index="1"] .M').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
    </script>
    </html>