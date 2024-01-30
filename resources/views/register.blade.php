
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Register</title>
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

    <div class="account-login section">
        <div class="container">
            <div class="row">
              
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
                    <div class="register-form">
                        <div class="title">
                            <h3>No Account? Register</h3>

                            <p>Registration takes less than a minute but gives you full control over your orders.</p>
                        </div>
                        <form class="row" method="post" action="{{ route('store') }}">
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-fn">Name</label>
                                    <input name="name" class="form-control" type="text" id="reg-fn" value="{{ old('name') }}">
                                </div>
                            </div>
                          
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-email">E-mail Address</label>
                                    <input name="email" class="form-control" type="email" id="reg-email" value="{{ old('email') }}">
                                </div>
                            </div>
                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <input name="password" class="form-control" type="password" id="reg-pass" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass-confirm">Confirm Password</label>
                                    <input class="form-control" name="password_confirmation" type="password" id="reg-pass-confirm" >
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="{{ route('login') }}">Login Now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->


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