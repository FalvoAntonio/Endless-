<?php
// ? On va démarrer la session pour vérifier si l'utilisateur est connecté
// * Le session_start permet de démarrer une session ou de reprendre une session existante.
// * Il est important de le faire avant tout envoi de contenu HTML, sinon cela peut
// * provoquer une erreur de type "headers already sent".
session_start();

// 1. Définir le fuseau horaire PHP
date_default_timezone_set('Europe/Paris');

// ? On va vérifier si l'utilisateur est connecté
// * Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
if(!isset($_SESSION["logged"])) {
    // * Si l'utilisateur n'est pas connecté , on le redirige vers la page de connexion
    header("Location: ../Compte/Login.php");
    exit;
}
// ? Afficher une prestation spécifique pour la réservation
// *["prestation" fait référence à l'ID du service dans l'URL (service_id)]
if(!isset($_GET["prestation"])) {
    // *Si l'ID du service n'est pas défini, rediriger vers la page des prestations
    header("Location: ./Prendre-rdv.php");
    exit;
}
// ? Liste des prothésistes disponibles
$liste_prothesistes = ["Laura", "Cassandra", "Aléatoire"];

// ? Récupérer les détails de la prestation à partir de l'ID
$prestation_id = $_GET["prestation"];
require __DIR__ . "/../../PHP/service/PDO-Connexion-BDD.php";

// ? Je vais chercher la prestation dans la base de données
$sql = $pdo->prepare("SELECT * FROM services WHERE id = ?");
//* Le FROM services fait référence à la table intitulée "services" dans la base de données

$sql->execute([$prestation_id]);
$prestation = $sql->fetch();

if(!$prestation) {
    // Si la prestation n'existe pas, rediriger vers la page des prestations
    header("Location: ./Pendre-rdv.php");
    exit;
}

// ? Désormais il faut récupérer les informations de l'utilisateur connecté, C'est-à-dire ses informations
// ? provenant de son formulaire d'inscription.
// * On va récupérer les informations de l'utilisateur connecté à partir de la session
$sql_user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
// * Le FROM users fait référence à la table intitulée "users" dans la base de données
// * "WHERE id = ?" : Filtre pour récupérer seulement l'utilisateur avec l'ID spécifique
// * Le "?" est un placeholder (paramètre) qui sera remplacé de manière sécurisée
// * On va utiliser l'ID de l'utilisateur stocké dans la session ($_SESSION["user_id"])
// * pour récupérer ses informations.

// * On va exécuter la requête en passant l'ID de l'utilisateur connecté
$sql_user->execute([$_SESSION["user_id"]]);
// Quand l'utilisateur se connecte (dans Login.php), on fait ceci :
// $_SESSION["user_id"] = 5; (par exemple)
// $_SESSION["logged"] = true;
// Cette information reste disponible sur toutes les pages jusqu'à la déconnexion
$user = $sql_user->fetch();
// * $user devient un tableau associatif contenant les informations de l'utilisateur
// * Par exemple, $user["firstname"] contient le prénom de l'utilisateur

$nom_complet = $user["firstname"] . " " . $user["lastname"];
$email_user = $user["email"];
$telephone_user = $user["phone_prefix"] . $user["phone"];

// ! JE VEUX DESORMAIS GERER LA SOUMISSION DU FORMULAIRE DE RÉSERVATION
// * C'est-à-dire que lorsque l'utilisateur soumet le formulaire de réservation,
// * je vais enregistrer la réservation dans la base de données.
// * Mais aussi vérfier si le créneau est disponible ou non.

// * La méthode de la requête est POST, cela signifie que le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] === "POST") {
    // * On va vérifier si les champs requis sont remplis
    // * Cela permet de vérifié si le formulaire à été envoyé.
    // * Lorsque qu'un utilisateur clique "resever ce rendez-vous", le navigateur envoie les données avec la méthode POST.

    // ? Variable pour stocker les messages d'erreur et de succès
    $error_message = "";
    $success_message = "";

    // ? Ici on va déclarer les variables pour stocker les données du formulaire
    // * Bien entendu on se fie à la table des "rendez-vous" de notre base de données (fichier "endless.sql")
    // * N'oublions pas que la notation $_POST en PHP est utilisée pour récupérer les données envoyées via la méthode POST.
    $service_id = $_POST["service_id"]; //  "service_id" est l'ID de la prestation sélectionnée
    $date_rdv = $_POST["date_rdv"]; //Date choisie pour le rendez-vous
    $heure_rdv = $_POST["heure_rdv"]; // Heure choisie pour le rendez-vous
    $notes = $_POST["notes"]; // Notes supplémentaires que l'utilisateur peut ajouter
    $prothesiste = $_POST["prothesiste"]; // Prothésiste sélectionné par l'utilisateur

    // * On vérifie que les données du formulaire sont présentes et valides
    if(empty($service_id) || empty($date_rdv) || empty($heure_rdv) || empty($prothesiste)) {
        // * Si l'un des champs requis est vide, on affiche un message d'erreur
        $error_message = "❌ Veuillez remplir tous les champs requis.";
    }
    elseif (DateTime::createFromFormat('Y-m-d', $date_rdv) === false) {
        $error_message = "❌ La date choisi n'est pas valide.";
    }
    elseif ($date_rdv < date('Y-m-d')) {
        $error_message = "❌ Vous ne pouvez pas réserver dans le passé.";
    }
     // Vérifier que ce n'est pas un dimanche
    elseif (date('w', strtotime($date_rdv)) == 0) {
        $error_message = "❌ Le salon est fermé le dimanche.";
    }
    elseif (!in_array($prothesiste, $liste_prothesistes)) {
        // * Si le prothésiste sélectionné n'est pas dans la liste, on affiche un message d'erreur
        $error_message = "❌ Prothésiste non valide.";
    }
    elseif (!preg_match('/^(09)|(1\d):(00)|(30)$/', $heure_rdv)) {
        // * Vérifier que l'heure est au format HH:MM
        $error_message = "❌ L'heure doit être au format HH:MM.";
    }



    if(empty($error_message))
    {
        $sql_service = $pdo->prepare("SELECT * FROM services WHERE id = ?");
        $sql_service->execute([$service_id]);
        $service = $sql_service->fetch();
        if(!$service) {
            exit("Service non trouvé.");
        }
    
    
        // * On va insérer la réservation dans la base de données
        $sql_reservation = $pdo->prepare("INSERT INTO rendez_vous (user_client, service_id, date_rdv, heure_rdv, notes, prothesiste, service_nom, service_prix, service_duree) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // * Ici, on insère les données de la réservation dans la table "rendez_vous"
        $sql_reservation->execute([$_SESSION["user_id"], $service_id, $date_rdv, $heure_rdv, $notes, $prothesiste,
            $service["nom"], $service["prix"], $service["duree"]]);
        // On récupère l'ID de la table "services" pour l'associer à la réservation
        // * On utilise $_SESSION["user_id"] pour récupérer l'ID de l'utilisateur
        // Rappel: le $_SESSION est un mécanisme de PHP pour conserver les données d'un utilisateur entre différentes pages de mon site.
    
        // * On va rediriger l'utilisateur vers la page de confirmation de réservation
        header("Location: ./Confirmation-RDV.php");
        exit;

    }
}

require_once __DIR__ . "/../../PHP/Prise-de-rdv/gestion-des-creneaux.php";
?>