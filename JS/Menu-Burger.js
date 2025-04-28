"use strict";

const logomenuburger = document.querySelector(".logomenuburger")
 console.log(".logomenuburger span")




    logomenuburger.addEventListener("click", clickmenu)
    function clickmenu()
    {
        const span1 = document.querySelector(".span1")
        const span2 = document.querySelector(".span2")
        const span3 = document.querySelector(".span3")
        const menu = document.querySelector(".Menu-Titre ul")

        if(span1 && span2 && span3)

            // Je vérifie si j'ai mes span
        {
            if(span2.style.opacity != "0" ){ // Si le span2 n'est pas transparent
                span1.style.transform = "translateY(7px) rotate(45deg)";   // Je fais une rotation de 45° sur le span1 et -45° sur le span3
                span3.style.transform = "translateY(-7px) rotate(-45deg)" // Je fais une rotation de 45° sur le span1 et -45° sur le span3
                span2.style.opacity = "0" // Je le rend transparent
                menu.style.transform = "scale(1)" // Je fais apparaitre le menu

            }else{
                span1.style.transform = "none"; 
            span2.style.opacity = "1";
            span3.style.transform = "none"; 
             menu.style.transform = "scale(1, 0)"

            }
          


        }
    }
