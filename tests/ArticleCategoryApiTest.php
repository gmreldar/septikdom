<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleCategoryApiTest extends TestCase
{
    use MakeArticleCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateArticleCategory()
    {
        $articleCategory = $this->fakeArticleCategoryData();
        $this->json('POST', '/api/v1/articleCategories', $articleCategory);

        $this->assertApiResponse($articleCategory);
    }

    /**
     * @test
     */
    public function testReadArticleCategory()
    {
        $articleCategory = $this->makeArticleCategory();
        $this->json('GET', '/api/v1/articleCategories/'.$articleCategory->id);

        $this->assertApiResponse($articleCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateArticleCategory()
    {
        $articleCategory = $this->makeArticleCategory();
        $editedArticleCategory = $this->fakeArticleCategoryData();

        $this->json('PUT', '/api/v1/articleCategories/'.$articleCategory->id, $editedArticleCategory);

        $this->assertApiResponse($editedArticleCategory);
    }

    /**
     * @test
     */
    public function testDeleteArticleCategory()
    {
        $articleCategory = $this->makeArticleCategory();
        $this->json('DELETE', '/api/v1/articleCategories/'.$articleCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/articleCategories/'.$articleCategory->id);

        $this->assertResponseStatus(404);
    }
}
