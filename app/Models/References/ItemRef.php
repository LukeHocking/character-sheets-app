<?php

namespace CharacterSheets;

use Illuminate\Database\Eloquent\Model;

class ItemRef extends Model
{
    // Default attributes
    protected $attributes = [
        'name' => "New Character", 'description' => "A new character.", 
        'weight' => 0, 'armour' => 0, 'damage' => "d6+0",
    ];
    
    // Get this item's category
    public function category() {
        return $this->belongsTo('CharacterSheets\Category');
    }
}
