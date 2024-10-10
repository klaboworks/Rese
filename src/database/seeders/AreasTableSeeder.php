<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $param =[
           'area_name' => '東京都',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ];
        DB::table('areas')->insert($param);

        $param=[
            'area_name' => '大阪府',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('areas')->insert($param);

        $param =[
            'area_name' => '福岡県',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('areas')->insert($param);
    }
}
