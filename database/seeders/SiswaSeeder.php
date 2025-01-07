<?php

namespace Database\Seeders;

use App\Models\Hobi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hobis = ['membaca','olahraga','renang','menulis','main game'];
        foreach ($hobis as $key => $hobi) {
            Hobi::create(['hobi' => $hobi]);
        }
    }
}
