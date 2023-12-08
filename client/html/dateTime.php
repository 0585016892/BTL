   <style>
        .dateTime{
            display: flex;
            font-size: 25px;
            color: #fcaf17;
            font-weight: 500;
        }
        .dateTime p{
           padding: 0 15px;
        }
        .colorTime{
            color: rgb(42,24,109);
        }
   </style>
   
   
   <div class="dateTime">
        <p id="day"></p>
        <p id="hour" class="colorTime"></p>
        <span>:</span>
        <p id="minute" class="colorTime"></p>
        <span>:</span>
        <p id="second" class="colorTime"></p>
   </div>

   
   <script>
        function hienThiThoiGian() {
            var now = new Date();
            var thu = now.getDay();
            var gio = now.getHours();
            var phut = now.getMinutes();
            var giay = now.getSeconds();

            var daysOfWeek = ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"];
            var thuChu = daysOfWeek[thu];

            document.getElementById("day").innerHTML = thuChu;
            document.getElementById("hour").innerHTML = gio ;
            document.getElementById("minute").innerHTML = phut;
            document.getElementById("second").innerHTML = giay;
        }

        // Cập nhật thời gian mỗi giây
        setInterval(hienThiThoiGian, 1000);
    </script>