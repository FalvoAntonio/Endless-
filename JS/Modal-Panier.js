"use strict";

const modal = document.querySelector(".Modal-container");
const panier = document.querySelector(".icon-panier");
const visibility = document.querySelector(".overlay-modal")
panier.addEventListener("click",clickPanier)

function clickPanier(){
    visibility.style.visibility = "visible"
    modal.style.transform = "translate(0)";

}
  
const closeButton = document.querySelector(".button-close");
closeButton.addEventListener("click", closeModal);

function closeModal(){
    visibility.style.visibility = "hidden"
    modal.style.transform = "translate(100%)";

}
