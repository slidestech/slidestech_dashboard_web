<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StructuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('structures')->insert([
            ['name' => 'MAIN OFFICE', 'state_id' =>  '1', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
