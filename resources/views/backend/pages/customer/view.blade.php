@extends('backend.master')

@section('content')
<h1>customerList</h1>


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

  
    <tr>

      <td>{{$customer->id}}</td>
      <td>{{$customer->name}}</td>
      <td>{{$customer->email}}</td>
      <td>{{$customer->phone}}</td>
      <td>{{$customer->address}}</td>
      <td>{{$customer->dob}}</td>
      <td><img width="70px" src="{{url('/app/image/customer/'.$customer->image)}}" alt=""></td>
      <td>{{$customer->status}}</td>
      
    </tr>
   
   

    
    
  </tbody>
</table>
</div>



@endsection


