<?php

use Illuminate\Database\Seeder;
use App\User;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
        	'name' => "admin",
        	'email' => "admin@gmail.com",
        	'password' => bcrypt('admin123'),
        ];

        $agent = [
        	'name' => "agent",
        	'email' => "agent@gmail.com",
        	'password' => bcrypt('agent123'),
        ];

        $adminstrateur = User::create($admin);

        $adminstrateur->attachRole(1);

        $agent = User::create($agent);

        $agent->attachRole(2);
    }
}
