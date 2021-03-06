@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-chart">
        <div class="card-header card-header-success text-center" style="font-size:20px;font-weight:bold">{{ __('Reset Password') }}</div>
        <hr>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
              <label for="email" class="form-label text-md-right">{{ __('E-Mail Address') }}</label>
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
            <div class="form-group mb-0">
              <div class="text-center">
                <button type="submit" class="btn auth-btn btn-success">
                  {{ __('Send Password Reset Link') }}
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