<?php

namespace CharacterSheets\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use CharacterSheets\Services\CharacterService;
use CharacterSheets\Http\Requests\CharacterFormRequest;

class CharacterController extends Controller
{
    use SoftDeletes;
    protected $guarded = ['id'];
    
    protected $characterservice, $categories, $trainingRefs, $skillRefs, $itemRefs;
    
    // Constructor including loading references
    public function __construct(CharacterService $characterservice)
    {
        $this->characterservice = $characterservice;
    }
    
    // CRUD functions
    
    public function index()
    {
       $posts = $this->v->index();
       return view('index', compact('posts'));
    }
    
    public function create (CharacterFormRequest $request)
    {
        $this->characterservice->create($request);
        return redirect()->route('profile', ['user' => Auth::id()])
            ->with(['status' => 'Character Created Successfully']);
    }
    
    public function read ($id)
    {
        $post = $this->characterservice->read($id);
        return  view('edit', compact('post'));
    }
    
    public function update(CharacterFormRequest $request, $id)
    {
        $post = $this->characterservice->update($request, $id);
        return redirect()->route('profile', ['user' => Auth::id()])
            ->with(['status' => 'Character Created Successfully']);
    }
    
    public function delete($id)
    {
        $this->characterservice->delete($id);
        return redirect()->route('profile', ['user' => Auth::id()])
            ->with(['status' => 'Character Created Successfully']);
    }
    
    // Other functions
    
    public function show($id)
    {
        return $this->characterservice->show($id);
    }
    
    public function new()
    {
        return $this->characterservice->new();
    } 
}