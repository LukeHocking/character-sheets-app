<?php

namespace CharacterSheets\Models\Instances;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    // Get this skill's character
    public function character() {
        return $this->belongsTo('CharacterSheets\Models\Instances\Character');
    }
    
    // Get this skill's reference
    public function skillRef() {
        return $this->hasOne('CharacterSheets\Models\References\SkillRef');
    }
}
