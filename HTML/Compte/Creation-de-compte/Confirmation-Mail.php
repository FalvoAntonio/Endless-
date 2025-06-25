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
    include __DIR__."/../../module/header.php"; 
    include __DIR__."/../../module/modal-recherche.html"; 
    include __DIR__."/../../module/modal-panier.html"; 
  ?>

<div class="container">
        <h1>Confirmation d'email</h1>
        
        <?php if($success): ?>
          <!-- On vérifie si $success == true, donc si l'e-mail a bien été confirmé -->
            <div class="success">
                <h2>✅ Success !</h2>
                <p><?php echo $message; ?></p>
                <!-- Le message $message est affiché -->
                <a href="/HTML/Compte/Login.php" class="btn">Se connecter maintenant</a>
              </div>
              <?php else: ?>
                <!-- Sinon si $success est faux, donc que l'email n'a pas pu être confirmé (token invalide,expiré ou manquant)-->
                <div class="error">
                <h2>❌ Erreur</h2>
                <!-- Donc si c'est faux on affiche alors le message d'erreur -->
                <p><?php echo $message; ?></p>
                <a href="/HTML/Compte/Creation-de-compte/Creation-Compte.php" class="btn">Retour à l'inscription</a>
            </div>
        <?php endif; ?>
    </div>
    
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            /* padding: 50px;  */
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

  <?php
    include "./module/footer.html"; 
    ?>

</body>
 
 

</html>