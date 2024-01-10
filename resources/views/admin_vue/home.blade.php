@extends('admin_vue.parent_admin')
@section('tittle', 'accueil admin')
@section('content')
@guest
    <h1>Bienvenue administrateur</h1>
@endguest

@auth
    <h1>Bienvenue administrateur {{ Auth::user()->name }}</h1>
    <a href="{{ route('deconnexion') }}">Déconnexion</a>
    <a href="{{ route('app_profile', ['id' => Auth::user()->id]) }}">Profil</a>
@endauth
@endsection
