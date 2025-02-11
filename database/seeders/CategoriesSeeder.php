<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert data ke tabel categories
        DB::table('categories')->insert(
            [
                'id' => Str::uuid(),
                'name' => 'Assets',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('categories')->insert(
            [
                'id' => Str::uuid(),
                'name' => 'Components',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('categories')->insert(
            [
                'id' => Str::uuid(),
                'name' => 'Accessories',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('categories')->insert(
            [
                'id' => Str::uuid(),
                'name' => 'Licenses',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('categories')->insert(
            [
                'id' => Str::uuid(),
                'name' => 'Consumables',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
