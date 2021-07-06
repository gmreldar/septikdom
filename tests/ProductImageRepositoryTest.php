<?php

use App\Models\ProductImage;
use App\Repositories\ProductImageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductImageRepositoryTest extends TestCase
{
    use MakeProductImageTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProductImageRepository
     */
    protected $productImageRepo;

    public function setUp()
    {
        parent::setUp();
        $this->productImageRepo = App::make(ProductImageRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProductImage()
    {
        $productImage = $this->fakeProductImageData();
        $createdProductImage = $this->productImageRepo->create($productImage);
        $createdProductImage = $createdProductImage->toArray();
        $this->assertArrayHasKey('id', $createdProductImage);
        $this->assertNotNull($createdProductImage['id'], 'Created ProductImage must have id specified');
        $this->assertNotNull(ProductImage::find($createdProductImage['id']), 'ProductImage with given id must be in DB');
        $this->assertModelData($productImage, $createdProductImage);
    }

    /**
     * @test read
     */
    public function testReadProductImage()
    {
        $productImage = $this->makeProductImage();
        $dbProductImage = $this->productImageRepo->find($productImage->id);
        $dbProductImage = $dbProductImage->toArray();
        $this->assertModelData($productImage->toArray(), $dbProductImage);
    }

    /**
     * @test update
     */
    public function testUpdateProductImage()
    {
        $productImage = $this->makeProductImage();
        $fakeProductImage = $this->fakeProductImageData();
        $updatedProductImage = $this->productImageRepo->update($fakeProductImage, $productImage->id);
        $this->assertModelData($fakeProductImage, $updatedProductImage->toArray());
        $dbProductImage = $this->productImageRepo->find($productImage->id);
        $this->assertModelData($fakeProductImage, $dbProductImage->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProductImage()
    {
        $productImage = $this->makeProductImage();
        $resp = $this->productImageRepo->delete($productImage->id);
        $this->assertTrue($resp);
        $this->assertNull(ProductImage::find($productImage->id), 'ProductImage should not exist in DB');
    }
}
