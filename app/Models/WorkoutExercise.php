<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutExercise extends Model {
    protected $table = 'exercise_workout';

    protected $fillable = [
        'user_id', 'workout_id', 'exercise_id', 'reps', 'duration'
    ];

    public function taggable() {
        return $this->morphTo();
    }

//    public function budgets() {
//        return $this->morphedByMany('App\Http\Models\Budget', 'taggable');
//    }
//
//    public function transactions() {
//        return $this->morphedByMany('App\Http\Models\Transaction', 'taggable');
//    }
}