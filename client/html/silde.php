<?php
$banner = true ;
?>


<div class="section_slider section-home-desktop">
                    <div class="swiper_container">
                        <div class="swiper-wrapper">
                            <section id="Slider">
                                <div class="aspect-ratio-169">
                                <?php
                                    if($show_slide__client){$i=0;
                                        while($result = $show_slide__client->fetch_assoc()){$i++;
                                    ?>
                                    <img  src="../../sever/uploading/<?php  echo $result['slide_img']; ?>" alt="">
                                    <?php }} ?>
                                </div>
                                <div class="dot-container">
                                    <div class="dot active"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                </div>
                                <!-- <div class="slider-1"></div> -->
                            </section>
                        </div>
                    </div>
                </div>
            <script>
                    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector(".aspect-ratio-169")
    const dotItem = document.querySelectorAll(".dot")


    let index = 0
    let imgNumber = imgPosition.length
    // console.log(imgPosition)


    // 
    imgPosition.forEach(function(image,index){
        image.style.left = index*100 + "%"
        dotItem[index].addEventListener("click",function(){
            slider(index)
        })
    })
    function imgSlider(){
        index++;
        if(index >= imgNumber){
            index = 0
        }
        slider(index)
        // function slider(index){
        // }

    }
    function slider(index){
        imgContainer.style.left = "-" +index*100+ "%"
        const dotActive = document.querySelector(".active")
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")
    }
    setInterval(imgSlider,2500)



            </script>