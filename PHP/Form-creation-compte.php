<?php

require "Forme.php";
require "./PHP_Mailer.php";
// On inclut le fichier Forme.php qui contient la fonction cleanData

$formulaire = $mail = $motdepasse = $prenom = $nom = $numerotel = "";

// Tableau d'erreurs:
$error = [];
// Cette variable "$error" est un tableau qui va contenir les messages d'erreur.


// Vérification si le formulaire a été soumis:
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup-form"])) // Le "isset" est optionnel mais recommandé
// pour vérifier si le formulaire a été soumis.
// $_SERVER["REQUEST_METHOD"] est une variable superglobale qui contient la méthode de la requête HTTP.
// Elle retourne "POST" si la requête est de type POST.
// le nom dans la super global $_POST correspond à l'attribut "name" des champs du formulaire.
// La condition vérifie si la méthode de la requête est POST et si le formulaire a été soumis.
// isset($_POST[""]) vérifie si le formulaire a été soumis.

    if(empty($_POST["email"]))
    // Si le champ mail est vide
    {
        $error["mail"] = "Veuillez entrer une adresse e-mail";
        // On ajoute un message d'erreur dans le tableau $error
    }
    else
    {
        $mail = trim($_POST["email"]);
        // retire les espaces au début et à la fin du string
        $mail = stripslashes($mail);
        // retire les \ présent dans le string.
        $mail = htmlspecialchars($mail);
        // Remplace tous les caractères spéciaux de html (<,>...) par leurs code HTML (&gt;...) afin d'empêcher toute injection de code.
        // Vérification de la validité de l'adresse e-mail
        if(strlen($mail) < 5 || strlen($mail) > 50)
        // Si la taille de l'adresse e-mail est inférieure à 5 ou supérieure à 50
        {
            $error["mail"] = "Votre adresse e-mail n'a pas une taille adaptée";
            // On ajoute un message d'erreur dans le tableau $error
        }
        elseif
        (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        // On verifie si le string $mail est une adresse e-mail valide, si ça ressemble à une adresse e-mail
        // Cela nous renvoie false si l'adresse e-mail n'est pas valide
        // filter_var est une fonction PHP qui permet de filtrer une variable.
        // FILTER_VALIDATE_EMAIL est un filtre qui permet de valider une adresse e-mail.
    {
        $error["mail"] = "Votre adresse e-mail n'est pas valide";
        // On ajoute un message d'erreur dans le tableau $error

    } // ? fin vérification mail

    if(empty($_POST["password"]))
    {
        $error["motdepasse"] = "Veuillez entrer un mot de passe";
        // On ajoute un message d'erreur dans le tableau $error
    }

    else
    {
        $motdepasse = trim($_POST["password"]);
        // retire les espaces au début et à la fin du string
        // $motdepasse = stripslashes($motdepasse);
        // retire les \ présent dans le string.
        // $motdepasse = htmlspecialchars($motdepasse);
        // Remplace tous les caractères spéciaux de html (<,>...) par leurs code HTML (&gt;...) afin d'empêcher toute injection de code.
        if(strlen($motdepasse) < 8 || strlen($motdepasse) > 40)
        // Si la taille du mot de passe est inférieure à 8 ou supérieure à 40
        {
            $error["motdepasse"] = "Votre mot de passe n'a pas une taille adaptée";
            // On ajoute un message d'erreur dans le tableau $error
        }
        elseif(!preg_match('/[A-Z]/', $motdepasse) || !preg_match('/[a-z]/', $motdepasse) || !preg_match('/[0-9]/', $motdepasse) || !preg_match('/[!@#$%^&*(),.?":{}|<>+]/', $motdepasse))
        // On vérifie si le mot de passe contient au moins une majuscule, une minuscule et un chiffre et un caractère spécial.
    {
            $error["motdepasse"] = "Votre mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial";
            // On ajoute un message d'erreur dans le tableau $error
        }

    } // ? fin vérification mot de passe

    if(empty($_POST["firstname"]))
    // Si le champ prenom est vide
    {
        $error["prenom"] = "Veuillez entrer un prénom";
        // On ajoute un message d'erreur dans le tableau $error
    }
    else
    // Si le champ prenom n'est pas vide
    // On récupère la valeur du champ prenom, c'est-à-dire le prénom saisi par l'utilisateur.
    // empty retourne true si le paramètre est vide.
    {
        $prenom = trim($_POST["firstname"]);
        // retire les espaces au début et à la fin du string
        $prenom = stripslashes($prenom);
        // retire les \ présent dans le string.
        $prenom = htmlspecialchars($prenom);
        // Remplace tous les caractères spéciaux de html (<,>...) par leurs code HTML (&gt;...) afin d'empêcher toute injection de code.
        if(strlen($prenom) < 2 || strlen($prenom) > 30)
        // Si la taille du prénom est inférieure à 2 ou supérieure à 30
        {
            $error["prenom"] = "Votre prénom n'a pas une taille adaptée";
            // On ajoute un message d'erreur dans le tableau $error
        }
        elseif(!preg_match('/^[a-zA-ZÀ-ÿ\s-]+$/', $prenom))
        // On vérifie si le prénom ne contient que des lettres, des espaces et des tirets.
        // "^" signifie le début de la chaîne, "$" signifie la fin de la chaîne.
        // Donc, ensemble ^...$ veut dire : la chaîne entière doit respecter cette règle.
        // "[a-zA-ZÀ-ÿ\s-]+" signifie que la chaîne peut contenir des lettres (minuscules et majuscules), des caractères accentués, des espaces et des tirets.
    {
        $erro["prenom"] = "Votre prénom ne doit contenir que des lettres, des espaces et des tirets";
        // On ajoute un message d'erreur dans le tableau $error]
    }
    } // ? fin vérification prenom

    if(empty($_POST["lastname"]))
    // Si le champ nom est vide
    // empty est une fonction PHP qui retourne true si le paramètre est vide.
    // On vérifie si le champ nom est vide, c'est-à-dire si l'utilisateur n'a pas saisi de nom.
    {
        $error["nom"]= "Veuillez entrer un nom";
        // On ajoute un message d'erreur dans le tableau $error
    } 
    else
    // Si le champ nom n'est pas vide
    {
        // TODO $nom = trim($_POST["nom"]);
        //  On récupère la valeur du champ nom, c'est-à-dire le nom saisi par l'utilisateur.
        // TODO $nom = stripcslashes($nom);
        // retire les \ présent dans le string.
        // TODO $nom = htmlspecialchars($nom);
        // Remplace tous les caractères spéciaux de html (<,>...) par leurs code HTML (&gt;...) afin d'empêcher toute injection de code.

        // ! ICI J'UTILISE LA FONCTION cleanData QUI SE TROUVE DANS LE FICHIER Forme.php
        // ! C'est un raccourci pour ajouter les trois lignes de code ci-dessus, pour gagner du temps si je dois l'écrire plusieurs fois.
        $nom = cleanData($_POST["lastname"]);
        // On nettoie les données saisies par l'utilisateur en appelant la fonction cleanData.
        if (strlen($nom) < 2 || strlen($nom) > 30)
        // On vérifie si la taille du nom est inférieure à 2 ou supérieure à 30
        {
            $error["nom"] = "Votre nom n'a pas une taille adaptée";
            // On ajoute un message d'erreur dans le tableau $error 
        }
        elseif
            (!preg_match('/^[a-zA-ZÀ-ÿ\s-]+$/', $nom))
        // On vérifie si le nom ne contient que des lettres, des espaces et des tirets.
        {
            $erro["nom"] = "Votre nom ne doit contenir que des lettres, des espaces et des tirets";
        }
        
    } // ? fin vérification nom

    if(empty($_POST["phone"]))
    // Si le champ numerotel est vide
    {
        $error["numerotel"] = "Veuillez entrer un numéro de téléphone";
        // On ajoute un message d'erreur dans le tableau $error
    }
    else
    {
        $numerotel = trim($_POST["phone"]);
        // retire les espaces au début et à la fin du string
        $numerotel = stripslashes($numerotel);
        // retire les \ présent dans le string.
        $numerotel = htmlspecialchars($numerotel);
        // Remplace tous les caractères spéciaux de html (<,>...) par leurs code HTML (&gt;...) afin d'empêcher toute injection de code.
        if(!preg_match('/^\+?[0-9\s-]+$/', $numerotel))
        // ! Décoding de la regex:
        // ? ^ signifie le début de la chaîne, $ signifie la fin de la chaîne.
        // ? Donc, ensemble ^...$ veut dire : la chaîne entière doit respecter cette règle.
        // ? \+? signifie que la chaîne peut commencer par un signe plus (+) ou ne pas en avoir.
        // ? [0-9\s-]+ signifie que la chaîne peut contenir des chiffres (0-9), des espaces (\s) et des tirets (-).
        // ? On vérifie si le numéro de téléphone ne contient que des chiffres, des espaces, des tirets et éventuellement un signe plus au début.
        {
            $error["numerotel"] = "Votre numéro de téléphone n'est pas valide";
            // On ajoute un message d'erreur dans le tableau $error
        }
    } // ? fin vérification numerotel


    // ! A NE PAS OUBLIER DE FAIRE
    if(empty($error))
    {
        $miseEnFormMail = file_get_contents("../HTML/module/test_mail.html");
        EnvoyerMail($mail, "Inscription", $miseEnFormMail);
    }
}// fin du bloc principal

var_dump($error);
var_dump($_POST);