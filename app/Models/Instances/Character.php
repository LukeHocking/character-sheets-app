<?php

namespace CharacterSheets\Models\Instances;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    // Default attributes
    protected $fillable = [
        'name', 'description', 
        'constitution', 'strength', 'dexterity',
        'intelligence', 'wisdom', 'charisma',
        'hitPoints', 'user_id'
    ];
    
    // Get this character's user
    public function user() {
        return $this->belongsTo('CharacterSheets\Models\Instances\User');
    }
    
    // Get this character's class
    public function training() {
        return $this->hasOne('CharacterSheets\Models\Instances\Training');
    }
    
    // Get this character's armour
    public function item() {
        return $this->hasOne('CharacterSheets\Models\Instances\Item');
    } 
    
    // Get this character's skills
    public function skills() {
        return $this->hasMany('CharacterSheets\Models\Instances\Skill');
    }
    
    // Get this character's proficiencies
    public function proficiencies() {
        return $this->hasMany('CharacterSheets\Models\Instances\Proficiency');
    }
}
