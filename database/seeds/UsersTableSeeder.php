<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Supper Administrator',
            'email'          => 'admin@task_manager.com',
            'password'       => '$2y$10$/.5EX7ejIqaykDpyu8N8uu3TB39DA63c35aziZR6vIxxwn8LoN75e',
            'remember_token' => null,
            'created_at'     => '2019-07-09 12:55:18',
            'updated_at'     => '2019-07-09 12:55:18',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
