<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChessMoveControllerTest extends WebTestCase
{
    public function testMoveLegal()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/chess/move', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'pieceType' => 'pawn',
            'from' => 'a2',
            'to' => 'a3',
        ]));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains("body",'Déplacement effectué.');
    }

    public function testMoveIllegal()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/chess/move', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'pieceType' => 'pawn',
            'from' => 'a2',
            'to' => 'a4',
        ]));

        $this->assertResponseStatusCodeSame(400);
        $this->assertSelectorTextContains("body",'Déplacement illégal.');
    }
}
