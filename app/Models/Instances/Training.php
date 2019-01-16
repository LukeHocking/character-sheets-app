<?php

namespace CharacterSheets;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    // Get this training's character
    public function character() {
        return $this->belongsTo('CharacterSheets\Character');
    }
    
    // Get this training's reference
    public function trainingRef() {
        return $this->belongsTo('CharacterSheets\TrainingRef');
    }
}
