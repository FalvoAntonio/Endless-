<?php

// J'ouvre ma session pour récupérer les informations de connexion de mon autre page.
// Ici je vérifie si la session n'est pas connecté.
// Si elle ne l'est pas alors que je suis redirigé vers ma page d'accueil.
  session_start();

  if(!isset($_SESSION["logged"]))
  {
    header("Location: /");
    exit;
  }  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="/">
    <!-- <base href="/Endless-/"> -->
    <!--  ! On utilisera la balise <base> pour contrer le problème du local/en ligne qui modifie les chemins à cause de gitHub qui
      crée un dossier "/Endless-/" Pour faire simple <base> permettra de mettre le bon chemin, en utilisant
      le prefix /Endless-/ devant chaque chemin relatifs, pour que ça soit des chemins relatifs on ajoute le point devant le slash "./" 
      Sinon ça serait un chemin absolu  -->
    <link rel="stylesheet" href="./CSS/footer.css">
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/form.css">
    <link rel="stylesheet" href="./CSS/Modal-Panier.css">
    <link rel="stylesheet" href="./CSS/Creation-Compte.css">
    <link rel="stylesheet" href="./CSS/Modal-Recherche.css">
    <link rel="stylesheet" href="./CSS/Page-mon-espace.css">
    <script type="module" src="./JS/script.js"></script>

    <title>Mon espace</title>
  
</head>
<body>

      <?php 
      include "../module/header.html";
      include "../module/modal-recherche.html"; 
      include "../module/modal-panier.html";  
    ?>

    <h1>Bienvenue dans votre espace client</h1>
    <h2>Mon espace client</h2>

    <div class="Tableaudebord-container">
      <div class="Tableaudebord-Blocs">
      <div class="Tableaudebord-card formations">
      <img class="Icones-tableaudebord" src="../Images/Page Mon Espace/icone-formation.png" alt="Icone-formation">
      <h3>Mes Formations</h3>
      <p>Jetter un oeil sur mes formations</p>
      </div>
     
      <div class="Tableaudebord-card profil">
      <img class="Icones-tableaudebord" src="../Images/Page Mon Espace/icone-profil.png" alt="Icone-profil">
      <h3>Mon Profil</h3>
      <p>Gérer mes informations</p>
      </div>

      <div class="Tableaudebord-card achats">
      <img class="Icones-tableaudebord" src="../Images/Page Mon Espace/icone-achat.png" alt="Icone-achat">
      <h3>Mes Achats</h3>
      <p>Mes achats effectués</p>
      </div>
     
     <div class="Tableaudebord-card documents">
      <img class="Icones-tableaudebord" src="../Images/Page Mon Espace/icone-document.png" alt="Icone-document">
      <h3>Mes Documents</h3>
      <p>Ma documentation de formation</p>
      </div>
      </div>
    </div>
  
  <?php
    include "./module/footer.html"; 
    ?>
</body>
</html>