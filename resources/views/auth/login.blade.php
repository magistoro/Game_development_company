@extends('layouts.app')

@section('content')

<style type="text/css">
    body{
        background: #1f2122;
}

.card{
    height: 100%;
    margin-top: 20px
}
.account-block {
padding: 0;
background-image: url(https://bootdey.com/img/Content/bg1.jpg);
background-repeat: no-repeat;
background-size: cover;
height: 104%;
position: relative;
}
.account-block .overlay {
-webkit-box-flex: 1;
-ms-flex: 1;
flex: 1;
position: absolute;
top: 0;
bottom: 0;
left: 0;
right: 0;
background-color: rgba(0, 0, 0, 0.4);
}
.account-block .account-testimonial {
text-align: center;
color: #fff;
position: absolute;
margin: 0 auto;
padding: 10rem 1.75rem;
bottom: 3rem;
left: 0;
right: 0;
}

.text-theme {
    margin-top: 20px;
    color: #5369f8 !important;
}

.btn-theme {
background-color: #5369f8;
border-color: #5369f8;
color: #fff;
}


</style>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Вход</h3>
                                </div>
                                <h6 class="h5 mb-0">С возвращением!</h6>
                                <p class="text-muted mt-2 mb-5">Введите свой адрес электронной почты и пароль, чтобы войти в свой аккаунт.</p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="exampleInputPassword1">Пароль</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-theme">Войти</button>

                                    <a href="{{ route('google.login')}}" class="btn btn-danger">
                                        <i class="fab fa-google mr-2"></i> Google
                                    </a>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                    @endif

                                   

                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                            <div class="overlay rounded-right"></div>
                            <div class="account-testimonial">
                            <h4 class="text-white mb-4">This beautiful theme yours!</h4>
                            <p class="lead text-white">"Best investment i made for a long time. Can only recommend it for other users."</p>
                            <p>- Admin User</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>
    
        </div>

    </div>

</div>
@endsection
