@extends('client.parent')
@section('tittle', 'achat')
@section('content')
<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        <div class="col-lg-3">
            <h1 class="h2 pb-4">filter</h1>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    <a  class="h3 text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthgender" aria-expanded="false" aria-controls="collapseWidthgender">
                        Gender
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <div class="collapse collapse-horizontal" id="collapseWidthgender">
                        @foreach($genres as $genre)
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="{{ $genre->id }}">{{ $genre->name_genre }}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </li>
                <li class="pb-3">
                    <a  class="h3 text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthcategory" aria-expanded="false" aria-controls="collapseWidthcategory">
                            Category
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
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

                @foreach ($produits as $produit)
                <div class="col-md-4 ">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            @if($produit->photo1)
                                <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $produit->photo1) }}" alt="Image du produit" style="width: 250px; height: 250px;">
                            @else
                                <p>No images available.</p>
                            @endif
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white mt-2" href="/achat_detail/{{ $produit->id }}"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="/panier/{{ $produit->id }}"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="/achat_detail/{{ $produit->id }}" class="h3 text-decoration-none"><h5>{{ $produit->name_produit }}</h5></a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>
                                    {{ $produit->shortDescription() }}
                                    @if (str_word_count($produit->description) > 20)
                                        <button class="btn btn-link btn-sm toggle-more" data-toggle="modal" data-target="#modal-{{ $produit->id }}">Plus</button>
                                        <div class="modal fade" id="modal-{{ $produit->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-{{ $produit->id }}-label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal-{{ $produit->id }}-label">Description complète</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">x</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $produit->description }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                            <p class="text-center mb-0">{{ $produit->prix }}F cfa</p>
                        </div>
                        <a href="/commande/{{ $produit->id}}" class="btn btn-success m-3">Commande</a>
                    </div>
                </div>
                @endforeach
                {{ $produits->links() }}
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toggleButtons = document.querySelectorAll('.toggle-more');

        toggleButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var targetModalId = this.getAttribute('data-target').replace('#', '');
                var targetModal = new bootstrap.Modal(document.getElementById(targetModalId));
                targetModal.show();
            });
        });
    });
</script>
