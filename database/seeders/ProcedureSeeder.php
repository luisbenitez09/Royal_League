<?php

namespace Database\Seeders;

use App\Models\Procedure;
use Illuminate\Database\Seeder;

class ProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $procedure = new Procedure();
        $procedure->procedure = "holi";
        $procedure->tournament_id = 1;
        $procedure->save();
    }
}
