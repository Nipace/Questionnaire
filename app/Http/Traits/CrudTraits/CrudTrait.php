<?php

namespace App\Http\Traits\CrudTraits;

use Illuminate\Http\Request;

/**
 * Trait for controller methos for crud operations
 */
trait CrudTrait
{
    /**
     * Generates api for all items list
     *
     * @return void
     */
    public function index()
    {
        $model = $this->model;
        $model = $model->scope();
        $result = $model->with($this->with)->get();
        return $this->successResponse($this->resource::collection($result), 'Records Loaded Sucessfully', 200);
    }

    /**
     * Stores rows into the database
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules);
        $model = $this->model->store($data);
        if (isset($this->resource)) {
            return $this->successResponse(new $this->resource($model), 'Record Created Succesfully', 200);
        }
        return $this->response('Record Created Successfully', 200);
    }

    /**
     * Generates single view api 
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        $model = $this->model->findOrfail($id);
        return $this->successResponse(new $this->resource($model), 'Record loaded Sucessfully', 200);
    }

    /**
     * @return $this
     */
    public function scope()
    {
        return $this;
    }
}
