@extends('backend.master')

@section('content')
<h1>Create new food</h1>




<form action="{{route('food.store')}} " method="post" enctype="multipart/form-data">
   @csrf

  <div class="form-group">
    <label for="">Food Name</label>
    <input required type="text" class="form-control" id="" name="name" placeholder="Enter food name">
  </div>

  <div class="form-group">
    <label for="">Select Category</label>
   <select required class="form-control" name="cat_id" id="">

    @foreach ($category as $cat )
    <option value="{{$cat->id}}">{{$cat->name}}</option>
    @endforeach
   
   </select>
  </div>


  <div class="form-group">
    <label for="">Food Price</label>
    <input type="text" class="form-control" min="10" name="price" placeholder="Enter food price">
  </div> 


  <div class="form-group">
    <label for="">Food Description</label>
    <input type="text" class="form-control" id="" name="description" placeholder="Enter food description">
  </div>


  <div class="form-group">
    <label for="">Food Quantity</label>
    <input type="text" class="form-control" id="" name="quantity" placeholder="Enter food quantity">
  </div>


  <div class="form-group">
    <label for="">Status</label>
    <input type="text" class="form-control" id="" name="status" placeholder="Enter food status">
  </div>


  <div class="form-group">
    <label for="">Upload Image</label>
    <input name="image" type="file" class="form-control" id="" placeholder="Enter food image">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection