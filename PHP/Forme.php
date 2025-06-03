<?php

function cleanData(string $data): string
{
    // Cette fonction permet de nettoyer les données saisies par l'utilisateur
    // en retirant les espaces, les antislashs et en convertissant les caractères spéciaux.
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} // fin de la fonction cleanData
