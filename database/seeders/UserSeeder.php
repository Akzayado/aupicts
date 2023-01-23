<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array('id' => 1, 'username' => 'akzayado15', 'name' => 'Rey Eduard Torres', 'email' => '2047584@aup.edu.ph', 'role_id' => 1, 'auth_level' => 5, 'password' => Hash::make('2047584')),
        );

        foreach ($users as $user) {
            DB::table('users')->insert([
                'id' => $user['id'],
                'username' => $user['username'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role_id' => $user['role_id'],
                'auth_level' => $user['auth_level'],
                'password' => $user['password'],
            ]);
        }
    }
}
