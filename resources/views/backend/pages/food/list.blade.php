@extends('backend.master')

@section('content')
<h1>Food List</h1>


<a href="{{route('food.form')}}" class="btn btn-success">Add Food</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">price</th>
      <th scope="col">image</th>
      <th scope="col">description</th>
      <th scope="col">quantity</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>

   @foreach($foods as $key=>$data)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->price}}</td>
      <td>
        <img src="{{url('uploads/food/'.$data->image)}}" alt="">
      </td>
      <td>{{$data->description}}</td>
      <td>{{$data->quantity}}</td>

      <td>
                        <a class="btn btn-info" href="{{route('food.edit', $data->id)}}">Edit</a>
                        <a class="btn btn-success" href="{{route('food.view',$data->id)}}">View</a>
                        <a class="btn btn-danger" href="{{route('food.delete',$data->id)}}">Delete</a>
                    </td>
      
    </tr>
    @endforeach
  </tbody>
</table>
{{ $foods->links() }}

@endsection
