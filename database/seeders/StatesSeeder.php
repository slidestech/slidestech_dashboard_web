<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    private $states = [
        [
            'name' => 'Adrar',
            'code' => 'W01',

        ],
        [
            'name' => 'Chlef',
            'code' => 'W02',

        ],
        [
            'name' => 'Laghouat',
            'code' => 'W03',
        ],
        [
            'name' => 'Oum El Bouaghi',
            'code' => 'W04',
        ],
        [
            'name' => 'Batna',
            'code' => 'W05',
        ],
        [
            'name' => 'Béjaïa',
            'code' => 'W06',
        ],
        [
            'name' => 'Biskra',
            'code' => 'W07',
        ],
        [
            'name' => 'Bechar',
            'code' => 'W08',
        ],
        [
            'name' => 'Blida',
            'code' => 'W09',
        ],
        [
            'name' => 'Bouira',
            'code' => 'W10',
        ],
        [
            'name' => 'Tamanrasset',
            'code' => 'W11',
        ],
        [
            'name' => 'Tbessa',
            'code' => 'W12',
        ],
        [
            'name' => 'Tlemcen',
            'code' => 'W13',
        ],
        [
            'name' => 'Tiaret',
            'code' => 'W14',
        ],
        [
            'name' => 'Tizi Ouzou',
            'code' => 'W15',
        ],
        [
            'name' => 'Alger',
            'code' => 'W16',
        ],
        [
            'name' => 'Djelfa',
            'code' => 'W17',
        ],
        [
            'name' => 'Jijel',
            'code' => 'W18',
        ],
        [
            'name' => 'Setif',
            'code' => 'W19',
        ],
        [
            'name' => 'Saeda',
            'code' => 'W20',
        ],
        [
            'name' => 'Skikda',
            'code' => 'W21',
        ],
        [
            'name' => 'Sidi Bel Abbes',
            'code' => 'W22',
        ],
        [
            'name' => 'Annaba',
            'code' => 'W23',
        ],
        [
            'name' => 'Guelma',
            'code' => 'W24',
        ],
        [
            'name' => 'Constantine',
            'code' => 'W25',
        ],
        [
            'name' => 'Medea',
            'code' => 'W26',
        ],
        [
            'name' => 'Mostaganem',
            'code' => 'W27',
        ],
        [
            'name' => "M'Sila",
            'code' => 'W28',
        ],
        [
            'name' => 'Mascara',
            'code' => 'W29',
        ],
        [
            'name' => 'Ouargla',
            'code' => 'W30',
        ],
        [
            'name' => 'Oran',
            'code' => 'W31',
        ],
        [
            'name' => 'El Bayadh',
            'code' => 'W32',
        ],
        [
            'name' => 'Illizi',
            'code' => 'W33',
        ],
        [
            'name' => 'Bordj Bou Arreridj',
            'code' => 'W34',
        ],
        [
            'name' => 'Boumerdes',
            'code' => 'W35',
        ],
        [
            'name' => 'El Tarf',
            'code' => 'W36',
        ],
        [
            'name' => 'Tindouf',
            'code' => 'W37',
        ],
        [
            'name' => 'Tissemsilt',
            'code' => 'W38',
        ],
        [
            'name' => 'El Oued',
            'code' => 'W39',
        ],
        [
            'name' => 'Khenchela',
            'code' => 'W40',
        ],
        [
            'name' => 'Souk Ahras',
            'code' => 'W41',
        ],
        [
            'name' => 'Tipaza',
            'code' => 'W42',
        ],
        [
            'name' => 'Mila',
            'code' => 'W43',
        ],
        [
            'name' => 'Ain Defla',
            'code' => 'W44',
        ],
        [
            'name' => 'Naama',
            'code' => 'W45',
        ],
        [
            'name' => 'Ain Temouchent',
            'code' => 'W46',
        ],
        [
            'name' => 'Ghardaia',
            'code' => 'W47',
        ],
        [
            'name' => 'Relizane',
            'code' => 'W48',
        ],
        [
            'name' => "El M'ghair",
            'code' => 'W49',
        ],
        [
            'name' => 'El Menia',
            'code' => 'W50',
        ],
        [
            'name' => 'Ouled Djellal',
            'code' => 'W51',
        ],
        [
            'name' => 'Bordj Baji Mokhtar',
            'code' => 'W52',
        ],
        [
            'name' => 'Béni Abbès',
            'code' => 'W53',
        ],
        [
            'name' => 'Timimoun',
            'code' => 'W54',
        ],
        [
            'name' => 'Touggourt',
            'code' => 'W55',
        ],
        [
            'name' => 'Djanet',
            'code' => 'W56',
        ],
        [
            'name' => 'In Salah',
            'code' => 'W57',
        ],
        [
            'name' => 'In Guezzam',
            'code' => 'W58',
        ],
    ];

    public function run()
    {
        DB::table('states')->insert($this->states);
    }
}
