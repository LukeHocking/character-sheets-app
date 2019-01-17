@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (isset($character->name))
                <div class="card-header">Edit Character - {{$character->name}}</div>

                <div class="card-body container">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('character.update', ['user', Auth::id()]) }}">
                    @csrf
                        <input type='hidden' name='user_id' value='{{Auth::id()}}'>
                        <input type="hidden" name="id" value="{{$character->id}}">
                        
                        <div class="row">
                            <div class="column p-1 w-100">
                                <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$character->name}}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="column p-1 w-75">
                                <label for="training" class="col-form-label text-md-right">{{ __('Class') }}</label>
                                <div name="training"></div>
                                <select class="form-control" id="training" name="training">
                                <option value='{{$character->training->training_ref_id}}'>{{$character->training->trainingRef->name}}</option>
                                @foreach ($trainings as $training)
                                    <option value='{{$training->id}}'>{{$training->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="column p-1 w-25">
                                <label for="level" class="col-form-label text-md-right">{{ __('Level') }}</label>
                                <div name="level"></div>
                                <input id="level" type="number" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{$character->training->level}}" required>
                                @if ($errors->has('level'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="column p-1 w-25">
                                <label for="hitPoints" class="col-form-label text-md-right">{{ __('Hit Points') }}</label>
                                <input id="hitPoints" type="number" class="form-control{{ $errors->has('hitPoints') ? ' is-invalid' : '' }}" name="hitPoints" value="{{$character->hitPoints}}" required>
                                @if ($errors->has('hitPoints'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hitPoints') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="column p-1 w-50">
                                <label class="col-form-label text-md-right">{{ __('Armour') }}</label>
                                <select class="form-control" id="armour" onchange='calculateArmour()' name="armour">
                                @if (!empty($character->item))
                                    <option value='{{$character->item->item_ref_id}}' data-armour='10'>{{$character->item->itemRef->name}}</option>
                                @endif
                                <option value='-1' data-armour='10'>None</option>
                                @foreach ($items as $item)
                                    @if (strpos($item->category->name, "Armour") !== false)
                                    <option value='{{$item->id}}' data-armour='{{$item->armour}}'>{{$item->name}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                            <div class="column p-1 w-25">
                                <label class="col-form-label text-md-right">{{ __('Armour Class') }}</label>
                                <input id="armourClass" type="text" class="form-control" disabled value="5"></input>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="column float-left p-1 m-1 border" style="width:15%">
                                <div>
                                    <label for="constitution" class="col-form-label">{{ __('Constitution') }}</label>
                                    <input id="constitution" type="number" class="form-control{{ $errors->has('constitution') ? ' is-invalid' : '' }}" 
                                        name="constitution" value="{{$character->constitution}}" required autofocus onchange="calculateAttributes()">
                                    @if ($errors->has('constitution'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('constitution') }}</strong>
                                        </span>
                                    @endif
                                    (<span id="conMod">-5</span>)
                                </div>
                                <div>
                                    <label for="strength" class="col-form-label">{{ __('Strength') }}</label>
                                    <input id="strength" type="number" class="form-control{{ $errors->has('strength') ? ' is-invalid' : '' }}" 
                                        name="strength" value="{{$character->strength}}" required autofocus onchange="calculateAttributes()">
                                    @if ($errors->has('strength'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('strength') }}</strong>
                                        </span>
                                    @endif
                                    (<span id="strMod">-5</span>)
                                </div>
                                <div>
                                    <label for="dexterity" class="col-form-label">{{ __('Dexterity') }}</label>
                                    <input id="dexterity" type="number" class="form-control{{ $errors->has('dexterity') ? ' is-invalid' : '' }}" 
                                        name="dexterity" value="{{$character->dexterity}}" required autofocus onchange="calculateAttributes()">
                                    @if ($errors->has('dexterity'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('dexterity') }}</strong>
                                        </span>
                                    @endif
                                    (<span id="dexMod">-5</span>)
                                </div>
                                <div>
                                    <label for="intelligence" class="col-form-label">{{ __('Intelligence') }}</label>
                                    <input id="intelligence" type="number" class="form-control{{ $errors->has('intelligence') ? ' is-invalid' : '' }}" 
                                        name="intelligence" value="{{$character->intelligence}}" required autofocus onchange="calculateAttributes()">
                                    @if ($errors->has('intelligence'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('intelligence') }}</strong>
                                        </span>
                                    @endif
                                    (<span id="intMod">-5</span>)
                                </div>
                                <div>
                                    <label for="wisdom" class="col-form-label">{{ __('Wisdom') }}</label>
                                    <input id="wisdom" type="number" class="form-control{{ $errors->has('wisdom') ? ' is-invalid' : '' }}" 
                                        name="wisdom" value="{{$character->wisdom}}" required autofocus onchange="calculateAttributes()">
                                    @if ($errors->has('wisdom'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('wisdom') }}</strong>
                                        </span>
                                    @endif
                                    (<span id="wisMod">-5</span>)
                                </div>
                                <div>
                                    <label for="charisma" class="col-form-label">{{ __('Charisma') }}</label>
                                    <input id="charisma" type="number" class="form-control{{ $errors->has('charisma') ? ' is-invalid' : '' }}" 
                                        name="charisma" value="{{$character->charisma}}" required autofocus onchange="calculateAttributes()">
                                    @if ($errors->has('charisma'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('charisma') }}</strong>
                                        </span>
                                    @endif
                                    (<span id="chaMod">-5</span>)
                                </div>
                            </div>
                            
                            <div class="column p-1 m-1 mx-auto border w-25">
                                Skills
                                <div id="skills">
                                    @foreach ($character->skills as $skill)
                                        <span>$skill->skillRef->name</span>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="column p-1 m-1 mx-auto border w-25">
                                Proficiencies
                                <div id="skills">
                                    @foreach ($character->skills as $skill)
                                        <span>$skill->skillRef->name</span>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="column p-1 m-1 mx-auto border w-25">
                                Items
                                <div id="skills">
                                    @foreach ($character->skills as $skill)
                                        <span>$skill->skillRef->name</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="">
                            <div class="col-md-6 pt-3 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Character') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    function calculateAttributes () {
        // Calculate attribute values
        var conVal = Math.round(calcModifier(document.getElementById('constitution').value));
        var strVal = Math.round(calcModifier(document.getElementById('strength').value));
        var dexVal = Math.round(calcModifier(document.getElementById('dexterity').value));
        var intVal = Math.round(calcModifier(document.getElementById('intelligence').value));
        var wisVal = Math.round(calcModifier(document.getElementById('wisdom').value));
        var chaVal = Math.round(calcModifier(document.getElementById('charisma').value));
        
        // Update modifier elements
        document.getElementById('conMod').innerHTML = conVal;
        document.getElementById('strMod').innerHTML = strVal;
        document.getElementById('dexMod').innerHTML = dexVal;
        document.getElementById('intMod').innerHTML = intVal;
        document.getElementById('wisMod').innerHTML = wisVal;
        document.getElementById('chaMod').innerHTML = chaVal;
        
        calculateArmour();
    }
    
    function calcModifier (startVal) {
        return((startVal - 10) / 2);
    }
    
    function calculateArmour () {
        var dexVal = Math.round(calcModifier(document.getElementById('dexterity').value));
        var armourElem = document.getElementById("armour");
        var armourVal = parseInt(armourElem.options[armourElem.selectedIndex].dataset.armour);
        var ac = armourVal + dexVal;
        
        document.getElementById('armourClass').value = ac;
    }
    
</script>
@endsection
