<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StructureTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('structure_types')->insert([
            // headquarter
            ['id' => 1, 'name' => 'HEADQUARTER', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 2, 'name' => 'BRANCH', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 3, 'name' => 'OTHER', 'created_at' => now(), 'updated_at' => now(),],
        ]);
    }
}
