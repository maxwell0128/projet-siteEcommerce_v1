<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Genre;
use App\Models\Produits;
use Illuminate\Http\Request;

class VueController extends Controller
{

    // accueil
    public function accueil()
    {
        return view('client.index');
    }
    // about
    public function about()
    {
        return view('client.about');
    }
    // contact
    public function contact()
    {
        return view('client.contact');
    }
    /****achat****/
    //fonction pour afficher les produits pour etre commander
    public function achat()
    {
        $categories = Categorie::all();
        $genres = Genre::all();
        $produits = Produits::paginate(30);
        return view('client.achat.achat',compact('categories','genres','produits'));
    }
    //fonction pour afficher plus de detaille sur le produit
    public function achatdetaile ($id){
        $produit = Produits::find($id);
        return view('client.achat.produits',compact('produit'));

    }

}
