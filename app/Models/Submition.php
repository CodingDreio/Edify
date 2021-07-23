<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submition extends Model
{
    use HasFactory;

    protected $fillable = [
        'activityID',
        'title',
        'file',
        'description',
        'score',
    ];
}
