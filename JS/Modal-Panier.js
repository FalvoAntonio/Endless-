"use strict";
// ! J'ai utilisé la méthode fetch pour récupérer le contenu de la modale panier dans le fichier Modal-Panier.html
// ! Je récupère donc le contenu HTML pour éviter de le copier coller sur chaque page HTML que ja vais créer
// ! Donc juste avec le fichier script.js je vais pouvoir afficher la modale panier sur chaque page HTML
export function fetchPanier() {
    // const prefix = window.location.href.includes("HTML")?"./" : "./HTML/";
    
    fetch("./HTML/module/modal-panier.html")
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
