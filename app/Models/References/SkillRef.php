<?php

namespace CharacterSheets\Models\References;

use Illuminate\Database\Eloquent\Model;

class SkillRef extends Model
{
    // Default attributes
    protected $attributes = [
        'name' => "New Skill", 'description' => "A new skill.", 
    ];
    
    // Get this skill's class
    public function training() {
        return $this->belongsTo('CharacterSheets\Training');
    }
}
