<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Réinitialisation de mot de passe</title>
          <base href="/">
    <!-- <base href="/Endless-/"> -->
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/form.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/MDP-oublie.css">
    <link rel="stylesheet" href="../CSS/Modal-Panier.css">
    <script type="module" src="../JS/script.js"></script>
    <link rel="stylesheet" href="../CSS/Modal-Recherche.css">
</head>
<body>

    <?php 
      include __DIR__."/../../module/header.php";
      include __DIR__."/../../module/modal-recherche.html"; 
      include __DIR__."/../../module/modal-panier.html";  
    ?>

<header>
    <h1>Bienvenue</h1>
    <h2>Vous pouvez réinitialiser votre mot de passe</h2>

    <form id="Formulaire-nouveau-mdp" action="/PHP/Compte/Mot-de-passe-oublie/Formulaire-réinitialiser-motdepasse.php" method="POST" class="form-reinitialisation-mdp ">
      <div class="New-mdp">
      <label for="New-mdp">Entrer votre nouveau mot de passe :</label>
      <input type="password" name="New-mdp" id="New-mdp" required/>
    </div>
  <div class="Confirm-mdp">
    <label for="Confirm-mdp">Retaper votre nouveau mot de pass :</label>
    <input type="password" name="Confirm-mdp" id="Confirm-mdp" required/>
  </div>
  <div class="submit-new-mdp">
    <input type="submit" value="Envoyez">
  </div>
    </form>

</header>    

  
  <?php
    include "./module/footer.html"; 
    ?>
</body>
</html>