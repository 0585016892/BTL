<?php
$conn = mysqli_connect("sql104.infinityfree.com", "if0_35420525", "AlKqEWlQZxIgZW", "if0_35420525_shopquanao") or die("Database Error");

// nhận tin nhắn của người dùng qua ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

// kiểm tra truy vấn của người dùng với truy vấn cơ sở dữ liệu
$check_data = "SELECT chatbot_rep FROM tbl_chatbot WHERE chatbot_question LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// nếu truy vấn của người dùng khớp với truy vấn cơ sở dữ liệu, chúng tôi sẽ hiển thị câu trả lời nếu không nó sẽ chuyển sang câu lệnh khác
if(mysqli_num_rows($run_query) > 0){
   // tìm nạp phát lại từ cơ sở dữ liệu theo truy vấn của người dùng
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['chatbot_rep'];
    echo $replay;
}else{
    echo "Xin lỗi ! Tôi có thể giúp gì cho bạn";
}

?>