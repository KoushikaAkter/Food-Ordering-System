@extends('backend.master')

@section('content')
<h1>Create new food</h1>




<form action="{{route('food.update',$foods->id)}} " method="post" enctype="multipart/form-data">
   @csrf

  <div class="form-group">
    <label for="">Food Name</label>
    <input required type="text" class="form-control" id="" name="name" value="{{$foods->name}}" placeholder="Enter food name">
  </div>


  <div class="form-group">
    <label for="">Category Id</label>
    <input type="text" class="form-control" id="" name="cat_id"  placeholder="Enter category id">
  </div>


  <div class="form-group">
    <label for="">Food Price</label>
    <input type="text" class="form-control" id="" name="price" value="{{$foods->price}}" placeholder="Enter food price">
  </div> 


  <div class="form-group">
    <label for="">Food Description</label>
    <input type="text" class="form-control" id="" name="description" value="{{$foods->description}}"placeholder="Enter food description">
  </div>


  <div class="form-group">
    <label for="">Food Quantity</label>
    <input type="text" class="form-control" id="" name="quantity" value="{{$foods->quantity}}"placeholder="Enter food quantity">
  </div>


  <div class="form-group">
    <label for="">Status</label>
    <input type="text" class="form-control" id="" name="status" placeholder="Enter food status">
  </div>


  <div class="form-group">
    <label for="">Upload Image</label>
    <input type="file" class="form-control" id="" placeholder="Enter food image">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection