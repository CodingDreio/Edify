<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'subject',
        'schedule',
        'description',
        'slot',
    ];

    // protected function subjectTopic()
    // {
    //     return $this->hasmMany(Topic::class);
    // }
}
