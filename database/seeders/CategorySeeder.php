<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Electronics', 'Computers', 'Software'];

        Category::insert(
            array_map(fn ($category) => ['title' => $category], $categories)
        );
    }
}
