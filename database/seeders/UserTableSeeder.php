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
        $user->status = 1;
        $user->role_id = 1;
        $user->podiums = 25;
        $user->last_result = "1ro";
        $user->played_t = 25;
        
        $user->save();

        $user = new User();
        $user->name = "Maria Meza";
        $user->email = "maria@gmail.com";
        $user->password = bcrypt("123456789");
        $user->birthdate = "1999-08-28";
        $user->status = 1;
        $user->role_id = 2;
        $user->podiums = 25;
        $user->last_result = "1ro";
        $user->played_t = 25;
        $user->save();

        $user = new User();
        $user->name = "Gomita";
        $user->email = "gomita@gmail.com";
        $user->password = bcrypt("12345678");
        $user->birthdate = "1999-08-28";
        $user->status = 0;
        $user->role_id = 2;
        $user->podiums = 5;
        $user->last_result = "3ro";
        $user->played_t = 10;
        $user->save();
    }
}