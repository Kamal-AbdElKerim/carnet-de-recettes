
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Login</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/mainn.css" />
 
    
    <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

</head>

<body>
    @include('layouts.messages_alert')

    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="row" method="post" action="{{ route('store.login') }}">
                        @csrf
                        <div class="card-body">
                            <div class="title mb-5">
                                <h3>Login Now</h3>
                            </div>
                          
                          
                            <div class="form-group">
                                <label for="reg-email">E-mail Address</label>
                                <input name="email" class="form-control" type="email" id="reg-email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="reg-pass">Password</label>
                                <input name="password" class="form-control" type="password" id="reg-pass" >
                            </div>
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1">
                                    <label class="form-check-label">Remember me</label>
                                </div>
                                <a class="lost-pass" href="account-password-recovery.html">Forgot password?</a>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Login</button>
                            </div>
                            <p class="outer-link">Don't have an account? <a href="{{ route('Register') }}">Register here </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->

    


    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    {{-- <script src="assets/js/main.js"></script> --}}
    <script src="{{URL::asset('Dashboard/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap Bundle js -->
 
  <!--Internal  Notify js -->
  <script src="{{URL::asset('Dashboard/plugins/notify/js/notifIt.js')}}"></script>
  <script src="{{URL::asset('Dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
</body>

</html>