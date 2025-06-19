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
      include "./module/header.html";
      include "./module/modal-recherche.html"; 
      include "./module/modal-panier.html";  
    ?>

<header>
    <h1>Bienvenue</h1>
    <h2>Vous pouvez réinitialiser votre mot de passe</h2>

    <form id="Formulaire-nouveau-mdp" action="../PHP/Compte/Formulaire-réinitialiser-motdepasse.php" method="POST" class="form-reinitialisation-mdp ">
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