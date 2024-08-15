<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class forwhat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('todolists')->insert([
            'id' => 10000,
            'content' => '仮',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'byDate' => Carbon::create(2024, 12, 31),
        ]);
    }
}
