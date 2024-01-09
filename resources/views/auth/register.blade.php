
<!doctype html>
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
        <div class="container">
            <div class="row align-items-center">
                <div class=" lign-items-center">
                    <div class="mx-auto text-center">
                        <h2 class="my-3">Register</h2>
                    </div>
                    <form class="col-lg-6 col-md-8 col-10 mx-auto" id="submit" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ old ('email') }}" required autocomplete="email" autofocus pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
                            <small class="text-danger fw-bold" id="error-register-email"></small>
                        </div>
                        <div class="form-row d-flex">
                            <div class="form-group col-md-6">
                                <label for="firstname">Firstname</label>
                                <input type="text" id="firstname" class="form-control" name="firstname"  value="{{ old ('firstname') }}" required autocomplete="firstname" autofocus pattern="[a-zA-Z0-9 ]*">
                                <small class="text-danger fw-bold" id="error-register-firstname"></small>
                            </div>
                            <div class="form-group col-md-6 ms-3">
                                <label for="lastname">Lastname</label>
                                <input type="text" id="lastname" class="form-control" name="lastname"  value="{{ old ('lastname') }}" required autocomplete="lastname" autofocus pattern="[a-zA-Z0-9 ]*">
                                <small class="text-danger fw-bold" id="error-register-lastname"></small>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPassword5">Password</label>
                                    <input type="password" class="form-control" id="inputPassword5" name="password" required autocomplete="password" autofocus>
                                    <small class="text-danger fw-bold" id="error-register-password"></small>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword6">Confirm Password</label>
                                    <input type="password" class="form-control" id="inputPassword6" name="password_Confirm" required autocomplete="password_Confirm" autofocus>
                                    <small class="text-danger fw-bold" id="error-register-confpassword"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">Password requirements</p>
                                <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
                                <ul class="small text-muted pl-4 mb-0">
                                    <li class="" id="taille">Minimum 8 character </li>
                                    <li class="" id="majuscule">At least one capital letter</li>
                                    <li class="" id="minuscule">At least one lowercase letter</li>
                                    <li class="" id="numéro">At least one number</li>
                                    <li class="" id="caractère">At least one special character</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="agree" required>
                            <label class="form-check-label" for="agree">Agree terms </label>
                            <br>
                            <small class="text-danger fw-bold mx-5" id="error-register-agree"></small>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-lg btn-primary text-center" type="submit" id="register">Sign up</button>
                        </div>
                        <p class="mt-3 mb-1 text-muted text-center">Already have account ? <a href="{{ route('login') }}">login</a></p>

                    </form>
                    <p class="mt-5 mb-3 text-muted text-center">© 2020</p>
                </div>
            </div>
        </div>
        <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/user.js"></script>
    <!-- End Script -->
    </body>
</html>
