@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-chart">
        <div class="card-header card-header-success text-center" style="font-size:20px;font-weight:bold">{{ __('Login') }}</div>
        <hr>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label for="email" class="form-label text-md-right">{{ __('E-Mail Address') }}</label>
              <br>
              <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="password" class="form-label text-md-right">{{ __('Password') }}</label><br>
              <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="check" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                  <label for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group mb-0">
              <div class="text-center">
                @if (Route::has('password.request'))
                <a class="btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                <br>
                @endif
                <button type="submit" class="btn auth-btn btn-success">
                  {{ __('Login') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection