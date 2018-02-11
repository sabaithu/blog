@extends('layouts.main')
@section('title', 'Author Edit')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-12">
          <h4>Edit Authors List</h4>
            <form action="{{ route('author.update',['id'=>$user->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
            
              <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" class="form-control"  value="{{ $user->name}}">
                
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control"  value="{{ $user->email}}">
                
              </div>
              <!-- <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password">
              </div> -->
              <div class="form-group">
                <label for="exampleFormControlSelect2">Select Role</label>
                  <select class="form-control" name="role[]" multiple>
                      @foreach($roles as $role)
                        <option value="{{ $role->name}}" 
                          @if(in_array($role->name, $selectedRoles))selected = "selected"
                          @endif 
                        >{{ $role->name }}</option>
                        
                      @endforeach
                  </select>
              </div>
                
              </div>
              <button type="submit" class="btn btn-primary">Edit User</button>
            </form>

      </div>
    </div>
</div>
@endsection
