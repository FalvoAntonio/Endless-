"use strict";

const modal = document.querySelector(".Modal-container");
const panier = document.querySelector(".icon-panier");
const visibility = document.querySelector(".overlay-modal")
panier.addEventListener("click",clickPanier)

function clickPanier(){
    visibility.style.visibility = "visible"
    modal.style.transform = "translate(0)";

}