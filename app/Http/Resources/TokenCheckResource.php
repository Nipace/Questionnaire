<?php

namespace App\Http\Resources;

use App\Http\Resources\QuestionnaireResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TokenCheckResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'questionnaire_id' => $this->questionnaire_id,
            'student_id' => $this->student_id,
            'questionnaire' => new QuestionnaireResource($this->questionnaire)
        ];
    }
}
