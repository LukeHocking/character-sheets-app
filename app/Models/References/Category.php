<?php

namespace CharacterSheets;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Default attributes
    protected $attributes = [
        'name' => "New Category", 'description' => "A new category."
    ];
    
    // Get this category's items
    public function items() {
        return $this->hasMany('CharacterSheets\Item');
    }
}
