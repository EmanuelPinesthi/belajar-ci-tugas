<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $today = date('Y-m-d');
        
        // Generate data diskon untuk 10 hari mulai dari hari ini
        for ($i = 0; $i < 10; $i++) {
            $tanggal = date('Y-m-d', strtotime($today . ' +' . $i . ' days'));
            $nominal = rand(50000, 200000); // Random nominal diskon
            
            $data[] = [
                'tanggal' => $tanggal,
                'nominal' => $nominal,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
        }

        foreach ($data as $item) {
            $this->db->table('diskon')->insert($item);
        }
    }
}