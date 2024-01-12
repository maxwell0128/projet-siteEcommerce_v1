@extends('client.achat.parent')
@section('tittle', 'achat')
@section('content')
<!-- Start Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    @if($produit->photo1)
                        <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $produit->photo1) }}" alt="Image du produit" id="product-detail" style="width: 500px; height: 500px;">
                    @else
                        <p>No images available.</p>
                    @endif
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            @if($produit->photo1 !='image null')
                                                <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $produit->photo1) }}" alt="Image du produit" style="width: 100px; height: 100px;">
                                            @else
                                                <p>No images available.</p>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            @if($produit->photo2 !='image null')
                                                <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $produit->photo2) }}" alt="Image du produit" style="width: 100px; height: 100px;">
                                            @else
                                                <p>No images available.</p>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            @if($produit->photo3 !='image null')
                                                <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $produit->photo3) }}" alt="Image du produit" style="width: 100px; height: 100px;">
                                            @else
                                                <p>No images available.</p>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            @if($produit->photo4 !='image null')
                                                <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $produit->photo4) }}" alt="Image du produit" style="width: 100px; height: 100px;">
                                            @else
                                                <p>No images available.</p>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            @if($produit->photo5 !='image null')
                                                <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $produit->photo5) }}" alt="Image du produit" style="width: 100px; height: 100px;">
                                            @else
                                                <p>No images available.</p>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">{{ $produit->name_produit }}</h1>
                        <p class="h3 py-2 mb-3">{{ $produit->prix }}F cfa</p>
                        <h6>Description:</h6>
                        <p>{{ $produit->description }}</p>

                        <h6>Specification:</h6>
                        <ul class="list-unstyled pb-3">
                            <li>{{ $produit->Categorie ? $produit->Categorie->name_category : 'Non spécifiée' }}</li>
                            <li>{{ $produit->Genre ? $produit->Genre->name_genre : 'Non spécifiée' }}</li>
                        </ul>

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="product_quanity" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                </div>
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->
@endsection
