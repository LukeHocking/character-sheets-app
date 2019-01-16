<?php

namespace CharacterSheets\Http\Controllers;

use Illuminate\Http\Request;
use CharacterSheets\User;

class UserController extends Controller
{
    public function show($id)
    {
        return view('user/profile', ['user' => User::findOrFail($id)]);
    }
}
