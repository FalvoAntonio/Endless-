"use strict";

const MessageErrorMail = document.querySelector(".Mail .error-message")
const MessageErrorMDP = document.querySelector(".MDP .error-message")

 document.getElementById("loginForm")?.addEventListener('submit',ValidationDesChamps)

export function ValidationDesChamps(event)
{
const email = document.getElementById("email").value
const mdp = document.getElementById("mdp").value
    event.preventDefault()
   console.log(email, mdp);
   
    if(email === "" || mdp === ""){
        MessageErrorMail.textContent = "Veuillez entrer votre adresse e-mail."
        MessageErrorMDP.textContent = "Veuillez entrer un mot de passe."
    }else
    {
        this.submit()
        //document.getElementById("loginForm").submit()
    }

}

const passwordInput = document.getElementById('mdp'); // ? Récupère le champ de mot de passe
const eyeOpen = document.querySelector('.LogoEyes1'); // ? Récupère l'icone d'oeil ouvert
const eyeClosed = document.querySelector('.LogoEyes2'); // ? Récupère l'icone d'oeil fermé

// TODO Ajout d'écouteurs d'évenements sur les deux icônes
// TODO Les deux déclenchent la même fonction quand on clique dessus 
eyeOpen?.addEventListener("click",MDPvisible)
eyeClosed?.addEventListener("click",MDPvisible)
// ? Si tu trouves "eyeClosed" alors tu lances la fonction "MDPvisible" sinon t'arrêtes la (L'utilité de "?" est de ne pas faire planter le code si l'élément n'existe pas dans le DOM)
/* * Fonction qui bascule la visibilité du mot de passe
 * Elle change le type du champ (password/text) et alterne les icônes */

export function MDPvisible(){
    console.log("test");
     // ! Si le champ est vide, on sort de la fonction et on ne fait rien
    if(passwordInput.value === "")return;
     // ! Si le mot de passe est actuellement visible (type="text")
    if(passwordInput.type == "text"){
    // On rend le mot de passe invisible
        eyeClosed.style.display = "" // Affiche l'icone d'oeil fermé
        eyeOpen.style.display = "none"; // Cache l'icone d'oeil ouvert
        passwordInput.type = "password"; // Change le type pour masque les caractères
    // ! Si le mot de passe est actuellement masqué (type="password")
    }else
    // On rend le mot de passe invisible
    {
        eyeOpen.style.display = "inline-block"; // Affiche l'icone d'oeil ouvert
        eyeClosed.style.display = "none"; // Cache l'icone d'oeil fermé
        passwordInput.type = "text"; // Change le type pour afficher le texte en clair

    }
}

