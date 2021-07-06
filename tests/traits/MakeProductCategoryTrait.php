<?php

use Faker\Factory as Faker;
use App\Models\ProductCategory;
use App\Repositories\ProductCategoryRepository;

trait MakeProductCategoryTrait
{
    /**
     * Create fake instance of ProductCategory and save it in database
     *
     * @param array $productCategoryFields
     * @return ProductCategory
     */
    public function makeProductCategory($productCategoryFields = [])
    {
        /** @var ProductCategoryRepository $productCategoryRepo */
        $productCategoryRepo = App::make(ProductCategoryRepository::class);
        $theme = $this->fakeProductCategoryData($productCategoryFields);
        return $productCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of ProductCategory
     *
     * @param array $productCategoryFields
     * @return ProductCategory
     */
    public function fakeProductCategory($productCategoryFields = [])
    {
        return new ProductCategory($this->fakeProductCategoryData($productCategoryFields));
    }

    /**
     * Get fake data of ProductCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProductCategoryData($productCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'parents_id' => $fake->randomDigitNotNull,
            'level' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'link' => $fake->word,
            'position' => $fake->randomDigitNotNull,
            'image' => $fake->word,
            'text' => $fake->text,
            'annotation' => $fake->text,
            'title' => $fake->word,
            'description' => $fake->word,
            'keywords' => $fake->word,
            'public' => $fake->word,
            'lastmod' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $productCategoryFields);
    }
}
