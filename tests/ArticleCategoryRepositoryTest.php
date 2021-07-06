<?php

use App\Models\ArticleCategory;
use App\Repositories\ArticleCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleCategoryRepositoryTest extends TestCase
{
    use MakeArticleCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ArticleCategoryRepository
     */
    protected $articleCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->articleCategoryRepo = App::make(ArticleCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateArticleCategory()
    {
        $articleCategory = $this->fakeArticleCategoryData();
        $createdArticleCategory = $this->articleCategoryRepo->create($articleCategory);
        $createdArticleCategory = $createdArticleCategory->toArray();
        $this->assertArrayHasKey('id', $createdArticleCategory);
        $this->assertNotNull($createdArticleCategory['id'], 'Created ArticleCategory must have id specified');
        $this->assertNotNull(ArticleCategory::find($createdArticleCategory['id']), 'ArticleCategory with given id must be in DB');
        $this->assertModelData($articleCategory, $createdArticleCategory);
    }

    /**
     * @test read
     */
    public function testReadArticleCategory()
    {
        $articleCategory = $this->makeArticleCategory();
        $dbArticleCategory = $this->articleCategoryRepo->find($articleCategory->id);
        $dbArticleCategory = $dbArticleCategory->toArray();
        $this->assertModelData($articleCategory->toArray(), $dbArticleCategory);
    }

    /**
     * @test update
     */
    public function testUpdateArticleCategory()
    {
        $articleCategory = $this->makeArticleCategory();
        $fakeArticleCategory = $this->fakeArticleCategoryData();
        $updatedArticleCategory = $this->articleCategoryRepo->update($fakeArticleCategory, $articleCategory->id);
        $this->assertModelData($fakeArticleCategory, $updatedArticleCategory->toArray());
        $dbArticleCategory = $this->articleCategoryRepo->find($articleCategory->id);
        $this->assertModelData($fakeArticleCategory, $dbArticleCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteArticleCategory()
    {
        $articleCategory = $this->makeArticleCategory();
        $resp = $this->articleCategoryRepo->delete($articleCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(ArticleCategory::find($articleCategory->id), 'ArticleCategory should not exist in DB');
    }
}
