        const random_menu = document.querySelector("#random_menu");
        const bg = document.querySelector("#bg");
        const popup = document.querySelector("#popup");
        const exit = document.querySelector("#exit");

        random_menu.addEventListener("click",function(){
            bg.classList.remove("hidden");
            popup.classList.remove("hidden");
        });

        exit.addEventListener("click",function(){
            bg.classList.add("hidden");
            popup.classList.add("hidden");
        });

