<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    // Get this training's character
    public function character() {
        return $this->belongsTo('App\Character');
    }
    
    // Get this training's reference
    public function trainingRef() {
        return $this->belongsTo('App\TrainingRef');
    }
}
