<?php

namespace App\Http\Controllers;

use App\Models\Thought;
use Illuminate\Http\Request;

class ThoughtController extends Controller
{
    public function index()
    {

        $coloresPastel = ['#FFD700', '#98FB98', '#87CEEB', '#FFA07A', '#DDA0DD', '#87CEFA', '#F0E68C', '#98FB98', '#F08080', '#D3D3D3'];
        $colorAleatorio = $coloresPastel[array_rand($coloresPastel)];



        $thoughts = Thought::where('user_id', auth()->id())->get();

        return view('estudiante.index', compact('thoughts', 'colorAleatorio'));
    }


    public function store(Request $request)
    {



        $request->validate([
            'pensamiento' => 'required|max:500',
        ]);

        Thought::create([
            'pensamiento' => $request->pensamiento,
            'user_id' => auth()->id(),

        ]);

    }
}
