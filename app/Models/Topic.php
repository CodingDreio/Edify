<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'subjectID',
        'topic',
        'description',
    ];

    // protected function topicSubject()
    // {
    //     return $this->belongsTo(Subject::class);
    // }
}
