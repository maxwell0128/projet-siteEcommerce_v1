@extends('admin_vue.parent_admin')
@section('tittle', 'profile admin')
@section('content')

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <form  class="col-lg-6 col-md-8 col-10 mx-auto" action="{{ route('app_profile',['id' => Auth::user()->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group mb-3">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" class="form-control" value="{{Auth::user()->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{Auth::user()->email }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="numero_telephone">Numéro de téléphone</label>
                            <input type="tel" id="numero_telephone" name="numero_telephone" class="form-control" value="{{Auth::user()->numero_telephone }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="mot_de_passe">Mot de passe</label>
                            <input type="password" id="mot_de_passe" name="password" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="confirme_password">Confirmer le mot de passe</label>
                            <input type="password" id="confirme_password" name="confirme_password" class="form-control">
                        </div>

                        <button class="mt-3 btn btn-lg btn-primary btn-block" type="submit">Modifier</button>
                    </form>
                </div> <!-- /.col -->
            </div>
        </div>
@endsection
