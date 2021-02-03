<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    public function index(){

        $userId = Auth::user()->id;
        $characters = Character::where('user_id', $userId)->get();

        return view('user.show-characters',[
            'characters' => $characters
        ]);
    }
}
