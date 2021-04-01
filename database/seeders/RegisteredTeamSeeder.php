<?php

namespace Database\Seeders;

use App\Models\Registered_team;
use Illuminate\Database\Seeder;

class RegisteredTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registered_team = new Registered_team();
        $registered_team->t_points = 1000;
        $registered_team->t_position = 4;
        $registered_team->status = 1;
        $registered_team->tournament_id = 1;
        $registered_team->team_id = 1;
        $registered_team->save();
    }
}
