@extends('layouts.main')

@section('content')
<div class="container">
  <h3>Latest Posts</h3>
  <div class="row">
    @if(count($programPost) == 0)
    <br>
    <h2>Programming Post Unavailable!! </h2>
    @endif
    @foreach ($programPost as $post)
    <div class="col-md-4">
      <div class="card card-chart h-75">
        <div class="card-header card-header-success">
          {{ $post->category }}
        </div>
        <div class="card-body">
          {{ $post->title}}
          <p class="card-category">
            <span class="text-success"><a href="{{ url('learn/details', $post->post_id) }}">details...</a>
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
          <i class="material-icons">thumb_up</i>{{ $post->view > 1 ? $post->view : '0' }}
        </div>
      </div>
    </div>
    @endforeach
  </div>
  {{ $programPost->links() }}
</div>
@endsection