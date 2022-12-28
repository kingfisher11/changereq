<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'maklumbalashq',
            'email' => 'maklumbalashq@gapps.kptm.edu.my',
            'password' => Hash::make('password'),
            'nokp' => '881105025405',
            'phone' => '0187909231',
            'user_role_id' => '1',
            'branch_id' => '8'
        ]);
    }
}
