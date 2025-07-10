<?php 

// ! VERIFICATION DU FORMULAIRE
require "../../service/Forme.php";
require "../../service/PHP_Mailer.php";
require "../../service/CAPTCHA-formulaire.php";

// On inclut le fichier Forme.php qui contient la fonction cleanData
if(session_status() !== PHP_SESSION_ACTIVE)
// On vérifie si la session n'est pas déjà démarrée
// Si la session n'est pas démarrée, on la démarre
{
    session_start();
    // On utilise session_start() pour démarrer la session
    // Cela permet de pouvoir utiliser les variables de session
    // Si la session est déjà démarrée, on ne fait rien
    // Cela permet d'éviter les erreurs liées à la session
}
$formulaire = $mail = $motdepasse = $prenom = $nom = $numerotel = "";

// Tableau d'erreurs:
$error = [];
// Cette variable "$error" est un tableau qui va contenir les messages d'erreur.


// Vérification si le formulaire a été soumis:
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup-form"])) // Le "isset" est optionnel mais recommandé
// pour vérifier si le formulaire a été soumis.
// $_SERVER["REQUEST_METHOD"] est une variable superglobale qui contient la méthode de la requête HTTP.
// Elle retourne "POST" si la requête est de type POST.
// le nom dans la super global $_POST correspond à l'attribut "name" des champs du formulaire.
// La condition vérifie si la méthode de la requête est POST et si le formulaire a été soumis.
// isset($_POST[""]) vérifie si le formulaire a été soumis.
{
    require("../../service/PDO-Connexion-BDD.php"); // On inclut le fichier qui contient la connexion à la base de données via PDO.

    if(empty($_POST["email"]))
    // Si le champ mail est vide
    {
        $error["mail"] = "Veuillez entrer une adresse e-mail";
        // On ajoute un message d'erreur dans le tableau $error
    }
    else
    {
        $mail = trim($_POST["email"]);
        // retire les espaces au début et à la fin du string
        $mail = stripslashes($mail);
        // retire les \ présent dans le string.
        $mail = htmlspecialchars($mail);
        // Remplace tous les caractères spéciaux de html (<,>...) par leurs code HTML (&gt;...) afin d'empêcher toute injection de code.
        // Vérification de la validité de l'adresse e-mail
        if(strlen($mail) < 5 || strlen($mail) > 50)
        // Si la taille de l'adresse e-mail est inférieure à 5 ou supérieure à 50
        {
            $error["mail"] = "Votre adresse e-mail n'a pas une taille adaptée";
            // On ajoute un message d'erreur dans le tableau $error
        }
        elseif
        (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        // On verifie si le string $mail est une adresse e-mail valide, si ça ressemble à une adresse e-mail
        // Cela nous renvoie false si l'adresse e-mail n'est pas valide
        // filter_var est une fonction PHP qui permet de filtrer une variable.
        // FILTER_VALIDATE_EMAIL est un filtre qui permet de valider une adresse e-mail.
    {
        $error["mail"] = "Votre adresse e-mail n'est pas valide";
        // On ajoute un message d'erreur dans le tableau $error
    }
    else
    {
    // Vérification si l'adresse e-mail existe déjà
            // Je prépare ma requête
            $sql = $pdo->prepare("SELECT * FROM users WHERE email=?");
            // Je lance ma requête 
            $sql->execute([$mail]);
            // Je récupère mon résultat
            $user = $sql->fetch();
            // Si j'ai trouvé un utilisateur, alors cet email est déjà utilisé
            if($user)
            {
                $error["mail"] = "Cet email est déjà utilisé";
            }
    }
    } // ? fin vérification mail

    if(empty($_POST["password"]))
    {
        $error["motdepasse"] = "Veuillez entrer un mot de passe";
        // On ajoute un message d'erreur dans le tableau $error
    }

    else
    {
        $motdepasse = trim($_POST["password"]);
        // retire les espaces au début et à la fin du string
        // $motdepasse = stripslashes($motdepasse);
        // retire les \ présent dans le string.
        // $motdepasse = htmlspecialchars($motdepasse);
        // Remplace tous les caractères spéciaux de html (<,>...) par leurs code HTML (&gt;...) afin d'empêcher toute injection de code.
        if(strlen($motdepasse) < 8 || strlen($motdepasse) > 40)
        // Si la taille du mot de passe est inférieure à 8 ou supérieure à 40
        {
            $error["motdepasse"] = "Votre mot de passe n'a pas une taille adaptée";
            // On ajoute un message d'erreur dans le tableau $error
        }
        elseif(!preg_match('/[A-Z]/', $motdepasse) || !preg_match('/[a-z]/', $motdepasse) || !preg_match('/[0-9]/', $motdepasse) || !preg_match('/[!@#$%^&*(),.?":{}|<>+]/', $motdepasse))
        // On vérifie si le mot de passe contient au moins une majuscule, une minuscule et un chiffre et un caractère spécial.
    {
            $error["motdepasse"] = "Votre mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial";
            // On ajoute un message d'erreur dans le tableau $error
        }

    } // ? fin vérification mot de passe

    if(empty($_POST["firstname"]))
    // Si le champ prenom est vide
    {
        $error["prenom"] = "Veuillez entrer un prénom";
        // On ajoute un message d'erreur dans le tableau $error
    }
    else
    // Si le champ prenom n'est pas vide
    // On récupère la valeur du champ prenom, c'est-à-dire le prénom saisi par l'utilisateur.
    // empty retourne true si le paramètre est vide.
    {
        $prenom = trim($_POST["firstname"]);
        // retire les espaces au début et à la fin du string
        $prenom = stripslashes($prenom);
        // retire les \ présent dans le string.
        $prenom = htmlspecialchars($prenom);
        // Remplace tous les caractères spéciaux de html (<,>...) par leurs code HTML (&gt;...) afin d'empêcher toute injection de code.
        if(strlen($prenom) < 2 || strlen($prenom) > 30)
        // Si la taille du prénom est inférieure à 2 ou supérieure à 30
        {
            $error["prenom"] = "Votre prénom n'a pas une taille adaptée";
            // On ajoute un message d'erreur dans le tableau $error
        }
        elseif(!preg_match('/^[a-zA-ZÀ-ÿ\s-]+$/', $prenom))
        // On vérifie si le prénom ne contient que des lettres, des espaces et des tirets.
        // "^" signifie le début de la chaîne, "$" signifie la fin de la chaîne.
        // Donc, ensemble ^...$ veut dire : la chaîne entière doit respecter cette règle.
        // "[a-zA-ZÀ-ÿ\s-]+" signifie que la chaîne peut contenir des lettres (minuscules et majuscules), des caractères accentués, des espaces et des tirets.
    {
        $error["prenom"] = "Votre prénom ne doit contenir que des lettres, des espaces et des tirets";
        // On ajoute un message d'erreur dans le tableau $error]
    }
    } // ? fin vérification prenom

    if(empty($_POST["lastname"]))
    // Si le champ nom est vide
    // empty est une fonction PHP qui retourne true si le paramètre est vide.
    // On vérifie si le champ nom est vide, c'est-à-dire si l'utilisateur n'a pas saisi de nom.
    {
        $error["nom"]= "Veuillez entrer un nom";
        // On ajoute un message d'erreur dans le tableau $error
    } 
    else
    // Si le champ nom n'est pas vide
    {
        // TODO $nom = trim($_POST["nom"]);
        //  On récupère la valeur du champ nom, c'est-à-dire le nom saisi par l'utilisateur.
        // TODO $nom = stripcslashes($nom);
        // retire les \ présent dans le string.
        // TODO $nom = htmlspecialchars($nom);
        // Remplace tous les caractères spéciaux de html (<,>...) par leurs code HTML (&gt;...) afin d'empêcher toute injection de code.

        // ! ICI J'UTILISE LA FONCTION cleanData QUI SE TROUVE DANS LE FICHIER Forme.php
        // ! C'est un raccourci pour ajouter les trois lignes de code ci-dessus, pour gagner du temps si je dois l'écrire plusieurs fois.
        $nom = cleanData($_POST["lastname"]);
        // On nettoie les données saisies par l'utilisateur en appelant la fonction cleanData.
        if (strlen($nom) < 2 || strlen($nom) > 30)
        // On vérifie si la taille du nom est inférieure à 2 ou supérieure à 30
        {
            $error["nom"] = "Votre nom n'a pas une taille adaptée";
            // On ajoute un message d'erreur dans le tableau $error 
        }
        elseif
            (!preg_match('/^[a-zA-ZÀ-ÿ\s-]+$/', $nom))
        // On vérifie si le nom ne contient que des lettres, des espaces et des tirets.
        {
            $erro["nom"] = "Votre nom ne doit contenir que des lettres, des espaces et des tirets";
        }
        
    } // ? fin vérification nom

    if(empty($_POST["phone"]))
    // Si le champ numerotel est vide
    {
        $error["numerotel"] = "Veuillez entrer un numéro de téléphone";
        // On ajoute un message d'erreur dans le tableau $error
    }
    else
    {
        $numerotel = trim($_POST["phone"]);
        // retire les espaces au début et à la fin du string
        $numerotel = stripslashes($numerotel);
        // retire les \ présent dans le string.
        $numerotel = htmlspecialchars($numerotel);
        // Remplace tous les caractères spéciaux de html (<,>...) par leurs code HTML (&gt;...) afin d'empêcher toute injection de code.
        if(!preg_match('/^\+?[0-9\s-]+$/', $numerotel))
        // ! Décoding de la regex:
        // ? ^ signifie le début de la chaîne, $ signifie la fin de la chaîne.
        // ? Donc, ensemble ^...$ veut dire : la chaîne entière doit respecter cette règle.
        // ? \+? signifie que la chaîne peut commencer par un signe plus (+) ou ne pas en avoir.
        // ? [0-9\s-]+ signifie que la chaîne peut contenir des chiffres (0-9), des espaces (\s) et des tirets (-).
        // ? On vérifie si le numéro de téléphone ne contient que des chiffres, des espaces, des tirets et éventuellement un signe plus au début.
        {
            $error["numerotel"] = "Votre numéro de téléphone n'est pas valide";
            // On ajoute un message d'erreur dans le tableau $error
        }
    } // ? fin vérification numerotel
    if(empty($_POST["prefix"]))
    // Si le champ prefix est vide
    {
        $error["prefix"] = "Veuillez entrer un préfixe";
    }
    else
    {
    // Sinon on récupère la valeur et on la nettoie avec la fonction cleanData (à adapter selon ta logique)
    $prefix = cleanData($_POST["prefix"]);

    // Vérifie que le préfixe commence bien par un "+" suivi uniquement de chiffres (ex: +33, +1, etc.)
    if(!preg_match('/^\+\d{1,4}$/', $prefix))
    {
        $error["prefix"] = "Le préfixe doit commencer par + suivi de 1 à 4 chiffres";
    }
    }

    // GESTION DU CAPTCHA :

    // Récupération de la réponse
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
    // g-recaptcha-response : Nom automatique du champ généré par Google
    // ?? = si ça existe, prend cette valeur, sinon prend ''

    $secretKey = '6LcfPX0rAAAAACQpe0kL6-rFS4rHhMQ8z4d2byA7'; 
   // Votre clé secrète fournie par Google quand vous avez créé le captcha
   // ATTENTION : cette clé ne doit JAMAIS être visible côté client (dans le HTML)
   // Elle prouve à Google que c'est bien votre serveur qui demande la vérification

    // On appel notre fonction qui se trouve dans CAPTCHA-formulaire.php, elle permet de communiquer avec l'API Google pour vérifier la validité
    $result = verifyRecaptcha($recaptchaResponse, $secretKey);
    // verifyRecaptcha() va contacter Google et nous dire si c'est valide
    // $recaptchaResponse : Token reçu du formulaire ($_POST['g-recaptcha-response']), c'est lorsqu'on clique sur le captcha
    // $secretKey : Clé privée Google (pour authentifier votre serveur)
    // $userIp : IP de l'utilisateur (optionnel, pour analyse anti-fraude)
    // $result va contenir la réponse de Google sous forme de tableau
    // var_dump($result); die;
    if (isset($result['error'])) 
    // isset() vérifie si une clé existe dans un tableau
    // Si $result contient une clé 'error', c'est qu'il y a eu un problème technique
    // Exemples : pas d'internet, serveur Google en panne, clé secrète invalide
        $error["captcha"] = "Erreur lors de l'envoi du captcha";
    }
     elseif ($result['success'] === false) 
     // elseif = "sinon si" (vérifie une autre condition)
     // $result['success'] = réponse de Google : true si valide, false si invalide
     // === = comparaison stricte (vérifier le type ET la valeur)
     // Cette condition = "si Google dit que le captcha est faux"
     {
        $error["captcha"] = "Vous ne seriez pas un bot ?";
     }
    // ! A NE PAS OUBLIER DE FAIRE
    // ! DONC si je n'ai aucunes erreurs je peux envoyer mon mail en utilisant ma fonction "EnvoyerMail"
    // ! qui se trouve dans le fichier "PHP_Mailer.php"
    // + Envoi de mail + Insertion SQL avec PDO
    if(empty($error))
    {
        /* Création d'un token pour mon envoie de mail */
        $token = bin2hex(random_bytes(50));

        // ? Je calcule quand le token va expirer
        //! !
        $expiry_date = date('Y-m-d H:i:s', strtotime('+24 hours'));
        // strtotime('+24 hours') = ajoute 24 heures à maintenant
        // date('Y-m-d H:i:s', ...) = formate la date pour MySQL
        // Supposons qu'on soit le 15 juin 2025 à 14:30:45
        // echo time(); 
        // Résultat : 1718467845 (incompréhensible pour nous)
        // echo date('Y-m-d H:i:s', time()); 
        // Résultat : 2025-06-15 14:30:45 (lisible !)

        
        // ? Lancer une requête SQL:
        // Cela protège contre les injections SQL grâce à PDO::prepare
        $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname, email, phone, phone_prefix,password) VALUES (?, ?, ? ,?, ?, ?)");
        
        $motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);
        // Avant d’insérer le mot de passe, on le crypte avec l’algorithme par défaut de PHP (actuellement bcrypt).
        
        // Exécution de la requête avec les vraies valeurs, dans le même ordre que les "?" ci-dessus
        $stmt->execute([$prenom, $nom, $mail,$numerotel,$prefix,$motdepasse]);
        
        // ? Je récupère l'ID de l'utilisateur que je viens de créer
        // !
        $user_id = $pdo->lastInsertId();
        // lastInsertId() = me donne l'ID du dernier utilisateur inséré

        // ? J'insère le token dans la table email_confirmations
        // !
        $stmt_token = $pdo->prepare("INSERT INTO email_confirmations (user_id, confirmation_token, expiry_date) VALUES (?, ?, ?)");
        $stmt_token->execute([$user_id, $token, $expiry_date]);
        // Je lie le token à l'utilisateur que je viens de crée
        // ! Résumé : J'ajoute une table pour stocker les tokens
        // ! Quand quelqu'un s'inscrit, je crée un token et je l'envoie par email et quand quelqu'un clique sur le lien, je vérifie le token
        
        $miseEnFormMail = file_get_contents("../../../HTML/module/Mail-de-confirmation-inscription.html");
        // On récupère le contenu HTML du mail à envoyer (template prédéfini) depuis un fichier externe.

        $miseEnFormMail = str_replace('$token$', $token, $miseEnFormMail);
        // "str_replace" est une fonction PHP qui remplace du texte dans une chaine de caractères
        // * str_replace('QUOI_REMPLACER', 'PAR_QUOI', 'DANS_QUEL_TEXTE')

        EnvoyerMail($mail, "Inscription", $miseEnFormMail);
        // On envoie un mail de confirmation à l'adresse saisie, avec un sujet et le contenu HTML chargé.

        // Redirection vers la page d'accueil après l'inscription
        header('Location: /');
        exit;
        
    }


    /* 
    Je dois créer une table comme celle du password_reset je pars sur la même structure
    Ensuite fichier pour générer un token : bin2hex(random_bytes(50)) ( à ajouter au dessus)
    Lancer ma requête pour le token et insérer le token dans le mail


    */

$_SESSION["error"] = $error;
header('Location: /HTML/Compte/Creation-de-compte/Creation-Compte.php');
// var_dump($error);
// var_dump($_POST);
