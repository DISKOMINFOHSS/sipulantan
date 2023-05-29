<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);

        $sa = User::create([
            'name'          => 'Super Admin',
            'username'      => 'superadmin',
            'password'      => Hash::make('password'),
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        $sa->assignRole('admin');

        $admin = User::create([
            'name'          => 'Admin',
            'username'      => 'admin',
            'password'      => Hash::make('password'),
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
        $admin->assignRole('admin');
    }
}
