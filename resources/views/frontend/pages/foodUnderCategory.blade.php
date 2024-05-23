@extends('frontend.master')
@section('content')

@if($foodUnderCategory->count()>0)



<div style="padding-top: 100px;">

    <div class="row inner-menu-box">

        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="row">
                        @foreach($foodUnderCategory as $food)

                        <div class="col-lg-4 col-md-6 special-grid drinks">
                            <div class="gallery-single fix">
                                <img style="height: 200px; width:max-content;" src="{{url('/uploads/food/'.$food->image)}}" class="img-fluid" alt="Image">
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

                    </div>

                </div>


            </div>
        </div>
    </div>
    @else

    <h2>No food found</h2>
    @endif
</div>
@endsection