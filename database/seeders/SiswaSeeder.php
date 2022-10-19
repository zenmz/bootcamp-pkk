<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake('id_ID');
        for ($i = 0; $i < 100; $i++) {
            Siswa::create([
                'nis' => $faker->randomNumber(5, true),
                'nama' => $faker->nik(),
                'alamat' => $faker->address(),
                'sekolah_id' => $faker->numberBetween(1, 2),
            ]);
        }
    }
}
