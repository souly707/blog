<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        // Admin Role
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'System Administrator',
            'allowed_route' => 'admin',
        ]);

        // Editor Role
        $editorRole = Role::create([
            'name' => 'editor',
            'display_name' => 'Supervisor',
            'description' => 'System Supervisor',
            'allowed_route' => 'admin',
        ]);

        // User Role
        $userRole = Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Normal User',
            'allowed_route' => null,
        ]);

        // create Admin
        $admin = User::create([
            'name'              => 'Admin',
            'username'          => 'admin',
            'email'             => 'admin@blog.test',
            'mobile'             => '966500000001',
            'email_verified_at' => Carbon::now(),
            'password'          => bcrypt('123123123'),
            'status'            => 1,
        ]);
        $admin->attachRole($adminRole);

        // create Editor
        $editor = User::create([
            'name'              => 'Editor',
            'username'          => 'editor',
            'email'             => 'editor@blog.test',
            'mobile'             => '966500000002',
            'email_verified_at' => Carbon::now(),
            'password'          => bcrypt('123123123'),
            'status'            => 1,
        ]);
        $editor->attachRole($editorRole);

        // create User
        $user1 = User::create([
            'name'              => 'Sultan Aloufi',
            'username'          => 'sultan',
            'email'             => 'sultan@blog.test',
            'mobile'             => '966566631233',
            'email_verified_at' => Carbon::now(),
            'password'          => bcrypt('123123123'),
            'status'            => 1,
        ]);
        $user1->attachRole($userRole);

        $user2 = User::create([
            'name'              => 'Batul Aljedaibi',
            'username'          => 'batul',
            'email'             => 'batul@blog.test',
            'mobile'             => '966544787222',
            'email_verified_at' => Carbon::now(),
            'password'          => bcrypt('123123123'),
            'status'            => 1,
        ]);
        $user2->attachRole($userRole);

        for ($i = 0; $i <= 13; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->email,
                'mobile' => '966' . random_int(10000000, 99999999),
                'email_verified_at' => Carbon::now(),
                'password'          => bcrypt('123123123'),
                'status'            => 1,
            ]);
            $user->attachRole($userRole);
        }
    }
}
