<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'prix',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
        'photo5',
        'id_category',
        'id_genre',
    ];
    public function Categorie(){
        return $this->belongsTo(Categorie::class, 'id_category', 'id');
    }
    public function Genre(){
        return $this->belongsTo(Genre::class, 'id_genre', 'id');
    }
}
