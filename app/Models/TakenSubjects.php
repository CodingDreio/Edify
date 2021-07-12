<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakenSubjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'pairID',
        'subjectID',
        'rate',
    ];
}
