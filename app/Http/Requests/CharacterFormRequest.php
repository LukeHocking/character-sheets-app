<?php

namespace CharacterSheets\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

use CharacterSheets\Models\Instances\Character;

class CharacterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $characterId = $this->route('character_id');

        return Character::where('user_id', Auth::id())->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'constitution'=> 'required|integer',
            'strength' => 'required|integer',
            'dexterity' => 'required|integer',
            'wisdom' => 'required|integer',
            'intelligence' => 'required|integer',
            'charisma' => 'required|integer',
            'hitPoints' => 'required|integer',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
