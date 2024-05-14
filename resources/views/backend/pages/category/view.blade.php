@extends('backend.master')

@section('content')
    <h1>Category List</h1>


    


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Description</th>
                <th scope="col">Category Image</th>
               
               
            </tr>
        </thead>
        <tbody>

           

                    <th scope="row">{{ $categories->id }}</th>
                    <td>{{ $categories->name }}</td>
                    <td>{{ $categories->description }}</td>
                    <td><img style="width: 10%;" src="{{ url('uploads/category', $categories->image) }}"
                            alt="" srcset=""></td>
                    
                  
                    </td>
                </tr>
               
            


        </tbody>

    </table>

    
@endsection
