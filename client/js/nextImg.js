    //   next spbanchay
    window.addEventListener("load" , function(){
        const nextBTn = document.querySelector("#next-slide");
        const slideMain = document.querySelector(".slide-main");
        const slideItem = document.querySelectorAll(".slide-item");
        
        const imgItemWidth = slideItem[0].offsetWidth;
        const imgLength = slideItem.length;
        let postionX = 0;
        let index = 0;
        nextBTn.addEventListener("click" , function(){
            handleChange(1)
            
        })
        prevBtn.addEventListener("click" , function(){
            handleChange(-1)
        })
        function handleChange(direction){
            if(direction === 1){
                if(index > imgLength - 1){
                    index =imgLength ;
                    return ;
                }
                postionX = postionX - imgItemWidth;
                slideMain.style= ` transform:translateX(${postionX}px)`;
                index++;

            }
            else if(direction === -1){
                if(index <= 0) 
                {
                    index = 0;
                    return ;
                    
                };
                postionX = postionX + imgItemWidth;
                slideMain.style= ` transform:translateX(${postionX}px)`;
                index--;
            
            }
            }
        }
    )