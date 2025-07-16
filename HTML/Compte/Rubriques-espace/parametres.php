<?php
require './../../../PHP/service/Forme.php';
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="/">
    <script type="module" src="../../../JS/script.js"></script>
    <script src="../../../JS/confirm-supp-compte.js"></script>
    <link rel="stylesheet" href="../../../CSS/paramètres.css">
    <link rel="stylesheet" href="../../../CSS/header.css">
    <link rel="stylesheet" href="../../../CSS/form.css">
    <link rel="stylesheet" href="../../../CSS/footer.css">
    <link rel="stylesheet" href="../../../CSS/Modal-Panier.css">
    <link rel="stylesheet" href="../../../CSS/Modal-Recherche.css" />
    <link rel="stylesheet" href="../../../CSS/Menu-utilisateur.css">
  </head>
  <body>

    <?php 
    require "../../module/Menu-burger-compte.html";
    include "../../module/header.php"; 
    include "../../module/modal-recherche.html"; 
    include "../../module/modal-panier.html"; 
  ?>
  <div class="container">
    <h1>Paramètres du compte</h1>

    <!-- Modifier l'e-mail -->
    <section>
      <h2>Modifier l'adresse e-mail</h2>
      <label for="email">Nouvel e-mail</label>
      <input type="email" id="email" placeholder="nouveau@mail.com">
      <button>Mettre à jour l'e-mail</button>
    </section>

    <!-- Modifier le mot de passe -->
    <section>
      <h2>Changer le mot de passe</h2>
      <label for="current-password">Mot de passe actuel</label>
      <input type="password" id="current-password">

      <label for="new-password">Nouveau mot de passe</label>
      <input type="password" id="new-password">
      <button>Mettre à jour le mot de passe</button>
    </section>

    <!-- Notifications -->
    <section>
      <h2>Notifications</h2>
      <label for="notifications">Préférences</label>
      <select id="notifications">
        <option>Recevoir toutes les notifications</option>
        <option>Seulement les notifications importantes</option>
        <option>Ne rien recevoir</option>
      </select>
      <button>Enregistrer les préférences</button>
    </section>

    <!-- Suppression du compte -->
    <section>
      <h2>Supprimer mon compte</h2>
      <p><strong>Attention :</strong> cette action est irréversible. Toutes vos données seront supprimées définitivement.</p>
      <form method="post" action="../../../PHP/Compte/Rubriques-espace/rubrique-paramètres.php" onsubmit="return confirmerSuppression()">
        <!-- onsubmit="return confirmerSuppressionAvancee()" J'utilise cette méthode, sinon j'aurais du faire le addeventListener dans ma
         fonction JS "confirm-supp-compte.js" -->
        <input type="hidden" name="csrf_token" value="<?= creationCSRFToken() ?>">
         <!-- Champ caché contenant le token CSRF -->
         <!-- Utilisation de la fonction "creationCSRFToken()" pour comparer le token-->
        <button class="danger" type="submit">Supprimer mon compte</button>
      </form>
    </section>
  </div>
<?php
    include "../../module/footer.html"; 
    ?>
</body>
</html>