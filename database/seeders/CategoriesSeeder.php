<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'легкий',
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'хрупкий',
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'тяжелый',
            ]
            ]);
    }
}
