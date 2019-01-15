<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Character') }}</div>

                <div class="card-body container">
                    <form method="POST" action="'/character/save'">
                        @csrf
                        
                        <div class="row">
                            <div class="column p-1 w-100">
                                <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                        <div class="row border">
                            <div class="column p-1 w-50">
                                <label for="training" class="col-form-label text-md-right">{{ __('Class') }}</label>
                                <select class="form-control" id="training">
                                @foreach ($trainings as $training)
                                    <option value='{{$training->id}}'>{{$training->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="column p-1 w-25">
                                <label for="level" class="col-form-label text-md-right">{{ __('Level') }}</label>
                                <input id="level" type="number" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="name" value="{{ old('level') }}" required>
                                @if ($errors->has('level'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="column p-1 w-25 mt-auto">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" onclick="">
                                        {{ __('Add Class') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="column p-1 w-50">
                                <label for="hitPoints" class="col-form-label text-md-right">{{ __('Hit Points') }}</label>
                                <input id="hitPoints" type="number" class="form-control{{ $errors->has('hitPoints') ? ' is-invalid' : '' }}" name="name" value="{{ old('hitPoints') }}" required>
                                @if ($errors->has('hitPoints'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hitPoints') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="column p-1 w-50">
                                <label class="col-form-label text-md-right">{{ __('Armour Class') }}</label>
                                <input id="armour" type="number" class="form-control" disabled></input>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="column float-left p-1 m-1 border" style="width:15%">
                                <div>
                                    <label for="constitution" class="col-form-label">{{ __('Constitution') }}</label>
                                    <input id="constitution" type="number" class="form-control{{ $errors->has('constitution') ? ' is-invalid' : '' }}" name="name" value="{{ old('constitution') }}" required autofocus>
                                    @if ($errors->has('constitution'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('constitution') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="strength" class="col-form-label">{{ __('Strength') }}</label>
                                    <input id="strength" type="number" class="form-control{{ $errors->has('strength') ? ' is-invalid' : '' }}" name="name" value="{{ old('strength') }}" required autofocus>
                                    @if ($errors->has('strength'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('strength') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="dexterity" class="col-form-label">{{ __('Dexterity') }}</label>
                                    <input id="dexterity" type="number" class="form-control{{ $errors->has('dexterity') ? ' is-invalid' : '' }}" name="name" value="{{ old('dexterity') }}" required autofocus>
                                    @if ($errors->has('dexterity'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('dexterity') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="intelligence" class="col-form-label">{{ __('Intelligence') }}</label>
                                    <input id="intelligence" type="number" class="form-control{{ $errors->has('intelligence') ? ' is-invalid' : '' }}" name="name" value="{{ old('intelligence') }}" required autofocus>
                                    @if ($errors->has('intelligence'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('intelligence') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="wisdom" class="col-form-label">{{ __('Wisdom') }}</label>
                                    <input id="wisdom" type="number" class="form-control{{ $errors->has('wisdom') ? ' is-invalid' : '' }}" name="name" value="{{ old('wisdom') }}" required autofocus>
                                    @if ($errors->has('wisdom'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('wisdom') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="charisma" class="col-form-label">{{ __('Charisma') }}</label>
                                    <input id="charisma" type="number" class="form-control{{ $errors->has('charisma') ? ' is-invalid' : '' }}" name="name" value="{{ old('charisma') }}" required autofocus>
                                    @if ($errors->has('charisma'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('charisma') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="column p-1 m-1 border w-25">
                                Skills
                                <div>
                                </div>
                            </div>
                            
                            <div class="column p-1 m-1 border w-25">
                                Proficiencies
                                <div>
                                    <table>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="column p-1 m-1 border w-25">
                                Items
                                <div>
                                    <table>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="float-bottom">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Character') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
