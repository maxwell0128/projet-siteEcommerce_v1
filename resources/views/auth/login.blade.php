<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  </head>
  <body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <h1 class="h6 mb-3 text-center">Sign in</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @error('email')
                        <div class="alert alert-danger text-center" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                    <input type="email" id="email" name="email" class="form-control mb-3 @error('email') is-invalid @enderror" placeholder="Email address" required autocomplete="email" autofocus>
                    <input type="password" name="password" id="inputPassword" class="form-control mb-3 @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"  value="remember-me" id="flexSwitchCheckDefault" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label fs-6" for="flexSwitchCheckDefault">Stay logged in</label>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="#" class="fs-6">Forgot your password</a>
                        </div>
                    </div>
                    <button class="mt-3 btn btn-lg btn-primary btn-block " type="submit">Let me in</button>
                    <p class="mt-5 mb-1 text-muted">not registered yet ? <a href="{{ route('register') }}">create an account</a></p>

                </form>
                <p class="mt-5 mb-3  text-muted">© 2023</p>
            </div>
        </div>
    </div>
    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
  </body>
</html>
