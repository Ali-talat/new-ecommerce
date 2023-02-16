<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'edit cats']);
        // Permission::create(['name' => 'delete cats']);
        // Permission::create(['name' => 'publish cats']);
        // Permission::create(['name' => 'unpublish cats']);
        // Permission::create(['name' => 'edit attribute']);
        // Permission::create(['name' => 'delete attribute']);
        // Permission::create(['name' => 'publish attribute']);
        // Permission::create(['name' => 'unpublish attribute']);
        // Permission::create(['name' => 'edit brand']);
        // Permission::create(['name' => 'delete brand']);
        // Permission::create(['name' => 'publish brand']);
        // Permission::create(['name' => 'unpublish brand']);
        // Permission::create(['name' => 'edit order']);
        // Permission::create(['name' => 'delete order']);
        // Permission::create(['name' => 'publish order']);
        // Permission::create(['name' => 'unpublish order']);
        // Permission::create(['name' => 'edit products']);
        // Permission::create(['name' => 'delete products']);
        // Permission::create(['name' => 'publish products']);
        // Permission::create(['name' => 'unpublish products']);
        Permission::create(['name' => 'edit role','guard_name'=>'admin']);
        Permission::create(['name' => 'delete role','guard_name'=>'admin']);
        Permission::create(['name' => 'publish role','guard_name'=>'admin']);
        Permission::create(['name' => 'unpublish role','guard_name'=>'admin']);
        Permission::create(['name' => 'edit user','guard_name'=>'admin']);
        Permission::create(['name' => 'delete user','guard_name'=>'admin']);
        Permission::create(['name' => 'publish user','guard_name'=>'admin']);
        Permission::create(['name' => 'unpublish user','guard_name'=>'admin']);

        // create roles and assign created permissions

        // this can be done as separate statements

    
        $role = Role::create(['name' => 'user','guard_name'=>'admin']);
        $role->givePermissionTo(['publish products', 'unpublish products','delete products','edit products']);

        // or may be done by chaining
        // $role = Role::create(['name' => 'admin'])
        //     ->givePermissionTo(['publish cats', 'unpublish cats','delete cats','edit cats' ,'publish products', 'unpublish products','delete products','edit products']);

        $role = Role::create(['name' => 'owner','guard_name'=>'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
