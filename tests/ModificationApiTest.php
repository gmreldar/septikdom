<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModificationApiTest extends TestCase
{
    use MakeModificationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateModification()
    {
        $modification = $this->fakeModificationData();
        $this->json('POST', '/api/v1/modifications', $modification);

        $this->assertApiResponse($modification);
    }

    /**
     * @test
     */
    public function testReadModification()
    {
        $modification = $this->makeModification();
        $this->json('GET', '/api/v1/modifications/'.$modification->id);

        $this->assertApiResponse($modification->toArray());
    }

    /**
     * @test
     */
    public function testUpdateModification()
    {
        $modification = $this->makeModification();
        $editedModification = $this->fakeModificationData();

        $this->json('PUT', '/api/v1/modifications/'.$modification->id, $editedModification);

        $this->assertApiResponse($editedModification);
    }

    /**
     * @test
     */
    public function testDeleteModification()
    {
        $modification = $this->makeModification();
        $this->json('DELETE', '/api/v1/modifications/'.$modification->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/modifications/'.$modification->id);

        $this->assertResponseStatus(404);
    }
}
