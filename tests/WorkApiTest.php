<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorkApiTest extends TestCase
{
    use MakeWorkTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateWork()
    {
        $work = $this->fakeWorkData();
        $this->json('POST', '/api/v1/works', $work);

        $this->assertApiResponse($work);
    }

    /**
     * @test
     */
    public function testReadWork()
    {
        $work = $this->makeWork();
        $this->json('GET', '/api/v1/works/'.$work->id);

        $this->assertApiResponse($work->toArray());
    }

    /**
     * @test
     */
    public function testUpdateWork()
    {
        $work = $this->makeWork();
        $editedWork = $this->fakeWorkData();

        $this->json('PUT', '/api/v1/works/'.$work->id, $editedWork);

        $this->assertApiResponse($editedWork);
    }

    /**
     * @test
     */
    public function testDeleteWork()
    {
        $work = $this->makeWork();
        $this->json('DELETE', '/api/v1/works/'.$work->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/works/'.$work->id);

        $this->assertResponseStatus(404);
    }
}
