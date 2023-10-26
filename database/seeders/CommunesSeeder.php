<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunesSeeder extends Seeder
{
    private $communes = [
        [
            'name' => 'Adrar',
            'code' => 0,
            'state_id' => '01',
        ],
        [
            'name' => 'Aoulef',
            'code' => 1,
            'state_id' => '01',
        ],
        [
            'name' => 'Aougrout',
            'code' => 2,
            'state_id' => '49',
        ],
        [
            'name' => 'Bordj Badji Mokhtar',
            'code' => 3,
            'state_id' => '50',
        ],
        [
            'name' => 'Charouine',
            'code' => 4,
            'state_id' => '49',
        ],
        [
            'name' => 'Fenoughil',
            'code' => 5,
            'state_id' => '01',
        ],
        [
            'name' => 'Zaouiat Kounta',
            'code' => 6,
            'state_id' => '01',
        ],
        [
            'name' => 'Tinerkouk',
            'code' => 7,
            'state_id' => '49',
        ],
        [
            'name' => 'Timimoun',
            'code' => 8,
            'state_id' => '49',
        ],
        [
            'name' => 'Reggane',
            'code' => 9,
            'state_id' => '01',
        ],
        [
            'name' => 'Tsabit',
            'code' => 10,
            'state_id' => '01',
        ],
        [
            'name' => 'Abou El Hassane',
            'code' => 11,
            'state_id' => '02',
        ],
        [
            'name' => 'Ain Merane',
            'code' => 12,
            'state_id' => '02',
        ],
        [
            'name' => 'Zeboudja',
            'code' => 13,
            'state_id' => '02',
        ],
        [
            'name' => 'El Karimia',
            'code' => 14,
            'state_id' => '02',
        ],
        [
            'name' => 'Beni Haoua',
            'code' => 15,
            'state_id' => '02',
        ],
        [
            'name' => 'Oued Fodda',
            'code' => 16,
            'state_id' => '02',
        ],
        [
            'name' => 'Boukadir',
            'code' => 17,
            'state_id' => '02',
        ],
        [
            'name' => 'Ouled Fares',
            'code' => 18,
            'state_id' => '02',
        ],
        [
            'name' => 'Chlef',
            'code' => 19,
            'state_id' => '02',
        ],
        [
            'name' => 'Taougrit',
            'code' => 20,
            'state_id' => '02',
        ],
        [
            'name' => 'Ouled Ben Abdelkader',
            'code' => 21,
            'state_id' => '02',
        ],
        [
            'name' => 'El Marsa',
            'code' => 22,
            'state_id' => '02',
        ],
        [
            'name' => 'Tenes',
            'code' => 23,
            'state_id' => '02',
        ],
        [
            'name' => 'Aflou',
            'code' => 24,
            'state_id' => '03',
        ],
        [
            'name' => 'Ain Madhi',
            'code' => 25,
            'state_id' => '03',
        ],
        [
            'name' => 'Gueltat Sidi Saad',
            'code' => 26,
            'state_id' => '03',
        ],
        [
            'name' => 'Ksar El Hirane',
            'code' => 27,
            'state_id' => '03',
        ],
        [
            'name' => 'Brida',
            'code' => 28,
            'state_id' => '03',
        ],
        [
            'name' => 'Sidi Makhlouf',
            'code' => 29,
            'state_id' => '03',
        ],
        [
            'name' => 'El Ghicha',
            'code' => 30,
            'state_id' => '03',
        ],
        [
            'name' => "Hassi R'mel",
            'code' => 31,
            'state_id' => '03',
        ],
        [
            'name' => 'Laghouat',
            'code' => 32,
            'state_id' => '03',
        ],
        [
            'name' => 'Oued Morra',
            'code' => 33,
            'state_id' => '03',
        ],
        [
            'name' => 'Ain Babouche',
            'code' => 34,
            'state_id' => '04',
        ],
        [
            'name' => 'Ain Beida',
            'code' => 35,
            'state_id' => '04',
        ],
        [
            'name' => 'Ain Fekroun',
            'code' => 36,
            'state_id' => '04',
        ],
        [
            'name' => 'Ain Kercha',
            'code' => 37,
            'state_id' => '04',
        ],
        [
            'name' => "Ain M'lila",
            'code' => 38,
            'state_id' => '04',
        ],
        [
            'name' => 'Oum El Bouaghi',
            'code' => 39,
            'state_id' => '04',
        ],
        [
            'name' => 'Meskiana',
            'code' => 40,
            'state_id' => '04',
        ],
        [
            'name' => 'Souk Naamane',
            'code' => 41,
            'state_id' => '04',
        ],
        [
            'name' => 'Dhalaa',
            'code' => 42,
            'state_id' => '04',
        ],
        [
            'name' => 'Sigus',
            'code' => 43,
            'state_id' => '04',
        ],
        [
            'name' => "F'kirina",
            'code' => 44,
            'state_id' => '04',
        ],
        [
            'name' => 'Ksar Sbahi',
            'code' => 45,
            'state_id' => '04',
        ],
        [
            'name' => 'Ain Djasser',
            'code' => 46,
            'state_id' => '05',
        ],
        [
            'name' => 'Ain Touta',
            'code' => 47,
            'state_id' => '05',
        ],
        [
            'name' => 'El Madher',
            'code' => 48,
            'state_id' => '05',
        ],
        [
            'name' => 'Arris',
            'code' => 49,
            'state_id' => '05',
        ],
        [
            'name' => 'Djezzar',
            'code' => 50,
            'state_id' => '05',
        ],
        [
            'name' => 'Barika',
            'code' => 51,
            'state_id' => '05',
        ],
        [
            'name' => 'Batna',
            'code' => 52,
            'state_id' => '05',
        ],
        [
            'name' => 'Chemora',
            'code' => 53,
            'state_id' => '05',
        ],
        [
            'name' => "N'gaous",
            'code' => 54,
            'state_id' => '05',
        ],
        [
            'name' => 'Bouzina',
            'code' => 55,
            'state_id' => '05',
        ],
        [
            'name' => 'Theniet El Abed',
            'code' => 56,
            'state_id' => '05',
        ],
        [
            'name' => 'Ichemoul',
            'code' => 57,
            'state_id' => '05',
        ],
        [
            'name' => 'Tkout',
            'code' => 58,
            'state_id' => '05',
        ],
        [
            'name' => 'Ras El Aioun',
            'code' => 59,
            'state_id' => '05',
        ],
        [
            'name' => 'Merouana',
            'code' => 60,
            'state_id' => '05',
        ],
        [
            'name' => 'Seriana',
            'code' => 61,
            'state_id' => '05',
        ],
        [
            'name' => 'Ouled Si Slimane',
            'code' => 62,
            'state_id' => '05',
        ],
        [
            'name' => 'Menaa',
            'code' => 63,
            'state_id' => '05',
        ],
        [
            'name' => 'Timgad',
            'code' => 64,
            'state_id' => '05',
        ],
        [
            'name' => 'Tazoult',
            'code' => 65,
            'state_id' => '05',
        ],
        [
            'name' => 'Seggana',
            'code' => 66,
            'state_id' => '05',
        ],
        [
            'name' => 'Adekar',
            'code' => 67,
            'state_id' => '06',
        ],
        [
            'name' => 'Ighil Ali',
            'code' => 68,
            'state_id' => '06',
        ],
        [
            'name' => 'Darguina',
            'code' => 69,
            'state_id' => '06',
        ],
        [
            'name' => 'Akbou',
            'code' => 70,
            'state_id' => '06',
        ],
        [
            'name' => 'Chemini',
            'code' => 71,
            'state_id' => '06',
        ],
        [
            'name' => 'Seddouk',
            'code' => 72,
            'state_id' => '06',
        ],
        [
            'name' => 'Amizour',
            'code' => 73,
            'state_id' => '06',
        ],
        [
            'name' => 'Aokas',
            'code' => 74,
            'state_id' => '06',
        ],
        [
            'name' => 'Barbacha',
            'code' => 75,
            'state_id' => '06',
        ],
        [
            'name' => 'Bejaia',
            'code' => 76,
            'state_id' => '06',
        ],
        [
            'name' => 'Tazmalt',
            'code' => 77,
            'state_id' => '06',
        ],
        [
            'name' => 'Beni Maouche',
            'code' => 78,
            'state_id' => '06',
        ],
        [
            'name' => 'Tichy',
            'code' => 79,
            'state_id' => '06',
        ],
        [
            'name' => 'Kherrata',
            'code' => 80,
            'state_id' => '06',
        ],
        [
            'name' => 'Sidi Aich',
            'code' => 81,
            'state_id' => '06',
        ],
        [
            'name' => 'El Kseur',
            'code' => 82,
            'state_id' => '06',
        ],
        [
            'name' => 'Ifri Ouzellaguene',
            'code' => 83,
            'state_id' => '06',
        ],
        [
            'name' => 'Souk El Tenine',
            'code' => 84,
            'state_id' => '06',
        ],
        [
            'name' => 'Timezrit',
            'code' => 85,
            'state_id' => '06',
        ],
        [
            'name' => 'Sidi Okba',
            'code' => 86,
            'state_id' => '07',
        ],
        [
            'name' => 'El Kantara',
            'code' => 87,
            'state_id' => '07',
        ],
        [
            'name' => 'Sidi Khaled',
            'code' => 88,
            'state_id' => '51',
        ],
        [
            'name' => 'Biskra',
            'code' => 89,
            'state_id' => '07',
        ],
        [
            'name' => 'Tolga',
            'code' => 90,
            'state_id' => '07',
        ],
        [
            'name' => 'Djemorah',
            'code' => 91,
            'state_id' => '07',
        ],
        [
            'name' => 'Ouled Djellal',
            'code' => 92,
            'state_id' => '51',
        ],
        [
            'name' => 'Zeribet El Oued',
            'code' => 93,
            'state_id' => '07',
        ],
        [
            'name' => 'Foughala',
            'code' => 94,
            'state_id' => '07',
        ],
        [
            'name' => 'El Outaya',
            'code' => 95,
            'state_id' => '07',
        ],
        [
            'name' => 'Ourlal',
            'code' => 96,
            'state_id' => '07',
        ],
        [
            'name' => 'Mechouneche',
            'code' => 97,
            'state_id' => '07',
        ],
        [
            'name' => 'Abadla',
            'code' => 98,
            'state_id' => '08',
        ],
        [
            'name' => 'Bechar',
            'code' => 99,
            'state_id' => '08',
        ],
        [
            'name' => 'Beni Abbes',
            'code' => 100,
            'state_id' => '52',
        ],
        [
            'name' => 'Kerzaz',
            'code' => 101,
            'state_id' => '52',
        ],
        [
            'name' => 'Beni Ounif',
            'code' => 102,
            'state_id' => '08',
        ],
        [
            'name' => 'Lahmar',
            'code' => 103,
            'state_id' => '08',
        ],
        [
            'name' => 'El Ouata',
            'code' => 104,
            'state_id' => '52',
        ],
        [
            'name' => 'Igli',
            'code' => 105,
            'state_id' => '52',
        ],
        [
            'name' => 'Kenadsa',
            'code' => 106,
            'state_id' => '08',
        ],
        [
            'name' => 'Ouled Khodeir',
            'code' => 107,
            'state_id' => '52',
        ],
        [
            'name' => 'Tabelbala',
            'code' => 108,
            'state_id' => '08',
        ],
        [
            'name' => 'Taghit',
            'code' => 109,
            'state_id' => '08',
        ],
        [
            'name' => 'Mouzaia',
            'code' => 110,
            'state_id' => '09',
        ],
        [
            'name' => 'Ouled Yaich',
            'code' => 111,
            'state_id' => '09',
        ],
        [
            'name' => 'Oued El Alleug',
            'code' => 112,
            'state_id' => '09',
        ],
        [
            'name' => 'Blida',
            'code' => 113,
            'state_id' => '09',
        ],
        [
            'name' => 'Boufarik',
            'code' => 114,
            'state_id' => '09',
        ],
        [
            'name' => 'Bougara',
            'code' => 115,
            'state_id' => '09',
        ],
        [
            'name' => 'Bouinan',
            'code' => 116,
            'state_id' => '09',
        ],
        [
            'name' => 'Meftah',
            'code' => 117,
            'state_id' => '09',
        ],
        [
            'name' => 'El Affroun',
            'code' => 118,
            'state_id' => '09',
        ],
        [
            'name' => 'Larbaa',
            'code' => 119,
            'state_id' => '09',
        ],
        [
            'name' => "M'chedallah",
            'code' => 120,
            'state_id' => '10',
        ],
        [
            'name' => 'Bechloul',
            'code' => 121,
            'state_id' => '10',
        ],
        [
            'name' => 'Ain Bessem',
            'code' => 122,
            'state_id' => '10',
        ],
        [
            'name' => 'Bouira',
            'code' => 123,
            'state_id' => '10',
        ],
        [
            'name' => 'Kadiria',
            'code' => 124,
            'state_id' => '10',
        ],
        [
            'name' => 'Bir Ghbalou',
            'code' => 125,
            'state_id' => '10',
        ],
        [
            'name' => 'Bordj Okhriss',
            'code' => 126,
            'state_id' => '10',
        ],
        [
            'name' => 'Lakhdaria',
            'code' => 127,
            'state_id' => '10',
        ],
        [
            'name' => 'Sour El Ghozlane',
            'code' => 128,
            'state_id' => '10',
        ],
        [
            'name' => 'El Hachimia',
            'code' => 129,
            'state_id' => '10',
        ],
        [
            'name' => 'Souk El Khemis',
            'code' => 130,
            'state_id' => '10',
        ],
        [
            'name' => 'Haizer',
            'code' => 131,
            'state_id' => '10',
        ],
        [
            'name' => 'Silet',
            'code' => 132,
            'state_id' => '11',
        ],
        [
            'name' => 'Tamanrasset',
            'code' => 133,
            'state_id' => '11',
        ],
        [
            'name' => 'In Guezzam',
            'code' => 134,
            'state_id' => '54',
        ],
        [
            'name' => 'In Salah',
            'code' => 135,
            'state_id' => '53',
        ],
        [
            'name' => 'Tazrouk',
            'code' => 136,
            'state_id' => '11',
        ],
        [
            'name' => 'In Ghar',
            'code' => 137,
            'state_id' => '53',
        ],
        [
            'name' => 'Tin Zouatine',
            'code' => 138,
            'state_id' => '54',
        ],
        [
            'name' => 'Ouenza',
            'code' => 139,
            'state_id' => '12',
        ],
        [
            'name' => 'El Ogla',
            'code' => 140,
            'state_id' => '12',
        ],
        [
            'name' => 'El Kouif',
            'code' => 141,
            'state_id' => '12',
        ],
        [
            'name' => 'Morsott',
            'code' => 142,
            'state_id' => '12',
        ],
        [
            'name' => 'Bir Mokadem',
            'code' => 143,
            'state_id' => '12',
        ],
        [
            'name' => 'Bir El Ater',
            'code' => 144,
            'state_id' => '12',
        ],
        [
            'name' => 'El Aouinet',
            'code' => 145,
            'state_id' => '12',
        ],
        [
            'name' => 'Cheria',
            'code' => 146,
            'state_id' => '12',
        ],
        [
            'name' => 'El Malabiod',
            'code' => 147,
            'state_id' => '12',
        ],
        [
            'name' => 'Negrine',
            'code' => 148,
            'state_id' => '12',
        ],
        [
            'name' => 'Oum Ali',
            'code' => 149,
            'state_id' => '12',
        ],
        [
            'name' => 'Tebessa',
            'code' => 150,
            'state_id' => '12',
        ],
        [
            'name' => 'Fellaoucene',
            'code' => 151,
            'state_id' => '13',
        ],
        [
            'name' => 'Chetouane',
            'code' => 152,
            'state_id' => '13',
        ],
        [
            'name' => 'Mansourah',
            'code' => 153,
            'state_id' => '13',
        ],
        [
            'name' => 'Ain Tellout',
            'code' => 154,
            'state_id' => '13',
        ],
        [
            'name' => 'Remchi',
            'code' => 155,
            'state_id' => '13',
        ],
        [
            'name' => 'Bab El Assa',
            'code' => 156,
            'state_id' => '13',
        ],
        [
            'name' => 'Beni Snous',
            'code' => 157,
            'state_id' => '13',
        ],
        [
            'name' => 'Beni Boussaid',
            'code' => 158,
            'state_id' => '13',
        ],
        [
            'name' => 'Honnaine',
            'code' => 159,
            'state_id' => '13',
        ],
        [
            'name' => 'Ouled Mimoun',
            'code' => 160,
            'state_id' => '13',
        ],
        [
            'name' => 'Bensekrane',
            'code' => 161,
            'state_id' => '13',
        ],
        [
            'name' => 'Sabra',
            'code' => 162,
            'state_id' => '13',
        ],
        [
            'name' => 'Sidi Djillali',
            'code' => 163,
            'state_id' => '13',
        ],
        [
            'name' => 'Ghazaouet',
            'code' => 164,
            'state_id' => '13',
        ],
        [
            'name' => 'Nedroma',
            'code' => 165,
            'state_id' => '13',
        ],
        [
            'name' => 'Sebdou',
            'code' => 166,
            'state_id' => '13',
        ],
        [
            'name' => 'Maghnia',
            'code' => 167,
            'state_id' => '13',
        ],
        [
            'name' => 'Hennaya',
            'code' => 168,
            'state_id' => '13',
        ],
        [
            'name' => 'Marsa Ben Mehdi',
            'code' => 169,
            'state_id' => '13',
        ],
        [
            'name' => 'Tlemcen',
            'code' => 170,
            'state_id' => '13',
        ],
        [
            'name' => 'Dahmouni',
            'code' => 171,
            'state_id' => '14',
        ],
        [
            'name' => 'Ain Deheb',
            'code' => 172,
            'state_id' => '14',
        ],
        [
            'name' => 'Mahdia',
            'code' => 173,
            'state_id' => '14',
        ],
        [
            'name' => 'Frenda',
            'code' => 174,
            'state_id' => '14',
        ],
        [
            'name' => 'Ain Kermes',
            'code' => 175,
            'state_id' => '14',
        ],
        [
            'name' => 'Hamadia',
            'code' => 176,
            'state_id' => '14',
        ],
        [
            'name' => 'Mechraa Sfa',
            'code' => 177,
            'state_id' => '14',
        ],
        [
            'name' => 'Sougueur',
            'code' => 178,
            'state_id' => '14',
        ],
        [
            'name' => 'Rahouia',
            'code' => 179,
            'state_id' => '14',
        ],
        [
            'name' => 'Ksar Chellala',
            'code' => 180,
            'state_id' => '14',
        ],
        [
            'name' => 'Medroussa',
            'code' => 181,
            'state_id' => '14',
        ],
        [
            'name' => 'Meghila',
            'code' => 182,
            'state_id' => '14',
        ],
        [
            'name' => 'Oued Lili',
            'code' => 183,
            'state_id' => '14',
        ],
        [
            'name' => 'Tiaret',
            'code' => 184,
            'state_id' => '14',
        ],
        [
            'name' => 'Ain El Hammam',
            'code' => 185,
            'state_id' => '15',
        ],
        [
            'name' => 'Azeffoun',
            'code' => 186,
            'state_id' => '15',
        ],
        [
            'name' => 'Ouadhias',
            'code' => 187,
            'state_id' => '15',
        ],
        [
            'name' => 'Draa El Mizan',
            'code' => 188,
            'state_id' => '15',
        ],
        [
            'name' => 'Larbaa Nath Iraten',
            'code' => 189,
            'state_id' => '15',
        ],
        [
            'name' => 'Ouacif',
            'code' => 190,
            'state_id' => '15',
        ],
        [
            'name' => 'Mekla',
            'code' => 191,
            'state_id' => '15',
        ],
        [
            'name' => 'Ouaguenoun',
            'code' => 192,
            'state_id' => '15',
        ],
        [
            'name' => 'Beni Douala',
            'code' => 193,
            'state_id' => '15',
        ],
        [
            'name' => 'Tizi Rached',
            'code' => 194,
            'state_id' => '15',
        ],
        [
            'name' => 'Boghni',
            'code' => 195,
            'state_id' => '15',
        ],
        [
            'name' => 'Azazga',
            'code' => 196,
            'state_id' => '15',
        ],
        [
            'name' => 'Benni Yenni',
            'code' => 197,
            'state_id' => '15',
        ],
        [
            'name' => 'Bouzeguene',
            'code' => 198,
            'state_id' => '15',
        ],
        [
            'name' => 'Makouda',
            'code' => 199,
            'state_id' => '15',
        ],
        [
            'name' => 'Draa Ben Khedda',
            'code' => 200,
            'state_id' => '15',
        ],
        [
            'name' => 'Iferhounene',
            'code' => 201,
            'state_id' => '15',
        ],
        [
            'name' => 'Tigzirt',
            'code' => 202,
            'state_id' => '15',
        ],
        [
            'name' => 'Maatkas',
            'code' => 203,
            'state_id' => '15',
        ],
        [
            'name' => 'Tizi-Ghenif',
            'code' => 204,
            'state_id' => '15',
        ],
        [
            'name' => 'Tizi Ouzou',
            'code' => 205,
            'state_id' => '15',
        ],
        [
            'name' => 'Cheraga',
            'code' => 206,
            'state_id' => '16',
        ],
        [
            'name' => 'Dar El Beida',
            'code' => 207,
            'state_id' => '16',
        ],
        [
            'name' => "Sidi M'hamed",
            'code' => 208,
            'state_id' => '16',
        ],
        [
            'name' => 'Bab El Oued',
            'code' => 209,
            'state_id' => '16',
        ],
        [
            'name' => 'Draria',
            'code' => 210,
            'state_id' => '16',
        ],
        [
            'name' => 'El Harrach',
            'code' => 211,
            'state_id' => '16',
        ],
        [
            'name' => 'Baraki',
            'code' => 212,
            'state_id' => '16',
        ],
        [
            'name' => 'Bouzareah',
            'code' => 213,
            'state_id' => '16',
        ],
        [
            'name' => 'Bir Mourad Rais',
            'code' => 214,
            'state_id' => '16',
        ],
        [
            'name' => 'Birtouta',
            'code' => 215,
            'state_id' => '16',
        ],
        [
            'name' => 'Hussein Dey',
            'code' => 216,
            'state_id' => '16',
        ],
        [
            'name' => 'Rouiba',
            'code' => 217,
            'state_id' => '16',
        ],
        [
            'name' => 'Zeralda',
            'code' => 218,
            'state_id' => '16',
        ],
        [
            'name' => 'El Idrissia',
            'code' => 219,
            'state_id' => '17',
        ],
        [
            'name' => 'Ain El Ibel',
            'code' => 220,
            'state_id' => '17',
        ],
        [
            'name' => 'Had Sahary',
            'code' => 221,
            'state_id' => '17',
        ],
        [
            'name' => 'Hassi Bahbah',
            'code' => 222,
            'state_id' => '17',
        ],
        [
            'name' => 'Ain Oussera',
            'code' => 223,
            'state_id' => '17',
        ],
        [
            'name' => 'Faidh El Botma',
            'code' => 224,
            'state_id' => '17',
        ],
        [
            'name' => 'Birine',
            'code' => 225,
            'state_id' => '17',
        ],
        [
            'name' => 'Charef',
            'code' => 226,
            'state_id' => '17',
        ],
        [
            'name' => 'Dar Chioukh',
            'code' => 227,
            'state_id' => '17',
        ],
        [
            'name' => 'Messaad',
            'code' => 228,
            'state_id' => '17',
        ],
        [
            'name' => 'Djelfa',
            'code' => 229,
            'state_id' => '17',
        ],
        [
            'name' => 'Sidi Laadjel',
            'code' => 230,
            'state_id' => '17',
        ],
        [
            'name' => 'Chekfa',
            'code' => 231,
            'state_id' => '18',
        ],
        [
            'name' => 'Djimla',
            'code' => 232,
            'state_id' => '18',
        ],
        [
            'name' => 'El Ancer',
            'code' => 233,
            'state_id' => '18',
        ],
        [
            'name' => 'Taher',
            'code' => 234,
            'state_id' => '18',
        ],
        [
            'name' => 'El Aouana',
            'code' => 235,
            'state_id' => '18',
        ],
        [
            'name' => 'El Milia',
            'code' => 236,
            'state_id' => '18',
        ],
        [
            'name' => 'Ziamah Mansouriah',
            'code' => 237,
            'state_id' => '18',
        ],
        [
            'name' => 'Settara',
            'code' => 238,
            'state_id' => '18',
        ],
        [
            'name' => 'Jijel',
            'code' => 239,
            'state_id' => '18',
        ],
        [
            'name' => 'Texenna',
            'code' => 240,
            'state_id' => '18',
        ],
        [
            'name' => 'Sidi Marouf',
            'code' => 241,
            'state_id' => '18',
        ],
        [
            'name' => 'Ain Arnat',
            'code' => 242,
            'state_id' => '19',
        ],
        [
            'name' => 'Ain Azel',
            'code' => 243,
            'state_id' => '19',
        ],
        [
            'name' => 'Ain El Kebira',
            'code' => 244,
            'state_id' => '19',
        ],
        [
            'name' => 'Ain Oulmene',
            'code' => 245,
            'state_id' => '19',
        ],
        [
            'name' => 'Beni Ourtilane',
            'code' => 246,
            'state_id' => '19',
        ],
        [
            'name' => 'Bougaa',
            'code' => 247,
            'state_id' => '19',
        ],
        [
            'name' => 'Beni Aziz',
            'code' => 248,
            'state_id' => '19',
        ],
        [
            'name' => 'Bouandas',
            'code' => 249,
            'state_id' => '19',
        ],
        [
            'name' => 'Amoucha',
            'code' => 250,
            'state_id' => '19',
        ],
        [
            'name' => 'Babor',
            'code' => 251,
            'state_id' => '19',
        ],
        [
            'name' => 'El Eulma',
            'code' => 252,
            'state_id' => '19',
        ],
        [
            'name' => 'Bir El Arch',
            'code' => 253,
            'state_id' => '19',
        ],
        [
            'name' => 'Djemila',
            'code' => 254,
            'state_id' => '19',
        ],
        [
            'name' => 'Salah Bey',
            'code' => 255,
            'state_id' => '19',
        ],
        [
            'name' => 'Hammam Guergour',
            'code' => 256,
            'state_id' => '19',
        ],
        [
            'name' => 'Guenzet',
            'code' => 257,
            'state_id' => '19',
        ],
        [
            'name' => 'Guidjel',
            'code' => 258,
            'state_id' => '19',
        ],
        [
            'name' => 'Hammam Sokhna',
            'code' => 259,
            'state_id' => '19',
        ],
        [
            'name' => 'Maoklane',
            'code' => 260,
            'state_id' => '19',
        ],
        [
            'name' => 'Setif',
            'code' => 261,
            'state_id' => '19',
        ],
        [
            'name' => 'Ain El Hadjar',
            'code' => 262,
            'state_id' => '20',
        ],
        [
            'name' => 'El Hassasna',
            'code' => 263,
            'state_id' => '20',
        ],
        [
            'name' => 'Ouled Brahim',
            'code' => 264,
            'state_id' => '20',
        ],
        [
            'name' => 'Youb',
            'code' => 265,
            'state_id' => '20',
        ],
        [
            'name' => 'Sidi Boubekeur',
            'code' => 266,
            'state_id' => '20',
        ],
        [
            'name' => 'Saida',
            'code' => 267,
            'state_id' => '20',
        ],
        [
            'name' => 'Sidi Mezghiche',
            'code' => 268,
            'state_id' => '21',
        ],
        [
            'name' => 'Azzaba',
            'code' => 269,
            'state_id' => '21',
        ],
        [
            'name' => 'Ain Kechra',
            'code' => 270,
            'state_id' => '21',
        ],
        [
            'name' => 'El Hadaiek',
            'code' => 271,
            'state_id' => '21',
        ],
        [
            'name' => 'Ben Azzouz',
            'code' => 272,
            'state_id' => '21',
        ],
        [
            'name' => 'Ramdane Djamel',
            'code' => 273,
            'state_id' => '21',
        ],
        [
            'name' => 'Collo',
            'code' => 274,
            'state_id' => '21',
        ],
        [
            'name' => 'Tamalous',
            'code' => 275,
            'state_id' => '21',
        ],
        [
            'name' => 'El Harrouch',
            'code' => 276,
            'state_id' => '21',
        ],
        [
            'name' => 'Skikda',
            'code' => 277,
            'state_id' => '21',
        ],
        [
            'name' => 'Zitouna',
            'code' => 278,
            'state_id' => '21',
        ],
        [
            'name' => 'Ouled Attia',
            'code' => 279,
            'state_id' => '21',
        ],
        [
            'name' => 'Oum Toub',
            'code' => 280,
            'state_id' => '21',
        ],
        [
            'name' => 'Ain El Berd',
            'code' => 281,
            'state_id' => '22',
        ],
        [
            'name' => 'Sidi Ali Boussidi',
            'code' => 282,
            'state_id' => '22',
        ],
        [
            'name' => 'Tessala',
            'code' => 283,
            'state_id' => '22',
        ],
        [
            'name' => 'Moulay Slissen',
            'code' => 284,
            'state_id' => '22',
        ],
        [
            'name' => 'Sfisef',
            'code' => 285,
            'state_id' => '22',
        ],
        [
            'name' => 'Sidi Lahcene',
            'code' => 286,
            'state_id' => '22',
        ],
        [
            'name' => 'Ben Badis',
            'code' => 287,
            'state_id' => '22',
        ],
        [
            'name' => 'Mostefa Ben Brahim',
            'code' => 288,
            'state_id' => '22',
        ],
        [
            'name' => 'Tenira',
            'code' => 289,
            'state_id' => '22',
        ],
        [
            'name' => 'Marhoum',
            'code' => 290,
            'state_id' => '22',
        ],
        [
            'name' => 'Sidi Ali Ben Youb',
            'code' => 291,
            'state_id' => '22',
        ],
        [
            'name' => 'Telagh',
            'code' => 292,
            'state_id' => '22',
        ],
        [
            'name' => 'Merine',
            'code' => 293,
            'state_id' => '22',
        ],
        [
            'name' => 'Ras El Ma',
            'code' => 294,
            'state_id' => '22',
        ],
        [
            'name' => 'Sidi Bel Abbes',
            'code' => 295,
            'state_id' => '22',
        ],
        [
            'name' => 'Ain El Berda',
            'code' => 296,
            'state_id' => '23',
        ],
        [
            'name' => 'Annaba',
            'code' => 297,
            'state_id' => '23',
        ],
        [
            'name' => 'Berrahal',
            'code' => 298,
            'state_id' => '23',
        ],
        [
            'name' => 'Chetaibi',
            'code' => 299,
            'state_id' => '23',
        ],
        [
            'name' => 'El Bouni',
            'code' => 300,
            'state_id' => '23',
        ],
        [
            'name' => 'El Hadjar',
            'code' => 301,
            'state_id' => '23',
        ],
        [
            'name' => 'Bouchegouf',
            'code' => 302,
            'state_id' => '24',
        ],
        [
            'name' => 'Ain Makhlouf',
            'code' => 303,
            'state_id' => '24',
        ],
        [
            'name' => 'Oued Zenati',
            'code' => 304,
            'state_id' => '24',
        ],
        [
            'name' => 'Khezaras',
            'code' => 305,
            'state_id' => '24',
        ],
        [
            'name' => 'Guelaat Bousbaa',
            'code' => 306,
            'state_id' => '24',
        ],
        [
            'name' => 'Guelma',
            'code' => 307,
            'state_id' => '24',
        ],
        [
            'name' => 'Hammam Debagh',
            'code' => 308,
            'state_id' => '24',
        ],
        [
            'name' => 'Heliopolis',
            'code' => 309,
            'state_id' => '24',
        ],
        [
            'name' => "Hammam N'bails",
            'code' => 310,
            'state_id' => '24',
        ],
        [
            'name' => 'Ain Hessainia',
            'code' => 311,
            'state_id' => '24',
        ],
        [
            'name' => 'Ain Abid',
            'code' => 312,
            'state_id' => '25',
        ],
        [
            'name' => 'El Khroub',
            'code' => 313,
            'state_id' => '25',
        ],
        [
            'name' => 'Zighoud Youcef',
            'code' => 314,
            'state_id' => '25',
        ],
        [
            'name' => 'Constantine',
            'code' => 315,
            'state_id' => '25',
        ],
        [
            'name' => 'Hamma Bouziane',
            'code' => 316,
            'state_id' => '25',
        ],
        [
            'name' => 'Ibn Ziad',
            'code' => 317,
            'state_id' => '25',
        ],
        [
            'name' => 'Ain Boucif',
            'code' => 318,
            'state_id' => '26',
        ],
        [
            'name' => 'Chellalat El Adhaoura',
            'code' => 319,
            'state_id' => '26',
        ],
        [
            'name' => 'Tablat',
            'code' => 320,
            'state_id' => '26',
        ],
        [
            'name' => 'Aziz',
            'code' => 321,
            'state_id' => '26',
        ],
        [
            'name' => 'El Omaria',
            'code' => 322,
            'state_id' => '26',
        ],
        [
            'name' => 'Ouzera',
            'code' => 323,
            'state_id' => '26',
        ],
        [
            'name' => 'Beni Slimane',
            'code' => 324,
            'state_id' => '26',
        ],
        [
            'name' => 'Berrouaghia',
            'code' => 325,
            'state_id' => '26',
        ],
        [
            'name' => 'Guelb El Kebir',
            'code' => 326,
            'state_id' => '26',
        ],
        [
            'name' => 'Ouled Antar',
            'code' => 327,
            'state_id' => '26',
        ],
        [
            'name' => 'Chahbounia',
            'code' => 328,
            'state_id' => '26',
        ],
        [
            'name' => 'Si Mahdjoub',
            'code' => 329,
            'state_id' => '26',
        ],
        [
            'name' => 'Sidi Naamane',
            'code' => 330,
            'state_id' => '26',
        ],
        [
            'name' => 'Souaghi',
            'code' => 331,
            'state_id' => '26',
        ],
        [
            'name' => 'Medea',
            'code' => 332,
            'state_id' => '26',
        ],
        [
            'name' => 'El Azizia',
            'code' => 333,
            'state_id' => '26',
        ],
        [
            'name' => 'Ouamri',
            'code' => 334,
            'state_id' => '26',
        ],
        [
            'name' => 'Ksar El Boukhari',
            'code' => 335,
            'state_id' => '26',
        ],
        [
            'name' => 'Seghouane',
            'code' => 336,
            'state_id' => '26',
        ],
        [
            'name' => 'Achaacha',
            'code' => 337,
            'state_id' => '27',
        ],
        [
            'name' => 'Kheir Eddine',
            'code' => 338,
            'state_id' => '27',
        ],
        [
            'name' => 'Ain Nouicy',
            'code' => 339,
            'state_id' => '27',
        ],
        [
            'name' => 'Mesra',
            'code' => 340,
            'state_id' => '27',
        ],
        [
            'name' => 'Ain Tedeles',
            'code' => 341,
            'state_id' => '27',
        ],
        [
            'name' => 'Sidi Lakhdar',
            'code' => 342,
            'state_id' => '27',
        ],
        [
            'name' => 'Bouguirat',
            'code' => 343,
            'state_id' => '27',
        ],
        [
            'name' => 'Hassi Mameche',
            'code' => 344,
            'state_id' => '27',
        ],
        [
            'name' => 'Mostaganem',
            'code' => 345,
            'state_id' => '27',
        ],
        [
            'name' => 'Sidi Ali',
            'code' => 346,
            'state_id' => '27',
        ],
        [
            'name' => 'Ain El Hadjel',
            'code' => 347,
            'state_id' => '28',
        ],
        [
            'name' => 'Ain El Melh',
            'code' => 348,
            'state_id' => '28',
        ],
        [
            'name' => 'Magra',
            'code' => 349,
            'state_id' => '28',
        ],
        [
            'name' => 'Ben Srour',
            'code' => 350,
            'state_id' => '28',
        ],
        [
            'name' => 'Sidi Aissa',
            'code' => 351,
            'state_id' => '28',
        ],
        [
            'name' => 'Ouled Sidi Brahim',
            'code' => 352,
            'state_id' => '28',
        ],
        [
            'name' => 'Bousaada',
            'code' => 353,
            'state_id' => '28',
        ],
        [
            'name' => 'Chellal',
            'code' => 354,
            'state_id' => '28',
        ],
        [
            'name' => 'Djebel Messaad',
            'code' => 355,
            'state_id' => '28',
        ],
        [
            'name' => 'Khoubana',
            'code' => 356,
            'state_id' => '28',
        ],
        [
            'name' => 'Hammam Dalaa',
            'code' => 357,
            'state_id' => '28',
        ],
        [
            'name' => 'Ouled Derradj',
            'code' => 358,
            'state_id' => '28',
        ],
        [
            'name' => 'Medjedel',
            'code' => 359,
            'state_id' => '28',
        ],
        [
            'name' => "M'sila",
            'code' => 360,
            'state_id' => '28',
        ],
        [
            'name' => 'Sidi Ameur',
            'code' => 361,
            'state_id' => '28',
        ],
        [
            'name' => 'Ain Fares',
            'code' => 362,
            'state_id' => '29',
        ],
        [
            'name' => 'Ain Fekan',
            'code' => 363,
            'state_id' => '29',
        ],
        [
            'name' => 'Oued El Abtal',
            'code' => 364,
            'state_id' => '29',
        ],
        [
            'name' => 'Oggaz',
            'code' => 365,
            'state_id' => '29',
        ],
        [
            'name' => 'Aouf',
            'code' => 366,
            'state_id' => '29',
        ],
        [
            'name' => 'Sig',
            'code' => 367,
            'state_id' => '29',
        ],
        [
            'name' => 'Bouhanifia',
            'code' => 368,
            'state_id' => '29',
        ],
        [
            'name' => 'El Bordj',
            'code' => 369,
            'state_id' => '29',
        ],
        [
            'name' => 'Zahana',
            'code' => 370,
            'state_id' => '29',
        ],
        [
            'name' => 'Mohammadia',
            'code' => 371,
            'state_id' => '29',
        ],
        [
            'name' => 'Hachem',
            'code' => 372,
            'state_id' => '29',
        ],
        [
            'name' => 'Tizi',
            'code' => 373,
            'state_id' => '29',
        ],
        [
            'name' => 'Ghriss',
            'code' => 374,
            'state_id' => '29',
        ],
        [
            'name' => 'Oued Taria',
            'code' => 375,
            'state_id' => '29',
        ],
        [
            'name' => 'Mascara',
            'code' => 376,
            'state_id' => '29',
        ],
        [
            'name' => 'Tighennif',
            'code' => 377,
            'state_id' => '29',
        ],
        [
            'name' => 'Sidi Khouiled',
            'code' => 378,
            'state_id' => '30',
        ],
        [
            'name' => 'Taibet',
            'code' => 379,
            'state_id' => '55',
        ],
        [
            'name' => 'Temacine',
            'code' => 380,
            'state_id' => '55',
        ],
        [
            'name' => 'El-Hadjira',
            'code' => 381,
            'state_id' => '55',
        ],
        [
            'name' => 'El Borma',
            'code' => 382,
            'state_id' => '30',
        ],
        [
            'name' => 'Hassi Messaoud',
            'code' => 383,
            'state_id' => '30',
        ],
        [
            'name' => 'Megarine',
            'code' => 384,
            'state_id' => '55',
        ],
        [
            'name' => 'Touggourt',
            'code' => 385,
            'state_id' => '55',
        ],
        [
            'name' => "N'goussa",
            'code' => 386,
            'state_id' => '30',
        ],
        [
            'name' => 'Ouargla',
            'code' => 387,
            'state_id' => '30',
        ],
        [
            'name' => 'Bethioua',
            'code' => 388,
            'state_id' => '31',
        ],
        [
            'name' => 'Boutlelis',
            'code' => 389,
            'state_id' => '31',
        ],
        [
            'name' => 'Ain Turk',
            'code' => 390,
            'state_id' => '31',
        ],
        [
            'name' => 'Arzew',
            'code' => 391,
            'state_id' => '31',
        ],
        [
            'name' => 'Gdyel',
            'code' => 392,
            'state_id' => '31',
        ],
        [
            'name' => 'Bir El Djir',
            'code' => 393,
            'state_id' => '31',
        ],
        [
            'name' => 'Oued Tlelat',
            'code' => 394,
            'state_id' => '31',
        ],
        [
            'name' => 'Es Senia',
            'code' => 395,
            'state_id' => '31',
        ],
        [
            'name' => 'Oran',
            'code' => 396,
            'state_id' => '31',
        ],
        [
            'name' => 'Labiodh Sidi Cheikh',
            'code' => 397,
            'state_id' => '32',
        ],
        [
            'name' => 'Boualem',
            'code' => 398,
            'state_id' => '32',
        ],
        [
            'name' => 'Bougtoub',
            'code' => 399,
            'state_id' => '32',
        ],
        [
            'name' => 'Boussemghoun',
            'code' => 400,
            'state_id' => '32',
        ],
        [
            'name' => 'Brezina',
            'code' => 401,
            'state_id' => '32',
        ],
        [
            'name' => 'Rogassa',
            'code' => 402,
            'state_id' => '32',
        ],
        [
            'name' => 'Chellala',
            'code' => 403,
            'state_id' => '32',
        ],
        [
            'name' => 'El Bayadh',
            'code' => 404,
            'state_id' => '32',
        ],
        [
            'name' => 'Djanet',
            'code' => 405,
            'state_id' => '56',
        ],
        [
            'name' => 'In Amenas',
            'code' => 406,
            'state_id' => '33',
        ],
        [
            'name' => 'Illizi',
            'code' => 407,
            'state_id' => '33',
        ],
        [
            'name' => 'Ain Taghrout',
            'code' => 408,
            'state_id' => '34',
        ],
        [
            'name' => 'Ras El Oued',
            'code' => 409,
            'state_id' => '34',
        ],
        [
            'name' => 'Bordj Bou Arreridj',
            'code' => 410,
            'state_id' => '34',
        ],
        [
            'name' => 'Bordj Ghedir',
            'code' => 411,
            'state_id' => '34',
        ],
        [
            'name' => 'Mansourah',
            'code' => 412,
            'state_id' => '34',
        ],
        [
            'name' => 'Bir Kasdali',
            'code' => 413,
            'state_id' => '34',
        ],
        [
            'name' => 'Bordj Zemmoura',
            'code' => 414,
            'state_id' => '34',
        ],
        [
            'name' => 'Djaafra',
            'code' => 415,
            'state_id' => '34',
        ],
        [
            'name' => 'El Hamadia',
            'code' => 416,
            'state_id' => '34',
        ],
        [
            'name' => 'Medjana',
            'code' => 417,
            'state_id' => '34',
        ],
        [
            'name' => 'Dellys',
            'code' => 418,
            'state_id' => '35',
        ],
        [
            'name' => 'Thenia',
            'code' => 419,
            'state_id' => '35',
        ],
        [
            'name' => 'Baghlia',
            'code' => 420,
            'state_id' => '35',
        ],
        [
            'name' => 'Bordj Menaiel',
            'code' => 421,
            'state_id' => '35',
        ],
        [
            'name' => 'Boudouaou',
            'code' => 422,
            'state_id' => '35',
        ],
        [
            'name' => 'Boumerdes',
            'code' => 423,
            'state_id' => '35',
        ],
        [
            'name' => 'Isser',
            'code' => 424,
            'state_id' => '35',
        ],
        [
            'name' => 'Khemis El Khechna',
            'code' => 425,
            'state_id' => '35',
        ],
        [
            'name' => 'Naciria',
            'code' => 426,
            'state_id' => '35',
        ],
        [
            'name' => 'El Tarf',
            'code' => 427,
            'state_id' => '36',
        ],
        [
            'name' => 'Bouhadjar',
            'code' => 428,
            'state_id' => '36',
        ],
        [
            'name' => 'Besbes',
            'code' => 429,
            'state_id' => '36',
        ],
        [
            'name' => "Ben M'hidi",
            'code' => 430,
            'state_id' => '36',
        ],
        [
            'name' => 'Bouteldja',
            'code' => 431,
            'state_id' => '36',
        ],
        [
            'name' => 'Drean',
            'code' => 432,
            'state_id' => '36',
        ],
        [
            'name' => 'El Kala',
            'code' => 433,
            'state_id' => '36',
        ],
        [
            'name' => 'Tindouf',
            'code' => 434,
            'state_id' => '37',
        ],
        [
            'name' => 'Ammari',
            'code' => 435,
            'state_id' => '38',
        ],
        [
            'name' => 'Bordj Bounaama',
            'code' => 436,
            'state_id' => '38',
        ],
        [
            'name' => 'Bordj Emir Abdelkader',
            'code' => 437,
            'state_id' => '38',
        ],
        [
            'name' => 'Lazharia',
            'code' => 438,
            'state_id' => '38',
        ],
        [
            'name' => 'Khemisti',
            'code' => 439,
            'state_id' => '38',
        ],
        [
            'name' => 'Lardjem',
            'code' => 440,
            'state_id' => '38',
        ],
        [
            'name' => 'Tissemsilt',
            'code' => 441,
            'state_id' => '38',
        ],
        [
            'name' => 'Theniet El Had',
            'code' => 442,
            'state_id' => '38',
        ],
        [
            'name' => 'Bayadha',
            'code' => 443,
            'state_id' => '39',
        ],
        [
            'name' => 'Taleb Larbi',
            'code' => 444,
            'state_id' => '39',
        ],
        [
            'name' => 'Debila',
            'code' => 445,
            'state_id' => '39',
        ],
        [
            'name' => 'Djamaa',
            'code' => 446,
            'state_id' => '57',
        ],
        [
            'name' => 'Robbah',
            'code' => 447,
            'state_id' => '39',
        ],
        [
            'name' => 'El Meghaier',
            'code' => 448,
            'state_id' => '57',
        ],
        [
            'name' => 'El Oued',
            'code' => 449,
            'state_id' => '39',
        ],
        [
            'name' => 'Guemar',
            'code' => 450,
            'state_id' => '39',
        ],
        [
            'name' => 'Reguiba',
            'code' => 451,
            'state_id' => '39',
        ],
        [
            'name' => 'Hassi Khalifa',
            'code' => 452,
            'state_id' => '39',
        ],
        [
            'name' => 'Magrane',
            'code' => 453,
            'state_id' => '39',
        ],
        [
            'name' => 'Mih Ouensa',
            'code' => 454,
            'state_id' => '39',
        ],
        [
            'name' => 'Ain Touila',
            'code' => 455,
            'state_id' => '40',
        ],
        [
            'name' => 'Babar',
            'code' => 456,
            'state_id' => '40',
        ],
        [
            'name' => 'El Hamma',
            'code' => 457,
            'state_id' => '40',
        ],
        [
            'name' => 'Bouhmama',
            'code' => 458,
            'state_id' => '40',
        ],
        [
            'name' => 'Chechar',
            'code' => 459,
            'state_id' => '40',
        ],
        [
            'name' => 'Ouled Rechache',
            'code' => 460,
            'state_id' => '40',
        ],
        [
            'name' => 'Kais',
            'code' => 461,
            'state_id' => '40',
        ],
        [
            'name' => 'Khenchela',
            'code' => 462,
            'state_id' => '40',
        ],
        [
            'name' => 'Sedrata',
            'code' => 463,
            'state_id' => '41',
        ],
        [
            'name' => 'Ouled Driss',
            'code' => 464,
            'state_id' => '41',
        ],
        [
            'name' => 'Bir Bouhouche',
            'code' => 465,
            'state_id' => '41',
        ],
        [
            'name' => 'Taoura',
            'code' => 466,
            'state_id' => '41',
        ],
        [
            'name' => 'Haddada',
            'code' => 467,
            'state_id' => '41',
        ],
        [
            'name' => 'Mechroha',
            'code' => 468,
            'state_id' => '41',
        ],
        [
            'name' => "M'daourouche",
            'code' => 469,
            'state_id' => '41',
        ],
        [
            'name' => 'Merahna',
            'code' => 470,
            'state_id' => '41',
        ],
        [
            'name' => 'Oum El Adhaim',
            'code' => 471,
            'state_id' => '41',
        ],
        [
            'name' => 'Souk Ahras',
            'code' => 472,
            'state_id' => '41',
        ],
        [
            'name' => 'Gouraya',
            'code' => 473,
            'state_id' => '42',
        ],
        [
            'name' => 'Ahmar El Ain',
            'code' => 474,
            'state_id' => '42',
        ],
        [
            'name' => 'Bou Ismail',
            'code' => 475,
            'state_id' => '42',
        ],
        [
            'name' => 'Kolea',
            'code' => 476,
            'state_id' => '42',
        ],
        [
            'name' => 'Damous',
            'code' => 477,
            'state_id' => '42',
        ],
        [
            'name' => 'Cherchell',
            'code' => 478,
            'state_id' => '42',
        ],
        [
            'name' => 'Fouka',
            'code' => 479,
            'state_id' => '42',
        ],
        [
            'name' => 'Hadjout',
            'code' => 480,
            'state_id' => '42',
        ],
        [
            'name' => 'Sidi Amar',
            'code' => 481,
            'state_id' => '42',
        ],
        [
            'name' => 'Tipaza',
            'code' => 482,
            'state_id' => '42',
        ],
        [
            'name' => 'Oued Endja',
            'code' => 483,
            'state_id' => '43',
        ],
        [
            'name' => 'Ain Beida Harriche',
            'code' => 484,
            'state_id' => '43',
        ],
        [
            'name' => 'Chelghoum Laid',
            'code' => 485,
            'state_id' => '43',
        ],
        [
            'name' => 'Mila',
            'code' => 486,
            'state_id' => '43',
        ],
        [
            'name' => 'Terrai Bainen',
            'code' => 487,
            'state_id' => '43',
        ],
        [
            'name' => 'Tadjenanet',
            'code' => 488,
            'state_id' => '43',
        ],
        [
            'name' => 'Bouhatem',
            'code' => 489,
            'state_id' => '43',
        ],
        [
            'name' => 'Sidi Merouane',
            'code' => 490,
            'state_id' => '43',
        ],
        [
            'name' => 'Teleghma',
            'code' => 491,
            'state_id' => '43',
        ],
        [
            'name' => 'Ferdjioua',
            'code' => 492,
            'state_id' => '43',
        ],
        [
            'name' => 'Grarem Gouga',
            'code' => 493,
            'state_id' => '43',
        ],
        [
            'name' => 'Tassadane Haddada',
            'code' => 494,
            'state_id' => '43',
        ],
        [
            'name' => 'Rouached',
            'code' => 495,
            'state_id' => '43',
        ],
        [
            'name' => 'Hammam Righa',
            'code' => 496,
            'state_id' => '44',
        ],
        [
            'name' => 'El Abadia',
            'code' => 497,
            'state_id' => '44',
        ],
        [
            'name' => 'Ain Defla',
            'code' => 498,
            'state_id' => '44',
        ],
        [
            'name' => 'Ain Lechiakh',
            'code' => 499,
            'state_id' => '44',
        ],
        [
            'name' => 'El Amra',
            'code' => 500,
            'state_id' => '44',
        ],
        [
            'name' => 'Djendel',
            'code' => 501,
            'state_id' => '44',
        ],
        [
            'name' => 'Bathia',
            'code' => 502,
            'state_id' => '44',
        ],
        [
            'name' => 'Miliana',
            'code' => 503,
            'state_id' => '44',
        ],
        [
            'name' => 'Bordj El Emir Khaled',
            'code' => 504,
            'state_id' => '44',
        ],
        [
            'name' => 'Boumedfaa',
            'code' => 505,
            'state_id' => '44',
        ],
        [
            'name' => 'Djelida',
            'code' => 506,
            'state_id' => '44',
        ],
        [
            'name' => 'El Attaf',
            'code' => 507,
            'state_id' => '44',
        ],
        [
            'name' => 'Rouina',
            'code' => 508,
            'state_id' => '44',
        ],
        [
            'name' => 'Khemis',
            'code' => 509,
            'state_id' => '44',
        ],
        [
            'name' => 'Mecheria',
            'code' => 510,
            'state_id' => '45',
        ],
        [
            'name' => 'Ain Sefra',
            'code' => 511,
            'state_id' => '45',
        ],
        [
            'name' => 'Asla',
            'code' => 512,
            'state_id' => '45',
        ],
        [
            'name' => 'Moghrar',
            'code' => 513,
            'state_id' => '45',
        ],
        [
            'name' => 'Mekmen Ben Amar',
            'code' => 514,
            'state_id' => '45',
        ],
        [
            'name' => 'Naama',
            'code' => 515,
            'state_id' => '45',
        ],
        [
            'name' => 'Sfissifa',
            'code' => 516,
            'state_id' => '45',
        ],
        [
            'name' => 'Ain Kihel',
            'code' => 517,
            'state_id' => '46',
        ],
        [
            'name' => 'Ain Larbaa',
            'code' => 518,
            'state_id' => '46',
        ],
        [
            'name' => 'Ain Temouchent',
            'code' => 519,
            'state_id' => '46',
        ],
        [
            'name' => 'Beni Saf',
            'code' => 520,
            'state_id' => '46',
        ],
        [
            'name' => 'El Amria',
            'code' => 521,
            'state_id' => '46',
        ],
        [
            'name' => 'El Maleh',
            'code' => 522,
            'state_id' => '46',
        ],
        [
            'name' => 'Hammam Bou Hadjar',
            'code' => 523,
            'state_id' => '46',
        ],
        [
            'name' => 'Oulhassa Gheraba',
            'code' => 524,
            'state_id' => '46',
        ],
        [
            'name' => 'Berriane',
            'code' => 525,
            'state_id' => '47',
        ],
        [
            'name' => 'Bounoura',
            'code' => 526,
            'state_id' => '47',
        ],
        [
            'name' => 'Dhayet Ben Dhahoua',
            'code' => 527,
            'state_id' => '47',
        ],
        [
            'name' => 'El Menia',
            'code' => 528,
            'state_id' => '58',
        ],
        [
            'name' => 'Ghardaia',
            'code' => 529,
            'state_id' => '47',
        ],
        [
            'name' => 'El Guerrara',
            'code' => 530,
            'state_id' => '47',
        ],
        [
            'name' => 'Mansourah',
            'code' => 531,
            'state_id' => '58',
        ],
        [
            'name' => 'Mansourah',
            'code' => 532,
            'state_id' => '47',
        ],
        [
            'name' => 'Metlili',
            'code' => 533,
            'state_id' => '47',
        ],
        [
            'name' => 'Zelfana',
            'code' => 534,
            'state_id' => '47',
        ],
        [
            'name' => 'Yellel',
            'code' => 535,
            'state_id' => '48',
        ],
        [
            'name' => 'Ain Tarek',
            'code' => 536,
            'state_id' => '48',
        ],
        [
            'name' => 'Ammi Moussa',
            'code' => 537,
            'state_id' => '48',
        ],
        [
            'name' => 'El Matmar',
            'code' => 538,
            'state_id' => '48',
        ],
        [
            'name' => 'Relizane',
            'code' => 539,
            'state_id' => '48',
        ],
        [
            'name' => 'Zemmoura',
            'code' => 540,
            'state_id' => '48',
        ],
        [
            'name' => "Sidi M'hamed Ben Ali",
            'code' => 541,
            'state_id' => '48',
        ],
        [
            'name' => 'Djidiouia',
            'code' => 542,
            'state_id' => '48',
        ],
        [
            'name' => "El H'madna",
            'code' => 543,
            'state_id' => '48',
        ],
        [
            'name' => 'Mazouna',
            'code' => 544,
            'state_id' => '48',
        ],
        [
            'name' => 'Oued Rhiou',
            'code' => 545,
            'state_id' => '48',
        ],
        [
            'name' => 'Mendes',
            'code' => 546,
            'state_id' => '48',
        ],
        [
            'name' => 'Ramka',
            'code' => 547,
            'state_id' => '48',
        ],
    ];

    public function run()
    {
        DB::table('communes')->insert($this->communes);
    }
}
