   <style>
   
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
::selection{
    color: #fff;
    background: #FCAF17;
}

::-webkit-scrollbar{
    width: 3px;
    border-radius: 25px;
}
::-webkit-scrollbar-track{
    background: #f1f1f1;
}
::-webkit-scrollbar-thumb{
    background: #ddd;
}
::-webkit-scrollbar-thumb:hover{
    background: #ccc;
}

.wrapperchatBot{
    width: 100%;
    background: #fff;
    border-radius: 5px;
    border: 1px solid lightgrey;
    border-top: 0px;
}
.wrapperchatBot .title{
    background: #FCAF17;
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    line-height: 60px;
    text-align: center;
    border-bottom: 1px solid #FCAF17;
    border-radius: 5px 5px 0 0;
}
.wrapperchatBot .form{
    padding: 20px 15px;
    min-height: 340px;
    max-height: 400px;
    overflow-y: auto;
}
.wrapperchatBot .form .inbox{
    width: 100%;
    display: flex;
    align-items: baseline;
}
.wrapperchatBot .form .user-inbox{
    justify-content: flex-end;
    margin: 13px 0;
}
.wrapperchatBot .form .inbox .icon{
    height: 40px;
    width: 40px;
    /* color: #fff; */
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    /* font-size: 18px; */
    /* background: #FCAF17;*/
}
.wrapperchatBot .form .inbox .msg-header{
    margin-left: 10px;
}
.form .inbox .msg-header p{
    color: #fff;
    background: #FCAF17;
    border-radius: 10px;
    padding: 8px 10px;
    font-size: 14px;
    word-break: break-all;
}
.form .user-inbox .msg-header p{
    color: #333;
    background: #efefef;
}
.wrapperchatBot .typing-field{
    padding: 0 10px;
    display: flex;
    height: 60px;
    width: 100%;
    align-items: center;
    justify-content: space-evenly;
    background: #efefef;
    border-top: 1px solid #d9d9d9;
    border-radius: 0 0 5px 5px;
}
.wrapperchatBot .typing-field .input-data{
    height: 40px;
    width: 335px;
    position: relative;
}
.wrapperchatBot .typing-field .input-data input{
    height: 100%;
    width: 100%;
    outline: none;
    border: 1px solid transparent;
    padding: 0 80px 0 15px;
    border-radius: 3px;
    font-size: 15px;
    background: #fff;
    transition: all 0.3s ease;
}
.typing-field .input-data input:focus{
    border-color: rgba(0,123,255,0.8);
}
.input-data input::placeholder{
    color: #999999;
    transition: all 0.3s ease;
}
.input-data input:focus::placeholder{
    color: #bfbfbf;
}
.wrapperchatBot .typing-field .input-data button{
    position: absolute;
    right: 5px;
    top: 50%;
    height: 30px;
    width: 65px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    outline: none;
    opacity: 0;
    pointer-events: none;
    border-radius: 3px;
    background: #FCAF17;
    border: 1px solid #FCAF17;
    transform: translateY(-50%);
    transition: all 0.3s ease;
}
.wrapperchatBot .typing-field .input-data input:valid ~ button{
    opacity: 1;
    pointer-events: auto;
}
.typing-field .input-data button:hover{
    background: #FCAF17;
}
   </style>
    <div class="wrapperchatBot">
        <div class="title">Tìm kiếm thêm tại đây</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <img src="../icons/call_in_des.webp" alt="">
                </div>
                <div class="msg-header">
                    <p>Bắt đầu trò chuyện !</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: '../chatbot/mess.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><img src="../icons/call_in_des.webp" alt=""></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                       // khi trò chuyện đi xuống, thanh cuộn sẽ tự động xuống dưới cùng
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
