<?php
 require "../PHP/service/Forme.php";
 require "../PHP/service/Message-Flash.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- base sert à venir placer devant tout les chemins relatif (qui ne commencent pas par "/") -->
    <base href="/">
    <!-- <base href="/Endless-/"> -->
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/Login.css">
    <link rel="stylesheet" href="CSS/Modal-Panier.css">
    <script type="module" src="JS/script.js"></script>
    <link rel="stylesheet" href="CSS/Modal-Recherche.css">
     <script src="./JS/Flash-Message.js" defer></script>

    <title>Formulaire</title>
</head>

<body class="homepage">
  <?php 
    include "./module/header.html"; 
    include "./module/modal-recherche.html"; 
    include "./module/modal-panier.html"; 
  ?>
 <?php afficheMessageFlash("Message-confirmation-envoi-mail"); ?>

    <section class="Connexion container">

        <h1>Se connecter</h1>
        <p>Accédez à votre espace beauté en toute simplicité.</p>
        <p>Gérez vos formations, suivez votre progression et découvrez nos astuces exclusives pour sublimer votre art.
        </p>

        <form id="loginForm" action="/PHP/Compte/Connexion-compte.php" method="post">
            <div class="Mail">
                <label for="email">Adresse E-mail</label>
                <input type="email" name="email" id="email" placeholder="Saisissez votre e-mail">
                <?php MessagesErrorsFormulaire("email") ?>
            </div>
            <div class="MDP">
                <label for="Mot de passe">Mot de passe</label>
                <div class="input-container">
                    <input class="inputMDP" type="password" name="mdp" id="mdp"
                        placeholder="Saisissez votre mot de passe">
                    <img class="LogoEyes1" src="./Images/eyes.png" alt="Mot de passe visible">
                    <img class="LogoEyes2" src="./Images/noeyes.png" alt="Mot de passe non visible">
                </div>
                <?php MessagesErrorsFormulaire("mdp") ?>
            </div>
            <input type="submit" value="Connectez-vous" name="boutonConnexion" class="btn-form">
            <a href="./HTML/MDP-oublie.php">
                <p>Mot de passe oublié ? </p>
            </a>
        </form>
    </section>

    <section class="Creation-compte container">
        <h1>Création d'un compte</h1>
        <p>Vous n’avez pas encore de compte ? Rejoignez notre communauté de passionnés de beauté.</p>
        <p>Créez votre compte et commencez votre voyage vers l’expertise esthétique.</p>
        <a href="./HTML/Creation-Compte.php"><input class="INPUT btn-form" type="submit"
                value="Je crée mon compte"></a>
    </section>


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