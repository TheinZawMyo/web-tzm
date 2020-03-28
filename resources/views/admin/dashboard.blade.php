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
      @if(count($myPost) == 0)
      <h3 class="text-center">Congratulations. You are now member of <span
          class="text-danger font-weight-bold">Share</span><span class="text-success font-weight-bold">IT</span>.
        Promote your skills by sharing knowledge in <span class="text-danger font-weight-bold">Share</span><span
          class="text-success font-weight-bold">IT</span>. Let's go.</h3><br>
      <img src="{{ asset('img/smile.gif') }}" alt="smile" width="150px" height="150px">
      @endif
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
              <a href="#" class="text-success"><i class="material-icons">edit</i></a>
              <a href="#" class="text-danger"><i class="material-icons">delete</i></a>
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