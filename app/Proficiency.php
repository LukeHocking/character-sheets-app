<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proficiency extends Model
{
    // Get this proficiency's character
    public function character() {
        return $this->belongsTo('App\Character');
    }
    
    // Get this proficiency's category
    public function category() {
        return $this->hasOne('App\Category');
    }
}
