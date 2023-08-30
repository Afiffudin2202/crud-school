<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Student::create([
            'name' => 'Afiffudin',
            'birthday' => 2022_02_22,
            'address' => 'Subang',
            'classroom_id' => 1
        ]);
        Student::create([
            'name' => 'Nova Perlita',
            'birthday' => 2022_11_24,
            'address' => 'Sukabumi',
            'classroom_id' => 2
        ]);
        Student::create([
            'name' => 'Joko',
            'birthday' => 2023_03_23,
            'address' => 'Pamulang',
            'classroom_id' => 3
        ]);
        
    }
}
