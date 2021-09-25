<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'user_management_access',
            'permission_create',
            'permission_edit',
            'permission_show',
            'permission_delete',
            'permission_access',
            'role_create',
            'role_edit',
            'role_show',
            'role_delete',
            'role_access',
            'agent_create',
            'agent_edit',
            'agent_show',
            'agent_delete',
            'agent_access',
            'client_create',
            'client_edit',
            'client_show',
            'client_delete',
            'client_access',
            'place_create',
            'place_edit',
            'place_show',
            'place_delete',
            'place_access',
            'comment_create',
            'comment_edit',
            'comment_show',
            'comment_delete',
            'comment_access',
            'allergen_access',
            'allergen_create',
            'allergen_show',
            'allergen_edit',
            'allergen_delete',
        ];

        foreach ($permissions as $permission)   {
            Permission::create([
                'name' => $permission
            ]);
        }

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $super_admin=Role::create(['name' => 'super_admin']);

        $agent = Role::create(['name' => 'agent']);

        $agentPermissions = [
            'client_create',
            'client_edit',
            'client_show',
            'client_delete',
            'client_access',
            'place_create',
            'place_edit',
            'place_show',
            'place_delete',
            'place_access',
        ];

        foreach ($agentPermissions as $permission)   {
            $agent->givePermissionTo($permission);
        }
        $super_admin->syncPermissions(permission::all());
    }
    
}
