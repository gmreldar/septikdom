<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductImageApiTest extends TestCase
{
    use MakeProductImageTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProductImage()
    {
        $productImage = $this->fakeProductImageData();
        $this->json('POST', '/api/v1/productImages', $productImage);

        $this->assertApiResponse($productImage);
    }

    /**
     * @test
     */
    public function testReadProductImage()
    {
        $productImage = $this->makeProductImage();
        $this->json('GET', '/api/v1/productImages/'.$productImage->id);

        $this->assertApiResponse($productImage->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProductImage()
    {
        $productImage = $this->makeProductImage();
        $editedProductImage = $this->fakeProductImageData();

        $this->json('PUT', '/api/v1/productImages/'.$productImage->id, $editedProductImage);

        $this->assertApiResponse($editedProductImage);
    }

    /**
     * @test
     */
    public function testDeleteProductImage()
    {
        $productImage = $this->makeProductImage();
        $this->json('DELETE', '/api/v1/productImages/'.$productImage->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/productImages/'.$productImage->id);

        $this->assertResponseStatus(404);
    }
}
