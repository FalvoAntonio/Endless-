<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <base href="/">
  <!-- <base href="/Endless-/"> -->
  <link rel="stylesheet" href="./CSS/header.css">
  <link rel="stylesheet" href="./CSS/form.css">
  <link rel="stylesheet" href="./CSS/footer.css">
  <link rel="stylesheet" href="./CSS/Login.css">
  <link rel="stylesheet" href="./CSS/Modal-Panier.css">
  <link rel="stylesheet" href="./CSS/Modal-Recherche.css">
  <link rel="stylesheet" href="./CSS/QuiSommesNous.css">
  <script type="module" src="./JS/script.js"></script>
  <title>Qui Sommes-nous</title>
</head>

<body class="bodyabout">
  

  <?php 
    include "./module/header.html"; 
    include "./module/modal-recherche.html"; 
    include "./module/modal-panier.html"; 
  ?>
  

  <main>
    <h1>Qui sommes-nous ?</h1>
    <div class="Photo-de-equipe container">
      <img src="../Images/Photos QuiSommesNous/Photo-equipe.jpeg" alt="Photo de l'équipe">
    </div>

    <h2>Présentation</h2>
    <div class="container">
      <p>Nous, c’est Laura et Cassandra. Deux jeunes femmes passionnées par l’univers de l’ongle, et plus
        particulièrement par la prothésie ongulaire. Amies dans la vie et désormais associées, nous avons décidé de
        donner vie à un rêve commun : créer un lieu qui nous ressemble, où l’excellence et la bienveillance se
        rencontrent autour d’une passion partagée.

        Après trois années d’expérience dans le métier, nous avons ouvert en août 2024 notre propre institut à
        Villeneuve-d’Ascq. Un espace que nous avons imaginé et façonné avec soin : chaleureux, professionnel et à notre
        image, pensé pour offrir à chaque cliente un moment unique.

        Aujourd’hui, nous allons encore plus loin en lançant nos formations en ligne. Ce projet, né d’une envie profonde
        de transmettre, a été construit avec passion, exigence et beaucoup de travail. À travers ces formations, nous
        souhaitons partager notre savoir-faire, nos techniques et notre vision du métier, tout en accompagnant chaque
        élève avec bienveillance.

        Bienvenue dans notre univers.</p>
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24570.55404421394!2d3.1113290347656233!3d50.62948495017588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3296d9920ca33%3A0xe36fc9e33dd82a4c!2sEndless%20beauty!5e1!3m2!1sfr!2sfr!4v1750253094954!5m2!1sfr!2sfr" 
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </main>

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