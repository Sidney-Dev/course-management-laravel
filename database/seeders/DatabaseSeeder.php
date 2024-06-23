<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Course;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_user')->delete();
        User::truncate();
        Role::truncate();
        Course::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $createdUser = User::create([
            'name' => "admin",
            'email' => "admin@example.com",
            'password' => Hash::make('password')
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        $createdUser->roles()->attach($adminRole);

        $this->call([
            CourseSeeder::class,
        ]);
    }
}
