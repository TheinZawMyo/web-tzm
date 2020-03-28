@extends('layouts.main')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        @if($detail)
        <h3>{{ $detail->title}} </h3>
        <p>
          {!! $detail->content !!}
        </p>
        <hr>
        {{-- <div class="row card">
          <div class="col-md-12 p-3">
            <i class="material-icons">access_time</i>
            @if($detail->updated_at)
            {{ Carbon\Carbon::parse($detail->updated_at)->diffForHumans() }}
        @else
        {{ Carbon\Carbon::parse($detail->created_at)->diffForHumans() }}
        @endif
        &nbsp;&nbsp;&nbsp;
        <i class="material-icons">person</i> {{ $detail->name }}&nbsp;&nbsp;&nbsp;
        <i class="material-icons">remove_red_eye</i> {{ $detail->view > 1 ? $detail->view : 'no view' }}
      </div>
    </div> --}}
    @endif
    <hr>
    <div class="row">
      <div class="col-md-6 border-right">
        @if (isset($previous))
        <div>
          <a href="{{ url('learn/details', $previous->post_id) }}">
            <div class="btn-content">
              <div class="btn-content-title"><i class="fa fa-arrow-left"></i> Previous Post</div><br>
              <p class="btn-content-subtitle">{{ $previous->title }}</p>
            </div>
          </a>
        </div>
        @else
        <div>
          <div class="btn-content">
            <div class="btn-content-title"><i class="fa fa-arrow-left"></i> Previous Post</div><br>
            <p class="btn-content-subtitle">There is no available previous post !</p>
          </div>
        </div>
        @endif
      </div>
      <div class="col-md-6">
        @if (isset($next))
        <div>
          <a href="{{ url('learn/details', $next->post_id) }}">
            <div class="btn-content">
              <div class="btn-content-title text-right"> Next Post <i class="fa fa-arrow-right"></i></div><br>
              <p class="btn-content-subtitle">{{ $next->title }}</p>
            </div>
          </a>
        </div>
        @else
        <div>
          <div class="btn-content">
            <div class="btn-content-title text-right"> Next Post <i class="fa fa-arrow-right "></i></div><br>
            <p class="btn-content-subtitle">There is no available next post !</p>
          </div>
        </div>
        @endif
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <h4>Comments</h4>
        @if (Route::has('login'))
        @auth
        <textarea name="comment" id="comment" cols="30" rows="10" style="width: 100%;"></textarea>
        <button type="submit" class="btn btn-success">Comment</button>
        @else
        <p>Please Sign In to give comments on this post !</p>
        @endauth
        @endif
      </div>
    </div>
  </div>
  <div class="col-md-3">
    
  </div>
</div>
</div>
</div>
@endsection