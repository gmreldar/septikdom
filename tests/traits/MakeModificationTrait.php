<?php

use Faker\Factory as Faker;
use App\Models\Modification;
use App\Repositories\ModificationRepository;

trait MakeModificationTrait
{
    /**
     * Create fake instance of Modification and save it in database
     *
     * @param array $modificationFields
     * @return Modification
     */
    public function makeModification($modificationFields = [])
    {
        /** @var ModificationRepository $modificationRepo */
        $modificationRepo = App::make(ModificationRepository::class);
        $theme = $this->fakeModificationData($modificationFields);
        return $modificationRepo->create($theme);
    }

    /**
     * Get fake instance of Modification
     *
     * @param array $modificationFields
     * @return Modification
     */
    public function fakeModification($modificationFields = [])
    {
        return new Modification($this->fakeModificationData($modificationFields));
    }

    /**
     * Get fake data of Modification
     *
     * @param array $postFields
     * @return array
     */
    public function fakeModificationData($modificationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'product_id' => $fake->randomDigitNotNull,
            'price' => $fake->randomDigitNotNull,
            'datePublic' => $fake->word,
            'annotation' => $fake->text,
            'image' => $fake->word,
            'sale' => $fake->randomDigitNotNull,
            'lastmod' => $fake->word,
            'volume' => $fake->randomDigitNotNull,
            'destination' => $fake->word,
            'modtitle' => $fake->word,
            'proizvoditelnost' => $fake->randomDigitNotNull,
            'glubina' => $fake->randomDigitNotNull,
            'gabarit' => $fake->word,
            'power' => $fake->randomDigitNotNull,
            'massa' => $fake->randomDigitNotNull,
            'chel' => $fake->randomDigitNotNull,
            'topasid' => $fake->randomDigitNotNull,
            'evroid' => $fake->randomDigitNotNull,
            'oldprice' => $fake->randomDigitNotNull,
            'sort_main' => $fake->randomDigitNotNull,
            'ueprice' => $fake->randomDigitNotNull,
            'ueid' => $fake->randomDigitNotNull,
            'showcalc' => $fake->word,
            'topassid' => $fake->randomDigitNotNull,
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $modificationFields);
    }
}
