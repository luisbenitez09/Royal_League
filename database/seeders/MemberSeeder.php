<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member = new Member();
        $member->profile_id = 1;
        $member->access_code = 'AS32T';
        $member->save();

        $member = new Member();
        $member->profile_id = 2;
        $member->access_code = 'AS32T';
        $member->save();

        $member = new Member();
        $member->profile_id = 3;
        $member->access_code = 'AS32T';
        $member->save();
    }
}
