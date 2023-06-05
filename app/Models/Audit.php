<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    const EVENT_TYPE_UPDATED = '1';

    protected $fillable = [
        'user_id',
        'event_type',
        'model_id',
        'old_data',
        'new_data',
        'diff_data',
        'table_name',
    ];
}