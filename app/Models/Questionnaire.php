<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $pivots = ['questions'];

    public function questions()
    {
        return $this->belongsToMany(Question::class,'questionnaire_questions','questionnaire_id','question_id');
    }
    
}
