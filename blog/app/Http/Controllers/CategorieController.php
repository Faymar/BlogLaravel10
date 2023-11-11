<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categories()
    {
        $categories =  Categorie::all();
        return view("categorie.categorie", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ajouter()
    {
        return view("categorie.ajouterCategorie");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'categorie' => 'required',
            ]
        );

        $categorie = new Categorie([
            'categorie' => $request->get('categorie'),
        ]);
        $categorie->save();
        return back()->with('status', 'Categorie Ajoutee avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function modifier(string $id)
    {
        $categorie = Categorie::find($id);
        return view('categorie.modifier', ['categorie' => $categorie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categorie = Categorie::find($id);
        $request->validate([
            'categorie' => 'required',
        ]);

        $categorie->categorie = $request->get('categorie');
        $categorie->update();

        return Redirect::to('/categories')->with('status', 'categorie modifiee avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return Redirect::to('/categories')->with('status', 'categorie supprimer avec success');
    }
}
