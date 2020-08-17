@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 m-auto">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
            {{ Form::open(['route' => ['updateProfile', encrypt($profile->id) ], 'method' => 'put']) }}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">First Name</label>
                    @if($errors->has('name'))
                      {{ Form::text('name', null, ['class' => 'form-control'])}}
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    @else
                    {{ Form::text('name', $profile->name ? $profile->name : null, ['class' => 'form-control'])}}
                    @endif
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email address</label>
                    @if($errors->has('email'))
                      {{ Form::text('email', null, ['class' => 'form-control']) }}
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    @else
                      {{ Form::email('email', $profile->email ? $profile->email : null, ['class' => 'form-control']) }}
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating">About Me</label>
                    {{ Form::textarea('about', $profile->about ? $profile->about : null, ['class' => 'form-control', 'rows' => '5'])}}
                    </div>
                  </div>
                </div>
              </div>
              {{ Form::submit('Update Profile', ['class' => 'btn btn-success pull-right']) }}
              <div class="clearfix"></div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection