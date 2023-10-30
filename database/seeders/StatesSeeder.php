<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    private $states = [
        [
            'name' => 'Abu Dhabi',
            'code' => 'W01',

        ],
        [
            'name' => 'Dubai',
            'code' => 'W02',

        ],
        [
            'name' => 'Sharjah',
            'code' => 'W03',
        ],
        [
            'name' => 'Ajman',
            'code' => 'W04',
        ],
        [
            'name' => 'Umm Al Quwain',
            'code' => 'W05',
        ],
        [
            'name' => 'Ras Al Khaimah',
            'code' => 'W06',
        ],
        [
            'name' => 'Fujairah',
            'code' => 'W07',
        ],

    ];

    public function run()
    {
        DB::table('states')->insert($this->states);
    }
}
