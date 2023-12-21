<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responden extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'ip_address'
    ];

    protected $appends = [
        'score'
    ];

    public function answers()
    {
        return $this->morphMany(Answer::class, 'answertable')->with('question');
    }

    public function getScoreAttribute()
    {
        $totalScore = 0;
        $max = 100;
        $totalQuestion = count($this->answers);
        foreach ($this->answers as $key => $value) {
            $calculate = ($max/$totalQuestion) / 5;
            $calculateFinal = $calculate * $value->answer;
            $totalScore += $calculateFinal;
        }
        return number_format($totalScore, 0).'%';
    }
}
