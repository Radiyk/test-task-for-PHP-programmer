<?php

namespace Database\Factories;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrdersFactory extends Factory
{

    protected $model = Orders::class;

    public function definition()
    {
        $productsIds = DB::table('products')->pluck('id');

        return [
            'created_at' => now(),
            'updated_at' => now(),
            'product_id' => $this->faker->randomElement($productsIds),
            'status' => $this->faker->randomElement(['новый', 'выполнен']),
            'comment' => $this->faker->sentence,
            'fio' => $this->faker->name,
            'count' => rand(1, 6),
        ];
    }
}
