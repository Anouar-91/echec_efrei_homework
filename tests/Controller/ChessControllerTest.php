<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChessControllerTest extends WebTestCase
{
    public function testShowBoard()
    {
        $client = static::createClient();
        
        // Simule une requête HTTP GET vers la route du contrôleur
        $client->request('GET', '/chess/board');
        
        // Vérifie que la réponse est un succès
        $this->assertResponseIsSuccessful();
        
        // Vérifie que la réponse contient le texte attendu
        $this->assertSelectorTextContains('body','Affichage de l\'échiquier');
    }
}