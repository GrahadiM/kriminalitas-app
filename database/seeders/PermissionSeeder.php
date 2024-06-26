<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // place
            'place-C',
            'place-R',
            'place-U',
            'place-D',
            // history
            'history-C',
            'history-R',
            'history-U',
            'history-D',
            // dashboard
            'dashboard-C',
            'dashboard-R',
            'dashboard-U',
            'dashboard-D',
            // config website
            'website-C',
            'website-R',
            'website-U',
            'website-D',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
       }
    }
}
