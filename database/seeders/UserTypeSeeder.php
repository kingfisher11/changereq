<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'name' => 'ADMIN',
        ]);

        UserRole::create([
            'name' => 'PIC',
        ]);

        // UserRole::create([
        //     'name' => 'ADMIN ALOR SETAR',
        // ]);

        // UserRole::create([
        //     'name' => 'ADMIN IPOH',
        // ]);

        // UserRole::create([
        //     'name' => 'ADMIN BANGI',
        // ]);

        // UserRole::create([
        //     'name' => 'ADMIN BATU PAHAT',
        // ]);

        // UserRole::create([
        //     'name' => 'ADMIN KUANTAN',
        // ]);

        // UserRole::create([
        //     'name' => 'ADMIN KOTA BHARU',
        // ]);

        // UserRole::create([
        //     'name' => 'PIC ALOR SETAR',
        // ]);

        // UserRole::create([
        //     'name' => 'PIC IPOH',
        // ]);

        // UserRole::create([
        //     'name' => 'PIC BANGI',
        // ]);

        // UserRole::create([
        //     'name' => 'PIC BATU PAHAT',
        // ]);

        // UserRole::create([
        //     'name' => 'PIC KOTA BHARU',
        // ]);

        // UserRole::create([
        //     'name' => 'PIC KUANTAN',
        // ]);
    }
}
