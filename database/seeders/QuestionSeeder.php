<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'id' => 1,
                'section_id' => 1,
                'title' => 'The working principle of a washing machine is',
                'order' => 1,
                'options' => json_encode(['reverse osmosis', 'diffusion', 'centrifugation', 'dialysis']),
                'right_options' => json_encode(['centrifugation']),

            ],
            [
                'id' => 2,
                'section_id' => 1,
                'title' => 'Nuclear sizes are expressed in a unit named',
                'order' => 2,
                'options' => json_encode(['Fermi', 'Angstrom', 'Newton', 'Tesla']),
                'right_options' => json_encode(['Fermi']),

            ],
            [
                'id' => 3,
                'section_id' => 1,
                'title' => 'The speed of light will be minimum while passing through',
                'order' => 3,
                'options' => json_encode(['water', 'vaccum', 'air', 'glass']),
                'right_options' => json_encode(['glass']),

            ],
            [
                'id' => 4,
                'section_id' => 1,
                'title' => 'Which of the following is not a vector quantity?',
                'order' => 4,
                'options' => json_encode(['speed', 'velocity', 'torque', 'dialysis', 'displacement']),
                'right_options' => json_encode(['speed']),

            ],
            [
                'id' => 5,
                'section_id' => 1,
                'title' => 'The most suitable unit for expressing nuclear radius is',
                'order' => 5,
                'options' => json_encode(['micro', 'nanometre', 'fermi', 'angstrom']),
                'right_options' => json_encode(['fermi']),

            ],
            [
                'id' => 6,
                'section_id' => 1,
                'title' => 'Rain drops acquire spherical shape due to ',
                'order' => 6,
                'options' => json_encode(['viscosity', ' surface tension', 'friction', 'elasticity']),
                'right_options' => json_encode(['surface tension']),

            ],
            [
                'id' => 7,
                'section_id' => 1,
                'title' => 'An air bubble in water will act like a',
                'order' => 7,
                'options' => json_encode(['convex lens', 'convex mirror', 'concave lens', 'concave mirror']),
                'right_options' => json_encode(['concave lens']),

            ],
            [
                'id' => 8,
                'section_id' => 1,
                'title' => 'Temperature can be expressed as derived quantity in terms of any of the following',
                'order' => 8,
                'options' => json_encode(['length and mass', 'mass and time', 'length,mass and time', 'in terms of none']),
                'right_options' => json_encode(['in terms of none']),

            ],
            [
                'id' => 9,
                'section_id' => 2,
                'title' => 'The purest form of iron is',
                'order' => 9,
                'options' => json_encode(['wrought iron', 'steel', 'pig iron', 'nickel steel']),
                'right_options' => json_encode(['wrought iron']),
            ],
            [
                'id' => 10,
                'section_id' => 2,
                'title' => 'Hydrogen bomb is based on the principle of',
                'order' => 10,
                'options' => json_encode(['nuclear fission', 'nuclear fusion', 'natural radioactivity', 'artificial radioactivity']),
                'right_options' => json_encode(['nuclear fusion']),
            ],
            [
                'id' => 11,
                'section_id' => 2,
                'title' => 'Which of the following is a non metal that remains liquid at room temperature ?',
                'order' => 11,
                'options' => json_encode(['Chlorine', 'Phosphorous', 'Bromine', 'Helium']),
                'right_options' => json_encode(['Bromine']),
            ],
            [
                'id' => 12,
                'section_id' => 2,
                'title' => 'What is the structure of IF7 ?',
                'order' => 12,
                'options' => json_encode(['Triagonal bipyramid', 'tetrahedral', 'Pentagonal bipyramid', 'Square pyramid']),
                'right_options' => json_encode(['Pentagonal bipyramid']),
            ],
            [
                'id' => 13,
                'section_id' => 2,
                'title' => 'Brass gets discoloured in air because of the presence of which of the following gases in air  ?',
                'order' => 13,
                'options' => json_encode(['Hydrogen sulphide', ' Oxygen', 'Nitrogen', 'Carbon dioxide']),
                'right_options' => json_encode(['Hydrogen sulphide']),
            ],
            [
                'id' => 14,
                'section_id' => 2,
                'title' => 'Name the Scientist who stated that matter can be converted into energy',
                'order' => 14,
                'options' => json_encode(['Boyle', 'Lavoisier', 'Avogadro', 'Einstein']),
                'right_options' => json_encode(['Einstein']),
            ],
            [
                'id' => 15,
                'section_id' => 2,
                'title' => 'Among the given nutrients, milk is a poor source of',
                'order' => 15,
                'options' => json_encode(['Calcium', 'Protein', ' Vitamin C', 'Carbohydrates']),
                'right_options' => json_encode(['Vitamin C']),
            ],
            [
                'id' => 16,
                'section_id' => 2,
                'title' => 'When formaldehyde and potassium hydroxide are heated , we get ',
                'order' => 16,
                'options' => json_encode(['Acetylene', 'Methyl alcohol', 'Methane', 'Ethyl formate']),
                'right_options' => json_encode(['Methyl alcohol']),
            ],
        ];

        foreach ($questions as $question) {
            Question::updateOrCreate($question);
        }
    }
}
