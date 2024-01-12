<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Genre;
use App\Models\Produits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class adminvueController extends Controller
{
    /*******fonction admin******/

    /**fonction sur l'admin**/
    //fonction acceuil admin
    public function vueadmin() {
        return view('admin_vue.home');
    }
    //fonction vers la modifier les information admin
    public function profile() {
        return view('admin_vue.profile');
    }
    //fonction pour modifier les information admin
    public function updateinfoadmin(Request $request, $id) {
        $admin = User::findOrFail($id);
        $admin->nom = $request->input('nom');
        $admin->email = $request->input('email');
        $admin->numero_telephone = $request->input('numero_telephone');
        $admin->password = $request->input('password');
        $admin->password = $request->input('prenom');

        $admin->save();

        return redirect('/dashboard')->with('success', 'Admin modifié avec succès');

    }


    /**fonction sur les categories**/
    //fonction pour la routes ajouter des categorie
    public function ajouter_categorie () {
        return view('admin_vue.categorie.categorie_ajout');
    }
    //fonction ajouter categorie
    public function ajoutercategorie(Request $request) {
        $request->validate([
            'nomcategorie'=>'required',

        ]);
        $categorie = new Categorie();
        $categorie->name_category = $request->nomcategorie;
        $categorie->save();
        return redirect('/ajout_categorie')->with('status',"category: $request->nomcategorie has been added");
    }
    //fonction pour afficher la liste des categories
    public function categorie_list() {
        $categories = Categorie::paginate(7);
        return view('admin_vue.categorie.categorie_list',compact('categories'));
    }
    //fonction allez vers la modifier les categories
    public function Modify_categorie($id) {
        $categorie = Categorie::find($id);
        return view('admin_vue.categorie.categorie_modifier',compact('categorie'));
    }
    //fonction pour modifier categorie
    public function Modify_categorie_tait(Request $request) {
        $request->validate([
            'modinomcategorie'=>'required',

        ]);
        $categorie = Categorie::find($request->id);
        $categorie->name_category = $request->modinomcategorie;
        $categorie->update();
        return redirect('/categorie_list')->with('status',"category: $request->modinomcategorie has been modified");

    }
    //fonction supprimer categorie
    public function Delete_categorie($id) {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect('/categorie_list')->with('status',"the category has been deleted");
    }
    //fonction pour la liste des produits en fonction des categories
    public function categorie_produit() {
        $categories = Categorie::all();
        $produitsCategorie = Produits::with('categorie')->whereNotNull('id_category')->get()->groupBy('id_category');
        return view('admin_vue.categorie.categorie_produit',compact('categories', 'produitsCategorie'));
    }
    //fonction la liste des produits en fonction du genre
    public function genre_produit () {
        $genres = Genre::all();
        $produitsgenre = Produits::with('genre')->whereNotNull('id_genre')->get()->groupBy('id_genre');
        return view('admin_vue.categorie.genre_produit',compact('genres', 'produitsgenre'));
    }


    /**fonction sur les produits**/
    //fonction vers l'insertion des produits
    public function ajouter_produits() {
        $categories = Categorie::all();
        $genres = Genre::all();
        return view('admin_vue.produit.produit_ajout',compact('categories','genres'));
    }
    //fonction pour ajoutez les produits
    public function ajouterproduits(Request $request) {
        $request->validate([
            'nomproduit' => 'required',
            'descriptionproduits' => 'required',
            'prixproduit' => 'required',
            'imageprincipalproduit' => 'required',
            'imageproduit1' => 'nullable',
            'imageproduit2' => 'nullable',
            'imageproduit3' => 'nullable',
            'imageproduit4' => 'nullable',
            'categorie_id' => 'required',
            'genre_id' => 'required',
        ]);

        $produit = new Produits();
        $produit->name_produit = $request->nomproduit;
        $produit->description = $request->descriptionproduits;
        $produit->prix = $request->prixproduit;

        // Traitement de l'image principale
        $produit->photo1 = $request->file('imageprincipalproduit')->store('images', 'public');
        $imageFields = ['imageproduit1', 'imageproduit2', 'imageproduit3', 'imageproduit4'];

        foreach ($imageFields as $index => $imageField) {
            if (empty($request->$imageField)) {
                $request->$imageField = "image null";
                $produit->{"photo" . ($index + 2)} = $request->$imageField;
            } else {
                $produit->{"photo" . ($index + 2)} = $request->file($imageField)->store('images', 'public');
            }
        }
        $produit->id_category = $request->categorie_id;
        $produit->id_genre = $request->genre_id;
        $produit->save();

        return redirect('/ajout_produit')->with('status', "Produits: $request->nomproduit has been added");
    }
    //fonction pour afficher la liste des produits
    public function produit_list() {
        $produits = Produits::with('Categorie','Genre')->paginate(15);
        return view('admin_vue.produit.produit_list',compact('produits'));
    }
    //fonction allez vers la modifier les produits
    public function Modify_produit($id) {
        $produit = Produits::find($id);
        $categories = Categorie::all();
        $selectedcategorie = $categories->where('id', $produit->id_category)->first();
        $othercategories = $categories->where('id', '!=', $produit->id_category);
        $genres = Genre::all();
        $selectedGenre = $genres->where('id', $produit->id_genre)->first();
        $otherGenres = $genres->where('id', '!=', $produit->id_genre);

        return view('admin_vue.produit.produit_modifier',compact('produit','selectedcategorie','othercategories','selectedGenre','otherGenres'));
    }
    //fonction pour modifier les produits
    public function Modify_produit_tait(Request $request) {
        $request->validate([
            'modnomproduit' => 'required',
            'moddescriptionproduits' => 'required',
            'modprixproduit' => 'required',
            'modimageprincipalproduit' => 'nullable',
            'modimageproduit1' => 'nullable',
            'modimageproduit2' => 'nullable',
            'modimageproduit3' => 'nullable',
            'modimageproduit4' => 'nullable',
            'modcategorie_id' => 'nullable',
            'modgenre_id' => 'nullable',
        ]);
        $produit = Produits::find($request->id);
        $produit->name_produit = $request->modnomproduit;
        $produit->description = $request->moddescriptionproduits;
        $produit->prix = $request->modprixproduit;

        // Traitement de l'image principale
        if ($request->hasFile('modimageprincipalproduit')) {
            Storage::delete('public/' . $produit->photo1);
            $produit->photo1 = $request->file('modimageprincipalproduit')->store('images', 'public');
        }

        for ($i = 1; $i <= 4; $i++) {
            $inputName = 'modimageproduit' . $i;
            $property = 'photo' . ($i + 1);

            if ($request->hasFile($inputName)) {
                if ($produit->$property !== null) {
                    Storage::delete('public/' . $produit->$property);
                }
                $produit->$property = $request->file($inputName)->store('images', 'public');
            }
        }
        $produit->id_category = $request->modcategorie_id;
        $produit->id_genre = $request->modgenre_id;
        $produit->update();


        return redirect('/produit_list')->with('status', "Produits: $request->modnomproduit has been modified");
    }
    //fonction supprimer produits
    public function Delete_produits($id) {
        $produit = Produits::find($id);
        if ($produit->photo1) {
            Storage::delete('public/' . $produit->photo1);
        }
        $images = ['photo2', 'photo3', 'photo4'];
        foreach ($images as $image) {
            if ($produit->{$image}) {
                Storage::delete('public/' . $produit->{$image});
            }
        }
        $produit->delete();

        return redirect('/produit_list')->with('status', "The product has been deleted");
    }



    public function verifiemail(){
        $email = null;
        $user = User::where('email',$email)
            ->frist();
    }




    //fonction de deconnexion
    public function deconnexion() {
        Auth::logout();
        return redirect()->route('login');
    }
}
