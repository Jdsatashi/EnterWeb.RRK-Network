<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
           'catename' => 'Trending'
        ]);
        Category::create([
            'catename' => 'Something fun'
        ]);
    }
}
