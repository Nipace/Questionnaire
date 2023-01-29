<?php

namespace App\Http\Repositories;

use App\Http\Traits\RepositoryTraits\CrudRepositoryTrait;
use App\Models\Answer;

class AnswerRepository
{

    use CrudRepositoryTrait;

    protected $model;

    public function __construct(Answer $model)
    {
        $this->model = $model;
    }

    /**
     * Stores ansers with json_encode 
     *
     * @param  mixed $data
     * @return void
     */
    public function store($data)
    {
        $data['answers'] = json_encode($data['answers']);
        $model = $this->model->create($data);
        return $model;
    }
}
