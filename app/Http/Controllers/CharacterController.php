<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use App\Training;
use App\TrainingRef;
use App\Category;
use App\Item;
use App\ItemRef;
use App\SkillRef;

class CharacterController extends Controller
{
    public function show($id)
    {
        return view('character/sheet', [
            'character' => Character::findOrFail($id),
            'trainings' => TrainingRef::all(), 
            'items' => ItemRef::all(),
            'skills' => SkillRef::all(),
            'categories' => Category::all(),
        ]);
    }
    
    public function create()
    {
        return view('character/create', [
            'character' => new Character(),
            'trainings' => TrainingRef::all(), 
            'items' => ItemRef::all(),
            'skills' => SkillRef::all(),
            'categories' => Category::all(),
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'constitution'=> 'required|integer',
            'strength' => 'required|integer',
            'dexterity' => 'required|integer',
            'wisdom' => 'required|integer',
            'intelligence' => 'required|integer',
            'charisma' => 'required|integer',
            'hitPoints' => 'required|integer',
            'user_id' => 'required',
        ]);
        
        // Save character
        $character = new Character();
        $character->name = $request->get("name");
        $character->constitution = $request->get("constitution");
        $character->strength = $request->get("strength");
        $character->dexterity = $request->get("dexterity");
        $character->wisdom = $request->get("wisdom");
        $character->intelligence = $request->get("intelligence");
        $character->charisma = $request->get("charisma");
        $character->hitPoints = $request->get("hitPoints");
        $character->user_id = $request->get("user_id");
        $character->save();
        
        // Save training
        $training = new Training();
        $training->training_ref_id = $request->get("training");
        $training->level = $request->get("level");
        $character->training()->save($training);
        
        // Save armour
        if ($request->get("armour") > 0) {
            $item = new Item();
            $item->item_ref_id = $request->get("armour");
            $character->item()->save($item);
        }
        
        return redirect('/home')->with('success', 'Character has been added');
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'constitution'=> 'required|integer',
            'strength' => 'required|integer',
            'dexterity' => 'required|integer',
            'wisdom' => 'required|integer',
            'intelligence' => 'required|integer',
            'charisma' => 'required|integer',
            'hitPoints' => 'required|integer',
            'user_id' => 'required',
        ]);
        
        // Save character
        $character = Character::findOrFail($request->get("character_id"));
        $character->name = $request->get("name");
        $character->constitution = $request->get("constitution");
        $character->strength = $request->get("strength");
        $character->dexterity = $request->get("dexterity");
        $character->wisdom = $request->get("wisdom");
        $character->intelligence = $request->get("intelligence");
        $character->charisma = $request->get("charisma");
        $character->hitPoints = $request->get("hitPoints");
        $character->user_id = $request->get("user_id");
        $character->save();
        
        // Save training
        $training = $character->training;
        $training->training_ref_id = $request->get("training");
        $training->level = $request->get("level");
        $character->training()->save($training);
        
        // Save armour
        if ($request->get("armour") > 0) {
            $item = new Item();
            $item->item_ref_id = $request->get("armour");
            $character->item()->save($item);
        }
        else {
            $character->item()->delete();
        }
        
        return redirect('/home')->with('success', 'Character has been added');
    }
}