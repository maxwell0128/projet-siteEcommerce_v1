<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class AdminController extends Controller
{
    //fonction ajouter categorie
    public function ajoutercategorie(Request $request) {
        $request->validate([
            'nomcategorie'=>'required',

        ]);
        $categorie = new Categorie();
        $categorie->name_category = $request->nomcategorie;
        $categorie->save();
        return redirect('/ajout_categorie')->with('status',"la categorie: $request->nomcategorie a bien ete ajouté");
    }
    //fonction modifier categorie
    public function Modify_categorie_tait(Request $request) {
        $request->validate([
            'modinomcategorie'=>'required',

        ]);
        $categorie = Categorie::find($request->id);
        $categorie->name_category = $request->modinomcategorie;
        $categorie->update();
        return redirect('/categorie_list')->with('status',"la categorie: $request->modinomcategorie a bien ete modifier");

    }
}
