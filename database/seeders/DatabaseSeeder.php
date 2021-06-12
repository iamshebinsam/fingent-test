<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TeacherSeeder::class,
            StudentSeeder::class,
            TermSeeder::class,
        ]);
    }
}
