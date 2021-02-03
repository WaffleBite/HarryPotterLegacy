<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Potion;
use Illuminate\Http\Request;

class PotionsLabController extends Controller
{
    public function index(){

        $healthPotion = Potion::where('name', 'Health Potion')->get();
        $dogbreathPotion = Potion::where('name', 'Dogbreath Potion')->get();
        $angelsTrumpet = Potion::where('name', 'Angels Trumpet Draught')->get();
        $baruffioBrainElixir = Potion::where('name', 'Baruffio Brain Elixir')->get();
        $newMagicLearned = Potion::where('name', 'Chelidonium Miniscula')->get();
        $removeMagic = Potion::where('name', 'Chelidonium Maxiscula')->get();
        $felixFelicis = Potion::where('name', 'Felix Felicis')->get();

        $ingredients = Ingredient::all();

        return view('potionsLab.index', [
            'ingredients' => $ingredients,
            'healthPotion' => $healthPotion,
            'dogbreathPotion' => $dogbreathPotion,
            'angelsTrumpet' => $angelsTrumpet,
            'baruffioBrainElixir' => $baruffioBrainElixir,
            'newMagicLearned' => $newMagicLearned,
            'removeMagic' => $removeMagic,
            'felixFelicis' => $felixFelicis

        ]);
    }
}
