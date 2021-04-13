<?php

namespace App\Database\Seeds;

// instantiating datetime ci
use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class PendudukSeeder extends Seeder
{
        public function run()
        {
                // $data = [
                //    [
                //         'nama'          => 'Fajar Ramadhan',
                //         'alamat'        => "Jl.Koma' Indah No 19 Rt 04/Rw 10
                //                       Leces Probolinggo, Jawa Timur, Indonesia",
                //         'created_at'    => TIME::now(),
                //         'updated_at'    => TIME::now()
                //    ],
                //    [
                //         'nama'          => 'Lucky Safira',
                //         'alamat'        => "Jl.Pelita 2 No 9 Rt 04/Rw 1
                //                       Leces Probolinggo, Jawa Timur, Indonesia",
                //         'created_at'    => TIME::now(),
                //         'updated_at'    => TIME::now()
                //    ],
                // ];

                // data faker
                $faker = \Faker\Factory::create('id_ID');
                for($i = 0; $i < 100; $i++){
                  $data = [
                        'nama'          => $faker->name(),
                        'alamat'        => $faker->address(),
                        'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                        'updated_at'    => TIME::now()     
                  ];
                  $this->db->table('penduduk')->insert($data);
                }

                // Simple Queries
                // $this->db->query("INSERT INTO penduduk (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)", $data);

                // Using Query Builder
                // $this->db->table('penduduk')->insertBatch($data);
        }
}