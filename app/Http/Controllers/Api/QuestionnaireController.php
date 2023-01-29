<?php

namespace App\Http\Controllers\Api;

use App\Models\Section;
use App\Http\Controllers\Controller;
use App\Http\Helpers\QuestionHelper;
use App\Http\Repositories\QuestionnaireRepository;
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

    public function __construct(QuestionnaireRepository $model, QuestionHelper $helper, Section $section)
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
    public $with = [];

    /**
     * Validation rules 
     *
     * @var array
     */
    public $rules = [
        'title' => 'required',
        'expiry_date' => 'required'
    ];

}
