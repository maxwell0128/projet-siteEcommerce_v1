@extends('admin_vue.parent_admin')
@section('tittle', 'profile admin')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1 class="col-lg-6 col-md-8 col-10 mx-auto mb-3" style="text-decoration: underline;">Add a category</h1>
            <form  class="col-lg-6 col-md-8 col-10 mx-auto" id="submit" action="{{ route('app_ajoutez_categorie') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>

                    @endif
                    <label for="">Category name</label>
                    <input type="text" id="nomcategorie" name="nomcategorie" class="form-control">
                    <small class="text-danger fw-bold" id="error-nomcategorie"></small>
                </div>
                <button class="mt-3 btn btn-lg btn-primary btn-block" type="submit" id="ajcatego">send</button>
            </form>
        </div> <!-- /.col -->
    </div>
</div>
<script src="assets/js/categorie.js"></script>
@endsection
