<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TicketCategory;

class TicketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketCategory::create([
            'name' => 'Perkhidmatan / Pentadbiran ',
        ]);

        TicketCategory::create([
            'name' => 'Pengajaran / Pembelajaran',
        ]);

        TicketCategory::create([
            'name' => 'Tajaan / Pembiayaan / Pembilan Yuran',
        ]);

        TicketCategory::create([
            'name' => 'Hal Ehwal Pelajar',
        ]);

        TicketCategory::create([
            'name' => 'Kediaman / Kebajikan / Aktiviti Pelajar',
        ]);

        TicketCategory::create([
            'name' => 'Kemudahan (Infrastruktur / Infostruktur / ICT)',
        ]);

        TicketCategory::create([
            'name' => 'Kerosakan / Senggaraan',
        ]);

        TicketCategory::create([
            'name' => 'Kaunter / TelefonisR',
        ]);
    }
}
