<?php

use Faker\Factory as Faker;
use App\Models\Product;
use App\Repositories\ProductRepository;

trait MakeProductTrait
{
    /**
     * Create fake instance of Product and save it in database
     *
     * @param array $productFields
     * @return Product
     */
    public function makeProduct($productFields = [])
    {
        /** @var ProductRepository $productRepo */
        $productRepo = App::make(ProductRepository::class);
        $theme = $this->fakeProductData($productFields);
        return $productRepo->create($theme);
    }

    /**
     * Get fake instance of Product
     *
     * @param array $productFields
     * @return Product
     */
    public function fakeProduct($productFields = [])
    {
        return new Product($this->fakeProductData($productFields));
    }

    /**
     * Get fake data of Product
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProductData($productFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'product_category_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'link' => $fake->word,
            'text' => $fake->text,
            'image' => $fake->word,
            'title' => $fake->word,
            'description' => $fake->word,
            'keywords' => $fake->word,
            'sort' => $fake->randomDigitNotNull,
            'montazh' => $fake->text,
            'pesok' => $fake->randomDigitNotNull,
            'suglinok' => $fake->randomDigitNotNull,
            'glina' => $fake->randomDigitNotNull,
            'plyvun' => $fake->randomDigitNotNull,
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $productFields);
    }
}
