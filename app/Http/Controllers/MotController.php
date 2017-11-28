<?php

namespace App\Http\Controllers;
use App\Models\Mot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class MotController extends Controller
{

  public function index () {
  	$mots = Mot::get();
    return view( 'mot.index', compact('mots') );
  }


  public function create() {
    return view( 'mot.create');
  }

  public function store(Request $request) {

    $this->validate($request, [
        'name' => 'required',
        'mot_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $mot = new Mot($request->input()) ;

     if($file = $request->hasFile('mot_image')) {

        $file = $request->file('mot_image') ;

        $fileName = $file->getClientOriginalName() ;
        $destinationPath = public_path().'/images/' ;
        $file->move($destinationPath,$fileName);
        $mot->mot_image = $fileName ;
    }

     if($file = $request->hasFile('mot_son')) {

        $file = $request->file('mot_son') ;

        $fileName = $file->getClientOriginalName() ;
        $destinationPath = public_path().'/sons/' ;
        $file->move($destinationPath,$fileName);
        $mot->mot_son = $fileName ;
    }
     $mot->save() ;
      return redirect()->route('mot.index')
                        ->with('success','Mot enregistré');
    }

  public function edit($id) {
    $mot=mot::find($id);
    return view('mot.edit',compact('mot'));
  }

  public function update ($id, Request $request) {
    $mot = Mot::find($id);
    $mot->name = $request->name;
    $mot->isPublic = $request->isPublic;
    $mot->mode = $request->mode;
    $mot->save();
     return redirect('mots/index');
  }

  public function show ( $id ) {
    return view( 'mot.show', [ 'mot' => Mot::findOrFail( $id ) ] );
  }

  public function destroy($id) {
    Mot::find($id)->delete();
    return redirect('mots/index');
  }

}
