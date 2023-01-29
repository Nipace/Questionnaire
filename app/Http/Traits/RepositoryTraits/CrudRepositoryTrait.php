<?php

namespace App\Http\Traits\RepositoryTraits;

/**
 * Trait CrudRepositoryTrait
 * 
 */
trait CrudRepositoryTrait
{

    /**
     * Create a new row
     *
     * @param  array $data
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function store($data)
    {
        $model = $this->model->create($data);
        if ($this->model->pivots) {
            foreach ($this->model->pivots as $pivot) {
                if (isset($data[$pivot])) {
                    $model->$pivot()->sync($data[$pivot]);
                }
            }
        }
        return $model;
    }

    /**
     * Update a row
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $model = $this->model->find($id);
        $model->update($data);
        if ($model->pivots) {
            foreach ($model->pivots as $pivot) {
                $data[$pivot] = $data[$pivot] ?? [];
                $model->$pivot()->sync($data[$pivot]);
            }
        }
        return $model;
    }

    /**
     * @return $this
     */
    public function scope()
    {
        return $this;
    }
}
