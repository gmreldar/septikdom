<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LicenseApiTest extends TestCase
{
    use MakeLicenseTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLicense()
    {
        $license = $this->fakeLicenseData();
        $this->json('POST', '/api/v1/licenses', $license);

        $this->assertApiResponse($license);
    }

    /**
     * @test
     */
    public function testReadLicense()
    {
        $license = $this->makeLicense();
        $this->json('GET', '/api/v1/licenses/'.$license->id);

        $this->assertApiResponse($license->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLicense()
    {
        $license = $this->makeLicense();
        $editedLicense = $this->fakeLicenseData();

        $this->json('PUT', '/api/v1/licenses/'.$license->id, $editedLicense);

        $this->assertApiResponse($editedLicense);
    }

    /**
     * @test
     */
    public function testDeleteLicense()
    {
        $license = $this->makeLicense();
        $this->json('DELETE', '/api/v1/licenses/'.$license->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/licenses/'.$license->id);

        $this->assertResponseStatus(404);
    }
}
