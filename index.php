<?php include "./PHP/service/Message-Flash.php"; ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base href="/">
    <!-- <base href="/Endless-/"> -->
    <link rel="stylesheet" href="./CSS/index.css" />
    <link rel="stylesheet" href="./CSS/header.css" />
    <link rel="stylesheet" href="./CSS/footer.css" />
    <link rel="stylesheet" href="./CSS/Modal-Panier.css" />
    <link rel="stylesheet" href="./CSS/form.css" />
    <link rel="stylesheet" href="./CSS/Modal-Recherche.css" />
    <script type="module" src="./JS/script.js"></script>
    <script src="./JS/Flash-Message.js" defer></script>
    <link rel="stylesheet" href="./CSS/formations.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <title>Nails Endless Beauty</title>
  </head>
  <body class="homepage">

    <!-- Le header est vide car j'ai mis son contenu dans le fichier "module" dans le fichier "header.html"
     Du coup juste avec <header> </header> vide, je peux faire apparaitre le contenu HTML du header grâce au fetch réalisé
     sur le fichier "Menu-Burger.js" qui sera ensuite importer sur mon fichier "script.js"-->
     <!-- Donc dans mon fichier "Menu-Burger.js" je retrouve mon header,mon menu burger ainsi que mes modales Panier/Recherce -->

      <?php 
      include "./HTML/module/header.html";
      include "./HTML/module/modal-recherche.html"; 
      include "./HTML/module/modal-panier.html";  
    ?>
   
<div class="container-image-header">     
  <img src="./Images/image-sous-header.jpg" alt="Salon de beauté professionnel">   
</div>

    <main class="main-content">
      <!-- Ici j'utilise ma fonction pour envoyer un message flash -->
      <?php
      afficheMessageFlash("Message-confirmation-envoi-mail")
      ?>
      <section class="introduction">
        <h2>Bienvenue dans notre univers de formations beauté</h2>
        <p>
          Découvrez nos formations professionnelles en ligne pour développer vos
          compétences en soins des ongles et des pieds. Nos cours vidéo vous
          permettent d'apprendre à votre rythme et de maîtriser les dernières
          techniques du secteur.
        </p>
      </section>


      <section class="salon-presentation">
        <!-- Image du salon à gauche -->
        <div class="image-container">
            <!-- Remplacez cette URL par le chemin vers votre vraie image -->
            <img src="./Images/Photos QuiSommesNous/OPX05269.jpg" alt="Salon Endless Beauty" class="salon-image">
            <img src="./Images/Photos Accueil/IMG_3655.jpeg" alt="Salon Endless Beauty" class="salon-image">
        </div>

        <!-- Texte à droite -->
        <div class="text-container">
            <h2>Bienvenue chez Endless Beauty</h2>
            <p>Découvrez notre <span class="highlight">salon professionnel</span> dédié aux soins des ongles et à la beauté des pieds. Un espace moderne et chaleureux où se mélangent expertise technique et détente absolue.</p>
            
            <p>Notre équipe de <span class="highlight">professionnelles certifiées</span> vous accompagne dans l'apprentissage des techniques les plus avancées du secteur, de la manucure russe aux extensions Gel X.</p>
            
            <p>Grâce à nos <span class="highlight">formations en ligne</span>, vous pouvez désormais apprendre à votre rythme les secrets d'un travail de qualité professionnelle, directement depuis chez vous.</p>
            
            <p>Rejoignez-nous dans cette aventure beauté et développez vos compétences avec les meilleures techniques du marché !</p>
            
            <button class="discover-button" onclick="scrollToFormations()">Découvrir nos formations</button>
        </div>
    </section>


      <div class="formations-title">
      <h2> Nos Formations</h2>

      <p>Explorez un univers complet dédié à la beauté des mains et des pieds. Nos formations en ligne couvrent un éventail de techniques modernes : manucure russe, extensions Gel X, soins des pieds et traitements spécifiques. Conçus pour les débutants comme pour les professionnels en perfectionnement,
         nos modules vous offrent un apprentissage précis, accessible à tout moment, pour maîtriser les gestes qui font la différence.</p>
    </div>
      <div class="formations-container">
        <div class="formation1 formation">
          <div class="formation-image">
      <img src="../Images/Photos Accueil/IMG_3652.jpeg" alt="Manucure Russe" />
    </div>
          <h1>Manucure Russe</h1>
          <p class="contenu"><img src="../Images/Logo-Contenu.png" alt="Logo-Contenu">Contenu: Gainage + Couleur sous cuticule</p>
          <p class="duree"><img src="../Images/Logo-Durée.png" alt="Logo-Durée">Durée: 1H30 à 2H de vidéos</p>
          <p class="niveau"><img src="../Images/Logo-Niveau.png" alt="Logo-Niveau">Niveau: Débutant à intermédiaire
          <p class="prix">150€</p>
          <button class="button-formation">Découvrir cette formation</button>
        </div>
        <div class="formation2 formation">
          <div class="formation-image">
      <img src="../Images/Photos Accueil/IMG_3653.jpeg" alt="Manucure Russe" />
    </div>
          <h1>Extension Gel X</h1>
          <p class="contenu"><img src="../Images/Logo-Contenu.png" alt="Logo-Contenu">Contenu: Techniques d'extension Gel X</p>
          <p class="duree"><img src="../Images/Logo-Durée.png" alt="Logo-Durée">Durée: 2H à 2H30 de vidéos</p>
          <p class="niveau"><img src="../Images/Logo-Niveau.png" alt="Logo-Niveau">Niveau: Débutant à intermédiaire
          <p class="prix">200€</p>
          <button class="button-formation">Découvrir cette formation</button>
        </div>
        <div class="formation3 formation">
          <div class="formation-image">
      <img src="../Images/Photos Accueil/IMG_3654.jpeg" alt="Manucure Russe" />
    </div>
          <h1>Beauté des pieds</h1>
          <p class="contenu"><img src="../Images/Logo-Contenu.png" alt="Logo-Contenu">Contenu: Pédicure Russe + Gainage</p>
          <p class="duree"><img src="../Images/Logo-Durée.png" alt="Logo-Durée">Durée:: 1H30 à 2H de vidéos</p>
          <p class="niveau"><img src="../Images/Logo-Niveau.png" alt="Logo-Niveau">Niveau: Débutant à intermédiaire</p>
          <p class="prix">180€</p>
          <button class="button-formation">Découvrir cette formation</button>
        </div>
        <div class="formation4 formation">
          <div class="formation-image">
      <img src="../Images/Photos Accueil/IMG_3655.jpeg" alt="Manucure Russe" />
    </div>
          <h1>Soin Anti-callosité des pieds</h1>
          <p class="contenu"><img src="../Images/Logo-Contenu.png" alt="Logo-Contenu">Contenu: Traitement & soin des callosités</p>
          <p class="duree"><img src="../Images/Logo-Durée.png" alt="Logo-Durée">Durée: 1H à 1H30</p>
          <p class="niveau"><img src="../Images/Logo-Niveau.png" alt="Logo-Niveau">Niveau: Débutant à intermédiaire</p>
          <p class="prix">120€</p>
          <button class="button-formation">Découvrir cette formation</button>
        </div>
        <div class="formation5 formation"> 
          <div class="formation-image"> 
      <img src="../Images/Photos Accueil/IMG_3656.jpeg" alt="Manucure Russe" />
      <img class="logo-promo" src="../Images/Logo-Promo.png" alt="Logo-Promo">
    </div>
          <h1>PACK COMPLET</h1>
          <p class="contenu"><img src="../Images/Logo-Contenu.png" alt="Logo-Contenu">Contenu: Tous les modules</p>
          <p class="duree"><img src="../Images/Logo-Durée.png" alt="Logo-Durée">Durée: Environ 8H de vidéos</p>
          <p><img src="../Images/Logo-Diamant.png" alt="Logo-Diamant">Formation complète professionnelle</p>
          <p class="prix">
          <img src="../Images/Logo-Prix.png" alt="Logo-Prix">
          <span class="prix-barre">500€</span>
          <span class="prix-promo">450€</span>
          </p>
          <button class="button-formation"><img src="../Images/Logo-Hot.png" alt="Logo Hot">OFFRE SPECIALE<img src="../Images/Logo-Hot.png" alt="Logo Hot"></button>
        </div>
      </div>
    </main>


  <footer>
    <div class="footer-content">
        <!-- DESCRIPTION -->
        <div class="footer-brand">
            <div class="footer-name">Nails Endless Beauty</div>
            <p class="footer-description">
                Découvrez nos formations professionnelles en ligne pour développer vos compétences en soins des ongles et des pieds. Apprenez à votre rythme avec nos experts.
            </p>
        </div>

        <!-- CONTACT -->
        <div class="footer-contact">
            <h3>Contact</h3>
            <div class="contact-item">Endlessbeauty.lc@gmail.com</div>
            <div class="contact-item">06 71 54 13 54</div>
        </div>

        <!-- RÉSEAUX SOCIAUX -->
        <div class="footer-social">
            <h3>Suivez-nous</h3>
            <div class="social-links">
                <a href="https://www.tiktok.com/@endless.beauty8?_t=ZN-8wNbi4AV1cs&_r=1" target="_blank" rel="noopener" class="social-link">
                    <img src="/Images/icons8-tiktok.svg" alt="TikTok Logo">
                </a>
                <a href="https://www.instagram.com/accounts/login/?next=https%3A%2F%2Fwww.instagram.com%2Fendlessbeauty_nailss%2F%3Figsh%3DbGo3ZnBtcDJ1M20w%26utm_source%3Dqr&is_from_rle" target="_blank" rel="noopener" class="social-link">
                    <img src="/Images/Icone-Instagram.svg" alt="Instagram Logo">
                </a>
            </div>
        </div>
    </div>

    <!-- COPYRIGHT EN BAS -->
    <div class="footer-bottom">
        <p class="copyright">&copy; 2025 Nails Endless Beauty - Tous droits réservés</p>
    </div>
</footer>
  </body>
</html>

