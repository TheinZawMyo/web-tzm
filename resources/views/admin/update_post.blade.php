@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 m-auto">
        <div class="card">
          <div class="card-header card-header-success">
            Update Post
          </div>
          <div class="card-body">
            {{ Form::open([ 'route' => ['updatePost', encrypt($updatePostData->post_id) ] , 'method' => 'put', 'accept-charset'=>'utf-8','enctype'=>'multipart/form-data']) }}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Post Title</label>
                  {{ Form::text('title',($updatePostData->title) ? $updatePostData->title : null,['class' => 'title form-control']) }}
                  @if ($errors->has('title'))
                  <span class="form-text text-danger">{{ $errors->first('title') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label class="bmd-label-floating">Category</label><br>
                  @if($updatePostData->category == "Web Design ")
                  {{ Form::radio('category','Web Design',['checked' => 'true']) }} Web Design
                  @else 
                  {{ Form::radio('category','Web Design', ['checked' => 'false']) }} Web Design
                  @endif

                  @if($updatePostData->category == "Framework")
                  {{ Form::radio('category','Framework', ['checked' => 'true']) }} Framework
                  @else
                  {{ Form::radio('category','Framework', ['checked' => 'false']) }} Framework
                  @endif

                  @if($updatePostData->category == "Programming")
                  {{ Form::radio('category','Programming',['checked' => 'true']) }} Programming
                  @else 
                  {{ Form::radio('category','Programming', ['checked' => 'false']) }} Programming
                  @endif


                  @if($updatePostData->category == "Knowledge")
                  {{ Form::radio('category','Knowledge', ['checked' => 'true']) }} Knowledge
                  @else
                  {{ Form::radio('category','Knowledge', ['checked' => 'false']) }} Knowledge
                  @endif
                  @if ($errors->has('category'))
                  <span class="form-text text-danger">{{ $errors->first('category') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label class="bmd-label-floating">Content</label><br><br>
                  {{ Form::textarea('content', $updatePostData->content ? $updatePostData->content : null ,['id' => 'summernote']) }}
                  @if ($errors->has('content'))
                  <span class="form-text text-danger">{{ $errors->first('content') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  {{ form::submit('Update..',['class'=>'btn btn-success float-right']) }}
                </div>
              </div>

            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('#summernote').summernote({
    placeholder: 'Enter your content',
    tabsize: 2,
    height: 200,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
</script>

@endsection