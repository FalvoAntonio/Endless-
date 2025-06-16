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
    <script type="module" src="./JS/script.js"></script>

    <title>Mon espace</title>
</head>
<body>

      <?php 
      include "./module/header.html";
      include "./module/modal-recherche.html"; 
      include "./module/modal-panier.html";  
    ?>

    <h1>Bienvenue dans votre espace client</h1>
    <h2>Mon espace client</h2>


    <footer>
  <div class="footer-content">
    <div>
      <div class="footer-logo">Nails Endless Beauty</div>
      <div class="contact-info">
        <p>Email: Endlessbeauty.lc@gmail.com</p>
        <p>Téléphone: 06 71 54 13 54</p>
      </div>
      <div class="copyright">
        &copy; 2025 Nails Endless Beauty - Tous droits réservés
      </div>
    </div>
    <div class="logos-reseaux">
      <a href="https://www.tiktok.com/@endless.beauty8?_t=ZN-8wNbi4AV1cs&_r=1" target="_blank" rel="noopener">
        <img src="/Images/icons8-tiktok.svg" alt="TikTok Logo">
      </a>
      <a href="https://www.instagram.com/accounts/login/?next=https%3A%2F%2Fwww.instagram.com%2Fendlessbeauty_nailss%2F%3Figsh%3DbGo3ZnBtcDJ1M20w%26utm_source%3Dqr&is_from_rle" target="_blank" rel="noopener">
        <img src="/Images/Icone-Instagram.svg" alt="Instagram Logo">
      </a>
    </div>
  </div>
</footer>
</body>
</html>