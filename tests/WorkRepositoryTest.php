<?php

use App\Models\Work;
use App\Repositories\WorkRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorkRepositoryTest extends TestCase
{
    use MakeWorkTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var WorkRepository
     */
    protected $workRepo;

    public function setUp()
    {
        parent::setUp();
        $this->workRepo = App::make(WorkRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateWork()
    {
        $work = $this->fakeWorkData();
        $createdWork = $this->workRepo->create($work);
        $createdWork = $createdWork->toArray();
        $this->assertArrayHasKey('id', $createdWork);
        $this->assertNotNull($createdWork['id'], 'Created Work must have id specified');
        $this->assertNotNull(Work::find($createdWork['id']), 'Work with given id must be in DB');
        $this->assertModelData($work, $createdWork);
    }

    /**
     * @test read
     */
    public function testReadWork()
    {
        $work = $this->makeWork();
        $dbWork = $this->workRepo->find($work->id);
        $dbWork = $dbWork->toArray();
        $this->assertModelData($work->toArray(), $dbWork);
    }

    /**
     * @test update
     */
    public function testUpdateWork()
    {
        $work = $this->makeWork();
        $fakeWork = $this->fakeWorkData();
        $updatedWork = $this->workRepo->update($fakeWork, $work->id);
        $this->assertModelData($fakeWork, $updatedWork->toArray());
        $dbWork = $this->workRepo->find($work->id);
        $this->assertModelData($fakeWork, $dbWork->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteWork()
    {
        $work = $this->makeWork();
        $resp = $this->workRepo->delete($work->id);
        $this->assertTrue($resp);
        $this->assertNull(Work::find($work->id), 'Work should not exist in DB');
    }
}
