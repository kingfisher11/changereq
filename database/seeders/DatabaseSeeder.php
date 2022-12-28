<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call(BranchSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PrioritySeeder::class);
        $this->call(TicketCategorySeeder::class);
        $this->call(TicketTypeSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(UserTypeSeeder::class);
    }
}
