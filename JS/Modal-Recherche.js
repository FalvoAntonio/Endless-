"use strict";

// ! J'ai utilisé la méthode fetch pour récupérer le contenu de la modale Recherche dans le fichier Modal-recherche.html
// ! Je récupère donc le contenu HTML pour éviter de le copier coller sur chaque page HTML que ja vais créer
// ! Donc juste avec le fichier script.js je vais pouvoir afficher la modale Recherche sur chaque page HTML

// Chargement du contenu de la modale de recherche depuis le fichier HTML

// ! ICI : Il faut que le fichier HTML soit dans le même dossier que le fichier JS
// ! Grossomodo nous allons utiliser le fetch pour récupérer le contenu de "modal-recherche.html" donc le fichier HTML, ce qui m'évitera de toujours copier/coller mon élément HTML
// ! Sur toutes mes pages HTML
// ! Ensuite nous allons créer un élément div et y insérer le contenu du fichier HTML
// ! Enfin nous allons ajouter cet élément div au body du document.
// ! Ensuite nous allons appeler la fonction startModalRecherche() pour initialiser la modale de recherche.
export function fetchModalRecherche() {
    // const prefix = window.location.href.includes("HTML")? "./" : "./HTML/";
    fetch("./HTML/module/Modal-Recherche.html")
    .then((response) => response.text())
    .then((data) => {
        const modalContainer = document.createElement("div");
        modalContainer.innerHTML = data;
        document.body.append(modalContainer.firstChild);
        startModalRecherche();
    })
    
}

// Fonction pour afficher la modale de recherche

export function startModalRecherche() 
{
    const modalrecherche = document.querySelector(".Modal-Recherche");
    const recherche = document.querySelector(".icon-recherche");
    const visibilite = document.querySelector(".overlay-recherche")
    recherche.addEventListener("click",clickRecherche)  

    const FermerButton = document.querySelector(".Modal-Recherche .button-close");
    // const FermerButton = modalrecherche.querySelector(".button-close");
    FermerButton.addEventListener("click", closeModalRecherche);
    function clickRecherche(){
        visibilite.style.visibility = "visible"
        modalrecherche.style.transform = "translate(0)";
    
    }
    
    
     function closeModalRecherche(){
        visibilite.style.visibility = "hidden"
        modalrecherche.style.transform = "translate(100%)";
    
    }
    
}

