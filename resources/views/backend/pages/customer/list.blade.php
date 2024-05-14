@extends('backend.master')

@section('content')
<h1>customerList</h1>
<div>
<a href="{{route('customer.form'}} type="button" class="btn btn-success">Edit customer list</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Password</th>
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
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
   
  </tbody>
</table>




@endsection
