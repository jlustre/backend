<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        $user = User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@efgsteps.com',
            'password' => bcrypt('password'),
            'sponsor_id' => 1,
            'email_verified_at' => now(),
            'created_at' => now()
        ]);

        $user->assignRole('superadmin');

        Profile::create([
            'user_id' => $user->id,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'phone' => '1234567890',
            'country_id' => 1, 
            'timezone_id' => 1, 
            'created_at' => now()
        ]);

        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@efgsteps.com',
            'password' => bcrypt('password'),
            'sponsor_id' => 1,
            'email_verified_at' => now(),
            'created_at' => now()
        ]);

        $user->assignRole('admin');

        Profile::create([
            'user_id' => $user->id,
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'phone' => '123456734',
            'country_id' => 1, 
            'timezone_id' => 1, 
            'created_at' => now()
        ]);

        $user = User::create([
            'name' => 'User1',
            'username' => 'user1',
            'email' => 'user1@email.com',
            'password' => bcrypt('password'),
            'sponsor_id' => 2,
            'email_verified_at' => now(),
            'created_at' => now()
        ]);
        $user->assignRole('trainer');

        Profile::create([
            'user_id' => $user->id,
            'first_name' => 'User1',
            'last_name' => 'User1',
            'phone' => '123456745',
            'country_id' => 2, 
            'timezone_id' => 1, 
            'created_at' => now()
        ]);

        $user = User::create([
            'name' => 'User2',
            'username' => 'user2',
            'email' => 'user2@email.com',
            'password' => bcrypt('password'),
            'sponsor_id' => 2,
            'email_verified_at' => now(),
            'created_at' => now()
        ]);
        $user->assignRole('member');

        Profile::create([
            'user_id' => $user->id,
            'first_name' => 'User2',
            'last_name' => 'User2',
            'phone' => '123456235',
            'country_id' => 2, 
            'timezone_id' => 1, 
            'created_at' => now()
        ]);

        User::factory(10)->create();
        Task::factory(50)->create();

    }
}
