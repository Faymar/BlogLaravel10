<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articles;
use App\Models\Categorie;
use App\Models\commentaire;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $articles = articles::all();
        return view('index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ajouter()
    {
        $categories = Categorie::all();
        return view('article.ajouterArticle', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'titre' => 'required|string|max:100',
                'contenue' => 'required|string',
                'categorie' => 'required|array'
            ]
        );
        $categorie  = implode(',', $request->get('categorie'));
        // dd($categorie);
        // die;
        $articles = new articles([
            'titre' => $request->get('titre'),
            'contenue' => $request->get('contenue'),
            'categorie' => $categorie,
        ]);
        $articles->save();
        return back()->with('status', 'articles Ajoute avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = articles::find($id);
        $commentaires = commentaire::where('articles_id', '=', $id)->get();
        return view('article.voirArticle', ['article' => $article, 'commentaires' => $commentaires]);
    }
    public function modifier(string $id)
    {
        $article = articles::find($id);
        $categories = Categorie::all();
        return view('article.modifier', ['article' => $article, 'categories' => $categories]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = articles::find($id);
        $request->validate(
            [
                'titre' => 'required|string|max:100',
                'contenue' => 'required|string',
                'categorie' => 'required|array'
            ]
        );
        
        $categorie  = implode(',', $request->get('categorie'));

        $article->titre = $request->get('titre');
        $article->contenue = $request->get('contenue');
        $article->categorie = $categorie;

        $article->update();
        return Redirect::to('/')->with('status', 'articles modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = articles::find($id);
        $article->delete();
        return Redirect::to('/')->with('status', 'articles supprimer avec succes');
    }
}
