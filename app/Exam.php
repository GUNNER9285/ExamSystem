<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function score() {
        return $this->belongsTo(' App\Score');
    }
}
