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
            ['id' => 1, 'name' => 'AGENCE', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 2, 'name' => 'DIRECTION GENERALE', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 3, 'name' => 'ETABLISSEMENT', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 4, 'name' => 'AUTRE', 'created_at' => now(), 'updated_at' => now(),],
        ]);
    }
}
