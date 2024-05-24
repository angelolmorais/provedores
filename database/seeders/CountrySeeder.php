<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            ['id' => 1, 'name' => 'Brasil', 'code' => 'BR'],
            ['id' => 2, 'name' => 'Argentina', 'code' => 'AR'],
            ['id' => 3, 'name' => 'Estados Unidos da América', 'code' => 'US'],
            ['id' => 4, 'name' => 'Itália', 'code' => 'IT'],
            ['id' => 5, 'name' => 'Austrália', 'code' => 'AU'],
            ['id' => 6, 'name' => 'Cuba', 'code' => 'CU'],
            ['id' => 7, 'name' => 'França', 'code' => 'FR'],
            ['id' => 8, 'name' => 'Bolívia', 'code' => 'BO'],
            ['id' => 9, 'name' => 'México', 'code' => 'MX'],
            ['id' => 10, 'name' => 'Espanha', 'code' => 'ES'],
            ['id' => 11, 'name' => 'Venezuela', 'code' => 'VE'],
            ['id' => 12, 'name' => 'Equador', 'code' => 'EC'],
            ['id' => 13, 'name' => 'República Dominicana', 'code' => 'DO'],
            ['id' => 14, 'name' => 'Costa do Marfim', 'code' => 'CI'],
            ['id' => 15, 'name' => 'Togo', 'code' => 'TG'],
            ['id' => 16, 'name' => 'Inglaterra', 'code' => 'GB'],
            ['id' => 17, 'name' => 'Portugal', 'code' => 'PT'],
            ['id' => 18, 'name' => 'Peru', 'code' => 'PE'],
            ['id' => 19, 'name' => 'Alemanha', 'code' => 'DE'],
            ['id' => 20, 'name' => 'Irlanda', 'code' => 'IE'],
            ['id' => 21, 'name' => 'Escócia', 'code' => 'GB2'],
            ['id' => 22, 'name' => 'Chile', 'code' => 'CL'],
            ['id' => 23, 'name' => 'África do Sul', 'code' => 'ZA'],
            ['id' => 24, 'name' => 'Paraguai', 'code' => 'PY'],
            ['id' => 25, 'name' => 'Colômbia', 'code' => 'CO'],
            ['id' => 26, 'name' => 'Marrocos', 'code' => 'MA'],
            ['id' => 27, 'name' => 'Áustria', 'code' => 'AT'],
            ['id' => 28, 'name' => 'Honduras', 'code' => 'HN'],
            ['id' => 29, 'name' => 'Haiti', 'code' => 'HT'],
            ['id' => 30, 'name' => 'Nicarágua', 'code' => 'NI'],
            ['id' => 31, 'name' => 'Guatemala', 'code' => 'GT'],
            ['id' => 32, 'name' => 'Angola', 'code' => 'AO'],
            ['id' => 33, 'name' => 'Costa Rica', 'code' => 'CR'],
            ['id' => 34, 'name' => 'Panamá', 'code' => 'PA'],
            ['id' => 35, 'name' => 'El Salvador', 'code' => 'SV'],
            ['id' => 36, 'name' => 'Andorra', 'code' => 'AD'],
            ['id' => 37, 'name' => 'Moçambique', 'code' => 'MZ'],
            ['id' => 38, 'name' => 'Belize', 'code' => 'BZ'],
            ['id' => 39, 'name' => 'Holanda', 'code' => 'NL'],
            ['id' => 40, 'name' => 'Bélgica', 'code' => 'BE'],
            ['id' => 41, 'name' => 'São Tomé e Príncipe', 'code' => 'ST'],
            ['id' => 42, 'name' => 'Cabo Verde', 'code' => 'CV'],
            ['id' => 43, 'name' => 'Porto Rico', 'code' => 'PR'],
            ['id' => 44, 'name' => 'Suécia', 'code' => 'SE'],
            ['id' => 45, 'name' => 'Dinamarca', 'code' => 'DK'],
            ['id' => 46, 'name' => 'Israel', 'code' => 'IL'],
            ['id' => 47, 'name' => 'Rússia', 'code' => 'RU'],
            ['id' => 48, 'name' => 'Suíça', 'code' => 'CH'],
            ['id' => 49, 'name' => 'Uruguai', 'code' => 'UY'],
            ['id' => 50, 'name' => 'Emirados Árabes Unidos', 'code' => 'AE'],
            ['id' => 51, 'name' => 'Finlândia', 'code' => 'FI'],
            ['id' => 52, 'name' => 'Indonésia', 'code' => 'ID'],
            ['id' => 53, 'name' => 'Países Baixos', 'code' => 'PB'],

        ];


        foreach ($countries as $country) {
            DB::table('countries')->insert($country);
        }
    }
}
