<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Priority;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::create([
            'name' => 'LOW',
        ]);

        Priority::create([
            'name' => 'MEDIUM',
        ]);

        Priority::create([
            'name' => 'HIGH',
        ]);

        Priority::create([
            'name' => 'CRITICAL',
        ]);
    }
}
