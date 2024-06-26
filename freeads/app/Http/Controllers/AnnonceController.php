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
        $allArticle = DB::select('select annonces.*, users.name from annonces join users on annonces.id_user = users.id order by created_at desc');
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
        $images = [];
        if($files = $request->image){
            foreach ($files as $file){
                $file->move(public_path('image'),$file->getClientOriginalName());
                $images[]= "image/".$file->getClientOriginalName();
            }
        }
        $annonce->photographie = implode('|', $images);
        $annonce->prix = $request->price;
        $annonce->description = $request->content;
        $annonce->save();
        return  Redirect::route('showAnnonce', compact('annonce'));
    }

    public function searchAnnonce():View{
        return view('searchAnnonce');
    }

    public function searchAnnonceResult(Request $request){
        $result = DB::table('annonces')
                    ->select('annonces.*','users.name')
                    ->join('users', 'annonces.id_user', '=', 'users.id')
                    ->where('titre', 'like', '%'.$request->search.'%')
                    ->get()
                    ->toArray();
        return view('searchAnnonce', compact('result'));
    }

    public function filtrageAnnonce():View{
        return view('filtrageAnnonce');
    }

    public function filtrageAnnonceResult(Request $request){
        // $result = Annonce::where('prix', '>', $request->price)->get()->toArray();
        $result= DB::table('annonces')
                    ->select('annonces.*','users.name')
                    ->join('users', 'annonces.id_user', '=', 'users.id')
                    ->where('prix', '>', $request->price)
                    ->get()
                    ->toArray();
        return view('filtrageAnnonce', compact('result'));
    }

    public function showAnnonceOrderASC(){
        $result = DB::table('annonces')
                    ->select('annonces.*','users.name')
                    ->join('users', 'annonces.id_user', '=', 'users.id')
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->toArray();
        // dd($result);
        return view('showAnnonceAsc', compact('result'));
    }
    
    public function showAnnonceOrderASCPage():View{
        return view('showAnnonceAsc');
    }

    public function annonceInterressant(){
        $result = DB::table('annonces')
                    ->select('annonces.*','users.name')
                    ->join('users', 'annonces.id_user', '=', 'users.id')
                    ->orderBy('prix', 'asc')
                    ->get()
                    ->toArray();
        return view('annonceInterressant', compact('result'));
    }
}
