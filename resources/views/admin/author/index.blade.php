@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blog Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <table class="table" id="post-table">
                    <caption>Blog Posts</caption>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Cover</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
        
                    </tbody>

                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
    $('document').ready(function() {
        $('#post-table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ route('blog.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title'},
                { data: 'cover', name: 'cover'},
                { data: 'id', name: 'id'},
                { data: 'id', name: 'id'},
            ],

            fnRowCallback: function(nRow, aData, iDisplayIndex) {
                $('td:nth-last-child(3)', nRow).html('<img src="/'+ aData.cover +'"width="100" class="img-reponsive">');
                $('td:nth-last-child(2)', nRow).html('<a href="/author/blog/'+ aData.id +'/edit" class="btn btn-primary">Edit Post</a>');
                $('td:last', nRow).html('<form method="POST" action="/author/blog/'+ aData.id + '"accept-charset="UTF-8">{{ csrf_field() }} {{method_field("DELETE") }}<input name="_method" type="hidden" value="DELETE"><input class="btn btn-danger" type="submit" value="Delete Post"></form>');
                return nRow;
            }
        });
    });
</script>
@endsection
