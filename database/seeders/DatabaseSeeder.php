<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $this->call(UserSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(EgressSeeder::class);
        $this->call(IncomeSeeder::class);
        $this->call(TransferSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
