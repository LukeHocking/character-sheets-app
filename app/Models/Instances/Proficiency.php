<?php

namespace CharacterSheets\Models\Instances;

use Illuminate\Database\Eloquent\Model;

class Proficiency extends Model
{
    // Get this proficiency's character
    public function character() {
        return $this->belongsTo('CharacterSheets\Models\Instances\Character');
    }
    
    // Get this proficiency's category
    public function category() {
        return $this->hasOne('CharacterSheets\Models\References\Category');
    }
}
