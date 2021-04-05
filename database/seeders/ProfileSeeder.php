<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = new Profile();
        $profile->gamertag = 'Momonkun';
        $profile->platform = 'xbl';
        $profile->points = 5000;
        $profile->user_id = 2;
        $profile->tournaments = 3;
        $profile->save();

        $profile = new Profile();
        $profile->gamertag = 'Tobilin';
        $profile->platform = 'psn';
        $profile->points = 5000;
        $profile->user_id = 2;
        $profile->tournaments = 3;
        $profile->save();

        $profile = new Profile();
        $profile->gamertag = 'El kks';
        $profile->platform = 'battle';
        $profile->points = 5000;
        $profile->user_id = 2;
        $profile->tournaments = 3;
        $profile->save();
    }
}
