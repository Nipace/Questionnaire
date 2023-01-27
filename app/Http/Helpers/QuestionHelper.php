<?php

namespace App\Http\Helpers;

use App\Models\Question;

/**
 * Helper to provide suppotive unit tasks
 */
class QuestionHelper
{

    private $model;

    public function __construct(Question $model)
    {
        $this->model = $model;
    }

    /**
     * Generate randomm 5 questions of each section
     *
     * @param  object $section
     * @return void
     */
    public function randomQuestions($section)
    {
        return $this->model->where('section_id', $section->id)->inRandomOrder()->limit(5)->pluck('id')->toArray();
    }
}
