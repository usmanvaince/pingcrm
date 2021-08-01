<?php

namespace Database\Seeders;

use App\Models\Patient;
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


        if (User::count() <= 0) {
            User::factory()->create([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'johndoe@example.com',
                'owner' => true,
            ]);
        }

        if (Patient::count() <= 0) {
            Patient::factory(1000000)->create();
        }




    }
}
