@extends('layouts.main')
@section('title', 'All Authors')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-12">
          <h4>Create Authors List</h4>
            <form action="{{ route('admin.admin.update',['id'=>$user->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
              <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" class="form-control"  placeholder="Enter Your Name">
                
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control"  placeholder="Enter email">
                
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect2">Select Role</label>
                  <select multiple class="form-control" id="exampleFormControlSelect2">
                    <option>Admin</option>
                    <option>Author</option>
                    <option>Editor</option>
                    <option>User</option>
                  </select>
              </div>
                
              </div>
              <button type="submit" class="btn btn-primary">Insert</button>
            </form>

      </div>
    </div>
</div>
@endsection
