<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseStep extends Model {
    protected $fillable = [
        'user_id', 'exercise_id', 'description', 'priority'
    ];
}