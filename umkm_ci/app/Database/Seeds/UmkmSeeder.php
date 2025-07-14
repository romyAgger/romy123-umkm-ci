<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UmkmSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $this->db->table('umkms')->insert([
                'nama' => $faker->company,
                'alamat' => $faker->address,
                'tanggal_lahir_pemilik' => $faker->date(),
                'jenis_usaha' => $faker->randomElement(['Kuliner','Fashion','Kerajinan','Jasa']),
                'produk' => $faker->word,
                'foto' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
