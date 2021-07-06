<?php

use App\Models\Modification;
use App\Repositories\ModificationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModificationRepositoryTest extends TestCase
{
    use MakeModificationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ModificationRepository
     */
    protected $modificationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->modificationRepo = App::make(ModificationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateModification()
    {
        $modification = $this->fakeModificationData();
        $createdModification = $this->modificationRepo->create($modification);
        $createdModification = $createdModification->toArray();
        $this->assertArrayHasKey('id', $createdModification);
        $this->assertNotNull($createdModification['id'], 'Created Modification must have id specified');
        $this->assertNotNull(Modification::find($createdModification['id']), 'Modification with given id must be in DB');
        $this->assertModelData($modification, $createdModification);
    }

    /**
     * @test read
     */
    public function testReadModification()
    {
        $modification = $this->makeModification();
        $dbModification = $this->modificationRepo->find($modification->id);
        $dbModification = $dbModification->toArray();
        $this->assertModelData($modification->toArray(), $dbModification);
    }

    /**
     * @test update
     */
    public function testUpdateModification()
    {
        $modification = $this->makeModification();
        $fakeModification = $this->fakeModificationData();
        $updatedModification = $this->modificationRepo->update($fakeModification, $modification->id);
        $this->assertModelData($fakeModification, $updatedModification->toArray());
        $dbModification = $this->modificationRepo->find($modification->id);
        $this->assertModelData($fakeModification, $dbModification->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteModification()
    {
        $modification = $this->makeModification();
        $resp = $this->modificationRepo->delete($modification->id);
        $this->assertTrue($resp);
        $this->assertNull(Modification::find($modification->id), 'Modification should not exist in DB');
    }
}
