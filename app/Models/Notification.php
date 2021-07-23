<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status',
        'fromID',
        'toID',
        'title',
        'description',
        'activityID',
        'date',
        'time',
    ];
}
