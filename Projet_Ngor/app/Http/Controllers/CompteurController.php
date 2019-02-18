<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compteur;

class CompteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compteur = Compteur::all();

        return view('compteur.index', compact('compteur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compteur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero'=>'required'
        ]);

        $compteur = new Compteur();
        $compteur->numero=$request->get('numero');
       
       /* $compteur = new Compteur([
            'numero' => $request->get('numero')
        ]);*/
        $compteur->save();
        return redirect('/compteur')->with('success', 'Compteur saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compteur = Compteur::find($id);
        return view('compteur.edit', compact('compteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'numero'=>'required',
        ]);

        $compteur = Compteur::find($id);
        $compteur->numero =$request->numero;
        $compteur->save();

        return redirect('/compteur')->with('succés', 'compteur mise à jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compteur = Compteur::find($id);
        $compteur->delete();

        return redirect('/compteur')->with('succés', 'Compteur Supprimé!');
    }
}
