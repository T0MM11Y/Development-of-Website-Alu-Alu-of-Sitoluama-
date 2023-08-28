<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Upcube - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />

    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">
                                <img src="{{ asset('front/assets/img/logositoluama.png') }}" height="70"
                                    width="150" class="logo-dark mx-auto" alt="">
                            </a>
                        </div>
                    </div>
                    <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>
                    <div class="p-3">
                        <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                            @csrf



                            <!-- Username -->
                            <div class="form-group mb-3 row">
                                <div class="col-12">

                                    <x-text-input id="username" class="form-control" type="text" name="username"
                                        placeholder="Username" :value="old('username')" required autofocus
                                        autocomplete="username" />
                                    <x-input-error :messages="$errors->get('username')" class="mt-2" style="color: red" />
                                </div>
                            </div>


                            <!-- Password -->
                            <div class="form-group mb-3 row">
                                <div class="col-12">


                                    <x-text-input id="password" class="form-control" type="password" name="password"
                                        placeholder="Password" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red" />
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group mb-3 row">
                                <div class="col-12">

                                    <x-text-input id="password_confirmation" class="form-control" type="password"
                                        placeholder="Confirm Password" name="password_confirmation" required
                                        autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red" />
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3 text-center"><i class="mdi mdi-account-circle"></i>
                                        <a href="{{ route('login') }}" class="text-muted">Already have an account?</a>
                                    </div>
                                </div>
                                <div class="form-group mt-2 mb-0 row">
                                    <x-primary-button class="btn btn-info w-100 waves-effect waves-light">
                                        {{ __('Register') }}
                                    </x-primary-button>
                                </div>

                            </div>
                        </form>
                        <!-- end form -->
                    </div>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->
    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>

</html>
