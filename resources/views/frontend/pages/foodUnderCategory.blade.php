@extends('frontend.master')
@section('content')

@if($foodUnderCategory->count()>0)

<div style="padding-top: 100px;">

<div class="row">
    @foreach($foodUnderCategory as $food)

    <div class="col-lg-4 col-md-6 special-grid drinks">
        <div class="gallery-single fix">
            <img src="{{url('/uploads/food/'.$food->image)}}" class="img-fluid" alt="Image">
            <div class="why-text">
                <h4>{{$food->name}}</h4>
                <p>{{$food->description}}</p>
                <h5>BDT {{$food->price}}</h5>
                <h5>Stock {{$food->quantity}}</h5>

            </div>
        </div>
        <a href="{{route('add.to.cart',$food->id)}}" class="btn btn-success">Add to Cart</a>
    </div>
    @endforeach
@else

<h2>No food found</h2>
@endif
</div>
</div>
@endsection