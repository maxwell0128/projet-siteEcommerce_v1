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
                    <td>
                        {{ $produit->shortDescription() }}
                        @if (str_word_count($produit->description) > 20)
                            <button class="btn btn-link btn-sm toggle-more" data-toggle="modal" data-target="#modal-{{ $produit->id }}">Plus</button>
                            <div class="modal fade" id="modal-{{ $produit->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-{{ $produit->id }}-label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-{{ $produit->id }}-label">Description complète</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $produit->description }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
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
        <div class="" style="height: 100px;">
            {{ $produits->links() }}
        </div>
    @else
        <p>Aucun produit disponible.</p>
    @endif
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
