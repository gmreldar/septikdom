<?php

use Faker\Factory as Faker;
use App\Models\Review;
use App\Repositories\ReviewRepository;

trait MakeReviewTrait
{
    /**
     * Create fake instance of Review and save it in database
     *
     * @param array $reviewFields
     * @return Review
     */
    public function makeReview($reviewFields = [])
    {
        /** @var ReviewRepository $reviewRepo */
        $reviewRepo = App::make(ReviewRepository::class);
        $theme = $this->fakeReviewData($reviewFields);
        return $reviewRepo->create($theme);
    }

    /**
     * Get fake instance of Review
     *
     * @param array $reviewFields
     * @return Review
     */
    public function fakeReview($reviewFields = [])
    {
        return new Review($this->fakeReviewData($reviewFields));
    }

    /**
     * Get fake data of Review
     *
     * @param array $postFields
     * @return array
     */
    public function fakeReviewData($reviewFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'phone' => $fake->word,
            'city' => $fake->word,
            'message' => $fake->text,
            'image' => $fake->word,
            'is_active' => $fake->word,
            'ord' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $reviewFields);
    }
}
