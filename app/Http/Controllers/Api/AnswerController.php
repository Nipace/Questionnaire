<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AnswerRepository;
use App\Http\Resources\AnswerdSuccessResource;
use App\Http\Traits\CrudTraits\CrudTrait;
use App\Http\Traits\ResponseTraits\ApiResponseTrait;

class AnswerController extends Controller
{
    use ApiResponseTrait, CrudTrait;

    protected $model;

    protected $resource;

    public function __construct(AnswerRepository $model)
    {
        $this->model = $model;
        $this->resource = AnswerdSuccessResource::class;
    }

    /**
     * Egaer load the relations here
     *
     * @var array
     */
    public $with = [];

    /**
     * Validation rules 
     *
     * @var array
     */
    public $rules = [
        'questionnaire_id' => 'required',
        'question_id' => 'required',
        'student_id' => 'required',
        'answers' => 'required'
    ];
}
