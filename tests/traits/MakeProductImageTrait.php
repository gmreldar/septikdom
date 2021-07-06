<?php

use Faker\Factory as Faker;
use App\Models\ProductImage;
use App\Repositories\ProductImageRepository;

trait MakeProductImageTrait
{
    /**
     * Create fake instance of ProductImage and save it in database
     *
     * @param array $productImageFields
     * @return ProductImage
     */
    public function makeProductImage($productImageFields = [])
    {
        /** @var ProductImageRepository $productImageRepo */
        $productImageRepo = App::make(ProductImageRepository::class);
        $theme = $this->fakeProductImageData($productImageFields);
        return $productImageRepo->create($theme);
    }

    /**
     * Get fake instance of ProductImage
     *
     * @param array $productImageFields
     * @return ProductImage
     */
    public function fakeProductImage($productImageFields = [])
    {
        return new ProductImage($this->fakeProductImageData($productImageFields));
    }

    /**
     * Get fake data of ProductImage
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProductImageData($productImageFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'product_id' => $fake->randomDigitNotNull,
            'image' => $fake->word,
            'alt' => $fake->word,
            'ord' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $productImageFields);
    }
}
