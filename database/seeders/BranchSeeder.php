<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'name' => 'Alor Setar',
            'code' => 'AS'
        ]);

        Branch::create([
            'name' => 'Bangi',
            'code' => 'BG'
        ]);

        Branch::create([
            'name' => 'Batu Pahat',
            'code' => 'BP'
        ]);

        Branch::create([
            'name' => 'Ipoh',
            'code' => 'IP'
        ]);

        Branch::create([
            'name' => 'Kota Bharu',
            'code' => 'KB'
        ]);

        Branch::create([
            'name' => 'Kuantan',
            'code' => 'KN'
        ]);

        Branch::create([
            'name' => 'KUPTM Kuala Lumpur',
            'code' => 'KU'
        ]);

        Branch::create([
            'name' => 'Ibu Pejabat',
            'code' => 'HQ'
        ]);
    }
}
