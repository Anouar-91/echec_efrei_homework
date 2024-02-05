<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameControllerTest extends WebTestCase
{
    public function testStart()
    {
        $client = static::createClient();
        
        // Simule une requête HTTP GET vers la route /game/start
        $crawler = $client->request('GET', '/game/start');
        
        // Vérifie que la réponse est un succès (code HTTP 200)
        $this->assertResponseIsSuccessful();
        
        // Vérifier que la réponse contient un texte spécifique
        $this->assertSelectorTextContains('html', 'Nouvelle partie d\'échecs démarrée avec succès !');
    }
}
