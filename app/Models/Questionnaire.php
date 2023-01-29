<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'expiry_date'
    ];

    /**
     * The attributes that comes from pivot relations.
     *
     * @var array<int, string>
     */
    public $pivots = ['questions'];

    /**
     * Belons to many relation with questions
     *
     * @return void
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'questionnaire_questions', 'questionnaire_id', 'question_id');
    }
}
