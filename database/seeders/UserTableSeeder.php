<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Luis Angel Benitez";
        $user->email = "luis@gmail.com";
        $user->password = bcrypt("12345678");
        $user->birthdate = "1997-09-29";
        $user->save();
    }
}