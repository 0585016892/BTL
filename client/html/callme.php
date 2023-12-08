<style>
    		@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Roboto:ital,wght@0,300;0,400;1,500&display=swap');
			.popup_call_in{
				position: fixed;
				z-index: 2000;
				bottom: 112px;
				right: 116px;
				border-radius: 8px;
				background: #fff;
				width: 327px;
				padding: 32px 40px 40px 40px;
                display: none;
				box-shadow: 0px 25.600000381469727px 57.599998474121094px 0px rgba(0, 0, 0, 0.08), 0px 4.800000190734863px 14.399999618530273px 0px rgba(0, 0, 0, 0.08);
			}
            .callMeToggle{
                display: block;
            }
			.close_call_in{
				position: absolute;
				right: 12px;
				top: 12px;
				border: 0;
				background: transparent;
			}
			.img_content_call_in{
				margin: 0 auto;
				display: flex;
    			justify-content: center;
			}
			.text_call_in{
				padding: 20px 0;
				margin: 0;
				font-size: 14px;
                text-align: center;
				font-style: normal;
				font-weight: 500;
				line-height: 22px
			}
			.btn_call_in{
				align-items: center;
				width: 184px;
				margin: 0 auto;
				display: flex;
				gap: 10px;
				border-radius: 24px;
				border: 1px solid #2A2A86;
				padding: 10px;
			}
			.btn_call_in img{
				margin-left: 10px;
			}
			.btn_call_in span{
				font-size: 18px;
				font-style: normal;
				font-weight: 700;
				color: #2A2A86;
			}
			
			.phone_mobile {
                position: fixed;
                z-index: 2000;
                bottom: 112px;
                right: 24px;
            }
			.phone_mobile img{
                width: 50px;
                height: 50px;
                object-fit: contain;
                animation-name: phonecall;
                animation-duration: 1s;
                animation-iteration-count: infinite;
                z-index: 1;

			}
			.phone_mobile:after{
				content: '';
				position: absolute;
                top: -10%;
                right: -10%;
                width: 60px;
                height: 60px;
				border-radius: 50%;
				background: rgba(237,29,36,.6);
				animation-duration: 1s;
				animation-name: zoomout;
				animation-iteration-count: infinite;
				animation-direction: alternate;
				z-index: -1;
			}
			@keyframes phonecall {
				0% {
					transform: rotate(0);
				}
				10% {
					transform: rotate(-25deg);
				}
				20% {
					transform: rotate(25deg);
				}
				30% {
					transform: rotate(-25deg);
				}
				40% {
					transform: rotate(25deg);
				}
				50% {
					transform: rotate(0);
				}
				100% {
					transform: rotate(0);
				}
			}
			@keyframes zoomout{
				0% {
					transform:scale(.8);
					opacity:1;
				};
				100% {
					transform:scale(1.4);
					opacity:.3;
				};
			}
                    .ins-zalo-chat-widget-c2 {
                        width: 60px;
                        height: 60px;
                    }

                    .zalo-chat-widget {
                        position: fixed;
                        bottom: 180px !important;
                        right: 24px !important;
                        z-index: 999 !important;
                    }
                    .ins-message-section-wrapper-c2 {
                    display: none;
                    align-items: center;
                    width: 300px;
                    margin: 0 auto;
                    gap: 10px;
                    border-radius: 24px;
                    border: 1px solid #2A2A86;
                    padding: 10px;
                    position: fixed;
                    bottom: 180px;
                    right: 85px !important;
                    z-index: 9999;
                    background-color: #ffffff;
                }
                .callMeToggleZalo{
                    display: flex;
                }
                .ins-discount-image-c2 {
                    margin: 0 8px;
                    width: 25px;
                    height: 25px;
                }
                .ins-message-section-text-c2 {
                    font-size: 18px;
                    font-style: normal;
                    font-weight: 700;
                    color: #000000;
                }
</style>
        <div class=" phone_mobile" onclick="callMe()">
            <img class="close-popup-upsell" style="cursor: pointer;" src="../icons/phone2-01.webp">
        </div>
        <div  id="callMe" style="padding: 0;"  class="popup_call_in">
            <button onclick="removecallMe()" class="close_call_in">
                <img class="close-popup-upsell" style="cursor: pointer;" src="../icons/close2.svg">
            </button>
            <?php include '../chatbot/bot.php' ?>
        </div>
        <div onclick="callMeZalo()" class="zalo-chat-widget ins-zalo-chat-widget-c2">
            <a class="zalo-chat-widget-link">
                <img class="close-popup-upsell" style="cursor: pointer;" src="../icons/6472018.png">
            </a>
        </div>
        <div id="callMeZalo" class="ins-message-section-wrapper-c2">
            <a class="ins-message-section-link-c2 sp-custom-c2-1" href="https://hungpage.vercel.app/" target="_blank">
                <img class="ins-discount-image-c2" style="cursor: pointer;" src="../icons/discount-image-1697453760.webp">
                <span class="ins-message-section-text-c2">Liên hệ với tôi qua Website</span>
            </a>
        </div>
        



               <script>
                    function callMe() {
                            document.getElementById("callMe").classList.toggle("callMeToggle");
                        }
                        function removecallMe() {
                            document.getElementById("callMe").classList.remove("callMeToggle");
                        }
                        function callMeZalo() {
                            document.getElementById("callMeZalo").classList.add("callMeToggleZalo");
                        }
                        function removecallMeZalo() {
                            document.getElementById("callMeZalo").classList.remove("callMeToggleZalo");
                        }
                        setInterval(removecallMeZalo,4000)
                </script>