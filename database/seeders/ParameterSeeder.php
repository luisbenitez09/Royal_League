<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter = new Parameter();
        $parameter->parameter = "WIN - 200pts";
        $parameter->tournament_id = 1;
        $parameter->save();

        $parameter = new Parameter();
        $parameter->parameter = "2do lugar - 150pts";
        $parameter->tournament_id = 1;
        $parameter->save();

        $parameter = new Parameter();
        $parameter->parameter = "3er lugar - 100pts";
        $parameter->tournament_id = 1;
        $parameter->save();

        $parameter = new Parameter();
        $parameter->parameter = "Top 4-10 - 50pts";
        $parameter->tournament_id = 1;
        $parameter->save();

        $parameter = new Parameter();
        $parameter->parameter = "Win - 10pts";
        $parameter->tournament_id = 1;
        $parameter->save();
    }
}
