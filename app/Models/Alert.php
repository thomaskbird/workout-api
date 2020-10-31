<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model {
    protected $fillable = [
        'user_id', 'budget_id', 'threshold'
    ];
}