<?php

namespace App\Http\Traits\ResponseTraits;
/**
 * Trait for api respones
 */
trait ApiResponseTrait
{

    /**
     * Generates success response for api
     *
     * @param  mixed $resource
     * @param  string $message
     * @param  int $code
     * @return void
     */
    public function successResponse($resource, String $message = null, Int $code,)
    {
        $response = [
            'status' => true,
            'data' => $resource,
            'message' => $message ?? 'The request was sucessfully performed'
        ];
        return $this->response($response, $code);
    }

    /**
     * Generates failure response for api
     *
     * @param  array $resource
     * @param  string $message
     * @param  int $code
     * @return void
     */
    public function failureResponse(Int $code = null, array $resource = null, String $message = null)
    {
        $response = [
            'status' => false,
            'data' => $resource,
            'message' => $message ?? 'The request to server failed'
        ];
        return $this->response($response, $code ?? 500);
    }

    /**
     * Returns the general json api response
     *
     * @param  array $response
     * @param  int $code
     * @return void
     */
    public function response(array $response, Int $code)
    {
        return response()->json($response, $code);
    }
}
