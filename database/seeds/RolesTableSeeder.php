<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'         => 1,
                'title'      => 'Super Administrator',
                'created_at' => '2019-07-08 13:57:22',
                'updated_at' => '2019-07-08 13:57:22',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'title'      => 'Administrator',
                'created_at' => '2019-07-08 13:57:22',
                'updated_at' => '2019-07-08 13:57:22',
                'deleted_at' => null,
            ],
            [
                'id'         => 3,
                'title'      => 'Employee',
                'created_at' => '2019-07-08 13:57:22',
                'updated_at' => '2019-07-08 13:57:22',
                'deleted_at' => null,
            ]
        ];

        Role::insert($roles);
    }
}
