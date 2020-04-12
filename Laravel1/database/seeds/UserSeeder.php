<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listUser = ['admin', 'staff'];
        $listName = ['Admin', 'Rico Wibisana'];
        $listRole = ['admin', 'staff'];
        $role = 0;

        foreach ($listUser as $user) {
            User::create([
                'name' => $listName[$role],
                'email' => $user,
                'password' => bcrypt($user),
                'role' => $listRole[$role++]
            ]);
        }
    }
}
