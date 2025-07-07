<?php
require_once __DIR__ . "/../../PHP/Prise-de-rdv/Page-Réservation-du-rdv.php"; // Connexion à la base de données
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/Réservation-du-rdv.css">
    <link rel="stylesheet" href="./CSS/footer.css">
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/Menu-utilisateur.css">
    <link rel="stylesheet" href="./CSS/Modal-Panier.css">
    <link rel="stylesheet" href="./CSS/form.css">
    <link rel="stylesheet" href="./CSS/Modal-Recherche.css">
    <script type="module" src="./JS/script.js"></script>
    <script src="./JS/reservation-de-rdv.js" defer></script>

    <title>Je réserve mon RDV</title>
</head>
<body>
    <?php
      require "../module/Menu-burger-compte.html";
      include "../module/header.php";
      include "../module/modal-recherche.html"; 
      include "../module/modal-panier.html";  
    ?>
   
    <div class="container">
        <div class="header">
            <h1>Endless Beauty</h1>
            <p>Réservation de votre rendez-vous</p>
        </div>

        <div class="prestation-detail">
            <div class="prestation-info">
                <h2><?= ($prestation["nom"]) ?></h2>
                <div class="prestation-items">
                    <span class="categorie"><?=($prestation["categorie"]) ?></span>
                    <span class="duree">⏱️ <?= $prestation["duree"] ?> min</span>
                    <span class="prix"><?= number_format($prestation["prix"], 2) ?>€</span>
                </div>
                
                <?php if($prestation["description"]): ?>
                     <!-- Si la description existe, l'afficher -->
                    <div class="description">
                        <p><?=($prestation["description"]) ?></p>
                    </div>
                <?php endif; ?>
                <!-- Si la description n'existe pas, ne rien afficher -->
            </div>

            </div>


            <form action="" method="POST" class="reservation-form">
                <div class="prothesiste-selection">
                    <label for="prothesiste">Choisissez votre prothésiste :</label>
                    <select id="prothesiste" name="prothesiste">
                        <option value="Laura">Laura</option>
                        <option value="Cassandra">Cassandra</option>
                        <option value="Aleatoire">Aléatoire</option>
                    </select>
                </div>
            <input type="hidden" name="service_id" value="<?= $prestation["id"] ?>">
            
            <!-- Affichage des informations utilisateur récupérées -->
            <div class="user-info">
                <strong>✅ Vos informations (récupérées depuis votre compte) :</strong><br>
                👤 <?= htmlspecialchars($nom_complet) ?> | 
                📧 <?= htmlspecialchars($email_user) ?> | 
                📞 <?= htmlspecialchars($telephone_user) ?>
            </div>


            <div class="form-group">
                <label for="date_rdv">Date souhaitée *</label>
                <input type="date" 
                       id="date_rdv" 
                       name="date_rdv" 
                       required 
                       min="<?= date('Y-m-d') ?>">
            </div>

            <div class="form-group">
                <label for="heure_rdv">Heure souhaitée *</label>
                <select id="heure_rdv" name="heure_rdv" required>
                    <!-- <option value="">Choisir un créneau</option> -->
                    <?php
                    // Génération des créneaux horaires (9h à 18h)
                    // Au premier chargement, aucune date n'est sélectionnée
                    afficherOptionsCreneaux($pdo); 
                    ?>
                </select>
                <div id="info-creneaux" class="creneaux-info"></div>
                <?php if(isset($error_message) && !empty($error_message)): ?>
                             <div class="error-message">
                                 <?= htmlspecialchars($error_message) ?>
                             </div>
                            <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="notes">Notes particulières</label>
                <textarea id="notes" 
                         name="notes" 
                         rows="3" 
                         placeholder="Allergies, préférences, remarques..."></textarea>

                         
            </div>

            <button type="submit" class="btn-reserver">
                🗓️ Réserver ce rendez-vous
            </button>
        </form>
    </div>

    <?php
    include "../module/footer.html"; 
    ?>
    
</body>
</html>



</body>
</html>