<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>     
         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/auth/css/bootstrap.min.css')}}">
        <!-- Typography CSS -->
        <link rel="stylesheet" href="{{ asset('assets/auth/css/typography.css')}}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('assets/auth/css/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('assets/auth/css/responsive.css')}}">
        <!-- Styles -->
       
    </head>
    <body>
        <!-- loader Start -->
        {{-- <div id="loading" style="background: #fff url(https://media.tenor.com/02Qoy3dJ-JkAAAAC/book-loading.gif) no-repeat scroll center center;">
            <div id="loading-center">
                <div class="loader">
                </div>
            </div>
        </div> --}}
        <!-- loader END -->     
        <!-- Header -->
            
        <div id="home">
            <div class="main-slider">
                <div id="container-inside">
                    <div id="holder"><canvas width="1855" height="489" style="width: 1855px; height: 489px;"></canvas></div>
                </div>
                
                    {{-- Login qismi --}}
                    <section class="sign-in-page" style="background: none;">
                        <div class="container p-0">
                            <div class="row no-gutters height-self-center">
                                <div class="col-12 align-self-center page-content rounded">
                                <div class="row m-0">
                                    <div class="col-12 ">
                                        <div class="sign-in-from bg-primary rounded" style="width: 40%; color: gray!important; background-color: #ffffff!important;">
                                            <h1 class="mb-0 text-center text-white" style="color: black!important; font-size: 26px; font-weight: 600;">Kirish</h1>
                                            <img style=" display: block; margin-left: auto; margin-right: auto; width: 30%;" src="https://cspi.uz//storage/app/media/2022-YIL/2/cspu_logo_1024.png" alt="">
                                            <p class="text-center text-white mt-4" style="color: black!important">OTM elektron kutubxonasi katalogidan foydalanish uchun tizimga kirishingiz lozim</p>
                                            <form class="mt-4 form-text" action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email manzilingiz</label>
                                                    <input type="email"  style="color: black!important" name="email" value="{{ old('email') }}"  class="mb-0 form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" >
                                                    @error('email')
                                                        <span style="background-color: #fff; color: red; font-size: 12px" class="alert-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Parolingiz</label>                                                  
                                                    @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}" class="float-right text-dark" style="font-size: 12px">Parolni unutdingizmi?</a>
                                                    @endif
                                                    <input type="password" id="exampleInputPassword1"   class="mb-0 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >
                                                    @error('password')
                                                        <span style="background-color: #fff; color: red; font-size: 12px" class="alert-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="d-inline-block w-100">
                                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="customCheck1">Meni eslab qol</label>
                                                    </div>
                                                </div>
                                                <div class="sign-info text-center">
                                                    <button type="submit" class="btn btn-white d-block w-100 mb-2" style="background-color: #0dd6b8; color: white; font-weight: 700;">Saytga kirish</button>
                                                    <span class="text-dark dark-color d-inline-block line-height-2">Siz ro'yxatdan o'tmaganmisiz? <a href="{{route('register')}}" style="color: #0d09ef;">Ro'yxatdan o'tish</a></span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- Login qismi end --}}
                
            </div>
            <!-- END REVOLUTION SLIDER -->
            <!-- </div> -->
        </div>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('assets/auth/js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{ asset('assets/auth/js/wow.min.js')}}"></script>  
        <script src="{{ asset('assets/auth/js/custom.js')}}"></script>
                   
    </body>
</html>
