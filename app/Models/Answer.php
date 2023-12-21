<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'answertable_id',
        'answertable_type',
        'question_id',
        'answer',
        'answer_date',
        'status'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
