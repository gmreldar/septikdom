<?php

use Faker\Factory as Faker;
use App\Models\Order;
use App\Repositories\OrderRepository;

trait MakeOrderTrait
{
    /**
     * Create fake instance of Order and save it in database
     *
     * @param array $orderFields
     * @return Order
     */
    public function makeOrder($orderFields = [])
    {
        /** @var OrderRepository $orderRepo */
        $orderRepo = App::make(OrderRepository::class);
        $theme = $this->fakeOrderData($orderFields);
        return $orderRepo->create($theme);
    }

    /**
     * Get fake instance of Order
     *
     * @param array $orderFields
     * @return Order
     */
    public function fakeOrder($orderFields = [])
    {
        return new Order($this->fakeOrderData($orderFields));
    }

    /**
     * Get fake data of Order
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOrderData($orderFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'product_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'phone' => $fake->word,
            'status' => $fake->randomDigitNotNull,
            'text' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $orderFields);
    }
}
