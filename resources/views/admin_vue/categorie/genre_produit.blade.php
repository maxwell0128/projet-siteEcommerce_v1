@extends('admin_vue.parent_admin')
@section('tittle', 'profile admin')
@section('content')
    <h1 class="col-lg-6 col-md-8 col-10 mx-auto mb-3" style="text-decoration: underline;">Genre list and their category</h1>
    <table class="table table-hover table-borderless border-v">

        <tbody>
            @php
                $ide = 1;
            @endphp
            @foreach ($genres as $genre)
                <tr class="accordion-toggle collapsed" id="c-{{ $genre->id }}" data-toggle="collapse" data-parent="#c-{{ $genre->id }}" href="#collap-{{ $genre->id }}">
                    <td>{{ $genre->name_genre }}</td>
                </tr>

                <tr id="collap-{{ $genre->id }}" class="collapse in p-3 bg-light">
                    <td colspan="8">
                    <dl class="row mb-0 mt-1 mx-1">
                        @if ($produitsgenre->has($genre->id))
                            @foreach($produitsgenre[$genre->id] as $produit)
                            <dd class="col-sm-3">{{$produit->name_produit}}</dd>
                            <dd class="col-sm-3">
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
                            </dd>
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
                            <dd>No such product.</dd>
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
