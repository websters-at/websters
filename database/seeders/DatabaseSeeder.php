<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Admin password must come from the environment — never commit one.
        // Usage: ADMIN_PASSWORD=... php artisan db:seed
        abort_if(empty(env('ADMIN_PASSWORD')), 500, 'ADMIN_PASSWORD env is required to seed the admin user.');

        User::factory()->create([
            'name' => 'Websters Admin',
            'email' => 'office@websters.at',
            'password' => bcrypt(env('ADMIN_PASSWORD')),
        ]);
    }
}
