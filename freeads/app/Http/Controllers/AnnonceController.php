<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Annonce;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

// use App\Http\Controllers\Auth;


class AnnonceController extends Controller
{
    public function postAnnonce():View{
        return view('postAnnonce');
    }

    public function annoncePage(){
        $allArticle = DB::select('select annonces.*, users.name from annonces join users on annonces.id_user = users.id');
        // dd($allArticle);
        return view('showAnnonce')->with('allArticle',$allArticle);

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

        return Redirect::route('showAnnonce');
    }

    public function editAnnonce($id){
        // dd($id);
        return view('postAnnonce/{$id}');
    }
    
    public function deleteAnnonce($id){
        DB::delete('delete from annonces where id = ?',[$id]);
        return Redirect::route('showAnnonce');
    }
}
