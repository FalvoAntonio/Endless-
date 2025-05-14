"use strict";

let index = 0;


// ? On Utilise cette fonction pour créer la partie HTML du container d'images, et lui permettre
// ? d'ajouter chaque photo que je vais ajouter dedans.
/**
 * Création de mes éléments HTML de mon slider
 * @param {Array} images // Le tableau comportant les images
 * @param {string} cheminDossierImage // Fait référence au prefix devant chaque image
 * @returns {HTMLElement} // Il renvoie le slider ainsi que son contenu
 */
export function SliderImage(images, cheminDossierImage){
    // ? C'est une fonction exportée, qui prend en paramètre "images"  qui est un tableau
    // ? contenant les images à afficher dans le slider.

    const sliderContainer = document.createElement("div"); 
    // Crée un conteneur pour le diaporama
    sliderContainer.classList.add("slider-container");
    // Ajoute une classe CSS pour le style

    images.forEach((ChaqueImage,indextableau) => {
        // ? La méthode forEach permet de boucler sur chaque image du tableau "images"
        // Pour chaque image dans le tableau d'images
        // Crée un nouvel élément image
        const img = document.createElement("img"); // ? Crée un élément <img> pour chaque image.
        img.src = cheminDossierImage + ChaqueImage;  // ? Définit sa source (src) avec l’URL, et un texte alternatif (alt) pour l’accessibilité.
        img.alt = "Image de diaporama";
        img.classList.add("slide");  // ? Ajoute une classe CSS "slide" à l’image, pour la styliser ou l’animer.
        if (indextableau !== index) { // ? Si l'image n'est pas la première (index=0), alors elle est cachée (display:none)
            img.style.display = "none";
        }
        sliderContainer.appendChild(img);  // Ajoute l'image au conteneur du diaporama
    });
    return sliderContainer; // Si il n'y a pas de return c'est indefined, donc on retourne le sliderContainer.
}

// ! Pour la création de boutons correspondant à chaque images :

function CreateButtons(NombreImage)
{   
    let ButtonsContainer = document.createElement("div");
    ButtonsContainer.classList.add("buttons-container");

    for (let i = 0; i < NombreImage; i++){
   
    let button = document.createElement("button")
    button.classList.add("button-selection-image")
    button.addEventListener("click")

 }

}