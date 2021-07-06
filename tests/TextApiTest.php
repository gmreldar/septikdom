<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TextApiTest extends TestCase
{
    use MakeTextTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateText()
    {
        $text = $this->fakeTextData();
        $this->json('POST', '/api/v1/texts', $text);

        $this->assertApiResponse($text);
    }

    /**
     * @test
     */
    public function testReadText()
    {
        $text = $this->makeText();
        $this->json('GET', '/api/v1/texts/'.$text->id);

        $this->assertApiResponse($text->toArray());
    }

    /**
     * @test
     */
    public function testUpdateText()
    {
        $text = $this->makeText();
        $editedText = $this->fakeTextData();

        $this->json('PUT', '/api/v1/texts/'.$text->id, $editedText);

        $this->assertApiResponse($editedText);
    }

    /**
     * @test
     */
    public function testDeleteText()
    {
        $text = $this->makeText();
        $this->json('DELETE', '/api/v1/texts/'.$text->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/texts/'.$text->id);

        $this->assertResponseStatus(404);
    }
}
