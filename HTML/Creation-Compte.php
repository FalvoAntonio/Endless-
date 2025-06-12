<?php
 require "../PHP/service/Forme.php";
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

    <!-- ! Cet import me permet de convertir la police qui se transforme en icone flag pour tous les moteurs de recherche  -->

    <title>Création de compte</title>
</head>

<body>
    <?php 
    include "./module/header.html"; 
    include "./module/modal-recherche.html"; 
    include "./module/modal-panier.html"; 
   
  ?>

    <div class="container">
  
        <h1>Créez votre compte</h1>
        <form id="signup-form" action="./Formulaire-creation-compte.php" method="POST"> // + ICI
            <div class="form-groupe">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="votreemail@exemple.com" required>
                 <?php MessagesErrorsFormulaire("mail") ?>
            </div>

            <div class="form-groupe">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Choisissez un mot de passe sécurisé"
                    required>
              <?php MessagesErrorsFormulaire("motdepasse") ?>
                <!-- J'introduis le message d'erreur -->
                 <!-- Si j'ai une erreur j'affiche le message d'érreur sinon je mets rien -->
                
            </div>

            <div class="form-groupe">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" placeholder="Votre prénom" required>
                 <?php MessagesErrorsFormulaire("prenom") ?>
            </div>

            <div class="form-groupe">
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" placeholder="Votre nom" required>
                <?php MessagesErrorsFormulaire("nom") ?>
            </div>

            <div class="form-groupe">
                <label for="phone">Numéro de téléphone</label>
                <div class="input-tel">
                    <select id="prefix" name="prefix" class="tel-prefix" required>
                    </select>
                    <input type="tel" id="phone" name="phone" placeholder="6 12 34 56 78" class="tel-input" required>
                     <?php MessagesErrorsFormulaire("prefix") ?>
                     <?php MessagesErrorsFormulaire("numerotel") ?>
                     
                </div>
            </div>

            <button type="submit" class="btn-form"  name="signup-form">Créer un compte</button>
        </form>
    </div>



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