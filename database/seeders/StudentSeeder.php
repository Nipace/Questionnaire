<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'name' => 'Ramesh',
                'email' => 'ramesh@test.com',
            
            ],
            [
                'name' => "Hari",
                'email' => 'hari@test.com',
        
            ],
        ];
        foreach ($students as $student) {               
            Student::updateOrCreate($student);
        }
    }
}
