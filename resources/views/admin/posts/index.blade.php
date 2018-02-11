@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Post Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <table class="table">
                      <caption>Optional table caption.</caption>
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Cover</th>
                              <td>Pre-Description</td>
                              <th>Edit</th>
                              <th>Delete</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($posts as $post)
                          <tr>
                              <td>{{ $post->id }}</td>
                              <td>{{ $post->title}}</td>
                              <td>{{ $post->cover}}</td>
                              <td>{!! str_limit($post->pre_description, 79 )  !!}</td>
                              <td> Edit</td>
                               <td>
                                <!-- <form method="POST" action="posts/{{ $post->id }}/delete">
                                  {{ csrf_field() }} 
                                  {{method_field("DELETE") }}
                                  <input name="_method" type="hidden" value="DELETE">
                                  <input class="btn btn-danger" type="submit" value="Delete Post"></form> -->
                                  <form action="{{ url('admin/posts/'.$post->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                              </td>
                              
                              
                          </tr>
                      @endforeach
                          
                         
                      </tbody>
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

