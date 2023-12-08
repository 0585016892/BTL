<div class="vongquay">
        <div class="vongquayMain">
            <div class="banner2">
                <img src="../img/banner123.png" alt="">
            </div>
             <div class="vongquay1">
             <button id="spin">Quay</button>
            <span class="arrow"><img src="../img/muiten123.png" alt="" class="arrow"></span>
            <div class="wapper">
                <div class="one">10k</div>
                <div class="two">40k</div>
                <div class="three">20k</div>
                <div class="four">60k</div>
                <div class="five">50k</div>
                <div class="six">70k</div>
                <div class="seven">80k</div>
                <div class="eight">100k</div>
            </div>
             </div>
        </div>
   </div>
 <script>
    let container = document.querySelector(".wapper");
    let btn = document.getElementById("spin");
    let number = Math.ceil(Math.random() * 5000);
    
    btn.onclick = function () {
        container.style.transform = "rotate(" + number + "deg)";
        number += Math.ceil(Math.random() * 5000);

        container.addEventListener('transitionend', function () {
            // Tính góc quay hiện tại
            let currentRotation = number % 360;

            // Chọn số tiền tương ứng với góc quay
            let prize = getPrize(currentRotation);

            // Hiển thị thông báo Swal.fire với số tiền trúng thưởng
            Swal.fire({
                    title: 'Chúc mừng!',
                    text:  `Bạn đã trúng ${prize}`,
                    icon: 'success',
                    customClass: {
                        container: 'swal-container', // Tên lớp CSS cho container
                    },
                });

            // Gỡ bỏ sự kiện transitionend để tránh gọi lại nếu container quay lại
            container.removeEventListener('transitionend', arguments.callee);
        });
    }

    // Hàm để lấy số tiền trúng thưởng dựa trên góc quay
    function getPrize(rotation) {
        if (rotation >= 0 && rotation < 45) {
            return "10k";
        } else if (rotation >= 45 && rotation < 90) {
            return "40k";
        } else if (rotation >= 90 && rotation < 135) {
            return "20k";
        } else if (rotation >= 135 && rotation < 180) {
            return "60k";
        } else if (rotation >= 180 && rotation < 225) {
            return "50k";
        } else if (rotation >= 225 && rotation < 270) {
            return "70k";
        } else if (rotation >= 270 && rotation < 315) {
            return "80k";
        } else {
            return "100k";
        }
    }
   </script>
   <style>
    .swal-container{
        z-index: 10000;
        font-weight:600;
    }
   </style>