<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facture;
use App\Abonnement;

class factureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facture = Facture::all();

        return view('facture.index', compact('facture'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abonnements = Abonnement::pluck('contrat','id');
        
        return view('facture.create',compact('abonnements'));
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
            'mois'=>'required',
            'consommation'=>'required',
            'prix'=>'required',
            'reglement'=>'required',
            'abonnement_id'=>'required'
        ]);

        $facture = new Facture();
        $facture->mois= $request->get('mois');
        $facture->consommation= $request->get('consommation');
        $facture->prix= $request->get('prix');
        $facture->reglement= $request->get('reglement');
        $facture->abonnement_id=  $request->get('abonnement_id');
       /* $facture = new Facture([
            'mois' => $request->get('mois'),
            'consommation' => $request->get('consommation'),
            'prix' => $request->get('prix'),
            'reglement' => $request->get('reglement'),
            'abonnement_id' => $request->get('abonnement_id')
        ]);*/
        $facture->save();
        return redirect('/facture')->with('success', 'Facture saved!');
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
        $facture = Facture::find($id);
        return view('facture.edit', compact('facture'));
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
            'mois'=>'required',
            'consommation'=>'required',
            'prix'=>'required',
            'reglement'=>'required'
        ]);

        $facture = Facture::find($id);
        $facture->mois = $request->mois;
        $facture->consommation = $request->consommation;
        $facture->prix = $request->prix;
        $facture->reglement = $request->reglement;
        $facture->save();

        return redirect('/facture')->with('succés', 'Facture mise à jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facture = Facture::find($id);
        $facture->delete();

        return redirect('/facture')->with('succés', 'Facture Supprimée!');
    }
}
