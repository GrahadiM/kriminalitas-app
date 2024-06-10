<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'              => 'Admin',
            // 'phone'             => '085848735124',
            'email'             => 'admin@test.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);
        $roleAdmin = Role::create(['name' => 'admin']);
        $permissionsAdmin = Permission::pluck('id','id')->all();
        $roleAdmin->syncPermissions($permissionsAdmin);
        $admin->assignRole([$roleAdmin->id]);

        $pimpinan = User::create([
            'name'              => 'Kapolsek',
            'email'             => 'pimpinan@test.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);
        $rolePimpinan = Role::create(['name' => 'pimpinan']);
        $permissionsPimpinan = Permission::pluck('id','id')->all();
        $rolePimpinan->syncPermissions($permissionsPimpinan);
        $pimpinan->assignRole([$rolePimpinan->id]);
    }
}
