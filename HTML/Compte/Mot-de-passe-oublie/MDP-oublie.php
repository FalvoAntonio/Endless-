<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/">
    <!-- <base href="/Endless-/"> -->
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/form.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/MDP-oublie.css">
    <link rel="stylesheet" href="../CSS/Modal-Panier.css">
    <script type="module" src="../JS/script.js"></script>
    <link rel="stylesheet" href="../CSS/Modal-Recherche.css">
    <title>Mot de passe oublié</title>
</head>

<body>
      <?php 
    include "../../module/header.php"; 
    include "../../module/modal-recherche.html"; 
    include "../../module/modal-panier.html"; 
  ?>

    <div class="container">
        <h2>🔐 Vous avez oublié votre mot de passe ?</h2>
        <p>Saisissez votre adresse e-mail enregistrée. Nous vous enverrons un lien pour réinitialiser votre mot de
            passe.</p>
        <form action="../PHP/Compte/Mot-de-passe-oublie/Adresse-mail-motdepasseoublié.php" method="POST">
          <!-- J'ajoute ma page PHP pour l'utilisation du bouton -->
            <input type="email" name="email" placeholder="Votre adresse e-mail" required />
            <button type="submit" class="btn-form">Envoyer</button>


            <a href="./index.php" class="button-accueil btn-form">Accueil</a>
        </form>
    </div>


  
  <?php
    include "./module/footer.html"; 
    ?>
</body>

</html>