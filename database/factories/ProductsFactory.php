<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
                protected $model = Products::class;
    public function definition(): array
    {
        $categoriesIds = DB::table('categories')->pluck('id');
        return [

            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'category_id' => $this->faker->randomElement($categoriesIds),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }

}
