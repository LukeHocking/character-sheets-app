<?php

namespace CharacterSheets\Models\Instances;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Get this item's character
    public function character() {
        return $this->belongsTo('CharacterSheets\Models\Instances\Character');
    }
    
    // Get this item's reference
    public function itemRef() {
        return $this->belongsTo('CharacterSheets\Models\References\ItemRef');
    }
}
