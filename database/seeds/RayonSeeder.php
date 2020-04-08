<?php

use App\Rayon;
use Illuminate\Database\Seeder;

class RayonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rayon = [
            ['rayon' => 'Cicurug 1', 'short' => 'Cic 1', 'pembimbing_id' => '1'],
            ['rayon' => 'Cicurug 2', 'short' => 'Cic 2', 'pembimbing_id' => '1'],
            ['rayon' => 'Cicurug 3', 'short' => 'Cic 3', 'pembimbing_id' => '1'],
            ['rayon' => 'Cicurug 4', 'short' => 'Cic 4', 'pembimbing_id' => '1'],
            ['rayon' => 'Cicurug 5', 'short' => 'Cic 5', 'pembimbing_id' => '1'],
        ];

        for ($i=0; $i < count($rayon); $i++) { 
            Rayon::create([
                'rayon' => $rayon[$i]['rayon'],
                'short' => $rayon[$i]['short'],
                'pembimbing_id' => $rayon[$i]['pembimbing_id']
            ]);
        }
    }
}
