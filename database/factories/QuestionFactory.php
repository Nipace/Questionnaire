<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class QuestionFactory extends Factory
{
    private static $order = 1;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $options = fake()->words();
        return [
                'section_id' => '2',
                'title' => fake()->sentence(),
                'order' => self::$order++,
                'options' =>json_encode($options),
                'right_options'=> json_encode($options[1]),
        ];
    }
}
