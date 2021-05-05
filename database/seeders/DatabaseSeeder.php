<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(UserTableSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(TournamentSeeder::class);
        $this->call(ParameterSeeder::class);
        $this->call(RegisteredTeamSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RuleSeeder::class);
        $this->call(DynamicSeeder::class);
        $this->call(ProcedureSeeder::class);
    }
}
