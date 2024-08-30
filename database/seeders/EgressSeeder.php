<?php

namespace Database\Seeders;

use App\Models\Egress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Egress::factory()->count(14)->create();
    }
}
