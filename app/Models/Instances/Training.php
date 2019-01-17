<?php

namespace CharacterSheets\Models\Instances;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    // Get this training's character
    public function character() {
        return $this->belongsTo('CharacterSheets\Models\Instances\Character');
    }
    
    // Get this training's reference
    public function trainingRef() {
        return $this->belongsTo('CharacterSheets\Models\References\TrainingRef');
    }
}
