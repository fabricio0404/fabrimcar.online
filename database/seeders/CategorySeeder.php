<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->insert([
            //Ingress
            ["name"=> "Cancela reserva", "type"=> "I", "icon"=>"success"], 
            ["name"=> "Entrega", "type"=> "I", "icon"=>"primary"],
            ["name"=> "Noche Adicional", "type"=> "I", "icon"=>"secondary"],


            //Eggress
            ["name"=> "Lavanderia", "type"=> "E", "icon"=>"danger"], 
            ["name"=> "Impuestos", "type"=> "E", "icon"=>"warning"],
            ["name"=> "Inversiones", "type"=> "E", "icon"=>"info"],
            ["name"=> "Otros", "type"=> "E", "icon"=>"info"],
        ]);
    }
}
