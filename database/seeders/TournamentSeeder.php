<?php

namespace Database\Seeders;

use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tournament = new Tournament();
        $tournament->title = "Primer torneo de warzone";
        $tournament->game = 'COD Warzone';
        $tournament->image = 'image.png';
        $tournament->date = 'Jueves 23 de Octubre 2021';
        $tournament->time = '14:00 - 20:00 Hora CDMX (GMT-6)';
        $tournament->kd = '10 max / team';
        $tournament->status = 1;
        $tournament->price1 = 3000;
        $tournament->price2 = 1500;
        $tournament->price3 = 500;
        $tournament->save();
    }
}
