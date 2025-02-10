<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate UUIDs
        $sectionId = Str::uuid();
        $positionId = Str::uuid();
        $roleId = Str::uuid();
        $userId = Str::uuid();

        // Insert data ke tabel sections
        DB::table('sections')->insert([
            'id' => $sectionId,
            'name' => 'Information Technology Support',
            'tag' => 'ITS',
            'color' => '#FF0000',
            'description' => 'Information Technology Support',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data ke tabel positions
        DB::table('positions')->insert([
            'id' => $positionId,
            'name' => 'Staff',
            'tag' => 'STF',
            'color' => '#00FF00',
            'description' => 'Staff',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert data ke tabel roles
        DB::table('roles')->insert([
            'id' => $roleId,
            'name' => 'Administrator',
            'tag' => 'ADM',
            'color' => '#0000FF',
            'description' => 'Administrator',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert user admin ke tabel users
        DB::table('users')->insert([
            'id' => $userId,
            'name' => 'Administrator IT Asset Management',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'section_id' => $sectionId,
            'position_id' => $positionId,
            'role_id' => $roleId,
            'login_application' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
