@extends('layouts.app')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <a href="{{ route('newPost') }}" class="btn btn-success float-right">New Post</a>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">mood</i>
            </div>
            <p class="card-category">Viewer</p>
            <h3 class="card-title">50
              <small></small>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons text-warning">add_alert</i>
              <a href="" class="text-gray">To See More..</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">import_export</i>
            </div>
            <p class="card-category">Posts</p>
            <h3 class="card-title">245</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i> Last 24 Hours
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Fixed Issues</p>
            <h3 class="card-title">75</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">local_offer</i> Tracked from Github
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-facebook"></i>
            </div>
            <p class="card-category">Share</p>
            <h3 class="card-title">+245</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">update</i> Just Updated
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        @if(count($myPost) == 0)
        <!-- <h3>There is no post! Promote your skills by sharing knowledge.</h3>
        <img src="{{ asset('img/smile.gif') }}" alt="smile" width="150px" height="150px"> -->
        <h3 class="text-center">No Posts Available!</h3>
        @endif
      </div>
      @foreach ($myPost as $post)
      <div class="col-xl-4 col-lg-12">
        <div class="card card-chart h-75">
          <div class="card-header card-header-success">
            {{ $post->category }}
          </div>
          <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-category">
            {{-- {!! html_entity_decode($post->content)!!} --}}
              <span class="text-success"><a href="#">details...</a></p>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i>
              @if($post->updated_at)
              {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}
              @else
              {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
              @endif
            </div>
            <div class="float-right">
              <a href="{{ url('user/edit', encrypt($post->post_id)) }}" class="text-success"><i class="material-icons">edit</i></a>
              <a href="{{ url('user/delete', encrypt($post->post_id)) }}" class="text-danger" onclick="return confirm('Are you sure to delete this post')"><i class="material-icons">delete</i></a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    {{ $myPost->links() }}
  </div>
</div>

@endsection