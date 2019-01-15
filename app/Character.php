<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    // Default attributes
    protected $fillable = [
        'name' => "New Character", 'description' => "A new character.", 
        'constitution' => 0, 'strength' => 0, 'dexterity' => 0,
        'intelligence' => 0, 'wisdom' => 0, 'charisma' => 0,
        'hitPoints' => 0, 'user_id' => -1
    ];
    
    // Get this character's user
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    // Get this character's class
    public function training() {
        return $this->hasOne('App\Training');
    }
    
    // Get this character's armour
    public function item() {
        return $this->hasOne('App\Item');
    } 
    
    // Get this character's skills
    public function skills() {
        return $this->hasMany('App\Skill');
    }
    
    // Get this character's proficiencies
    public function proficiencies() {
        return $this->hasMany('App\Proficiency');
    }
}
