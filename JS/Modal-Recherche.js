"use strict";

const modalrecherche = document.querySelector(".Modal-Recherche");
const recherche = document.querySelector(".icon-recherche");
const visibilite = document.querySelector(".overlay-recherche")
recherche.addEventListener("click",clickRecherche)

function clickRecherche(){
    visibilite.style.visibility = "visible"
    modalrecherche.style.transform = "translate(0)";

}
  
const FermerButton = document.querySelector(".Modal-Recherche .button-close");
// const FermerButton = modalrecherche.querySelector(".button-close");
FermerButton.addEventListener("click", closeModalRecherche);

function closeModalRecherche(){
    visibilite.style.visibility = "hidden"
    modalrecherche.style.transform = "translate(100%)";

}
