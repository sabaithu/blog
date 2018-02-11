@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blog Post create</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ url('author.destroy') }}" method="DELETE" enctype="multipart/form-data">
                        {{ method_field('DELETE') }}
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="title">Blog Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="cover">Blog Cover</label>
                            <input type="file" id="cover" name="cover">
                            
                        </div>
                        <div class="form-group">
                            <lable for="pre_description">Blog Pre Description</lable>
                            <textarea class="form-control" id="pre_description" name="pre_description"></textarea> 
                        </div>
                        <div class="form-group">
                            <lable for="description">Blog Description</lable>
                            <textarea class="form-control" id="description" name="description"></textarea> 
                        </div>
                        
                          
                          <button type="submit" class="btn btn-default"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
















