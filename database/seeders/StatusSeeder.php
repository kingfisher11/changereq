<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sts;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sts::create([
            'name' => 'BAHARU',
        ]);

        Sts::create([
            'name' => 'DIAJUKAN KE PIHAK BERKENAAN',
        ]);

        Sts::create([
            'name' => 'TELAH DIBALAS',
        ]);

        Sts::create([
            'name' => 'SEDANG DIURUSKAN',
        ]);

        Sts::create([
            'name' => 'TANGGUH',
        ]);

        Sts::create([
            'name' => 'SELESAI',
        ]);
    }
}
