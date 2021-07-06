<?php

use App\Models\License;
use App\Repositories\LicenseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LicenseRepositoryTest extends TestCase
{
    use MakeLicenseTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LicenseRepository
     */
    protected $licenseRepo;

    public function setUp()
    {
        parent::setUp();
        $this->licenseRepo = App::make(LicenseRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLicense()
    {
        $license = $this->fakeLicenseData();
        $createdLicense = $this->licenseRepo->create($license);
        $createdLicense = $createdLicense->toArray();
        $this->assertArrayHasKey('id', $createdLicense);
        $this->assertNotNull($createdLicense['id'], 'Created License must have id specified');
        $this->assertNotNull(License::find($createdLicense['id']), 'License with given id must be in DB');
        $this->assertModelData($license, $createdLicense);
    }

    /**
     * @test read
     */
    public function testReadLicense()
    {
        $license = $this->makeLicense();
        $dbLicense = $this->licenseRepo->find($license->id);
        $dbLicense = $dbLicense->toArray();
        $this->assertModelData($license->toArray(), $dbLicense);
    }

    /**
     * @test update
     */
    public function testUpdateLicense()
    {
        $license = $this->makeLicense();
        $fakeLicense = $this->fakeLicenseData();
        $updatedLicense = $this->licenseRepo->update($fakeLicense, $license->id);
        $this->assertModelData($fakeLicense, $updatedLicense->toArray());
        $dbLicense = $this->licenseRepo->find($license->id);
        $this->assertModelData($fakeLicense, $dbLicense->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLicense()
    {
        $license = $this->makeLicense();
        $resp = $this->licenseRepo->delete($license->id);
        $this->assertTrue($resp);
        $this->assertNull(License::find($license->id), 'License should not exist in DB');
    }
}
