<?php

namespace Database\Seeders;

use App\Models\Costumer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Costumer::create([
            'name' => 'contoh',
            'alamat' => 'jlninajadulu',
            'noTelp' => '08299271771'
        ]);
    }
}
