<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCQs extends Model
{
    public function Quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
