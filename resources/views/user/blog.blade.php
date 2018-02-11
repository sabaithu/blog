@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div class="container">
  @foreach($blogs as $blog)
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <a href="/blog/{{ $blog->slug }}">
            <h2 class="post-title">
              {{ $blog->title}}
            </h2></a>
            <p class="post-subtitle">
              {{ $blog->pre_description }}
            </p>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{ $blog->user->name }}</a>
            on {{ $blog->created_at->format('F,d,Y') }}</p>
        </div>
        <hr>
      </div>
</div>
@endforeach

  {{ $blogs->links()}}  

@endsection
