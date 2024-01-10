@extends('parent')
@section('tittle', 'achat')
@section('content')
<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        <div class="col-lg-3">
            <h1 class="h2 pb-4">filter</h1>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    <p>
                        <a  class="h3 text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthgender" aria-expanded="false" aria-controls="collapseWidthgender">
                            Gender
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                    </p>
                    @foreach($genres as $genre)
                    <div class="collapse collapse-horizontal" id="collapseWidthgender">
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="{{ $genre->id }}">{{ $genre->name_genre }}</a></li>
                        </ul>
                    </div>
                    @endforeach
                </li>
                <li class="pb-3">

                    <p>
                        <a  class="h3 text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthcategory" aria-expanded="false" aria-controls="collapseWidthcategory">
                            Category
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                    </p>
                    @foreach($categories as $categorie)
                    <div class="collapse collapse-horizontal" id="collapseWidthcategory">
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="{{ $categorie->id }}">{{ $categorie->name_category }}</a></li>
                        </ul>
                    </div>
                    @endforeach
                </li>
            </ul>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6 pb-4 text-end">
                    <div class="d-flex">
                        <select class="form-control">
                            <option>Featured</option>
                            <option>A to Z</option>
                            <option>Item</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    @foreach ($produits as $produit)
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            @if($produit->photo1)
                                <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $produit->photo1) }}" alt="Image du produit">
                            @else
                                <p>No images available.</p>
                            @endif
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white mt-2" href="/achat/{{ $produit->id }}"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="/panier/{{ $produit->id }}"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="/achat/{{ $produit->id}}" class="h3 text-decoration-none"><h5>{{ $produit->name_produit }}</h5></a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>{{ $produit->description}}</li>
                            </ul>
                            <p class="text-center mb-0">{{ $produit->prix }}F cfa</p>
                        </div>
                        <a href="/commande/{{ $produit->id}}" class="btn btn-success m-3">Commande</a>
                    </div>
                    @endforeach
                    {{ $produits->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection
