<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Justice Velasco',
            'email' => 'justicevgomez001@gmail.com',
            'password' => bcrypt('343434')
        ])->assignRole('Admin');
        
        User::factory(15)->create();
    }
}
