<?php
// Connexeion à la base de données
// On inclut le fichier de connexion à la base de données
require __DIR__ . "/../../PHP/service/PDO-Connexion-BDD.php";


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prise de RDV</title>
    <link rel="stylesheet" href="../../CSS/Prendre-rdv.css">
    <script src="../../JS/Prise-de-rdv.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>💅 Endless Beauty</h1>
            <p>Réservez votre rendez-vous en ligne </p>
        </div>

        <div class="category-choice">
            <h2>Choissisez votre categorie</h2>
        </div>

                <!-- Onglets par catégorie -->
                <!--  ! Pour pouvoir afficher le contenu de chaque categorie en JS -->
                <!--  ! Ajoute de "active" et des data-category -->
                <div class="category-block">
                    <button class="category-btn active" data-category="mains">Beauté des Mains</button>
                    <button class="category-btn" data-category="rallongement">Rallongement</button>
                    <button class="category-btn" data-category="pieds">Beauté des Pieds</button>
                    <button class="category-btn" data-category="regard">Beauté du Regard</button>
                    <button class="category-btn" data-category="epilation">Épilations</button>
                </div>

                <!-- BEAUTÉ DES MAINS -->
                 <!-- ! Ajoute de "active et id="mains" -->
                <div class="service-category active" id="mains">
                    <div class="service-grid">
                        <a href="./Réservation-du-rdv.php?prestation=1" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Manucure Russe seule</div>
                            <div class="service-duration">⏱️ 30 min</div>
                            <div class="service-price">35€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Gainage Nude</div>
                            <div class="service-duration">⏱️ 1h</div>
                            <div class="service-price">50€</div>
                            <div class="service-note">Sur ongle nu</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Gainage avec Couleur</div>
                            <div class="service-duration">⏱️ 1h10</div>
                            <div class="service-price">55€</div>
                            <div class="service-note">Sur ongle nu</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Remplissage Gainage Nude</div>
                            <div class="service-duration">⏱️ 1h10</div>
                            <div class="service-price">55€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Remplissage Gainage + Couleur</div>
                            <div class="service-duration">⏱️ 1h20</div>
                            <div class="service-price">60€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Dépose Complète</div>
                            <div class="service-duration">⏱️ 30 min</div>
                            <div class="service-price">25€</div>
                        </div>
                    </div>
                </div>

                <!-- RALLONGEMENT ONGLES -->
                 <!--  ! Ajout : id="category-rallongement" -->
                <div class="service-category" id="rallongement">
                    <div class="service-grid">
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Rallongement Capsules Gel X</div>
                            <div class="service-duration">⏱️ 1h35</div>
                            <div class="service-price">65€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Dépose + Repose Capsules Gel X</div>
                            <div class="service-duration">⏱️ 1h40</div>
                            <div class="service-price">70€</div>
                        </div>
                    </div>
                </div>

                <!-- BEAUTÉ DES PIEDS -->
                 <!-- ! Ajoute : id="category-pieds"> -->
                <div class="service-category" id="pieds">
                    <div class="service-grid">
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Beauté des Pieds Russe seule</div>
                            <div class="service-duration">⏱️ 30 min</div>
                            <div class="service-price">35€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Renfort Base Nude</div>
                            <div class="service-duration">⏱️ 1h</div>
                            <div class="service-price">45€</div>
                            <div class="service-note">Sur ongle nu</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Renfort avec Couleur</div>
                            <div class="service-duration">⏱️ 1h10</div>
                            <div class="service-price">50€</div>
                            <div class="service-note">Sur ongle nu</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Dépose + Renfort Base Nude</div>
                            <div class="service-duration">⏱️ 1h10</div>
                            <div class="service-price">50€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Dépose + Renfort + Couleur</div>
                            <div class="service-duration">⏱️ 1h15</div>
                            <div class="service-price">55€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Traitement Anti-Callosités + Renfort</div>
                            <div class="service-duration">⏱️ 1h35</div>
                            <div class="service-price">90€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Traitement Anti-Callosités + Beauté Russe</div>
                            <div class="service-duration">⏱️ 1h10</div>
                            <div class="service-price">80€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Dépose Complète</div>
                            <div class="service-duration">⏱️ 30 min</div>
                            <div class="service-price">25€</div>
                        </div>
                    </div>
                </div>

                <!-- BEAUTÉ DU REGARD -->
                 <!--  ! Ajout : id="category-regard" -->
                <div class="service-category" id="regard">
                    <div class="service-grid">
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Teinture Cils ou Sourcils</div>
                            <div class="service-duration">⏱️ 15 min</div>
                            <div class="service-price">10€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Réhaussement des Cils</div>
                            <div class="service-duration">⏱️ 40 min</div>
                            <div class="service-price">40€</div>
                        </div>
                    </div>
                </div>

                <!-- ÉPILATIONS -->
                 <!--  ! Ajout : id="category-epilation" -->
                <div class="service-category" id="epilation">
                    <div class="service-grid">
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Sourcils</div>
                            <div class="service-duration">⏱️ 12 min</div>
                            <div class="service-price">10€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Lèvres & Sourcils</div>
                            <div class="service-duration">⏱️ 15 min</div>
                            <div class="service-price">15€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Lèvres ou Menton</div>
                            <div class="service-duration">⏱️ 10 min</div>
                            <div class="service-price">7€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Aisselles</div>
                            <div class="service-duration">⏱️ 10 min</div>
                            <div class="service-price">10€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">1/2 Jambes</div>
                            <div class="service-duration">⏱️ 20 min</div>
                            <div class="service-price">20€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Jambes Entières</div>
                            <div class="service-duration">⏱️ 30 min</div>
                            <div class="service-price">30€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Maillot Intégral + Inter Fessier</div>
                            <div class="service-duration">⏱️ 30 min</div>
                            <div class="service-price">25€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Maillot Américain</div>
                            <div class="service-duration">⏱️ 30 min</div>
                            <div class="service-price">20€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Maillot Échancré</div>
                            <div class="service-duration">⏱️ 15 min</div>
                            <div class="service-price">15€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Sillon Inter Fessier (SIF)</div>
                            <div class="service-duration">⏱️ 5 min</div>
                            <div class="service-price">5€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">1/2 Bras</div>
                            <div class="service-duration">⏱️ 20 min</div>
                            <div class="service-price">15€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Bras Entiers</div>
                            <div class="service-duration">⏱️ 30 min</div>
                            <div class="service-price">20€</div>
                        </div>
                        <a href="#" class="service-card-link">Prendre RDV</a>
                        <div class="service-card">
                            <div class="service-name">Bas du Dos</div>
                            <div class="service-duration">⏱️ 10 min</div>
                            <div class="service-price">15€</div>
                        </div>
                    </div>
                </div>
</body>
</html>