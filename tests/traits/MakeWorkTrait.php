<?php

use Faker\Factory as Faker;
use App\Models\Work;
use App\Repositories\WorkRepository;

trait MakeWorkTrait
{
    /**
     * Create fake instance of Work and save it in database
     *
     * @param array $workFields
     * @return Work
     */
    public function makeWork($workFields = [])
    {
        /** @var WorkRepository $workRepo */
        $workRepo = App::make(WorkRepository::class);
        $theme = $this->fakeWorkData($workFields);
        return $workRepo->create($theme);
    }

    /**
     * Get fake instance of Work
     *
     * @param array $workFields
     * @return Work
     */
    public function fakeWork($workFields = [])
    {
        return new Work($this->fakeWorkData($workFields));
    }

    /**
     * Get fake data of Work
     *
     * @param array $postFields
     * @return array
     */
    public function fakeWorkData($workFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'link' => $fake->word,
            'image' => $fake->word,
            'annotation' => $fake->text,
            'text' => $fake->text,
            'title' => $fake->word,
            'description' => $fake->text,
            'keywords' => $fake->text,
            'is_active' => $fake->word,
            'likes' => $fake->randomDigitNotNull,
            'views' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $workFields);
    }
}
