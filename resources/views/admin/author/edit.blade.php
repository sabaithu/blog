@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit{{ $post->title }}post</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('author.update',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="title">Blog Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title}}">
                        </div>
                        <div class="form-group">
                            <label for="cover">Blog Cover</label>
                            <input type="file" id="cover" name="cover" value="{{ $post->cover }}">
                            
                        </div>
                        <div class="form-group">
                            <lable for="pre_description">Blog Pre Description</lable>
                            <textarea class="form-control" id="pre_description" name="pre_description">{{ $post->pre_description }}
                            </textarea> 
                        </div>
                        <div class="form-group">
                            <lable for="description">Blog Description</lable>
                            <textarea class="form-control" id="description" name="description">{{ $post->description }}
                            </textarea> 
                        </div>
                        
                          
                          <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
