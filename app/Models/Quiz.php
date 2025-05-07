<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quiz extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function Mcq(){
        return $this->hasMany(MCQs::class);
    }
}
