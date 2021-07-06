<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductCategoryApiTest extends TestCase
{
    use MakeProductCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProductCategory()
    {
        $productCategory = $this->fakeProductCategoryData();
        $this->json('POST', '/api/v1/productCategories', $productCategory);

        $this->assertApiResponse($productCategory);
    }

    /**
     * @test
     */
    public function testReadProductCategory()
    {
        $productCategory = $this->makeProductCategory();
        $this->json('GET', '/api/v1/productCategories/'.$productCategory->id);

        $this->assertApiResponse($productCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProductCategory()
    {
        $productCategory = $this->makeProductCategory();
        $editedProductCategory = $this->fakeProductCategoryData();

        $this->json('PUT', '/api/v1/productCategories/'.$productCategory->id, $editedProductCategory);

        $this->assertApiResponse($editedProductCategory);
    }

    /**
     * @test
     */
    public function testDeleteProductCategory()
    {
        $productCategory = $this->makeProductCategory();
        $this->json('DELETE', '/api/v1/productCategories/'.$productCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/productCategories/'.$productCategory->id);

        $this->assertResponseStatus(404);
    }
}
