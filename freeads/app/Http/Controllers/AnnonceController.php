<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Annonce;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

// use App\Http\Controllers\Auth;


class AnnonceController extends Controller
{
    public function postAnnonce():View{
        return view('postAnnonce');
    }

    public function annoncePage(){
        $allArticle = DB::select('select annonces.*, users.name from annonces join users on annonces.id_user = users.id');
        return view('showAnnonce')->with('allArticle',$allArticle);
    }

    public function create(Request $request){
        $user = auth()->user()->id;
        $images = [];
        if($files = $request->file('image')){
            foreach ($files as $file){
                $file->move(public_path('image'),$file->getClientOriginalName());
                $images[]= "image/".$file->getClientOriginalName();
            }
        }
        Annonce::create([
            'id_user' => $user,
            'titre' => $request->tittle,
            'description' => $request->content,
            // 'photographie' => $request->image,
            'photographie' => implode('|', $images),
            'prix' => $request->price,
        ]);
        return Redirect::route('showAnnonce');
    }

    public function editAnnonce($id){
        // $annonce = DB::select('select * from annonces where id = ?',[$id]);
        $annonce = Annonce::find($id);
        // dd($annonce);
        // return view('editAnnonce')->with('annonce',$annonce);
        return view('editAnnonce', compact('annonce'));

    }
    
    public function deleteAnnonce($id){
        DB::delete('delete from annonces where id = ?',[$id]);
        return Redirect::route('showAnnonce');
    }

    public function editAnnonceForm(Request $request,$id){
        $annonce = Annonce::find($id);
        $annonce->titre = $request->tittle;
        $annonce->photographie = $request->image;
        $annonce->prix = $request->price;
        $annonce->description = $request->content;
        $annonce->save();

        return  Redirect::route('showAnnonce', compact('annonce'));
    }

    public function searchAnnonce():View{
        return view('searchAnnonce');
    }

    public function searchAnnonceResult(Request $request){
        $result = Annonce::where('titre', 'like', '%'.$request->search.'%')->get()->toArray();
        return view('searchAnnonce', compact('result'));
    }
}
