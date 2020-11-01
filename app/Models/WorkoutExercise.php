<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutExercise extends Model {
    protected $fillable = [
        'user_id', 'workout_id', 'exercise_id'
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