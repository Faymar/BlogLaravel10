<?php

namespace App\Http\Controllers;

use App\Models\commentaire;
use Illuminate\Http\Request;

class commentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'commentaire' => 'required|string',
                'articles_id' => 'required',

            ]
        );
        $id = (int)$request->get('articles_id');
        $commetaire = new commentaire([
            'commentaire' => $request->get('commentaire'),
            'articles_id' => $id
        ]);

        $commetaire->save();
        return back()->with('status', 'commentaire Ajoute avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function modifier(string $id)
    {
        $commentaire = Commentaire::find($id);
        return view('commentaire.modifier', ['commentaire' => $commentaire]);
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
        $commentaire = commentaire::find($id);
        $request->validate([
            'commentaire' => 'required',
        ]);

        $commentaire->commentaire = $request->get('commentaire');

        $commentaire->update();
        return redirect('/')->with('status', 'commentaire modifie avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->delete();
        return redirect('/')->with('status', 'commenatire supprimer avec success');
    }
}
