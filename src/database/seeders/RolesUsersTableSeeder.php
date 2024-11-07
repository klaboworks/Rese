<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'user_id' => 1,
            'role_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('roles_users')->insert($param);

        $param = [
            'user_id' => 2,
            'role_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('roles_users')->insert($param);

        $param = [
            'user_id' => 3,
            'role_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('roles_users')->insert($param);

        $param = [
            'user_id' => 4,
            'role_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('roles_users')->insert($param);

        $param = [
            'user_id' => 5,
            'role_id' => 100,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('roles_users')->insert($param);
    }
}
