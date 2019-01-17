<?php

namespace CharacterSheets\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Redirector;
use Illuminate\Support\Facades\Auth;

use CharacterSheets\Models\Instances\Character;
use CharacterSheets\Models\References\TrainingRef;
use CharacterSheets\Models\References\Category;
use CharacterSheets\Models\References\ItemRef;
use CharacterSheets\Models\References\SkillRef;

use CharacterSheets\Http\Requests\CharacterFormRequest;

class CharacterService
{
    protected $character, $categories, $trainingRefs, $skillRefs, $itemRefs;
    
    // Constructor including loading references
    public function __construct(Character $character)
    {
        $this->character = $character;
        $this->categories = Category::all();
        $this->trainingRefs = TrainingRef::all();
        $this->skillRefs = SkillRef::all();
        $this->itemRefs = ItemRef::all();
    }
	
	// CRUD functions
	
	public function index()
	{
		return $this->character->all();
	}
	
    public function create(CharacterFormRequest $request)
	{
        $attributes = $request->all();
        $this->character->create($attributes);
	}
	
	public function read($id)
	{
        return $this->character->find($id);
	}
	
	public function update(CharacterFormRequest $request, $id)
	{
        $attributes = $request->all();
        
		$result = $this->character->update($attributes);
	}
	
	public function delete($id)
	{
        return $this->character->delete($id);
	}
	
	// Other functions 
	
	public function show($id)
	{
		
        return view('/character/sheet', [
        	'character'=> $this->character->find($id),
        	'categories'=> $this->categories,
        	'trainings'=> $this->trainingRefs,
        	'skills'=> $this->skillRefs,
        	'items'=> $this->itemRefs
        ]);
	}
	
	public function new() 
	{
        return view('/character/create', [
        	'character'=> $this->character,
        	'categories'=> $this->categories,
        	'trainings'=> $this->trainingRefs,
        	'skills'=> $this->skillRefs,
        	'items'=> $this->itemRefs
        ]);
	}
}