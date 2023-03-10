<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
        'right_options' => 'array'
    ];
    
    /**
     * Belongs to relation with section
     *
     * @return void
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
