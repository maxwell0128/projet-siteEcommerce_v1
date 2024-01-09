@guest()
    <h1>bienvenue administrateur</h1>
    <a href="{{ route('deconection') }}">deconection</a>
@endguest
@auth()
    <h1>bienvenue administrateur {{ Auth::user()->name}}</h1>
    <a href="{{ route('deconection') }}">deconection</a>
@endauth
