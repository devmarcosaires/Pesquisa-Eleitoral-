<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(array(
            0 =>
            array(
                'title' => 'Acre',
                'letter' => 'AC',
                'iso' => '12',
                'slug' => 'acre',
            ),
            1 =>
            array(
                'title' => 'Alagoas',
                'letter' => 'AL',
                'iso' => '27',
                'slug' => 'alagoas',
            ),
            2 =>
            array(
                'title' => 'Amazonas',
                'letter' => 'AM',
                'iso' => '13',
                'slug' => 'amazonas',
            ),
            3 =>
            array(
                'title' => 'Amapá',
                'letter' => 'AP',
                'iso' => '16',
                'slug' => 'amapa',
            ),
            4 =>
            array(
                'title' => 'Bahia',
                'letter' => 'BA',
                'iso' => '29',
                'slug' => 'bahia',
            ),
            5 =>
            array(
                'title' => 'Ceará',
                'letter' => 'CE',
                'iso' => '23',
                'slug' => 'ceara',
            ),
            6 =>
            array(
                'title' => 'Distrito Federal',
                'letter' => 'DF',
                'iso' => '53',
                'slug' => 'distrito-federal',
            ),
            7 =>
            array(
                'title' => 'Espírito Santo',
                'letter' => 'ES',
                'iso' => '32',
                'slug' => 'espirito-santo',
            ),
            8 =>
            array(
                'title' => 'Goiás',
                'letter' => 'GO',
                'iso' => '52',
                'slug' => 'goias',
            ),
            9 =>
            array(
                'title' => 'Maranhão',
                'letter' => 'MA',
                'iso' => '21',
                'slug' => 'maranhao',
            ),
            10 =>
            array(
                'title' => 'Minas Gerais',
                'letter' => 'MG',
                'iso' => '31',
                'slug' => 'minas-gerais',
            ),
            11 =>
            array(
                'title' => 'Mato Grosso do Sul',
                'letter' => 'MS',
                'iso' => '50',
                'slug' => 'mato-grosso-do-sul',
            ),
            12 =>
            array(
                'title' => 'Mato Grosso',
                'letter' => 'MT',
                'iso' => '51',
                'slug' => 'mato-grosso',
            ),
            13 =>
            array(
                'title' => 'Pará',
                'letter' => 'PA',
                'iso' => '15',
                'slug' => 'para',
            ),
            14 =>
            array(
                'title' => 'Paraiba',
                'letter' => 'PB',
                'iso' => '25',
                'slug' => 'paraiba',
            ),
            15 =>
            array(
                'title' => 'Pernambuco',
                'letter' => 'PE',
                'iso' => '26',
                'slug' => 'pernambuco',
            ),
            16 =>
            array(
                'title' => 'Piauí',
                'letter' => 'PI',
                'iso' => '22',
                'slug' => 'piaui',
            ),
            17 =>
            array(
                'title' => 'Paraná',
                'letter' => 'PR',
                'iso' => '41',
                'slug' => 'parana',
            ),
            18 =>
            array(
                'title' => 'Rio de Janeiro',
                'letter' => 'RJ',
                'iso' => '33',
                'slug' => 'rio-de-janeiro',
            ),
            19 =>
            array(
                'title' => 'Rio Grande do Norte',
                'letter' => 'RN',
                'iso' => '24',
                'slug' => 'rio-grande-do-norte',
            ),
            20 =>
            array(
                'title' => 'Rondônia',
                'letter' => 'RO',
                'iso' => '11',
                'slug' => 'rondonia',
            ),
            21 =>
            array(
                'title' => 'Roraima',
                'letter' => 'RR',
                'iso' => '14',
                'slug' => 'roraima',
            ),
            22 =>
            array(
                'title' => 'Rio Grande do Sul',
                'letter' => 'RS',
                'iso' => '43',
                'slug' => 'rio-grande-do-sul',
            ),
            23 =>
            array(
                'title' => 'Santa Catarina',
                'letter' => 'SC',
                'iso' => '42',
                'slug' => 'santa-catarina',
            ),
            24 =>
            array(
                'title' => 'Sergipe',
                'letter' => 'SE',
                'iso' => '28',
                'slug' => 'sergipe',
            ),
            25 =>
            array(
                'title' => 'São Paulo',
                'letter' => 'SP',
                'iso' => '35',
                'slug' => 'sao-paulo',
            ),
            26 =>
            array(
                'title' => 'Tocantins',
                'letter' => 'TO',
                'iso' => '17',
                'slug' => 'tocantins',
            ),
        ));
    }
}
