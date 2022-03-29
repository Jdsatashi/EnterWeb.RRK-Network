<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::tomorrow();
        Category::create([
           'catename' => 'Trending',
            'closure_date' => $date,
        ]);
        Category::create([
            'catename' => 'Something fun',
            'closure_date' => $date,
        ]);
    }
}
