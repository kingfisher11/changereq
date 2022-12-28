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
        Category::create([
            'name' => 'Pelajar',
        ]);

        Category::create([
            'name' => 'Staf',
        ]);

        Category::create([
            'name' => 'Ibu / Bapa / Penjaga',
        ]);

        Category::create([
            'name' => 'Penaja',
        ]);

        Category::create([
            'name' => 'Industri',
        ]);

        Category::create([
            'name' => 'Pelawat',
        ]);
    }
}
