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
        const dotActive = document.querySelector(".nextimg")
        dotActive.classList.remove("nextimg")
        dotItem[index].classList.add("nextimg")
    }
    setInterval(imgSlider,5000)


