<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model {
    protected $fillable = [
        'user_id', 'title', 'slug', 'description'
    ];

    public function taggable() {
        return $this->morphTo();
    }

    public function steps() {
        return $this->hasMany('App\Http\Models\ExerciseStep');
    }

//    public function budgets() {
//        return $this->morphedByMany('App\Http\Models\Budget', 'taggable');
//    }
//
//    public function transactions() {
//        return $this->morphedByMany('App\Http\Models\Transaction', 'taggable');
//    }
}