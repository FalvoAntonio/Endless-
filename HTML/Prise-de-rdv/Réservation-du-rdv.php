<?php
// ? On va démarrer la session pour vérifier si l'utilisateur est connecté
// * Le session_start permet de démarrer une session ou de reprendre une session existante.
// * Il est important de le faire avant tout envoi de contenu HTML, sinon cela peut
// * provoquer une erreur de type "headers already sent".
session_start();

// ? On va vérifier si l'utilisateur est connecté
// * Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
if(!isset($_SESSION["logged"])) {
    // * Si l'utilisateur n'est pas connecté , on le redirige vers la page de connexion
    header("Location: ../Compte/Login.php");
    exit;
}
// ? Afficher une prestation spécifique pour la réservation
// *["prestation" fait référence à l'ID du service dans l'URL (service_id)]
if(!isset($_GET["prestation"])) {
    // *Si l'ID du service n'est pas défini, rediriger vers la page des prestations
    header("Location: ./Prendre-rdv.php");
    exit;
}

// ? Récupérer les détails de la prestation à partir de l'ID
$prestation_id = $_GET["prestation"];
require __DIR__ . "/../../PHP/service/PDO-Connexion-BDD.php";

// ? Je vais chercher la prestation dans la base de données
$sql = $pdo->prepare("SELECT * FROM services WHERE id = ?");
//* Le FROM services fait référence à la table intitulée "services" dans la base de données
$sql->execute([$prestation_id]);
$prestation = $sql->fetch();

if(!$prestation) {
    // Si la prestation n'existe pas, rediriger vers la page des prestations
    header("Location: ./Pendre-rdv.php");
    exit;
}

// ? Désormais il faut récupérer les informations de l'utilisateur connecté, C'est-à-dire ses informations
// ? provenant de son formulaire d'inscription.
// * On va récupérer les informations de l'utilisateur connecté à partir de la session
$sql_user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
// * Le FROM users fait référence à la table intitulée "users" dans la base de données
//* On va utiliser l'ID de l'utilisateur stocké dans la session ($_SESSION["user_id"])
//* pour récupérer ses informations.
$sql_user->execute([$_SESSION["user_id"]]);
$user = $sql_user->fetch();

$nom_complet = $user["firstname"] . " " . $user["lastname"];
$email_user = $user["email"];
$telephone_user = $user["phone_prefix"] . $user["phone"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Je réserve mon RDV</title>
</head>
<body>
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

                <div class="prothesiste-selection">
                    <label for="prothesiste">Choisissez votre prothésiste :</label>
                    <select id="prothesiste" name="prothesiste">
                        <option value="Laura">Laura</option>
                        <option value="Cassandra">Cassandra</option>
                        <option value="Aleatoire">Aléatoire</option>
                    </select>
                </div>
            </div>


            <form action="" method="POST" class="reservation-form">
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
                    <option value="">Choisir un créneau</option>
                    <?php
                    // Génération des créneaux horaires (9h à 18h)
                    for($h = 9; $h <= 18; $h++) {
                        for($m = 0; $m < 60; $m += 30) {
                            $heure = sprintf("%02d:%02d", $h, $m);
                            if($h == 18 && $m > 0) break; // Arrêt à 18h00
                            echo "<option value='$heure'>$heure</option>";
                        }
                    }
                    ?>
                </select>
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

    <script>
        // Vérifier la disponibilité en temps réel (optionnel)
        document.getElementById('date_rdv').addEventListener('change', function() {
            // Ici vous pourrez ajouter une vérification AJAX des créneaux disponibles
            console.log('Date sélectionnée : ' + this.value);
        });
    </script>
</body>
</html>



</body>
</html>