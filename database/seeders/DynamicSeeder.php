<?php

namespace Database\Seeders;

use App\Models\Dynamic;
use Illuminate\Database\Seeder;

class DynamicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dynamic = new Dynamic();
        $dynamic->dynamic = "holi";
        $dynamic->tournament_id = 1;
        $dynamic->save();
    }
}
