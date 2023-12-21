<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'question',
        'serial_number',
        'group_id',
        'description'
    ];
}
