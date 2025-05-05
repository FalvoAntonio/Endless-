"use strict";

// ! Je vais chercher le menu burger dans le fichier header.html
// ! Ici c'est différent vu que le header est déjà dans le body je n'ai pas besoin de le rechercher commme avec les autres :(document.body.appendChild(modalContainer);)
// ! Je n'ai donc pas besoin de créer un div pour le header
// ! Je vais juste le chercher dans le body et je vais le remplacer par le contenu de header.html
// ! Je vais donc chercher le header dans le body et je vais le remplacer par le contenu de header.html
fetch("/HTML/module/header.html")
.then((response) => response.text())
.then((data) => {
    const menuContainer = document.querySelector("header");
    menuContainer.innerHTML = data;
    startMenuBurger();
})


function startMenuBurger(){const logomenuburger = document.querySelector(".logomenuburger")
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
    }}

