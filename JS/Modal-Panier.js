"use strict";

export function fetchPanier() {

    fetch("/HTML/module/Modal-Panier.html")
    .then((response) => response.text())
    .then((data) => {
        const modalContainer = document.createElement("div");
        modalContainer.innerHTML = data;
        document.body.appendChild(modalContainer.firstChild);
        // La création de div pose problème, du coup on recupère juste l'overlay pour l'insérer dans le body avec "firstChild"
        // ! On va donc chercher le premier enfant de modalContainer et on va l'ajouter au body
        // Pour résumé mon footer ne se place pas en bas de page, il est collé au div de la modale.
        startModalPanier();
    })
}
export function startModalPanier(){

    const modal = document.querySelector(".overlay-panier .Modal-container");
    const panier = document.querySelector(".icon-panier");
    const visibility = document.querySelector(".overlay-panier")
    panier.addEventListener("click",clickPanier)
    
    function clickPanier(){
        console.log(modal);
        
        visibility.style.visibility = "visible"
        modal.style.transform = "translate(0)";
    
    }
      
    const closeButton = document.querySelector(".overlay-panier .button-close");
    closeButton.addEventListener("click", closeModal);
    
    function closeModal(){
        visibility.style.visibility = "hidden"
        modal.style.transform = "translate(100%)";
    
    }
}
