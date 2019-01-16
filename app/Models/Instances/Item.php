<?php

namespace CharacterSheets;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Get this item's character
    public function character() {
        return $this->belongsTo('CharacterSheets\Character');
    }
    
    // Get this item's reference
    public function itemRef() {
        return $this->belongsTo('CharacterSheets\ItemRef');
    }
}