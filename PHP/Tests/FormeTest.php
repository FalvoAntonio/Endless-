<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ ."/../service/Forme.php";

class FormeTest extends TestCase
{
    protected function setUp(): void
    {
        if(session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
    }
    protected function tearDown(): void
    {
        $_SESSION = [];
    }
    public function testCleanData()
    {
        $this->assertEquals("coucou -&gt;", cleanData(" coucou -> "), "cleanData n'a pas bien filtré les données");
        $this->assertNotEquals("<script>alert('hack!')</script>", cleanData("<script>alert('hack!')</script>"), "Les données ne sont pas filtrés");
    }
    public function testCSRFToken()
    {
        $token = creationCSRFToken();
        $this->assertArrayHasKey("csrf_token", $_SESSION, "La clef csrf_token n'existe pas");
        $this->assertEquals($token, $_SESSION["csrf_token"], "Le token en session n'est pas le même que celui fourni");

        $this->assertTrue(verifierCSRFToken($token), "Le token n'est pas valide");
        $this->assertFalse(verifierCSRFToken("banane"), "La fonction répond true quand elle ne devrait pas");
    }
    public function testMessagesErrorsFormulaire()
    {
        $message = "Ceci est un test";
        $error = [];
        $error["test"] = $message;
        $_SESSION["error"] = $error;

        ob_start();
        MessagesErrorsFormulaire("test");
        $html = ob_get_clean();

        // $this->assertEquals("<span class='error'>$message</span>",$html, "Le html ne correspond pas à ce qui devrait s'afficher");
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