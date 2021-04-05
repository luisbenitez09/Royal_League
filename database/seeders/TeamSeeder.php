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
        $team->save();
    }
}
