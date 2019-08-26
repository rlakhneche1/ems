<?php

use Illuminate\Database\Seeder;

class permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                "name" => "create user",
                "slug" => "user.create"
            ],
            [
                "name" => "liste of users",
                "slug" => "user.index"
            ],
            [
                "name" => "update user",
                "slug" => "user.update"
            ],
            [
                "name" => "destroy user",
                "slug" => "user.destroy"
            ],
            [
                "name" => "create role",
                "slug" => "role.create"
            ],
            [
                "name" => "liste of roles",
                "slug" => "role.index"
            ],
            [
                "name" => "update role",
                "slug" => "role.update"
            ],
            [
                "name" => "destroy role",
                "slug" => "role.destroy"
            ],
            [
                "name" => "create permission",
                "slug" => "permission.create"
            ],
            [
                "name" => "liste of permissions",
                "slug" => "permission.index"
            ],
            [
                "name" => "update permission",
                "slug" => "permission.update"
            ],
            [
                "name" => "destroy permission",
                "slug" => "permission.destroy"
            ],
            [
                "name" => "create employee",
                "slug" => "employe.create"
            ],
            [
                "name" => "liste of employees",
                "slug" => "employe.index"
            ],
            [
                "name" => "update employee",
                "slug" => "employe.update"
            ],
            [
                "name" => "destroy employee",
                "slug" => "employe.destroy"
            ],
        ];

        DB::table('permissions')->insert($permissions);
    }
}
