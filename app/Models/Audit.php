<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    const EVENT_UPDATE = 'update';

    protected $fillable = [
        'user_id',
        'event',
        'model_id',
        'old_data',
        'new_data',
        'diff_data'
    ];
}