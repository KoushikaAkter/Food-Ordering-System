@extends('backend.master')

@section('content')
<h1>customerList</h1>
<div>
<a href="{{route('customer.form')}}"  class="btn btn-success">Edit customer list</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email Address</th>
      
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <th scope="col">DOB</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
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
      <td>{{$Customer->dob}}</td>
      <td><img width="70px" src="{{url('/app/image/customer/'.$Customer->image)}}" alt=""></td>
      <td>{{$Customer->status}}</td>
      
    </tr>
    <td>
    <a class="btn btn-info" href="{{route('customer.edit', $Customer->id)}}">Edit</a>
    <a class="btn btn-success" href="{{route('customer.view', $Customer->id)}}">View</a>
    <a class="btn btn-danger" href="{{route('customer.delete', $Customer->id)}}">Delete</a>
    </td>
    @endforeach

    
    
  </tbody>
</table>
</div>




@endsection



