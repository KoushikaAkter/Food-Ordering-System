@extends('backend.master')

@section('content')
<h1>Food List</h1>





<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">price</th>
      <th scope="col">image</th>
      <th scope="col">description</th>
      <th scope="col">quantity</th>
     
      
    </tr>
  </thead>
  <tbody>

  
    <tr>
      <th scope="row">{{$foods->id}}</th>
      <td>{{$foods->name}}</td>
      <td>{{$foods->price}}</td>
      <td>
      <td><img style="width: 100px;height:100px" src="{{ url('uploads/food', $foods->image) }}"
                            alt="" srcset=""></td>
       
      </td>
      <td>{{$foods->description}}</td>
      <td>{{$foods->quantity}}</td>

      
      </td>
      
    </tr>

  </tbody>
</table>

@endsection
