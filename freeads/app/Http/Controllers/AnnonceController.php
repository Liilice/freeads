<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Annonce;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Auth;


class AnnonceController extends Controller
{
    public function postAnnonce():View{
        return view('postAnnonce');
    }

    public function annoncePage():View{
        return view('showAnnonce');

    }

    public function create(Request $request){
        $user = auth()->user()->id;

        Annonce::create([
            'id_user' => $user,
            'titre' => $request->tittle,
            'description' => $request->content,
            'photographie' => $request->image,
            'prix' => $request->price,
        ]);

        // return redirect()->route('showAnnonce');

    }
}
