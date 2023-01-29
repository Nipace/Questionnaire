<?php 

namespace App\Http\Repositories;

use App\Http\Helpers\QuestionHelper;
use App\Http\Traits\RepositoryTraits\CommonRepositoryTrait;
use App\Http\Traits\RepositoryTraits\CrudRepositoryTrait;
use App\Models\Questionnaire;
use App\Models\Section;
use Carbon\Carbon;

class QuestionnaireRepository{

    use CrudRepositoryTrait, CommonRepositoryTrait;

    protected $model;

    protected $section;

    protected $helper;

    public function __construct(Questionnaire $model, Section $section, QuestionHelper $helper)
    {
        $this->model = $model;
        $this->section = $section;
        $this->helper = $helper;
    }

    /**
     * Stores questionnaire qith ramdom questions 
     *
     * @param  mixed $data
     * @return void
     */
    public function store($data)
    {
        $model = $this->model->create($data);
        foreach ($this->section->all() as $section) {
            $model->questions()->attach($this->helper->randomQuestions($section));
        }
        return $model;
        
    }
    
    /**
     * Local scope to check questionnaire expiry
     *
     * @return $this
     */
    public function scope()
    {
        $this->model = $this->model->where('expiry_date','>',Carbon::today());
        return $this;
    }
}