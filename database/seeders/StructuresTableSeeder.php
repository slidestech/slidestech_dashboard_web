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
            ['name' => 'AGENCE Adrar', 'state_id' =>  '1', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Chlef', 'state_id' =>  '2', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Laghouat', 'state_id' =>  '3', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Oum El Boua', 'state_id' =>  '4', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Batna', 'state_id' =>  '5', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Béjaïa', 'state_id' =>  '6', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Biskra', 'state_id' =>  '7', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Béchar', 'state_id' =>  '8', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Blida', 'state_id' =>  '9', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Bouira', 'state_id' =>  '10', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Tamanrasse', 'state_id' =>  '11', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Tébessa', 'state_id' =>  '12', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Tlemcen', 'state_id' =>  '13', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Tiaret', 'state_id' =>  '14', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Tizi Ouzou', 'state_id' =>  '15', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Alger', 'state_id' =>  '16', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Djelfa', 'state_id' =>  '17', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Jijel', 'state_id' =>  '18', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Sétif', 'state_id' =>  '19', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Saïda', 'state_id' =>  '20', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Skikda', 'state_id' =>  '21', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Sidi Bel Abbes', 'state_id' =>  '22', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Annaba', 'state_id' =>  '23', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Guelma', 'state_id' =>  '24', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Constantin', 'state_id' =>  '25', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Médéa', 'state_id' =>  '26', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Mostaganem', 'state_id' =>  '27', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE MSila', 'state_id' =>  '28', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Mascara', 'state_id' =>  '29', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Ouargla', 'state_id' =>  '30', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Oran', 'state_id' =>  '31', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE El Bayadh', 'state_id' =>  '32', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Illizi', 'state_id' =>  '33', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Bordj Bou Arreridj', 'state_id' =>  '34', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Boumerdès', 'state_id' =>  '35', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE El Tarf', 'state_id' =>  '36', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Tindouf', 'state_id' =>  '37', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Tissemsilt', 'state_id' =>  '38', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE El Oued', 'state_id' =>  '39', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Khenchela', 'state_id' =>  '40', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Souk Ahras', 'state_id' =>  '41', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Tipaza', 'state_id' =>  '42', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Mila', 'state_id' =>  '43', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Aïn Defla', 'state_id' =>  '44', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Naâma', 'state_id' =>  '45', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Aïn Témouch', 'state_id' =>  '46', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Ghardaïa', 'state_id' =>  '47', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AGENCE Relizane', 'state_id' =>  '48', 'structure_type_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'DIRECTION GENERALE', 'state_id' =>  '16', 'structure_type_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PRESIDENT DE LA COMMISSION NATIONALE MEDICALE', 'state_id' => '16', 'structure_type_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ECOLE SUPERIEURE DE LA SECURITE SOCIALE', 'state_id' =>  '16', 'structure_type_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ŒUVRE SOCIALE', 'state_id' =>  '16', 'structure_type_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PRISIDENT DU CONSEIL D\'ADMINISTRATION', 'state_id' =>  '16', 'structure_type_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MINISTERE DU TRAVAIL DE L\'EMPLOI ET DE LA SECURITE SOCIALE', 'state_id' =>  '16', 'structure_type_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MINISTERE DE LA JUSTICE', 'state_id' =>  '16', 'structure_type_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'EL DJORF ED\'DAHABI (MELBOU)', 'state_id' =>  '6', 'structure_type_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CENTRE FAMILIALE DE BEN AKNOUNE', 'state_id' =>  '16', 'structure_type_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'IMPRIMERIE DE CONSTANTINE', 'state_id' =>  '25', 'structure_type_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CSORVAT MESSERGHINE', 'state_id' =>  '31', 'structure_type_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'EHS-CMCI BOUISMAIL', 'state_id' =>  '42', 'structure_type_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
