<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = array(
            array('id' => 1, 'role' => 'Administrator', 'department_id' => 59),
            array('id' => 2, 'role' => 'ICTS Supervisor', 'department_id' => 59),
            array('id' => 3, 'role' => 'ICTS Technician', 'department_id' => 59),
        );

        foreach ($role as $roles) {
            DB::table('roles')->insert([
                'id' => $roles['id'],
                'role' => $roles['role'],
                'department_id' => $roles['department_id'],
            ]);
        }
    }
}
