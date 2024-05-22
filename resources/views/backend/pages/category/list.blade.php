@extends('backend.master')

@section('content')
    <h1>Category List</h1>


    <a href="{{ route('category.form') }}" class="btn btn-success">Create new category</a>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Description</th>
                <th scope="col">Category Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $key=>$data)
                {{-- @dd($data) --}}

                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->description }}</td>
                    <td>
                        <img width="200px" height="200px" src="{{url('uploads/category/'.$data->image)}}" alt="">
                   
                    </td>
                    <td>

                        <a class="btn btn-info" href="{{route('category.edit', $data->id)}}">Edit</a>
                        <a class="btn btn-success" href="{{route('category.view', $data->id)}}">View</a>
                        <a class="btn btn-danger" href="{{route('category.delete', $data->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach


        </tbody>

    </table>

    {{ $categories->links() }}
@endsection
