
<?php
// Confirmation-Mail.php - Version simple pour débutant

// 1. Je démarre la session (comme toujours)
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// 2. Je me connecte à la base de données
require("./service/PDO-Connexion-BDD.php");

// 3. Je récupère le token depuis l'URL
// Quand quelqu'un clique sur le lien, l'URL ressemble à :
// Confirmation-Mail.php?token=abc123def456...
$token = $_GET['token'] ?? '';
// ?? '' signifie : si $_GET['token'] n'existe pas, alors $token = ''

$message = "";
$success = false;

// 4. Je vérifie que le token n'est pas vide
if(!empty($token)) {
    
    // 5. Je cherche ce token dans ma base de données
    $sql = $pdo->prepare("
        SELECT * 
        FROM email_confirmations 
        WHERE confirmation_token = ? 
        AND used = FALSE 
        AND expiry_date > NOW()
    ");
    // used = FALSE : le token n'a pas encore été utilisé
    // expiry_date > NOW() : le token n'a pas expiré
    
    $sql->execute([$token]);
    $confirmation = $sql->fetch();
    
    // 6. Si j'ai trouvé le token ET qu'il est valide
    if($confirmation) {
        
        // 7. Je marque le token comme utilisé
        $update_token = $pdo->prepare("UPDATE email_confirmations SET used = TRUE WHERE id = ?");
        $update_token->execute([$confirmation['id']]);
        
        // 8. Ici, vous pourriez ajouter une colonne "email_verified" dans users
        // Mais pour commencer, on va juste marquer le token comme utilisé
        
        $success = true;
        $message = "Félicitations ! Votre email a été confirmé avec succès.";
        
    } else {
        // Token invalide ou expiré
        $success = false;
        $message = "Ce lien de confirmation est invalide ou a expiré.";
    }
    
} else {
    $success = false;
    $message = "Aucun token de confirmation fourni.";
}
?>