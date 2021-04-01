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
        $team->name = 'Momitos';
        $team->owner = 'Reynaldo Meza';
        $team->points = 15000;
        $team->bestResult = 'N/A';
        $team->tournaments = 3;
        $team->access_code = 'AS32T';
        $team->save();
    }
}
