@extends('admin_vue.parent_admin')
@section('tittle', 'profile admin')
@section('content')

    <h1 class="col-lg-6 col-md-8 col-10 mx-auto mb-3" style="text-decoration: underline;">List of categories and their products</h1>
    <table class="table table-hover table-borderless border-v">

        <tbody>
            @php
                $ide = 1;
            @endphp
            @foreach ($categories as $categorie)
                <tr class="accordion-toggle collapsed" id="c-{{ $categorie->id }}" data-toggle="collapse" data-parent="#c-{{ $categorie->id }}" href="#collap-{{ $categorie->id }}">
                    <td>{{ $categorie->name_category }}</td>
                </tr>

                <tr id="collap-{{ $categorie->id }}" class="collapse in p-3 bg-light">
                    <td colspan="8">
                    <dl class="row mb-0 mt-1 mx-1">
                        @if ($produitsCategorie->has($categorie->id))
                            @foreach($produitsCategorie[$categorie->id] as $produit)
                            <dd class="col-sm-3">{{$produit->name_produit}}</dd>
                            <dd class="col-sm-3">{{$produit->description}}</dd>
                            <dd class="col-sm-3">{{$produit->prix}}</dd>
                            <dd class="col-sm-3">
                                @if($produit->photo1)
                                    <img src="{{ asset('storage/' . $produit->photo1) }}" alt="Image du produit" style="width: 100px; height: 100px;">
                                @else
                                    <p>Aucune image disponible.</p>
                                @endif
                            </dd>
                            <dd class="mb-2" style="width: 100%;height: 1vh;background-color: blue;"></dd>
                            @endforeach
                        @else
                            <dd>No products associated with this category.</dd>
                        @endif

                    </dl>
                    </td>
                </tr>
            @php
                $ide += 1;
            @endphp
            @endforeach
        </tbody>
    </table>
@endsection



