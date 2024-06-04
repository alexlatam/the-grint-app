<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Alexis Montilla',
            'email' => 'alexis@mail.com',
        ]);

        $this->call([
            CategorySeeder::class,
        ]);
    }
}
