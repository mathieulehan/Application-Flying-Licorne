<?php

namespace App\Http\Controllers;
use App\Models\Liste;
use App\Models\Mot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class ListeController extends Controller
{
  public function home () {
      return view( 'home');
  }

  public function index () {
  	$listes = Liste::get();
    return view( 'liste.index', compact('listes') );
  }


  public function create() {
    return view( 'liste.create');
  }

  public function store (Request $request) {
    $liste = new Liste;
    $liste->name = $request->name;
    $liste->isPublic = $request->isPublic;
    $liste->mode = $request->mode;
    $liste->save();
    return redirect()->route('liste.index');
  }

  public function edit($id) {
    $liste=Liste::find($id);
    return view('liste.edit',compact('liste'));
  }

  public function update (Request $request) {
    $liste = Liste::find(3);
    $liste->name = $request->name;
    $liste->isPublic = $request->isPublic;
    $liste->mode = $request->mode;
    $liste->save();
     return redirect('listes/index');
  }

  public function show ( $id ) {
    return view( 'liste.show', [ 'liste' => Liste::findOrFail( $id ) ] );
  }

  public function destroy($id) {
    Liste::find($id)->delete();
    return redirect('listes/index');
  }

  public function enleverMot($idListe, $idMot){
    $liste = Liste::find($idListe);
    $liste->mots()->detach($idMot);
    return redirect()->route('liste.show', ['id' => $idListe] );
  }

  public function ajoutMot($id){
    $liste = Liste::findOrFail($id);
    $mots = Mot::get();
    return view( 'liste.ajouterMot', compact('liste', 'mots') );
  }

  public function ajouterMot($idListe, $idMot){
    $liste = Liste::find($idListe);
    $liste->mots()->attach($idMot);
    $mots = Mot::get();
    return view( 'liste.ajouterMot', compact('liste', 'mots') );
  }

  public function uploadZip(){

  }
}
