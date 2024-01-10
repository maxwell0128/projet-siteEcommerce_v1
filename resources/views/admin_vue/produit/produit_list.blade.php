@extends('admin_vue.parent_admin')
@section('tittle', 'profile admin')
@section('content')
    <!-- table -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h1 class="col-lg-6 col-md-8 col-10 mx-auto mb-3" style="text-decoration: underline;">Products List</h1>

    @if($produits->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr role="row">
                    <th class="text-dark">#</th>
                    <th class="text-dark">Name Products</th>
                    <th class="text-dark">Description</th>
                    <th class="text-dark">Price</th>
                    <th class="text-dark">Main Photo</th>
                    <th class="text-dark">Category</th>
                    <th class="text-dark">Genre</th>
                    <th class="text-dark">Modify</th>
                    <th class="text-dark">Delete</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $ide = 1;
                @endphp
                @foreach ($produits as $produit)
                <tr>
                    <td>{{ $ide }}</td>
                    <td>{{ $produit->name_produit }}</td>
                    <td>{{ $produit->description }}</td>
                    <td>{{ $produit->prix }}</td>
                    <td>
                        @if($produit->photo1)
                            <img src="{{ asset('/storage/' . $produit->photo1) }}" alt="Image du produit" style="width: 100px; height: 100px;">
                        @else
                            <p>No images available.</p>
                        @endif
                    </td>
                    <td>{{ $produit->Categorie ? $produit->Categorie->name_category : 'Non spécifiée' }}</td>
                    <td>{{ $produit->Genre ? $produit->Genre->name_genre : 'Non spécifiée' }}</td>
                    <td><a href="/Modify_produit/{{ $produit->id }}" class="btn btn-success">Modify</a></td>
                    <td><a href="/Delete_produit/{{ $produit->id }}" class="btn btn-danger">Delete</a></td>
                </tr>
                @php
                    $ide += 1;
                @endphp
                @endforeach
            </tbody>
        </table>
        {{ $produits->links() }}
    @else
        <p>Aucun produit disponible.</p>
    @endif
@endsection
