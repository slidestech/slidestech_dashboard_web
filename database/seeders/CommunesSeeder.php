<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunesSeeder extends Seeder
{
    private $communes = [
        [
            'name' => 'Al Ain',
            'code' => 0,
            'state_id' => '01',
        ]

    ];

    public function run()
    {
        DB::table('communes')->insert($this->communes);
    }
}
