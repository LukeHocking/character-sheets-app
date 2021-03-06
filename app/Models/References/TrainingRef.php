<?php

namespace CharacterSheets\Models\References;

use Illuminate\Database\Eloquent\Model;

class TrainingRef extends Model
{
    // Default attributes
    protected $attributes = [
        'name' => "New Class", 'description' => "A new class.",
    ];
    
    // Get this class's skills
    public function skills() {
        return $this->hasMany('CharacterSheets\SkillRef');
    }
}
