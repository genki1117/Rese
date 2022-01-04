<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'name' => '東京',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 2,
            'name' => '大阪',
        ];
        DB::table('areas')->insert($param);

        $param = [
            'id' => 3,
            'name' => '福岡',
        ];
        DB::table('areas')->insert($param);
    }
}
