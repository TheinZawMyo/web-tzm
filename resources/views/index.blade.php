@extends('layouts.main')

@section('content')
<div class="container">
  <span class="border-bottom border-success" style="font-size: 22px">Recent Posts</span>
  <div class="row">
    <div class="col-md-9">
      <div class="row">
        @foreach($allPost as $post)
        <div class="col-md-6">
          <div class="card card-chart h-75">
            <div class="card-header card-header-success">
              {{ $post->category }}
            </div>
            <div class="card-body">
              {{ $post->title}}
              <p class="card-category">
                <span class="text-success"><a href="{{ url('learn/details', encrypt($post->post_id)) }}">details...</a>
              </p>
            </div>
            <div class="card-footer">
              <i class="material-icons">access_time</i>
              @if($post->updated_at)
              {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}
              @else
              {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
              @endif
              <i class="material-icons">person</i>{{ $post->name }}
              <i class="material-icons">remove_red_eye</i>{{ $post->view > 1 ? $post->view : '0' }} Users
              
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{ $allPost->links() }}
    </div>
    <div class="col-md-3">
      <h5 class="border-bottom border-success">Most Read</h5>
        @foreach($mostRead as $most)
        <a href="">
            <div class="card p-3">
                {{ $most->title }}
            </div>
        </a>
      @endforeach
      <div class="ads">
        <div class="card p-5">
          Ads Service
        </div>
      </div>
    </div>
  </div>

</div>
@endsection