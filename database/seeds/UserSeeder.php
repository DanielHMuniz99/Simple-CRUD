<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "Jorge da Silva",
                'email' => "jorge@terra.com.br",
                'category_id' => 1,
            ],
            [
                'name' => "Flavia Monteiro",
                'email' => "flavia@globo.com",
                'category_id' => 2,
            ],
            [
                'name' => "Marcos Frota Ribeiro",
                'email' => "ribeiro@gmail.com",
                'category_id' => 2,
            ],
            [
                'name' => "Raphael Souza Santos",
                'email' => "rsantos@gmail.com",
                'category_id' => 1,
            ],
            [
                'name' => "Pedro Paulo Mota",
                'email' => "ppmota@gmail.com",
                'category_id' => 1,
            ],
            [
                'name' => "Winder Carvalho da Silva",
                'email' => "winder@hotmail.com",
                'category_id' => 3,
            ],
            [
                'name' => "Maria da Penha Albuquerque",
                'email' => "mpa@hotmail.com",
                'category_id' => 3,
            ],
            [
                'name' => "Rafael Garcia Souza",
                'email' => "rgsouza@hotmail.com",
                'category_id' => 3,
            ],
            [
                'name' => "Tabata Costa",
                'email' => "tabata_costa@gmail.com",
                'category_id' => 2,
            ],
            [
                'name' => "Ronil Camarote",
                'email' => "camarote@terra.com.br",
                'category_id' => 1,
            ],
            [
                'name' => "Joaquim Barbosa",
                'email' => "barbosa@globo.com",
                'category_id' => 1,
            ],
            [
                'name' => "Eveline Maria Alcantra",
                'email' => "ev_alcantra@gmail.com",
                'category_id' => 2,
            ],
            [
                'name' => "João Paulo Vieira",
                'email' => "jpvieira@gmail.com",
                'category_id' => 1,
            ],
            [
                'name' => "Carla Zamborlini",
                'email' => "zamborlini@terra.com.br",
                'category_id' => 3,
            ]
        ]);
    }
}
