@extends('layouts.main')
@section('title', 'All Authors')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-12">
          <h4>All Authors List</h4>
          <table class="table table-striped">
            <thead>

              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td><a href="{{ url('/author/edit/$user->id') }}">Edit</a></td>
                <td>
                    <form action="{{ url('admin/authors/'.$user->id) }}" method="POST">
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
@endsection
