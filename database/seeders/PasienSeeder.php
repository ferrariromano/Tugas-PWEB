<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'nama' => 'John Doe',
                'alamat' => 'Jl. Sudirman No. 123, Jakarta',
                'telepon' => '08000000000'
            ],
            [
                'nama' => 'Jane Smith',
                'alamat' => 'Jl. Gatot Subroto No. 456, Jakarta',
                'telepon' => '08111111111'
            ],
            [
                'nama' => 'Michael Brown',
                'alamat' => 'Jl. Thamrin No. 789, Jakarta',
                'telepon' => '08222222222'
            ],
            [
                'nama' => 'Maria Garcia',
                'alamat' => 'Jl. Kebon Sirih No. 101, Jakarta',
                'telepon' => '08333333333'
            ],
            [
                'nama' => 'James Lee',
                'alamat' => 'Jl. MH Thamrin No. 234, Jakarta',
                'telepon' => '08444444444'
            ],
            [
                'nama' => 'Sarah Wilson',
                'alamat' => 'Jl. Gajah Mada No. 567, Jakarta',
                'telepon' => '08555555555'
            ],
            [
                'nama' => 'David Perez',
                'alamat' => 'Jl. Diponegoro No. 888, Jakarta',
                'telepon' => '08666666666'
            ],
            [
                'nama' => 'Laura Martinez',
                'alamat' => 'Jl. Merdeka No. 999, Jakarta',
                'telepon' => '08777777777'
            ],
            [
                'nama' => 'Richard Taylor',
                'alamat' => 'Jl. Asia Afrika No. 111, Jakarta',
                'telepon' => '08888888888'
            ],
            [
                'nama' => 'Emily Kim',
                'alamat' => 'Jl. Pemuda No. 222, Jakarta',
                'telepon' => '08999999999'
            ]
        ];

        foreach ($data as $pasien) {
            Pasien::create($pasien);
        }
    }
}
