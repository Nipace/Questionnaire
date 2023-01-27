<?php

namespace App\Http\Controllers\Api;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Http\Controllers\Controller;
use App\Http\Helpers\QuestionHelper;
use App\Http\Traits\CrudTraits\CrudTrait;
use App\Http\Resources\QuestionnaireResource;
use App\Http\Traits\ResponseTraits\ApiResponseTrait;

class QuestionnaireController extends Controller
{
    use ApiResponseTrait, CrudTrait;

    protected $model;

    protected $resource;

    protected $helper;

    protected $section;

    public function __construct(Questionnaire $model, QuestionHelper $helper, Section $section)
    {
        $this->model = $model;
        $this->resource = QuestionnaireResource::class;
        $this->helper = $helper;
        $this->section = $section;
    }

    /**
     * Egaer load the relations here
     *
     * @var array
     */
    public $with = ['questions'];

    /**
     * Validation rules 
     *
     * @var array
     */
    public $rules = [
        'title' => 'required',
        'expiry_date' => 'required'
    ];

    /**
     * Stores rows into the database
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules);
        $model = $this->model->create($data);
        foreach ($this->section->all() as $section) {
            $model->questions()->sync($this->helper->randomQuestions($section));
        }
        return $this->successResponse(new $this->resource($model), 'Record Created Succesfully', 200);
    }
}
