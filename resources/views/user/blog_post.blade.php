@extends('layouts.main')

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        @if($detail)
        <h2>{{ $detail->title}} </h2>
        <hr>
        <p>
          {!! $detail->content !!}
        </p>
        {{ Form::hidden('id', $detail->id, ['class' => 'hidden_id']) }}
        <hr>
        <div class="row card m-1">
          <div class="col-md-12 p-3">
            <div class="row">
              <div class="col-md-3 col-sm-2">
              <i class="material-icons">access_time</i>
                @if($detail->updated_at)
                {{ Carbon\Carbon::parse($detail->updated_at)->diffForHumans() }}
                @else
                {{ Carbon\Carbon::parse($detail->created_at)->diffForHumans() }}
                @endif
              </div>
              <div class="col-md-3 col-sm-3">
                <i class="material-icons">person</i> {{ $detail->name }}&nbsp;&nbsp;&nbsp;
              </div>
              <div class="col-md-2 col-sm-2">
                <i class="material-icons like-btn" style="cursor:pointer">thumb_up</i> {{ $detail->view > 1 ? $detail->view : 'no view' }} Users
              </div>
            </div>         
      </div>
    </div>
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
    <!-- <button class="btn btn-primary">CLick</button> -->
  </div>
</div>
</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('.btn').click(function(){
    alert('helo');
    let post_id = $('.hidden_id').val();
    $.ajax({
        type : 'POST',
        url : route('liking'),
        dataType : 'json',
        data : {post_id: post_id}
        error: function(data){
            alert(data);
        }
    });
});
</script>