<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'id'=>1,
                'name' => 'physics',
                'order' => '1',
            ],
            [
                'id'=>2,
                'name' => 'Chemistry',
                'order' => '2',
            ],
        ];
        foreach ($sections as $section) {               
            Section::updateOrCreate($section);
        }
    }
}
