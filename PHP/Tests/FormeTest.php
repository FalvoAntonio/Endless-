<?php

use PHPUnit\Framework\TestCase;

// Ici on inclut le fichier qui contient les fonctions à tester
require_once __DIR__ ."/../service/Forme.php";

/** 
 * CLASSE DE TEST FormeTest
 * 
 * Cette classe hérite de TestCase (classe de base de PHPUnit)
 * Elle contient tous les tests pour vérifier que les fonctions 
 * du fichier Forme.php fonctionnent correctement
 */

// ! Explications:

// -setUP() : Prépare l'environnement avant chaque test
// -tearDown() : Nettoie après chaque test
// -testNomDeLaFonction() Méthodes de test (commencent toujours pas "test")

// ! Récap de l'utilité des fonctions :

// -cleanDate() Sécurise les données utilisateur (En supprimant les espaces,les antislashs et en convertissant les caractères spéciaux.)
// -Tokens CSRF :  Protègent contre les attaques de formulaires malveillants
// -MessagesErrorsFormulmaire() Affiche les erreurs de validation

// ? Pourquoi c'est important d'utiliser les tests ? 
// - Ces tests garantissent que mon code de sécurité fonctionne bien, si quelqu'un modifie une fonction et casse quelque chose,
// les tests le détecteront immédiatement 

class FormeTest extends TestCase
{
     /**
     * MÉTHODE setUp() - PRÉPARATION AVANT CHAQUE TEST
     * 
     * Cette méthode est automatiquement appelée AVANT chaque test
     * Elle permet de préparer l'environnement nécessaire pour les tests
     */

    protected function setUp(): void
    {
        // On vérifie si une session PHP est déjà active
        if(session_status() !== PHP_SESSION_ACTIVE)
        {
        // Si il n'y a pas de session active, on en démarre une
            session_start();
        // ? Pourquoi ? parce que nos fonctions utilisent $_SESSION pour stocker des données
        }
    }

    /**
     * MÉTHODE tearDown() - NETTOYAGE APRÈS CHAQUE TEST
     * 
     * Cette méthode est automatiquement appelée APRÈS chaque test
     * Elle permet de nettoyer l'environnement pour éviter que les tests
     * s'influencent mutuellement
     * * Imagine que tu fais 3 tests :
         * 1. Test A met dans $_SESSION["error"] = "Erreur A"
         * 2. Test B s'exécute... mais $_SESSION["error"] existe encore !
         * 3. Test B va être perturbé par les données du Test A
         * * Solution : On nettoie après chaque test pour qu'ils soient indépendants
         * C'est comme laver son assiette entre chaque repas
     * 
     * 
     */

    protected function tearDown(): void  // ! POURQUOI NE PAS L'UTILISER A CHAQUE FIN DE FONCTION ?
    // ! REVOIR L'UTILISATION DES FONCTIONS DANS LE CODE
    {
        // On vide complétement le tableau $_SESSION
        $_SESSION = [];
        // Pour que chaque test commence avec une session "propre"
        // sans cela les données d'un test pourraient affecter le suivant 
    }

      /**
     * TEST DE LA FONCTION cleanData()
     * 
     * Cette fonction teste si cleanData() nettoie correctement les données
     * En PHP, toute méthode qui commence par "test" est un test PHPUnit
     */

    public function testCleanData()
    // Ce test vérifie qie les espaces en début et fin sont supprimés et que les caractères spéciaux sont échappées
    {
        $this->assertEquals("coucou -&gt;", // Résultat attendu
         cleanData(" coucou -> "), // Fonction à tester
         "cleanData n'a pas bien filtré les données"); // Message si le test échoue

        // Explication : " coucou -> " devient "coucou -&gt;"
        // - Les espaces en début/fin sont supprimés (trim)
        // - Le ">" devient "&gt;" (htmlspecialchars)

        // Vérifier que les scripts dangereux sont neutralisés
        $this->assertNotEquals("<script>alert('hack!')</script>", // Ce qu'on ne veut pas avoir
        cleanData("<script>alert('hack!')</script>"),
        "Les données ne sont pas filtrés"); // Message d'erreur

        // Explication : cleanData() doit transformer les < et > en &lt; et &gt;
        // pour éviter l'injection de code JavaScript malveillant

        /* 
         * EXPLICATION DÉTAILLÉE :
         * 
         * Entrée : "<script>alert('hack!')</script>"
         * C'est du JavaScript malveillant qui pourrait voler des données !
         * 
         * Après cleanData() : "&lt;script&gt;alert('hack!')&lt;/script&gt;"
         *                      ↑ < devient &lt;    ↑ > devient &gt;
         * 
         * Résultat : Le script est "cassé" et ne peut plus s'exécuter
         * C'est maintenant juste du texte inoffensif !
         * 
         * assertNotEquals() vérifie que le résultat est DIFFÉRENT de l'original
         * Si c'est identique, ça veut dire que cleanData() n'a pas protégé → DANGER !
         */
    }


        /**
     * TEST DES FONCTIONS CSRF (Cross-Site Request Forgery)
     * 
     * Ces tests vérifient que les tokens CSRF fonctionnent correctement
     * Les tokens CSRF protègent contre les attaques où quelqu'un
     * pourrait soumettre des formulaires à votre place
     */

    public function testCSRFToken()
    {
        // Création d'un token CSRF on récupère la fonction du fichier "Forme.php"
        $token = creationCSRFToken();
        // On vérifie que le token est bien stocké dans la session
        $this->assertArrayHasKey("csrf_token", $_SESSION, "La clef csrf_token n'existe pas");

        // ? Détails:
        // - "csrf_token" : Clé qu'on cherche
        // - $_SESSION : Tableau ou chercher
        // - "La clef csrf_token n'existe pas" : Le message d'erreur

        /* 
         * EXPLICATION :
         * 
         * $_SESSION ressemble maintenant à ça :
         * $_SESSION = [
         *     "csrf_token" => "a1b2c3d4e5f6789012345678901234567890abcdef..."
         * ];
         * 
         * assertArrayHasKey() vérifie que la clé "csrf_token" existe dans $_SESSION
         * C'est comme vérifier qu'il y a bien une étiquette "csrf_token" sur notre boîte
         */


        // ! Vérifier que le token retourné est le même que celui en session
        $this->assertEquals($token, $_SESSION["csrf_token"],"Le token en session n'est pas le même que celui fourni");

        // ? Détails:
        // - "$token" : Token qu'on a reçu de la fonction
        // - "$_SESSION["csrf_token] : Token stocké en session
        


        // Vérifier que le token est valide est accepté
        $this->assertTrue(verifierCSRFToken($token), // C'est une fonction que doit retourner true
        "Le token n'est pas valide"); // Message si le test échoue

        /* 
         * EXPLICATION :
         * 
         * verifierCSRFToken() compare le token fourni avec celui en session
         * Si ils correspondent → true (token valide)
         * Si ils diffèrent → false (token invalide)
         * 
         * Dans notre test, on donne le BON token, donc ça doit retourner true
         * assertTrue() vérifie que la fonction retourne effectivement true
         */

        // Vérifier qu'un faux token est rejeté
        $this->assertFalse(verifierCSRFToken("banane"), // Fonction qui doit retourner un false , "banane" est un faux token
        "La fonction répond true quand elle ne devrait pas"); // Message

           /* 
         * EXPLICATION :
         * 
         * On donne un faux token ("banane") à la fonction
         * Elle doit le rejeter et retourner false
         * 
         * Si elle retourne true, c'est un BUG GRAVE !
         * Ça voudrait dire qu'elle accepte n'importe quel token
         * → Pas de protection contre les attaques !
         * 
         * assertFalse() vérifie que la fonction retourne bien false
         */
    }

    /**
     * TEST DE LA FONCTION MessagesErrorsFormulaire()
     * 
     * Cette fonction affiche les messages d'erreur pour les champs de formulaire
     * Elle utilise la session pour stocker temporairement les erreurs
     */


     /**
     * =====================================
     * TEST DE LA FONCTION MessagesErrorsFormulaire()
     * =====================================
     * 
     * Cette fonction affiche les messages d'erreur pour les champs de formulaire
     * 
     * PRINCIPE :
     * 1. Les erreurs sont stockées dans $_SESSION["error"]
     * 2. La fonction cherche l'erreur pour un champ donné
     * 3. Si trouvée, elle affiche <span class='error'>Message</span>
     * 4. Si pas trouvée, elle n'affiche rien
     */

     
    public function testMessagesErrorsFormulaire()
    {
        // Simuler une erreur dans la session (pour le formulaire)
        $message = "Ceci est un test"; // Message d'erreur fictif
        $error = []; // Tableau d'erreur vide
        $error["test"] = $message; // Erreur pour le champ "test"
        $_SESSION["error"] = $error; // Stocker l'erreur en session, Fait référence au fichier Forme.php

        // ! Besoin d'explication du ob_start QUEL HTML ? $html = "Ceci est capturé<span class='error'>Ceci est un test</span>Ceci aussi est capturé";
        ob_start(); // Commencer à capturer la sortie HTML : On peut "attraper" le HTML et le tester sinon il serait affiché directement sur la page
        MessagesErrorsFormulaire("test"); // Appeler la fonction
        $html = ob_get_clean(); // Récupérer le HTML généré et arrêter la capture 

        // $this->assertEquals("<span class='error'>$message</span>",$html, "Le html ne correspond pas à ce qui devrait s'afficher");

        // V"rifier que le HTML contient bien le message d'erreur
        $this->assertStringContainsString($message, $html, "Le html ne contient pas le message d'erreur");

        ob_start();
        MessagesErrorsFormulaire("banane");
        $html2 = ob_get_clean();

        $this->assertEmpty($html2, "Le html devrait être vide mais ne l'est pas.");
    }
}

// Pour vérifier si le test fonctionne je tape ça dans le terminale (PHP) "./vendor/bin/phpunit ./Tests"
// Sinon il est ajouté dans le fichier composer.json en tapant juste "composer Tests
/* 
Dans composer.json :
"scripts": {
        "tests": "./vendor/bin/phpunit ./Tests"
    }

*/



/**
 * COMMENT LANCER LES TESTS ?
 * 
 * Méthode 1 : Directement avec PHPUnit
 * ./vendor/bin/phpunit ./Tests
 * 
 * Méthode 2 : Via Composer (plus pratique)
 * composer tests
 * 
 * Pour la méthode 2, il faut ajouter ceci dans composer.json :
 * "scripts": {
 *     "tests": "./vendor/bin/phpunit ./Tests"
 * }
 */

/**
 * TYPES D'ASSERTIONS UTILISÉES DANS CE FICHIER :
 * 
 * assertEquals($attendu, $reel, $message)
 * - Vérifie que deux valeurs sont égales
 * 
 * assertNotEquals($nonAttendu, $reel, $message)
 * - Vérifie que deux valeurs sont différentes
 * 
 * assertArrayHasKey($cle, $tableau, $message)
 * - Vérifie qu'une clé existe dans un tableau
 * 
 * assertTrue($condition, $message)
 * - Vérifie qu'une condition est vraie
 * 
 * assertFalse($condition, $message)
 * - Vérifie qu'une condition est fausse
 * 
 * assertStringContainsString($needle, $haystack, $message)
 * - Vérifie qu'une chaîne contient un texte spécifique
 * 
 * assertEmpty($valeur, $message)
 * - Vérifie qu'une valeur est vide
 */