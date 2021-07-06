<?php

use Faker\Factory as Faker;
use App\Models\Text;
use App\Repositories\TextRepository;

trait MakeTextTrait
{
    /**
     * Create fake instance of Text and save it in database
     *
     * @param array $textFields
     * @return Text
     */
    public function makeText($textFields = [])
    {
        /** @var TextRepository $textRepo */
        $textRepo = App::make(TextRepository::class);
        $theme = $this->fakeTextData($textFields);
        return $textRepo->create($theme);
    }

    /**
     * Get fake instance of Text
     *
     * @param array $textFields
     * @return Text
     */
    public function fakeText($textFields = [])
    {
        return new Text($this->fakeTextData($textFields));
    }

    /**
     * Get fake data of Text
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTextData($textFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'text' => $fake->text,
            'page_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $textFields);
    }
}
