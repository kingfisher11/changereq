<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TicketType;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketType::create([
            'name' => 'Penghargaan',
        ]);

        TicketType::create([
            'name' => 'Aduan',
        ]);

        TicketType::create([
            'name' => 'Pertanyaan',
        ]);

        TicketType::create([
            'name' => 'Cadangan',
        ]);

    }
}
