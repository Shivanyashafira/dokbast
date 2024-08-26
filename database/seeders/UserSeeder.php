<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert data for each user into the 'users' table with 'Kepala Bidang' as the posisi
    DB::table('users')->insert([
        [
            "id_employee" => 1,
            "name" => "Lufiandi, ST., M.Sc",
            "email" => "lufiandi@gmail.com",
            "password" => Hash::make("Admin123!"),
            "posisi" => "Kepala Bidang",
            "status" => "Y"
        ],
        [
            "id_employee" => 2,
            "name" => "Afriyani Amran, S.T., M.T.",
            "email" => "afriyani@gmail.com",
            "password" => Hash::make("Admin123!"),
            "posisi" => "Kepala Bidang",
            "status" => "Y"
        ],
        [
            "id_employee" => 3,
            "name" => "Eka Jatnika Sundana, ST., M.Sc",
            "email" => "eka@gmail.com",
            "password" => Hash::make("Admin123!"),
            "posisi" => "Kepala Bidang",
            "status" => "Y"
        ],
        [
            "id_employee" => 4,
            "name" => "Ane Carolina, S.Si., M.Eng",
            "email" => "ane@gmail.com",
            "password" => Hash::make("Admin123!"),
            "posisi" => "Kepala Bidang",
            "status" => "Y"
        ],
        [
            "id_employee" => 5,
            "name" => "Cipta Gusti Batara M. Nur, SE., M.A.B",
            "email" => "cipta@gmail.com",
            "password" => Hash::make("Admin123!"),
            "posisi" => "Kepala Bidang",
            "status" => "Y"
        ],
        [
            "id_employee" => 6,
            "name" => "Gunawan, S.T., M.T.",
            "email" => "gunawan@gmail.com",
            "password" => Hash::make("Admin123!"),
            "posisi" => "Kepala Bidang",
            "status" => "Y"
        ]
    ]);

    }
}
