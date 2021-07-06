<?php

use App\Models\ProductCategory;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductCategoryRepositoryTest extends TestCase
{
    use MakeProductCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProductCategoryRepository
     */
    protected $productCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->productCategoryRepo = App::make(ProductCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProductCategory()
    {
        $productCategory = $this->fakeProductCategoryData();
        $createdProductCategory = $this->productCategoryRepo->create($productCategory);
        $createdProductCategory = $createdProductCategory->toArray();
        $this->assertArrayHasKey('id', $createdProductCategory);
        $this->assertNotNull($createdProductCategory['id'], 'Created ProductCategory must have id specified');
        $this->assertNotNull(ProductCategory::find($createdProductCategory['id']), 'ProductCategory with given id must be in DB');
        $this->assertModelData($productCategory, $createdProductCategory);
    }

    /**
     * @test read
     */
    public function testReadProductCategory()
    {
        $productCategory = $this->makeProductCategory();
        $dbProductCategory = $this->productCategoryRepo->find($productCategory->id);
        $dbProductCategory = $dbProductCategory->toArray();
        $this->assertModelData($productCategory->toArray(), $dbProductCategory);
    }

    /**
     * @test update
     */
    public function testUpdateProductCategory()
    {
        $productCategory = $this->makeProductCategory();
        $fakeProductCategory = $this->fakeProductCategoryData();
        $updatedProductCategory = $this->productCategoryRepo->update($fakeProductCategory, $productCategory->id);
        $this->assertModelData($fakeProductCategory, $updatedProductCategory->toArray());
        $dbProductCategory = $this->productCategoryRepo->find($productCategory->id);
        $this->assertModelData($fakeProductCategory, $dbProductCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProductCategory()
    {
        $productCategory = $this->makeProductCategory();
        $resp = $this->productCategoryRepo->delete($productCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(ProductCategory::find($productCategory->id), 'ProductCategory should not exist in DB');
    }
}
