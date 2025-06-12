-- Création de la base de données (si elle n'existe pas déjà)
CREATE DATABASE IF NOT EXISTS endless_db;
--  Cette ligne crée une nouvelle base de données appelée "endless_db" si elle n'existe pas déjà.
--  C'est comme créer un nouveau classeur vide qui contiendra toutes nos tables.

USE endless_db; 
-- ! Je reprends endless_db pour le PDO
-- Cette ligne indique à MySQL d'utiliser la base de données "endless_db" pour toutes les commandes suivantes.
--  C'est comme ouvrir ce classeur pour y travailler.

-- Table des utilisateurs
CREATE TABLE IF NOT EXISTS users (
    -- Nous commençons à créer une nouvelle table nommée "users"
    -- si elle n'existe pas déjà. Cette table va stocker les informations de tous les utilisateurs du site.
    id INT AUTO_INCREMENT PRIMARY KEY, 
    -- La colonne "id" est un nombre entier qui s'incrémente automatiquement (commence à 1, puis 2, 3, etc.)
    -- pour chaque nouvel utilisateur. PRIMARY KEY indique que c'est l'identifiant unique de chaque utilisateur.
    email VARCHAR(100) NOT NULL UNIQUE,
    -- Explication : La colonne "email" stocke l'adresse email de l'utilisateur.
    -- VARCHAR(100) : peut contenir jusqu'à 100 caractères
    -- NOT NULL : ce champ doit obligatoirement être rempli
    -- UNIQUE : deux utilisateurs ne peuvent pas avoir le même email
    password VARCHAR(255) NOT NULL,
    -- Stocke le mot de passe crypté de l'utilisateur. On utilise VARCHAR(255) car les mots de passe cryptés sont généralement longs.
    -- Supposons que votre mot de passe soit motdepasse123
    -- Mot de passe original : motdepasse123
    -- Mot de passe crypté : $2y$10$h.KxQEIH7VH5j6HM1x3NLOov0BYA7VT.NXxmNL1YkTk.YPYPjQlA6
    -- Comme vous pouvez le voir, le mot de passe crypté est complètement différent et illisible !
    -- Imaginez que votre base de données soit piratée. Si les mots de passe sont stockés en clair (non cryptés), le pirate peut :
    -- - Voir les mots de passe
    -- - Se connecter à tous les comptes
    -- - Utilisr ces mots de passe sur d'autres sites
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    -- Stocke le prénom et le nom de l'utilisateur. Chaque champ peut contenir jusqu'à 50 caractères et ne peut pas être vide.
    phone VARCHAR(20) NOT NULL,
    phone_prefix VARCHAR(10) NOT NULL,
    -- Stocke le numéro de téléphone et son préfixe international (comme +33 pour la France).
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    -- Enregistre automatiquement la date et l'heure auxquelles l'utilisateur s'est inscrit.
    -- DEFAULT CURRENT_TIMESTAMP signifie que si aucune valeur n'est spécifiée, le système utilisera la date et l'heure actuelles
    last_login TIMESTAMP NULL,
    --  Stocke la date et l'heure de la dernière connexion de l'utilisateur.
    --  NULL signifie que ce champ peut être vide (par exemple, si l'utilisateur ne s'est jamais connecté).
    role ENUM('user', 'admin') DEFAULT 'user'
    -- Définit le rôle de l'utilisateur. ENUM signifie que seules deux valeurs sont autorisées :
    -- 'utilisateur' ou 'administrateur'. Par défaut, chaque nouveau compte est un 'utilisateur'.
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Termine la définition de la table.
-- ENGINE=InnoDB : utilise le moteur InnoDB qui supporte les clés étrangères
-- CHARSET=utf8mb4 : permet de stocker des caractères spéciaux, accents, émojis, etc.


-- Table des formations
CREATE TABLE IF NOT EXISTS formations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- Comme pour la table utilisateurs, chaque formation aura un identifiant unique qui s'incrémente automatiquement.
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    content TEXT NOT NULL,
--  titre : Le nom de la formation (max 100 caractères)
-- description : Un court résumé de la formation
-- contenu : Description détaillée de la formation
-- TEXT permet de stocker des textes plus longs que VARCHAR.
    duration VARCHAR(50) NOT NULL,
    -- La durée de la formation (ex: "1H30 à 2H").
    price DECIMAL(10, 2) NOT NULL,
    discount_price DECIMAL(10, 2) NULL,
    -- prix : Le prix normal de la formation
-- prix_reduit : Le prix en promotion (peut être NULL si pas de promotion)
-- DECIMAL(10, 2) signifie un nombre avec jusqu'à 10 chiffres au total, dont 2 après la virgule (ex: 1234567.89).
    image_path VARCHAR(255) NOT NULL,
--  Le chemin vers l'image de la formation (ex: "/Endless-/Images/...").
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- Enregistre automatiquement quand la formation a été ajoutée au système.
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table des achats de formations
CREATE TABLE IF NOT EXISTS purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    formation_id INT NOT NULL,
-- id : Identifiant unique pour chaque achat
-- id_utilisateur : Identifie quel utilisateur a fait l'achat
-- id_formation : Identifie quelle formation a été achetée
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
-- Enregistre automatiquement quand l'achat a été effectué.
    price_paid DECIMAL(10, 2) NOT NULL,
-- Le montant payé par l'utilisateur (peut être différent du prix normal si promotion).
    payment_status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
-- L'état du paiement. Seules trois valeurs sont possibles :
-- en_attente : Paiement en cours de traitement
-- complete : Paiement réussi
-- echoue : Paiement échoué
    payment_method VARCHAR(50) NOT NULL,
--  Comment l'utilisateur a payé (ex: "carte bancaire", "PayPal").
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
-- Cette ligne crée un lien (relation) entre cette table et la table utilisateurs.

-- FOREIGN KEY : Indique que id_utilisateur est une clé étrangère
-- REFERENCES utilisateurs(id) : Elle fait référence à la colonne id de la table utilisateurs
-- ON DELETE CASCADE : Si un utilisateur est supprimé, tous ses achats seront également supprimés
    FOREIGN KEY (formation_id) REFERENCES formations(id) ON DELETE RESTRICT
-- Crée un lien avec la table formations
-- ON DELETE RESTRICT : Empêche la suppression d'une formation si elle a déjà été achetée par quelqu'un
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table des modules de formation
CREATE TABLE IF NOT EXISTS modules (
    id INT AUTO_INCREMENT PRIMARY KEY,
--     id = Le nom de la colonne
-- INT = Le type de données (Integer = nombre entier)
-- AUTO_INCREMENT = Se incrémente automatiquement
-- PRIMARY KEY = Clé primaire (identifiant unique)
    -- INT signifie "Integer" (nombre entier)
    formation_id INT NOT NULL,
    -- Chaque module appartient à une formation spécifique.
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    order_number INT NOT NULL,
    -- L'ordre dans lequel les modules doivent être présentés (1, 2, 3, etc.).
    video_path VARCHAR(255) NULL,
    -- Le chemin vers la vidéo du module. Peut être NULL si la vidéo n'est pas encore disponible.
    FOREIGN KEY (formation_id) REFERENCES formations(id) ON DELETE CASCADE
    --  Si une formation est supprimée, tous ses modules seront également supprimés.
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table de progression des utilisateurs
CREATE TABLE IF NOT EXISTS user_progress (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    module_id INT NOT NULL,
    completed BOOLEAN DEFAULT FALSE,
    last_viewed TIMESTAMP NULL,
    viewing_time INT DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (module_id) REFERENCES modules(id) ON DELETE CASCADE,
    UNIQUE KEY user_module (user_id, module_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des paniers
CREATE TABLE IF NOT EXISTS carts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des éléments du panier
CREATE TABLE IF NOT EXISTS cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT NOT NULL,
    formation_id INT NOT NULL,
    added_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cart_id) REFERENCES carts(id) ON DELETE CASCADE,
    FOREIGN KEY (formation_id) REFERENCES formations(id) ON DELETE CASCADE,
    UNIQUE KEY cart_formation (cart_id, formation_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table pour les réinitalisations de mot de passe
CREATE TABLE IF NOT EXISTS password_reset (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    reset_token VARCHAR(255) NOT NULL,
    expiry_date TIMESTAMP NOT NULL,
    used BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Données initiales pour les formations (basées sur votre page d'accueil)
INSERT INTO formations (title, description, content, duration, price, discount_price, image_path) VALUES
('Manucure Russe', 'Gainage + couleur sous cuticule', 'Apprenez les techniques professionnelles de la manucure russe', '1H30 à 2H', 150.00, NULL, '/Endless-/Images/Photos Accueil/IMG_3652.jpeg'),
('Extension Gel X', 'Techniques d''extension Gel X', 'Maîtrisez les extensions Gel X pour des ongles parfaits', '2H à 2H30', 200.00, NULL, '/Endless-/Images/Photos Accueil/IMG_3653.jpeg'),
('Beauté des pieds', 'Pédicure russe + gainage', 'Découvrez les secrets d''une pédicure professionnelle', '1H30 à 2H', 180.00, NULL, '/Endless-/Images/Photos Accueil/IMG_3654.jpeg'),
('Soin anti-callosité des pieds', 'Traitement & soin des callosités', 'Techniques efficaces pour éliminer les callosités', '1H à 1H30', 120.00, NULL, '/Endless-/Images/Photos Accueil/IMG_3655.jpeg'),
('PACK COMPLET', 'Tous les modules en un seul achat', 'Accédez à toutes nos formations à prix réduit', 'Environ 8H', 500.00, 450.00, '/Endless-/Images/Photos Accueil/IMG_3656.jpeg');

-- Création d'un compte administrateur pour gérer le site (mot de passe: admin123)
-- Note: En production, utilisez un mot de passe fort et sécurisé!
INSERT INTO users (email, password, firstname, lastname, phone, phone_prefix, role) VALUES
('admin@nailsendlessbeauty.fr', '$2y$10$h.KxQEIH7VH5j6HM1x3NLOov0BYA7VT.NXxmNL1YkTk.YPYPjQlA6', 'Admin', 'Nails', '123456789', '+33', 'admin');


--  + COMPREHENSION DE NULL et NOT_NULL :

-- Qu'est-ce que NULL ?
-- NULL signifie "vide", "rien", "aucune valeur", "inconnu" ou "non renseigné". C'est différent de zéro (0) ou d'une chaîne vide ("").

-- Imaginez un formulaire papier :

-- NULL = case laissée complètement vide
-- Chaîne vide ("") = case où vous avez écrit mais effacé tout
-- Zéro (0) = case où vous avez écrit "0"

-- Exemple concret : 
-- Formations avec prix réduit

-- CREATE TABLE formations (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     titre VARCHAR(100) NOT NULL,      -- Obligatoire
--     prix DECIMAL(10, 2) NOT NULL,     -- Obligatoire
--     prix_reduit DECIMAL(10, 2) NULL   -- Optionnel
-- );

-- Formation sans promotion : 
-- INSERT INTO formations (titre, prix) 
-- VALUES ('Manucure Russe', 150.00);

-- id      titre                   prix            prix reduit
-- 1       Manucure Russe          150€            NULL

-- Cette formation n'a pas de prix réduit, donc prix_reduit est NULL


-- Maintenant voyons avec une formation avec promotion :

-- INSERT INTO formations (titre, prix, prix_reduit) 
-- VALUES ('Pack Complet', 500.00, 450.00);

-- id              titre                   prix                    prix_reduit
-- 1               Manucure Russe          150.00                  NULL
-- 2               Pack Complet            500.00                  450.00


-- Le Pack Complet a une promotion, donc prix_reduit a une vraie valeur.
-- Quand vous mettez NOT NULL, cela signifie que ce champ DOIT toujours avoir une valeur.


