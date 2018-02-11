@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Fom Login Page</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Hello Everybody</h3>


                    <table class="table-responsive">
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>PreDescription</td>
                            <td>Cover</td>
                            <td>Edit</td>
                            <td>Delete</td>
                            <td><hr></td>
                        </tr>
                        @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id}}</td>
                            <td>{{ $blog->title}}</td>
                            <td>{{ $blog->pre_description}}</td>
                            <td><img src="{{ $blog->cover}}" class="img-responsive" width=200px ></td>
                            <td>edit</td>
                            <td>delete</td>

                            <td><hr></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
