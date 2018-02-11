@extends('layouts.master')

 @section('content')

<h1> Blog Edit</h1>

@include('partials.errors')

@if(Session::has('success_blog_update'))
     <div class="alert alert-success">
     	{{ Session::get('success_blog_update')}}
     </div>
@endif
 <form method="post">
 	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
 	
 	<div class="form-group">
 		<lavel for="title" class="control-label">Title</lavel>
 		<input type="text" name="title" class="form-control" value="{{ $post->title }}">
 	</div>
 	<div class="form-group">
 		<lavel for="description" class="control-label">Descriptioon</lavel>
 		<textarea type="text" name="description" class="form-control" value ="{{ $post->description}}" id="summernote">{{ $post->description }}</textarea>

 	</div>
 	<button type="submit" class="btn btn-primary">Update  Post</button>
 </form>
 <!-- include libraries(jQuery, bootstrap) -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<!-- include summernote css/js-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

<script>
 $('document').ready(function() {
        $('#summernote').summernote();
 });
</script>
 @stop
