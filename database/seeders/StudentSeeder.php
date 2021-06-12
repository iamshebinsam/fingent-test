<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::factory()
        ->count(10)
        ->for(Teacher::factory()->state([
            'name' => 'Shebin',
        ]))
        ->create();
    }
}
