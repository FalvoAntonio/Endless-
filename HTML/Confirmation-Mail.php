<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmez-votre mail</title>
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

<div class="container">
        <h1>Confirmation d'email</h1>
        
        <?php if($success): ?>
            <div class="success">
                <h2>✅ Success !</h2>
                <p><?php echo $message; ?></p>
                <a href="/HTML/04-connexion.php" class="btn">Se connecter maintenant</a>
            </div>
        <?php else: ?>
            <div class="error">
                <h2>❌ Erreur</h2>
                <p><?php echo $message; ?></p>
                <a href="/HTML/Creation-Compte.php" class="btn">Retour à l'inscription</a>
            </div>
        <?php endif; ?>
    </div>
    
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            padding: 50px; 
            background-color: #f4f4f4;
        }
        .container { 
            background-color: white; 
            padding: 30px; 
            border-radius: 10px; 
            max-width: 500px; 
            margin: 0 auto;
        }
        .success { color: green; }
        .error { color: red; }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
        }
    </style>

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