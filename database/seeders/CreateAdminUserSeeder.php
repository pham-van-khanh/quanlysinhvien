<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Phạm Văn Khánh',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1')
        ]);
        $admin = User::create([
            'name' => 'Trung Hieeus',
            'email' => 'student@gmail.com',
            'password' => bcrypt('1')
        ]);
        $role = Role::create(['name' => 'admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
        $admin->assignRole([$role->id]);
    }
}
