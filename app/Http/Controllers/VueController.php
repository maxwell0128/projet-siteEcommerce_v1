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
        return view('index');
    }
    // about
    public function about()
    {
        return view('about');
    }
    // contact
    public function contact()
    {
        return view('contact');
    }
    /****achat****/
    //fonction pour afficher les produits pour etre commander
    public function achat()
    {
        $categories = Categorie::all();
        $genres = Genre::all();
        $produits = Produits::paginate(30);
        return view('achat.achat',compact('categories','genres','produits'));
    }
    //fonction pour afficher plus de detaille sur le produit
    public function achatdetaile ($id){
        $produit = Produits::find($id);
        $categories = Categorie::all();
        $othercategories = $categories->where('id', '==', $produit->id_category);
        return view('achat.achat_voir',compact('produit','othercategories'));

    }
}
