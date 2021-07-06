<?php

use Faker\Factory as Faker;
use App\Models\License;
use App\Repositories\LicenseRepository;

trait MakeLicenseTrait
{
    /**
     * Create fake instance of License and save it in database
     *
     * @param array $licenseFields
     * @return License
     */
    public function makeLicense($licenseFields = [])
    {
        /** @var LicenseRepository $licenseRepo */
        $licenseRepo = App::make(LicenseRepository::class);
        $theme = $this->fakeLicenseData($licenseFields);
        return $licenseRepo->create($theme);
    }

    /**
     * Get fake instance of License
     *
     * @param array $licenseFields
     * @return License
     */
    public function fakeLicense($licenseFields = [])
    {
        return new License($this->fakeLicenseData($licenseFields));
    }

    /**
     * Get fake data of License
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLicenseData($licenseFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'image' => $fake->word,
            'alt' => $fake->word,
            'ord' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $licenseFields);
    }
}
