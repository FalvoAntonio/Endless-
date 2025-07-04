<?php
    // ! Je suis sur la page de formations, et je veux afficher une formation en particulier
    if(!isset($_GET["formation"]))
    // Si je n'ai pas de formation (dans l'URL) > http://localhost:8000/HTML/Formations/Formation-manucure-russe.php?formation=extension_gel_x
    // Je suis redirigé vers la page formations
    {
        header("Location: ./Formations.php");
        exit;
    }
    $id = $_GET["formation"];
    // Je converti l'id en nombre, dans le but d'éviter l'insertion de code
    require __DIR__."/../../PHP/service/PDO-Connexion-BDD.php";

    $sql = $pdo->prepare("SELECT * FROM formations WHERE slug=?");
    $sql->execute([$id]);
    $formation = $sql->fetch();

    if(!$formation)
    // Si l'id ne correspond, si tu ne trouves pas de formations 
// Admetons j'ai que 5 formation donc id= 1 ,2 ,3 ,4 ,5 et j'ai un id=65 je serais redirigé vers la page formation
    {
        header("Location: ./Formations.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation <?= $formation["title"] ?></title>
</head>
<body>
    <h1><?= $formation["title"] ?></h1>
    <div class = container >
        <?= $formation["content"] ?>

    </div>

    <div class="formation-footer">
        <p>Prix : <?= $formation["price"] ?> €</p>
        <a href="./Formations.php" class="btn">Retour aux formations</a>
    </div>

    <div class="formation-comments">
        <h2>Commentaires</h2>
        <p> <?= $formation["duration"]  ?> minutes</p>
        <p>Aucun commentaire pour le moment.</p>
    </div>
</body>
</html>