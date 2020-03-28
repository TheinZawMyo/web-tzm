@extends('layouts.app')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 m-auto">
        <div class="card">
          <div class="card-header card-header-success">
            Upload New Post
          </div>
          <div class="card-body">
            {{ Form::open([ 'route' => 'savePost', 'method' => 'post', 'accept-charset'=>'utf-8','enctype'=>'multipart/form-data']) }}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Post Title</label>
                  {{ Form::text('title',null,['class' => 'title form-control']) }}
                  @if ($errors->has('title'))
                  <span class="form-text text-danger">{{ $errors->first('title') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label class="bmd-label-floating">Category</label><br>
                  {{-- {{ Form::select('category',['webDesign' => 'Web Design', 'framework' => 'Framework', 'programming' => 'Programming', 'knowledge' => 'Knowledge']) }}
                  --}}
                  {{ Form::radio('category','Web Design') }} Web Design
                  {{ Form::radio('category','Framework') }} Framework
                  {{ Form::radio('category','Programming') }} Programming
                  {{ Form::radio('category','Knowledge') }} Knowledge
                  @if ($errors->has('category'))
                  <span class="form-text text-danger">{{ $errors->first('category') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label class="bmd-label-floating">Content</label><br><br>
                  {{ Form::textarea('content',null,['id' => 'summernote']) }}
                  @if ($errors->has('content'))
                  <span class="form-text text-danger">{{ $errors->first('content') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  {{ form::submit('Upload..',['class'=>'btn btn-success float-right']) }}
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