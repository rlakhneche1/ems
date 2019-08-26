<?php

use Illuminate\Database\Seeder;
use \YaroslavMolchan\Rbac\Models\Role;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionsadmin = ['1','2','3','4','5','6','7','8','9','10','11','12'];

        $permissionsagent = ['13','14','15','16'];

        $adminrole = [
            "name" => "administrator",
            "slug" => "admin"
        ];

        $agentrole = [
            "name" => "administration agent",
            "slug" => "agent"
        ];

        $admin = Role::create($adminrole);

        $admin->attachPermission($permissionsadmin);

        $agent = Role::create($agentrole);

        $agent->attachPermission($permissionsagent);
    }
}
