<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function users() {
        return $this->hasMany('App\User');
    }
    public function exams() {
        return $this->hasMany('App\Exam');
    }
}
