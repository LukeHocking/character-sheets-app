<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Get this item's character
    public function character() {
        return $this->belongsTo('App\Character');
    }
    
    // Get this item's reference
    public function itemRef() {
        return $this->belongsTo('App\ItemRef');
    }
}
