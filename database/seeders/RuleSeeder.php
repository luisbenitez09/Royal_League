<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rule = new Rule();
        $rule->rule = "Se prohíbe el uso de cuentas nuevas (mínimo 75 partidas jugadas).";
        $rule->tournament_id = 1;
        $rule->save();

        $rule = new Rule();
        $rule->rule = "Se prohíbe el uso de reverse boosting.";
        $rule->tournament_id = 1;
        $rule->save();

        $rule = new Rule();
        $rule->rule = "El crossplay deberá estar activo durante las partidas.";
        $rule->tournament_id = 1;
        $rule->save();

        $rule = new Rule();
        $rule->rule = "Cada jugador debe identificarse con el ID de ACTIVISION.";
        $rule->tournament_id = 1;
        $rule->save();

        $rule = new Rule();
        $rule->rule = "Deberán tener público su perfil en cod.tracker.gg/modern-warfare.";
        $rule->tournament_id = 1;
        $rule->save();

        $rule = new Rule();
        $rule->rule = "Se monitoreará el perfil de los participantes para comparar su rendimiento con semanas pasadas.";
        $rule->tournament_id = 1;
        $rule->save();

        $rule = new Rule();
        $rule->rule = "Mínimo un participante deberá hacer stream en Facebook o Twitch, los que no puedan deberán grabar sus partidas y tener el audio activo de sus compañeros para poder escuchar los call outs.";
        $rule->tournament_id = 1;
        $rule->save();

        $rule = new Rule();
        $rule->rule = "Poner como título del Stream 'Torneo Royal League'.";
        $rule->tournament_id = 1;
        $rule->save();

        $rule = new Rule();
        $rule->rule = "Respeto para todos los participantes y administradores.";
        $rule->tournament_id = 1;
        $rule->save();
    }
}
