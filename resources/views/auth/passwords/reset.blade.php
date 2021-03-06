@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-chart">
        <div class="card-header card-header-success text-center" style="font-size:20px;font-weight:bold">{{ __('Reset Password') }}</div>
        <hr>
        <div class="card-body">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
              <label for="email" class="form-label text-md-right">{{ __('E-Mail Address') }}</label>
              <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="form-label text-md-right">{{ __('Password') }}</label>
              <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="password-confirm" class="form-label text-md-right">{{ __('Confirm Password') }}</label>
              <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                  autocomplete="new-password">
              </div>
            </div>
            <div class="form-group mb-0">
              <div class="text-center">
                <button type="submit" class="btn auth-btn btn-success">
                  {{ __('Reset Password') }}
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