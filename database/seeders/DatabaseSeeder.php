<?php

namespace Database\Seeders;

use App\Models\User;
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
        //\App\Models\User::factory(10)->create();
        User::create(array(
            'name' => 'Aman',
            'email' => 'aman@doa.gov.my',
            'password' => bcrypt('12345678'),
        ));
    }
}
