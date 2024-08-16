<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // Create permissions
         Permission::create(['name' => 'edit articles']);
         Permission::create(['name' => 'delete articles']);
         Permission::create(['name' => 'publish articles']);
         Permission::create(['name' => 'unpublish articles']);
 
         // Create roles and assign existing permissions
         $role = Role::create(['name' => 'member']);
         $role->givePermissionTo('edit articles');
 
         $role = Role::create(['name' => 'agent']);
         $role->givePermissionTo('edit articles');
 
         $role = Role::create(['name' => 'trainer']);
         $role->givePermissionTo('edit articles');
 
         $role = Role::create(['name' => 'admin']);
         $role->givePermissionTo('edit articles');

         $role = Role::create(['name' => 'superadmin']);
         $role->givePermissionTo(Permission::all());
    }
}
