<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:100");
    .loader,
    span,
    .spinner{
        top: 25%;
    position: absolute;
    width: 200px;
    height: 200px;
    align-items: center;
    left: 41%;
    }
    span{
        line-height: 200px;
        padding-left: 40px;
        font-size: 20px;
        font-family: "Roboto", sans-serif;
        letter-spacing: 1px;
        color: #ffffff00;
        text-shadow: 
            0 0 0 #ffffffbf,
            0 0 2px #fcaf17,
            0 0 4px #fcaf17,
            0 0 8px #fcaf17,
            0 0 10px #fcaf17
            ;
    }
    .spinner{
        border-radius: 50%;
        box-shadow: 
            3px 0 1px -1px #fff,
            5px 0 5px #fcaf17,
            inset -10px 0 10px -5px #fcaf17;
        animation: loading 1s linear infinite;
        }

    .spinner::before{
        position: absolute;
        width: 160px;
        height: 160px;
        border-radius: 50%;
        content: "";
        box-shadow: 
            2px 0 1px -1px #fff,
            10px 0 5px -5px #fcaf17,
            inset -3px 0 3px #fcaf17
        ;

    }
    @keyframes loading{
        from{
            transform: rotate(0deg);
        }
        to{
            transform: rotate(360deg);
        }
    }
      @media (max-width: 480px) {
          .loader, span, .spinner {
            left: 17%;
        }
      }
</style>
<body>
    <div class="loader">
        <span id="counter">
            Loading
            <i>50%</i>
        </span>
        <div class="spinner"></div>
    </div>
    <script>
        const $i = document.querySelector('i');
        let prog = 0;

        setInterval(
            ()=>{
                prog++;
                $i.innerText = `${prog}%`;
                if(prog === 100){
                    prog = 0;
                }
            },30
            )
    </script>
</body>
</html>