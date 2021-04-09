<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = new Team();
        $team->name = 'Momos 4k';
        $team->owner = 2;
        $team->points = 15000;
        $team->bestResult = '1ro';
        $team->tournaments = 3;
        $team->access_code = 'AS32T';
        $team->status = 1;
        $team->save();

        $team = new Team();
        $team->name = 'Fouz Team';
        $team->owner = 2;
        $team->points = 3000;
        $team->bestResult = '1ro';
        $team->tournaments = 3;
        $team->access_code = 'AS32TFFFF';
        $team->status = 1;
        $team->save();
    }
}
