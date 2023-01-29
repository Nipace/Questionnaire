<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'questionnaire_id',
        'student_id',
        'token'
    ];
    
    /**
     * Belongs to relation with questionnaire
     *
     * @return void
     */
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class,'questionnaire_id','id');
    }

}
