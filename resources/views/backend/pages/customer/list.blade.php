@extends('backend.master')

@section('content')
<h1>Customer List</h1>
<div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($data as $Customer)
    <tr>

      <td>{{$Customer->id}}</td>
      <td>{{$Customer->name}}</td>
      <td>{{$Customer->email}}</td>

      <td>{{$Customer->phone}}</td>

      <td>{{$Customer->address}}</td>
      <td>
        <img width="70px" 
        @if($Customer->image) src="{{url('/uploads/customer' , $Customer->image) }}" 
        @else 
        <p>No image</p> 
        @endif
        
      </td>

      <td>
        <a class="btn btn-danger" href="{{route('customer.delete', $Customer->id)}}">Delete</a>
      </td>
    </tr>

    @endforeach



  </tbody>
</table>
</div>




@endsection