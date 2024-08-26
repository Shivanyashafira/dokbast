<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee')->insert([
            [
                'nama' => 'Lufiandi, ST., M.Sc',
                'nik' => rand(100000000, 999999999),
                'nip' => rand(100000000, 999999999),
            ],
            [
                'nama' => 'Afriyani Amran, S.T., M.T.',
                'nik' => rand(100000000, 999999999),
                'nip' => rand(100000000, 999999999),
            ],
            [
                'nama' => 'Eka Jatnika Sundana, ST., M.Sc',
                'nik' => rand(100000000, 999999999),
                'nip' => rand(100000000, 999999999),
            ],
            [
                'nama' => 'Ane Carolina, S.Si., M.Eng',
                'nik' => rand(100000000, 999999999),
                'nip' => rand(100000000, 999999999),
            ],
            [
                'nama' => 'Cipta Gusti Batara M. Nur, SE., M.A.B',
                'nik' => rand(100000000, 999999999),
                'nip' => rand(100000000, 999999999),
            ],
            [
                'nama' => 'Gunawan, S.T., M.T.',
                'nik' => rand(100000000, 999999999),
                'nip' => rand(100000000, 999999999),
            ],
        ]);
    }
}
