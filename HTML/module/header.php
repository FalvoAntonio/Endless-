<?php $isLogged = isset($_SESSION["logged"]); ?>
<!-- On vérifie si l'utilisateur est connecté -->
    <header>
    <nav class="Menu">
      <div class="Menu-Titre">
        <ul>
          <li><a href="./HTML/QuiSommesNous.php">Qui sommes-nous ?</a></li>
          <li><a href="./HTML/Formations/Formations.php">Formations</a></li>
          <li><a href="#Contact">Contact</a></li>
          <li><a href="./HTML/Prise-de-rdv/Prendre-rdv.php">Prendre rendez-vous</a></li>
        </ul>
        <a href="index.php" class="menu-titre-link">
          <img class="headerlogo" src="/Images/Logo Endless.png" alt="Titre header">
          <!-- <h1>Endless Beauty Nails</h1> -->
          <p>Centre de formation</p></a
        >
      </div>

      <!-- ! Utiliser class="icon icon-recherche pour créer la fonction JavaScript qui permettra de faire apparaitre le menu utilisateur.
       ! Il faudra ensuite faire cette fonction dans le fichier ...
       ! Ne pas oublier de faire les require pour appeler notre menu utilisateur sur chaque page
      -->
      <div class="icons-menu">
        <div class="logomenuburger">
          <span class="span1"></span>
          <span class="span2"></span>
          <!--Elle sera en opacity-->
          <span class="span3"></span>
        </div>
        <!-- <img class="icon Logo-Menu"src="./Images/Menu.svg" alt="Menu Burger"> -->
        <img
          class="icon icon-recherche"
          src="./Images/Recherche.svg"
          alt="Ma Recherche"
        />
        <!-- En commentaire une autre manière de faire pour être redirigé sur la page "Page-mon-espace.php" -->
         
        <!-- <?php //if(isset($_SESSION["logged"])): ?> -->
        <!-- <a href="HTML/Compte/Page-mon-espace.php"> -->
        <!-- <?php //else: ?> -->
        <a href="HTML/Compte/Login.php">
          <!-- <?php //endif; ?> -->
          <img
            class="icon icon-login <?= $isLogged ? 'connected' : ''; // Si l'utilisateur est connecté, ajoute la classe 'connected' sinon n'ajoute rien 
            // si je suis pas connecté le menu n'apparait pas?>"
            src="./Images/Login.png"
            alt="Identifiant"
          />
        </a>
        <img
          class="icon icon-panier"
          src="./Images/Panier.png"
          alt="Mon Panier"
        />
      </div>
    </nav>
  
    </header>