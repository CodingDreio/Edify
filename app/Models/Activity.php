<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'subjectID',
        'topicID',
        'takenID',
        'type',
        'title',
        'description',
        'date',
        'time',
        'file',
    ];
}
