<?php


try{

    $dsn = "mysql:host=db;dbname=endless_db;charset=utf8";
    /* 
    Le host "db" correspond exactement au nom de votre service de base de données dans Docker Compose.
     */
    /* 
    yaml 
    environment:
  - MYSQL_ROOT_PASSWORD=root_password
  - MYSQL_DATABASE=endless_db
    */
    $pdo = new PDO ($dsn,'root', "root_password"); // Je peux mettre "endless_user" à la place de "root" également
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES,false);
}
catch (PDOException $error) {
    die("Erreur de connexion : " . $error->getMessage());
}

