"use strict";

// ! En faisant la méthode modules je vais devoir importer mes fichiers JS dans le fichier script.js
// ! Ce qui me permettra de ne pas avoir de code dupliqué sur mes pages HTML, ça me simplifie les choses car je n'ai plus qu'un seul fichier JS à gérer 
// ! Sur chaque page HTML je vais juste devoir importer le fichier script.js et il va tout gérer

import {createlist} from "./prefix.js";
import {startMenuBurger} from "./Menu-Burger.js";  // Le menu burger se trouve dans le fichier header.html avec le fetch et les modales
// Donc avec Menu-Burger On va pouvoir retrouver le header,les modales et le menu burger
import { ValidationDesChamps,MDPvisible } from "./login.js";
import { SliderImage } from "./Slider.js";


const images = ["OPX05236.jpg","OPX05238.jpg","OPX05253.jpg","OPX05257.jpg","OPX05267.jpg","OPX05269.jpg","IMG_3863.jpeg","IMG_3865.jpeg"]
/* J'insère directement mon tableau d'images, pour faciliter mon code, car si je veux
enlever une photo ou ajouer le code s'applique automatiquement */

const aboutMain = document.querySelector(".bodyabout main"); // C'est pour éviter d'avoir le slider sur tous les body de mes autres pages HTML
if(aboutMain) // S'il trouve le main dans la page QuiSommesNous. Alors tu peux lancer :
{
    const AppelDuSlider = SliderImage(images, "./Images/Photos QuiSommesNous/") // On appel la fonction de 
    // création de slider
    // ! Le premier paramètre pour le premier et le deuxièmee parametre pour le deuxième !
    // ! le deuxième paramètre "./Images/Photos QuiSommesNous/" nous permet d'avoir le chemin devant chaque images
    // ! Pour éviter de l'ecrire devant chaque image du tableau

    aboutMain.append(AppelDuSlider) // J'appel donc ma fonction pour faire apparaitre mon slider dans ma page
    // HTML QuiSommesNous
}

