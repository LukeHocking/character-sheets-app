<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    // Get this skill's character
    public function character() {
        return $this->belongsTo('App\Character');
    }
    
    // Get this skill's reference
    public function skillRef() {
        return $this->hasOne('App\SkillRef');
    }
}
