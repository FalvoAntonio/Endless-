<?php
 require "../../../PHP/service/Forme.php";
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

    <!-- Je reprends bien le script de google pour mon captcha -->

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- ! Cet import me permet de convertir la police qui se transforme en icone flag pour tous les moteurs de recherche  -->

    <title>Création de compte</title>
</head>

<body>
    <?php 
    include "../../module/header.php"; 
    include "../../module/modal-recherche.html"; 
    include "../../module/modal-panier.html"; 
  ?>

    <div class="container">

        <h1>Créez votre compte</h1>
        <form id="signup-form" action="/PHP/Compte/Creation-de-compte/Formulaire-creation-compte.php" method="POST"> 
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
            <!-- Je reprends également la div de google et j'insère moi même la clef client -->
            <!-- data-sitekey : Clé publique fournie par Google (visible côté client) -->
            <div class="g-recaptcha" data-sitekey="6LcfPX0rAAAAALoy2aJmHzColxMSuKbYlyKVF1hr"></div>
            <button type="submit" class="btn-form"  name="signup-form">Créer un compte</button>
        </form>
    </div>




  <?php
    include "../../module/footer.html"; 
    ?>
</body>

</html>