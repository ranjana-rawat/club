@extends('layouts.header')

@section('content')
<div class="container">
        <a href="/" class="btn btn-secondary mt-3">HOME</a>
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
           
            <h5> Club List</h5>
           <div align="right" class="mb-2">
                <a href="{{ route('club.create') }}" class="btn btn-success">Add New Club</a>
            </div>
         
           <table class="table table-bordered table-striped">
                <tr>
                    <th width=""> Name</th>
                    <th width="">Action</th>
                </tr>
                @foreach($data as $row)
                    <tr>
    
                        <td>{{ $row->name }}</td>
                        <td>
                            <form action="{{ route('club.destroy', $row->id) }}" method="post">
                                <a href="{{ route('club.show', $row->id) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('club.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $data->links() !!}
        </div>
    </div>
</div>
@endsection