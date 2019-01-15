@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Character Sheets for {{ $user->name }}</div>

                @foreach ($user->characters as $character)
                <div class="card-body">
                    <a href='/character/sheet/{{$character->id}}'>{{ $character->name }}</a>
                </div>
                @endforeach
                
                <div class="card-body">
                    <a href='/character/create'>Create New Character</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
