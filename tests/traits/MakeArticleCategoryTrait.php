<?php

use Faker\Factory as Faker;
use App\Models\ArticleCategory;
use App\Repositories\ArticleCategoryRepository;

trait MakeArticleCategoryTrait
{
    /**
     * Create fake instance of ArticleCategory and save it in database
     *
     * @param array $articleCategoryFields
     * @return ArticleCategory
     */
    public function makeArticleCategory($articleCategoryFields = [])
    {
        /** @var ArticleCategoryRepository $articleCategoryRepo */
        $articleCategoryRepo = App::make(ArticleCategoryRepository::class);
        $theme = $this->fakeArticleCategoryData($articleCategoryFields);
        return $articleCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of ArticleCategory
     *
     * @param array $articleCategoryFields
     * @return ArticleCategory
     */
    public function fakeArticleCategory($articleCategoryFields = [])
    {
        return new ArticleCategory($this->fakeArticleCategoryData($articleCategoryFields));
    }

    /**
     * Get fake data of ArticleCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeArticleCategoryData($articleCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'link' => $fake->word,
            'ord' => $fake->randomDigitNotNull,
            'title' => $fake->word,
            'description' => $fake->word,
            'keywords' => $fake->word,
            'is_active' => $fake->word,
            'likes' => $fake->randomDigitNotNull,
            'views' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $articleCategoryFields);
    }
}
